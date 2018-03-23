<?php
	include_once '../classes/Cast.class.php';
 
	function getSearchFields($fields) {
		//récupération des champs du formulaire de recherche
		$inputs = [];
		foreach ($fields as $field)
			if (isset( $_GET[$field]) && !empty( $_GET[$field]))
				$inputs[$field] = $_GET[$field];

		return $inputs;
	}

	function printSearchParameters ($inputs) {
		// renvoie la liste des paramètres de recherche en tant que string
		if (count($inputs) <= 0)
			return "aucun paramètre entré, voici la liste complète";
		
		$out = "<div class=\"search-parameters\">\n<ul>";
		foreach ($inputs as $key => $value) {
			$out .= "<li><div class=\"field-title\">";
			$out .= $key . " : ";
			$out .= "</div>\n";
			$out .= "<div class=\"field\">";
			if ($key == "genre") {
				$i = 0;
				foreach ($value as $genre) {
					if ($i != 0)
						$out .= ", ";	
					$out .= $genre;
					$i ++;
				}
			} else {
				$out .= $value;
			}
			$out .= "</div></li>";
		}
		$out .= "</ul></div>";
		return $out;
	}

	function printBackToSearch() {
		$out = "<form class=\"search-parameters\" method=\"GET\" action=\"Search.php\">";
		$out .= "<input class=\"submit\" value=\"retour à la recherche\" type=\"submit\">";
		$out .= "</form>";
		return $out;
	}

	function movieMatches($movie, $criterias) {
		//est ce que le film correspond à la liste des critères ?
		foreach ($criterias as $field => $value) {
			switch ($field) :
				case "dateFrom" : 
					if (strtotime($movie->getReleaseDate()) < strtotime($value))	
						return false;
				break; 
				case "dateTo" :
					if (strtotime($movie->getReleaseDate()) > strtotime($value))	
						return false;
				break;
				case "genre" :
					if (!movieGenresMatchesInputGenres($movie->getGenres(), $value))
						return false;
				break;
				case "title" : 
					if (strpos(strtoupper($movie->getTitle()), strtoupper($value)) === false)
						return false;
				break;
				case "cast-member" :
					if (!(playedInMovie($value, $movie) || directedMovie($value, $movie)))
						return false;
				break;
				default :
				break;
			endswitch;
			//(strpos($a, $b) => est ce que b est substr de a ?
			//strtoupper($a) => retourne $a en uppercase
		}
		return true;
	}

	function movieGenresMatchesInputGenres($movieGenres, $inputGenres) { 
		foreach ($inputGenres as $inputGenre)
			foreach ($movieGenres as $movieGenre)
				if ($movieGenre["name"] == $inputGenre) 
					return true;
		return false;
	}

	function directedMovie($director, $movie) {
		$movieDirectors = Cast::getDirectorsFromMovieId($movie->getId());
		return personMatchesList($director, $movieDirectors);
	}

	function playedInMovie($actor, $movie) {
		$movieActors = Cast::getActorsFromMovieId($movie->getId());
		
		if (personMatchesList($actor, $movieActors)) {
			return true;
		}
		return false;
	}

	function personMatchesList($person, $list) {
		//renvoie vrai si on trouve une correspondance entre le nom $person et la liste de membres du cast $list
		$person = strtoupper($person);
		
		//si la liste est vide on renvoie faux
		if  (!isset($list) || empty( $list)) 
			return false;

		foreach ($list as $personListed) {
			$personListedFNLN = strtoupper($personListed->getFirstname()) ." " .strtoupper($personListed->getLastname()); //concaténation firstname lastname
			
			$personListedLNFN = strtoupper($personListed->getLastname()) ." " .strtoupper($personListed->getFirstname()); // 
			//concaténation lastnameFirstname
			if (!(strpos($personListedFNLN, $person) === false && //le critère de recherche est dans le FNLN ?
				strpos($personListedLNFN, $person) === false && //le critère de recherche est dans le LNFN ?
				strpos($person, $personListedFNLN) === false && //le FNLN est dans le critère de recherche ?
				strpos($person, $personListedLNFN) === false))  //le LNFN est dans le critère de recherche ?
				return true;
		}
		return false;

	}

	function  renderMovieList($movies) {
		//retourne une chaîne de caractère correspondant à l'affichage de la liste de films
		
		$out = "<ul class=\"movie-list\">";
			if (empty($movies))
				$out .= "<li><p>Aucun film.</p></li>";
	
			else foreach ($movies as $key => $movie) {
				$out .= "<li><ul class=\"movie\">";
					$out .= renderMovieLink($movie);
				$out .= "</li></ul>";
			}
		
		$out .= "</ul>";
		return $out;
	}

	function renderMovieLink($movie) {
		//retourne une chaîne de caractère correspondant au lien vers la fiche d'un film
		$out = "";

		if ($movie != NULL) {
			$out .= "<h3>";
				$out .= "<a href=\"movie.php?id=" .$movie->getId() ."\">";
					$out .= $movie->getTitle();
				$out .= "</a>";
			$out .= "</h3>";
		} else
			$out .= "<p>pas d'info sur le film à cet id</p>";
		return $out;
	}

	function renderMovie ($movie) {
		//retourne une chaîne de caractère correspondant à l'affichage de la fiche d'un film
		$out = "";
		if ($movie != NULL) {

			$out = "<ul class=\"movie-list\">";
			$out .= "<li><ul class=\"movie\">";
			$out .= "<h3>" .$movie->getTitle() ."</h3>\n";
			$out .= "<li>sorti le " .$movie->getReleaseDate() ."</li>\n";
			$out .= "<li>id du pays : " .$movie->getIdCountry() ."</li>\n";
			$out .= "<li>genre(s) : ";
				$genres = $movie->getGenres();
				$i =0;
				foreach ($genres as $genre) {
					if ($i != 0) {
						$out .= ", ";	
					}
					$i ++;
					$out .= $genre["name"];
				}
			$out .= "</li>\n";
			$out .= "</ul></li>";
			$out .= "</ul>";
		}
		return $out;
	}

?>
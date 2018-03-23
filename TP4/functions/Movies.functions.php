<?php
 
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
		
		
		$out = "<div class=\"search-parameters\">\n<ul>";
		if (count($inputs) <= 0)
			$out.= "aucun paramètre entré, voici la liste complète";
		else {
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
		}
		$out .= "</ul></div>";
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
					if (strpos(strtoupper($movie->getTitle()), strtoupper($value)) === false &&
						strpos(strtoupper($value), strtoupper($movie->getTitle())) === false)
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
		//est ce que un genre du film correspond à un des genres d'entrée ?
		foreach ($inputGenres as $inputGenre)
			foreach ($movieGenres as $movieGenre)
				if ($movieGenre["name"] == $inputGenre) 
					return true;
		return false;
	}

	function directedMovie($director, $movie) {
		//est ce que la personne ayant le nom $director a réalisé le film $movie ?
		$movieDirectors = Cast::getDirectorsFromMovieId($movie->getId());
		return personMatchesList($director, $movieDirectors);
	}

	function playedInMovie($actor, $movie) {
		//est ce que la personne ayant le nom $actor a joué dans le film $movie ?
		$movieActors = Cast::getActorsFromMovieId($movie->getId());
		
		if (personMatchesList($actor, $movieActors)) {
			return true;
		}
		return false;
	}

	function personMatchesList($person, $list) {
		//y a t il une correspondance entre le nom $person et la liste de membres du cast $list ?
		$person = strtoupper($person);
		
		//si la liste est vide on renvoie faux
		if  (!isset($list) || empty( $list)) 
			return false;

		foreach ($list as $personListed) {
			$personListedFN = strtoupper($personListed->getFirstname());
			$personListedLN = strtoupper($personListed->getLastname());
			$personListedFNLN = $personListedFN ." " .$personListedLN; //concaténation firstname lastname
			$personListedLNFN = $personListedLN ." " .$personListedFN; //concaténation lastnameFirstname

			if (!(strpos($personListedFNLN, $person) === false && //le critère de recherche est dans le FNLN ?
				strpos($personListedLNFN, $person) === false && //le critère de recherche est dans le LNFN ?
				strpos($person, $personListedFN) === false && //le FN est dans le critère de recherche ?
				strpos($person, $personListedLN) === false)) { //le LN est dans le critère de recherche ?
				return true;
			}
		}
		return false;

	}


?>
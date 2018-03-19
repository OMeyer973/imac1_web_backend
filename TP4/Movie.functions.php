<?php

	function  renderMovieList($movies) {
		//retourne une chaîne de caractère correspondant à l'affichage de la liste de films
		if (empty($movies))
			return "Aucun film n'est présente dans la liste.";

		$out = "<ul class=\"movie-list\">";
			foreach ($movies as $key => $movie) {
				$out .= "<li class=\"movie\">";
					$out .= renderMovieLink($movie);
				$out .= "</li>";
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
			$out .= "<li> pas d'info sur le film à cet id </li>";
		return $out;
	}

	function renderMovie ($movie) {
		//retourne une chaîne de caractère correspondant à l'affichage de la fiche d'un film
		$out = "";
		if ($movie != NULL) {
			$out .= "<h3>" .$movie->getTitle() ."</h3>\n";
			$out .= "<li>sorti le " .$movie->getReleaseDate() ."</li>\n";
			$out .= "<li>id du pays : " .$movie->getIdCountry() ."</li>\n";	
		}
		return $out;
	}

?>
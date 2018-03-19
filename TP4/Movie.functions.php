<?php

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
			$out .= "</ul></li>";
			$out .= "</ul>";
		}
		return $out;
	}

?>
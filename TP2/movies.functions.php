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
		$out = "";
		foreach ($inputs as $key => $value) {
			$out .= $key . " : ";

			if ($key == "genre")
				foreach ($value as $genre) 
					$out .= $genre . " ";
			else 
				$out .= $value;
			
			$out .= "<br>";
		}
		return $out;
	}

	/*
	function movieMatches($movie, $criterias) {
		//est ce que le film correspond exactement à la liste des critères ? -> implantation pour des champs simples : pas d'intervalle ou de liste de checkbox
		foreach ($criterias as $field => $value) {
			if ($movie[$field] != $value)
				return false;
		}
		return true;
	}
	*/

	function movieMatches($movie, $criterias) {
		//est ce que le film correspond à la liste des critères ?
		foreach ($criterias as $field => $value) {
			if ($field == "dateFrom") {
				if (strtotime($movie["releaseDate"]) < strtotime($value))	
					return false;
			} else 
			if ($field == "dateTo") {
				if (strtotime($movie["releaseDate"]) > strtotime($value))	
					return false;
			} else
			if ($field == "genre") {
				if (!isInList($movie[$field], $value))
					return false;
			} else

			if ($movie[$field] == $value)
				return false;
		}
		return true;
	}

	function isInList($objToFind, $list) {
		foreach ($list as $value)
			if ($objToFind == $value) 
				return true;
		return false;
	}

	function  render_movie_list($movies) {
		//retourne une chaîne de caractère correspondant à l'affichage de la liste de films
		$out = "<ul class=\"movie-list\">";
		foreach ($movies as $key => $film) {
			$out .= "<li><ul class=\"movie\">";
			$out .= renderFilm($film);
			$out .= "</ul></li>";
		}
		$out .= "</ul>";
		return $out;
	}

	function renderFilm ($film) {
		//retourne une chaîne de caractère correspondant à l'affichage d'un film
		$out = "";
		if ($film != NULL) {
			foreach ($film as $key => $value) {
				if ($key == "id") 
					$out .= "<h3>film $value</h3>";
				else
					$out .= "<li> $key : $value </li>";
			}
		} else
			$out .= "<li> film is empty </li>";
		return $out;
	}
?>
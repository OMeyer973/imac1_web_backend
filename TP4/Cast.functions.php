<?php

	function  renderPeopleList($people) {
		//retourne une chaîne de caractère correspondant à l'affichage de la liste de gens
		if (empty($people))
			return "Aucune personne n'est présente dans la liste.";

		$out = "<ul class=\"people-list\">";
		foreach ($people as $key => $person) {
			$out .= "<li class=\"person\">";
			$out .= renderPersonLink($person);
			$out .= "</li>";
		}
		$out .= "</ul>";
		return $out;
	}

	function renderPersonLink($person) {
		//retourne une chaîne de caractère correspondant au lien vers la fiche d'un membre du cast
		$out = "";

		if ($person != NULL) {
			$out .= "<h3>";
				$out .= "<a href=\"cast.php?id=" .$person->getId() ."\">";
					$out .= $person->getLastname() ." " .$person->getFirstname();
				$out .= "</a>";
			$out .= "</h3>";

			if (isset( $person->role) && !empty( $person->role)) {
				$out .= "</li>";
					$out .= "dans le rôle de " .$person->role;
				$out .= "</li>";
			}
	
		} else
			$out .= "<li> pas d'info sur la personne à cet id </li>";
		return $out;
	}

	function renderPerson ($person) {
		//retourne une chaîne de caractère correspondant à l'affichage de la fiche d'un membre du cast
		$out = "";
		if ($person != NULL) {
			//infos sur la personne
			$out .= "<h3>" .$person->getLastname() ." " .$person->getFirstname() ."</h3>\n";
			$out .= "<li>né(e) en " .$person->getBirthYear() ."</li>\n";
			if (!$person->isAlive()) 
				$out .= "<li>mort en " .$person->getDeathYear() ."</li>\n";
			else
				$out .= "<li>vivant(e)</div>\n";
		} else
			$out .= "<li> pas d'info sur la personne à cet id </li>";
		return $out;
	}

?>

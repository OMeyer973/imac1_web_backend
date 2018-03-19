<?php

	function  renderPeopleList($people) {
		//retourne une chaîne de caractère correspondant à l'affichage de la liste de gens

		$out = "<ul class=\"people-list\">";
		
			if (empty($people))
				$out .= "Aucune personne.";

			else foreach ($people as $key => $person) {
				$out .= "<li><ul class=\"person\">";
				$out .= renderPersonLink($person);
				$out .= "</ul></li>";
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
				$out .= "<h4>";
					$out .= "dans le rôle de " .$person->role;
				$out .= "<h4>";
			}
	
		} else
			$out .= "<p> pas d'info sur la personne à cet id </p>";
		return $out;
	}

	function renderPerson ($person) {
		//retourne une chaîne de caractère correspondant à l'affichage de la fiche d'un membre du cast
		$out = "";
		if ($person != NULL) {
			//infos sur la personne

			$out .= "<ul class=\"people-list\">";
			$out .= "<li><ul class=\"person\">";
			$out .= "<h3>" .$person->getLastname() ." " .$person->getFirstname() ."</h3>\n";
				$out .= "<li>né(e) en " .$person->getBirthYear() ."</li>\n";
				if (!$person->isAlive()) 
					$out .= "<li>mort en " .$person->getDeathYear() ."</li>\n";
				else
					$out .= "<li>vivant(e)</div>\n";
			$out .= "</ul>";
			$out .= "</li></ul>";	
		} else
			$out .= "<p> pas d'info sur la personne à cet id </p>";
		return $out;
	}

?>

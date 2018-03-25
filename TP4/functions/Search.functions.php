<?php

	function  renderGenresCheckboxes($genres) {
		//retourne une chaîne de caractère correspondant à l'affichage de la liste des checkboxes genres dispo
		$out ="";
		foreach ($genres as $genre) {
			$out .= "<input type=\"checkbox\" name=\"genre[]\"";
			$out .= "value=\"";
			$out .= $genre->getName();
			$out .= "\">";
			$out .= $genre->getName();
			$out .="</input><br>";
		}
		return $out;
	}

	function renderCountryDropdown($countries){
		//retourne une chaîne de caractère correspondant à l'affichage du dropdown des pays dispo
		$out ="";
		$out .= "<select name=\"country\" id=\"class\">";
		$out .= "<option name=\"country[]\" value=\"\"> -- </option><br>";
		
		foreach ($countries as $country) {
			$out .= "<option";
			$out .= " name=\"country[]\" value=\"";
			$out .= $country->getName();
			$out .= "\">";
			$out .= $country->getName();
			$out .="</option><br>";
		}
		$out .= "</select>";

		return $out;
	}

?>

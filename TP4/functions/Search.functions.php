<?php

	function  renderGenresCheckboxes($genres) {
		//retourne une chaîne de caractère correspondant à l'affichage de la liste des genres dispo
		$out ="";
		foreach ($genres as $genre) {
			$out .= "<input type=\"checkbox\" name=\"genre[]\"";
			$out .= "value=\"";
			$out .= $genre->getName();
			$out .= "\">";
			$out .= $genre->getName();
			$out .="<br>";
		}
		return $out;
	}

?>

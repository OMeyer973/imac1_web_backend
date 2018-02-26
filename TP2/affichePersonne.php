
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
</head>

<body>

	<?php
		require_once("Personne.class.php");
		$out = "<p>";

		$fields = ["prenom","nom","age","ville"];
		$input = [];
		$inputOk = true;

		//réception des champs
		foreach ($fields as $field) {
			if (isset( $_POST[$field]) && !empty( $_POST[$field])) {
				$input[$field] = $_POST[$field];
			}
			else {
				$inputOk = false;
				$out .= "erreur d'entrée sur le champ \"$field\"<br>";
				break;	
			}
		}

		//si les champs sont valides, on les affiche
		if ($inputOk) {
			$personne = new personne($input["prenom"], $input["nom"], $input["age"], $input["ville"]);
			$personne->afficher();
		}

		$out .= "</p>";
		echo $out;	
	?>

</body>
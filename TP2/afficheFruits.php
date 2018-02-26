
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
</head>

<body>

	<?php 
		
		$out = "<p> j'aime";
		$isFirst = true;

		//parcours des inputs et affichage
		if (isset( $_POST["fruits"]) && !empty( $_POST["fruits"])) {
			foreach ($_POST["fruits"] as $fruit) {
				if (!$isFirst) 
					$out .= ", et";
				$out .= " les " . $fruit . "s";
				$isFirst = false;
			}
		}
		else
			$out .= "erreur d'input";

		$out .= ".</p>";
		echo $out;	
	?>

</body>
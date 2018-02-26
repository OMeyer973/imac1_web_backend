
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
</head>

<body>

	<form method="POST" action="tablemult.php"> 
		<input id="inputName" name="number" type="int" placeholder="entrez un entier"> 
		<input value="donne moi la table !" type="submit">
	</form>


	<?php 
		
		$out = "<p>";
		
		if (isset( $_POST["number"])) {
			if(!empty( $_POST["number"])) {

				$number = $_POST["number"];
				for ($i=1; $i<=10; $i++) {
					$out .= $number . " x " . $i . " = " . $number * $i . "<br>"; 
				}
			}
			else
				$out .= "veuillez entrer un entier";
		}

		$out .= "</p>";
		echo $out;	
	?>

</body>
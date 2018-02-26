
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
</head>

<body>
	<h1> recherche d'un film dans la liste</h1>
	<form method="GET" action="movies.php"> 
		<ul>
			<li><input type="string" name="title" value=""> titre du film </li>
			<!--génération des genres -->
			<?php
			require_once("data.movies.php");
			sort($genres);
			$out = "";
			foreach ($genres as $key => $value)
				$out .= "<li><input type=\"checkbox\" name=\"genre[]\" value=\"$value\"> $value </li>";
			echo $out;
			?>
			
			<li><input type="date" name="dateFrom" value="" /> sorti avant </li>
			<li><input type="date" name="dateTo" value="" /> et après </li>
			<li><input type="string" name="director" value=""> réalisateur </li>
			<input value="chercher le film" type="submit">
		</ul>
	</form>

</body>
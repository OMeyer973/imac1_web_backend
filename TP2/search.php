
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<h1 class="title"> recherche d'un film dans la liste</h1>
	<form class="search-form" method="GET" action="movies.php"> 
		<ul>
			<li>
				<div class="field-title"> titre du film </div>
				<div class="field"><input type="string" name="title" value=""></div>
			</li>
			<!--génération des genres -->
			<li>
				<div class="field-title"> genre(s) </div>
				<div class="field">
					<?php
					require_once("data.movies.php");
					sort($genres);
					$out = "";
					foreach ($genres as $key => $value)
						$out .= "<input type=\"checkbox\" name=\"genre[]\" value=\"$value\"> $value <br>";
					echo $out;
					?>
				</div>
			</li>
			<li>
				<div class="field-title"> sorti après </div>
				<div class="field"><input type="date" name="dateFrom" value="" /></div>
			</li>
			<li>
				<div class="field-title"> et avant </div>
				<div class="field"><input type="date" name="dateTo" value="" /></div>
			</li>
			<li>
				<div class="field-title"> réalisateur </div>
				<div class="field"><input type="string" name="director" value=""></div>
			</li>
			<input class="submit" value="chercher le film" type="submit">
		</ul>
	</form>

</body>
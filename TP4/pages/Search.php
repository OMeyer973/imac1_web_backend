
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../style.css" />
</head>

<body>
	<h1 class="title"> recherche d'un film dans la liste</h1>
	<form class="search-parameters" method="GET" action="Movies.php"> 
		<ul>
			<li>
				<div class="field-title"> titre du film </div>
				<div class="field"><input type="string" name="title" value=""></div>
			</li>
			<!--génération des genres -->
			<?php
				$out = ""; 
				require_once '../functions/Search.functions.php';
				require_once '../classes/Genre.class.php';
				require_once '../classes/Country.class.php';
				
				$out .= "<li>
					<div class=\"field-title\"> Genre(s) </div>
					<div class=\"field\">";

				$genres = Genre::getAll();
				$out .= renderGenresCheckboxes($genres);
				
				$out .= "</div></li>";

				$out .= "<li>
					<div class=\"field-title\"> Pays </div>
					<div class=\"field\">";

				$countries = Country::getAll();
				$out .= renderCountryDropdown($countries);
				
				$out .= "</div></li>";
				echo $out;
				
			?>
			<li>
				<div class="field-title"> Sorti après </div>
				<div class="field"><input type="date" name="dateFrom" value="" /></div>
			</li>
			<li>
				<div class="field-title"> et avant </div>
				<div class="field"><input type="date" name="dateTo" value="" /></div>
			</li>
			<li>
				<div class="field-title"> Un membre du cast </div>
				<div class="field"><input type="string" name="cast-member" value=""></div>
			</li>
			<input class="submit" value="chercher le film" type="submit">
		</ul>
	</form>

</body>
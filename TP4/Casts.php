
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<h1 class="title">tous les réalisateurs</h1>
	
		<?php
		
			require_once 'MyPDO.imac-movies.include.php';
			require_once 'Cast.class.php';
			require_once 'Cast.functions.php';
			require_once 'Movie.class.php';
			require_once 'Movie.functions.php';

			$out = "";

			$allCast = Cast::getAll();
			$out .= renderPeopleList($allCast);

			echo $out;

		?>
		
</body>

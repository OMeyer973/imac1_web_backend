
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../style.css" />
</head>

<body>
	<h1 class="title">tous les réalisateurs</h1>
	
		<?php
		
			require_once '../PDO/MyPDO.imac-movies.include.php';
			require_once '../classes/Cast.class.php';
			require_once '../functions/Cast.functions.php';
			require_once '../classes/Movie.class.php';
			require_once '../functions/Movie.functions.php';

			$out = "";

			$allCast = Cast::getAll();
			$out .= renderPeopleList($allCast);
			$out .= renderBackToSearch();
			echo $out;

		?>
		
</body>

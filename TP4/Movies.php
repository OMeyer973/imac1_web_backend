
<!DOCTYPE html>
<html>
<head>
	<meta content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<h1 class="title">tous les films</h1>
	
		<?php
		
			require_once 'MyPDO.imac-movies.include.php';
			require_once 'Movie.class.php';
			require_once 'Movie.functions.php';
			require_once 'Cast.class.php';
			require_once 'Cast.functions.php';

			$out = "";

			$movies = Movie::getAll();
			$out .= renderMovieList($movies);

			echo $out;

		?>
		
</body>

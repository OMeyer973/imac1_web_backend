
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
			<li><input type="string" name="genre" value=""> genre </li>
			<li><input type="date" name="dateFrom" value="" /> sorti entre </li>
			<li><input type="date" name="dateTo" value="" /> et </li>
			<li><input type="string" name="director" value=""> réalisateur </li>
			<input value="chercher le film" type="submit">
		</ul>
	</form>

</body>
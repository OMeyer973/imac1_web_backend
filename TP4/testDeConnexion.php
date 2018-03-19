<?php

require_once 'MyPDO.imac-movies.include.php';
require_once 'Cast.class.php';
require_once 'Movie.class.php';

//test de co
/*
$stmt = MyPDO::getInstance()->prepare(<<<SQL
	SELECT *
	FROM `cast`
	ORDER BY `lastname`, `firstname`
SQL
);

$stmt->execute();

while (($row = $stmt->fetch()) !== false) {
	echo "<div>{$row['lastname']}</div>";
}
*/

//test de la classe cast
//var_dump(Cast::createFromId(2));

//test de join
var_dump(Movie::getFromDirectorId(18));
?>
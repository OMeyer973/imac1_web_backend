<?php

require_once 'MyPDO.imac-movies.include.php';
<<<<<<< HEAD
require_once 'Cast.class.php';
require_once 'Movie.class.php';

//test de co
/*
=======


>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
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
<<<<<<< HEAD
*/

//test de la classe cast
//var_dump(Cast::createFromId(2));

//test de join
var_dump(Movie::getFromDirectorId(18));
=======


>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
?>
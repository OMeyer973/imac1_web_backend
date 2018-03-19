<?php

require_once 'MyPDO.imac-movies.include.php';


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


?>
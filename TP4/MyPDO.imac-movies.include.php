<?php
require_once 'MyPDO.class.php';

// host=votre serveur (localhost si travail en local)

//port=3306;
MyPDO::setConfiguration('mysql:host=localhost;dbname=imac-movies;charset=utf8', 'root', '');

?>
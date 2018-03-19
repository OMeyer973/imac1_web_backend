<?php
<<<<<<< HEAD
require_once 'MyPDO.imac-movies.include.php';
=======
require_once 'MyPDO.my_db.include.php'; //TO DO : à modifier
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f

/**
 * Classe Movie
 */
class Movie {

	/***********************ATTRIBUTS***********************/
	
	// Identifiant
	private $id = null;
	// Titre
	private $title = null;
	// Date de sortie
	private $releaseDate = null;
	//Identifiant du pays
	private $idCountry = null;

	/*********************CONSTRUCTEURS*********************/
	
	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Movie à partir d'un id (via la bdd)
	 * @param int $id identifiant du film à créer (bdd)
	 * @return Movie instance correspondant à $id
	 * @throws Exception s'il n'existe pas cet $id dans a bdd
	 */
	public static function createFromId($id){
<<<<<<< HEAD
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM movie WHERE id = :id");
		$stmt->execute(array(":id"=>$id));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "movie");
		if (($object = $stmt->fetch()) !== false)
			return $object;
		else
			throw new Exception("unable to fetch movie from id");
=======
		// TO DO
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/********************GETTERS SIMPLES********************/
	
	/**
	 * Getter sur l'identifiant
	 * @return int $id
	 */
	public function getId() {
<<<<<<< HEAD
		return $this->id;
=======
		// TO DO
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/**
	 * Getter sur le titre
	 * @return string $title
	 */
	public function getTitle() {
<<<<<<< HEAD
		return $this->title;
=======
		// TO DO
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/**
	 * Getter sur la date de sortie
	 * @return string $releaseDate
	 */
	public function getReleaseDate() {
<<<<<<< HEAD
		return $this->releaseDate;
=======
		// TO DO
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/**
	 * Getter sur l'identifiant du pays
	 * @return string $idCountry
	 */
	public function getIdCountry() {
<<<<<<< HEAD
		return $this->idCountry;
=======
		// TO DO
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/*******************GETTERS COMPLEXES*******************/

	/**
	 * Récupère tous les enregistrements de la table Movie de la bdd
	 * Tri par ordre décroissant sur la date de sortie
	 * puis par ordre alphabétique sur le titre
	 * @return array<Movie> liste d'instances de Movie
	 */
	public static function getAll() {
<<<<<<< HEAD
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM movie ORDER BY title");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "movie");
		return $stmt->fetchAll();
=======
		// TO DO
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/**
	 * Récupère tous les films du réalisateur/de la réalisatrice
	 * Tri par ordre décroissant sur la date de sortie
	 * puis par ordre alphabétique sur le titre sur le titre
	 * @param int $idDirector identifiant du réalisateur/de la réalisatrice
	 * @return array<Movie> liste d'instances de Movie
	 */
	public static function getFromDirectorId($idDirector){
<<<<<<< HEAD
			$stmt = MyPDO::getInstance()->prepare("
			SELECT 
				movie.id,
				movie.title,
				movie.releaseDate,
				movie.idCountry
			FROM
				cast, movie, director
			WHERE 
				director.idMovie = movie.id AND
				director.idDirector = :idDirector AND
				cast.id = :idDirector
		");
			
		$stmt->execute(array(":idDirector"=>$idDirector));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "movie");
		if (($object = $stmt->fetchAll()) !== false)
			return $object;
		else
			throw new Exception("unable to fetch movies from director id");
=======
		//TO DO next : #04 Jointure Cast - Movie
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/**
	 * Récupère tous les films de l'act.eur.rice avec son rôle pour chaque
	 * Tri par ordre décroissant sur la date de sortie
	 * puis dans l'ordre alphabétique sur le titre
	 * @param int $idActor identifiant l'act.eur.rice
	 * @return array<Movie> liste d'instances de Movie
	 */
	public static function getFromActorId($idActor){
<<<<<<< HEAD
			$stmt = MyPDO::getInstance()->prepare("
			SELECT 
				movie.id,
				movie.title,
				movie.releaseDate,
				movie.idCountry
			FROM
				cast, movie, actor
			WHERE 
				actor.idMovie = movie.id AND
				actor.idActor = :idActor AND
				cast.id = :idActor
		");
			
		$stmt->execute(array(":idActor"=>$idActor));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "movie");
		if (($object = $stmt->fetchAll()) !== false)
			return $object;
		else
			throw new Exception("unable to fetch movies from actor id");
=======
		// TO DO next : #04 Jointure Cast - Movie
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/**
	 * Récupère les genres du film courant ($this)
	 * Tri par ordre alphabétique
	 * @return array<Genre> liste d'instances de Genre
	 */
	public function getGenres() {
		// TO DO next : #05 Classe Genre
	}
}

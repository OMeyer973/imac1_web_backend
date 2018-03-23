<?php
require_once '../PDO/MyPDO.imac-movies.include.php';

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
	 * @throws Exception s'il n'existe pas cet $id dans la bdd
	 */
	public static function createFromId($id){
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM movie WHERE id = :id");
		$stmt->execute(array(":id" => $id));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "movie");
		if (($object = $stmt->fetch()) !== false)
			return $object;
		else
			throw new Exception("unable to fetch movie from id");
	}

	/********************GETTERS SIMPLES********************/
	
	/**
	 * Getter sur l'identifiant
	 * @return int $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Getter sur le titre
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Getter sur la date de sortie
	 * @return string $releaseDate
	 */
	public function getReleaseDate() {
		return $this->releaseDate;
	}

	/**
	 * Getter sur l'identifiant du pays
	 * @return string $idCountry
	 */
	public function getIdCountry() {
		return $this->idCountry;
	}

	/*******************GETTERS COMPLEXES*******************/

	/**
	 * Récupère tous les enregistrements de la table Movie de la bdd
	 * Tri par ordre décroissant sur la date de sortie
	 * puis par ordre alphabétique sur le titre
	 * @return array<Movie> liste d'instances de Movie
	 */
	public static function getAll() {
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM movie ORDER BY releaseDate DESC, title ASC");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "movie");
		return $stmt->fetchAll();
	}

	/**
	 * Récupère tous les films du réalisateur/de la réalisatrice
	 * Tri par ordre décroissant sur la date de sortie
	 * puis par ordre alphabétique sur le titre sur le titre
	 * @param int $idDirector identifiant du réalisateur/de la réalisatrice
	 * @return array<Movie> liste d'instances de Movie
	 */
	public static function getFromDirectorId($idDirector){
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
	}

	/**
	 * Récupère tous les films de l'act.eur.rice avec son rôle pour chaque
	 * Tri par ordre décroissant sur la date de sortie
	 * puis dans l'ordre alphabétique sur le titre
	 * @param int $idActor identifiant l'act.eur.rice
	 * @return array<Movie> liste d'instances de Movie
	 */
	public static function getFromActorId($idActor){
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
	}

	/**
	 * Récupère les genres du film courant ($this)
	 * Tri par ordre alphabétique
	 * @return array<Genre> liste d'instances de Genre
	 */
	public function getGenres() {
			$stmt = MyPDO::getInstance()->prepare("
			SELECT 
				`genre`.`id`, `genre`.`name`
			FROM
				movie, genre, moviegenre
			WHERE 
				`genre`.`id` = `moviegenre`.`idGenre` AND
				`movie`.`id` = `moviegenre`.`idMovie` AND
				`movie`.`id` = :idMovie
		");
		$stmt->execute(array(":idMovie" => $this->id));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "genre");
		if (($object = $stmt->fetchAll()) !== false)
			return $object;
		else
			throw new Exception("unable to fetch movie genres.");
	}
}

<?php
require_once 'MyPDO.imac-movies.include.php'; // TO DO : à modifier

/**
 * Classe Cast
 */
class Cast {

	/***********************ATTRIBUTS***********************/
	
	// Identidiant
	private $id=null;
	// Prénom
	private $firstname=null;
	// Nom
	private $lastname=null;
	// Année de naissance
	private $birthYear=null;
	// Année de décès
	private $deathYear=null;

	/*********************CONSTRUCTEURS*********************/
	
	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Cast à partir d'un id (via la bdd)
	 * @param int $id identifiant du cast à créer (bdd)
	 * @return Cast instance correspondant à $id
	 * @throws Exception s'il n'existe pas cet $id dans a bdd
	 */

	public static function createFromId($id){
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM cast WHERE id = :id");
		$stmt->execute(array(":id"=>$id));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "cast");
		if (($object = $stmt->fetch()) !== false)
			return $object;
		else
			throw new Exception("unable to fetch cast from id");
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
	 * Getter sur le prénom
	 * @return string $firstname
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Getter sur le nom
	 * @return string $lastname
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Getter sur l'année de naissance
	 * @return int $birthYear
	 */
	public function getBirthYear() {
		return $this->birthYear;
	}

	/**
	 * Getter sur l'année de décès
	 * @return int $deathYear (null si vivant)
	 */
	public function getDeathYear() {
		return $this->deathYear;
	}
	
	/**
	 * Vérifie si le cast est vivant.e
	 * @return bool
	 */
	public function isAlive() {
		return ($this->deathYear == null);
	}

	/*******************GETTERS COMPLEXES*******************/

	/**
	 * Récupère tous les enregistrements de la table Cast de la bdd
	 * Tri par ordre alphabétique sur le nom puis sur le prénom
	 * @return array<Cast> liste d'instances de Cast
	 */
	public static function getAll() {
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM cast ORDER BY lastname, firstname");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "cast");
		return $stmt->fetchAll();
	}

	/**
	 * Récupère tou.te.s les réalisateurs/réalisatrices d'un film
	 * Tri par ordre alphabétique selon le nom puis le prénom
	 * @param  $idMovie identifiant du film
	 * @return array<Cast> liste des instances de Cast
	 */
	public static function getDirectorsFromMovieId($idMovie) {
		$stmt = MyPDO::getInstance()->prepare("
			SELECT 
				cast.id,
				cast.firstname,
				cast.lastname,
				cast.birthYear
			FROM
				cast, movie, director
			WHERE 
				movie.id = :idMovie AND
				director.idMovie = :idMovie AND
				director.idDirector = cast.id
		");

		$stmt->execute(array(":idMovie"=>$idMovie));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "cast");
		if (($object = $stmt->fetchAll()) !== false)
			return $object;
		else
			throw new Exception("unable to fetch directors from movie id");
	}

	/**
	 * Récupère tou.te.s les réalisateurs/réalisatrices d'un film avec leur rôle
	 * Tri par ordre alphabétique selon le nom puis le prénom
	 * @param  $idMovie identifiant du film
	 * @return array<Cast> liste d'instances de Cast
	 */
	public static function getActorsFromMovieId($idMovie) {
			$stmt = MyPDO::getInstance()->prepare("
			SELECT 
				cast.id, 
				cast.firstname,
				cast.lastname,
				cast.birthYear,
				actor.name as role
			FROM
				cast, movie, actor
			WHERE 
				movie.id = :idMovie AND
				actor.idMovie = :idMovie AND
				actor.idActor = cast.id
		");
			
		$stmt->execute(array(":idMovie"=>$idMovie));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "cast");
		if (($object = $stmt->fetchAll()) !== false)
			return $object;
		else
			throw new Exception("unable to fetch actors from movie id");
	}

}

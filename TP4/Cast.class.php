<?php
<<<<<<< HEAD
require_once 'MyPDO.imac-movies.include.php'; // TO DO : à modifier
=======
require_once 'MyPDO.my_db.include.php'; // TO DO : à modifier
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f

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
<<<<<<< HEAD

	public static function createFromId($id){
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM cast WHERE id = :id");
		$stmt->execute(array(":id"=>$id));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "cast");
		if (($object = $stmt->fetch()) !== false)
			return $object;
		else
			throw new Exception("unable to fetch cast from id");
=======
	public static function createFromId($id){
		// TO DO
		// $stmt = MyPDO::getInstance()->prepare(...);
		// $stmt->execute(...);
		// $stmt->setFetchMode(...);
		// if (($object = $stmt->fetch()) !== false)
		//	...
		// else
		//	throw new Exception(...);
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
	 * Getter sur le prénom
	 * @return string $firstname
	 */
	public function getFirstname() {
<<<<<<< HEAD
		return $this->firstname;
=======
		// TO DO
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/**
	 * Getter sur le nom
	 * @return string $lastname
	 */
	public function getLastname() {
<<<<<<< HEAD
		return $this->lastname;
=======
		// TO DO
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/**
	 * Getter sur l'année de naissance
	 * @return int $birthYear
	 */
	public function getBirthYear() {
<<<<<<< HEAD
		return $this->birthYear;
=======
		// TO DO
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/**
	 * Getter sur l'année de décès
	 * @return int $deathYear (null si vivant)
	 */
	public function getDeathYear() {
<<<<<<< HEAD
		return $this->deathYear;
=======
		// TO DO
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}
	
	/**
	 * Vérifie si le cast est vivant.e
	 * @return bool
	 */
	public function isAlive() {
<<<<<<< HEAD
		return ($this->deathYear == null);
=======
		// TO DO
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/*******************GETTERS COMPLEXES*******************/

	/**
	 * Récupère tous les enregistrements de la table Cast de la bdd
	 * Tri par ordre alphabétique sur le nom puis sur le prénom
	 * @return array<Cast> liste d'instances de Cast
	 */
	public static function getAll() {
<<<<<<< HEAD
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM cast ORDER BY lastname, firstname");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "cast");
		return $stmt->fetchAll();
=======
		// TO DO
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/**
	 * Récupère tou.te.s les réalisateurs/réalisatrices d'un film
	 * Tri par ordre alphabétique selon le nom puis le prénom
	 * @param  $idMovie identifiant du film
	 * @return array<Cast> liste des instances de Cast
	 */
	public static function getDirectorsFromMovieId($idMovie) {
<<<<<<< HEAD
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
=======
		// TO DO next : #04 Jointure Cast - Movie
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

	/**
	 * Récupère tou.te.s les réalisateurs/réalisatrices d'un film avec leur rôle
	 * Tri par ordre alphabétique selon le nom puis le prénom
	 * @param  $idMovie identifiant du film
	 * @return array<Cast> liste d'instances de Cast
	 */
	public static function getActorsFromMovieId($idMovie) {
<<<<<<< HEAD
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
=======
		// TO DO next : #04 Jointure Cast - Movie
>>>>>>> a32a954be29adfd5ac7eb8ed96fe14db0b75a28f
	}

}

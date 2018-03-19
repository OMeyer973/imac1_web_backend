<?php
require_once 'MyPDO.my_db.include.php'; // TO DO : à modifier

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
		// TO DO
		// $stmt = MyPDO::getInstance()->prepare(...);
		// $stmt->execute(...);
		// $stmt->setFetchMode(...);
		// if (($object = $stmt->fetch()) !== false)
		//	...
		// else
		//	throw new Exception(...);
	}

	/********************GETTERS SIMPLES********************/
	
	/**
	 * Getter sur l'identifiant
	 * @return int $id
	 */
	public function getId() {
		// TO DO
	}

	/**
	 * Getter sur le prénom
	 * @return string $firstname
	 */
	public function getFirstname() {
		// TO DO
	}

	/**
	 * Getter sur le nom
	 * @return string $lastname
	 */
	public function getLastname() {
		// TO DO
	}

	/**
	 * Getter sur l'année de naissance
	 * @return int $birthYear
	 */
	public function getBirthYear() {
		// TO DO
	}

	/**
	 * Getter sur l'année de décès
	 * @return int $deathYear (null si vivant)
	 */
	public function getDeathYear() {
		// TO DO
	}
	
	/**
	 * Vérifie si le cast est vivant.e
	 * @return bool
	 */
	public function isAlive() {
		// TO DO
	}

	/*******************GETTERS COMPLEXES*******************/

	/**
	 * Récupère tous les enregistrements de la table Cast de la bdd
	 * Tri par ordre alphabétique sur le nom puis sur le prénom
	 * @return array<Cast> liste d'instances de Cast
	 */
	public static function getAll() {
		// TO DO
	}

	/**
	 * Récupère tou.te.s les réalisateurs/réalisatrices d'un film
	 * Tri par ordre alphabétique selon le nom puis le prénom
	 * @param  $idMovie identifiant du film
	 * @return array<Cast> liste des instances de Cast
	 */
	public static function getDirectorsFromMovieId($idMovie) {
		// TO DO next : #04 Jointure Cast - Movie
	}

	/**
	 * Récupère tou.te.s les réalisateurs/réalisatrices d'un film avec leur rôle
	 * Tri par ordre alphabétique selon le nom puis le prénom
	 * @param  $idMovie identifiant du film
	 * @return array<Cast> liste d'instances de Cast
	 */
	public static function getActorsFromMovieId($idMovie) {
		// TO DO next : #04 Jointure Cast - Movie
	}

}

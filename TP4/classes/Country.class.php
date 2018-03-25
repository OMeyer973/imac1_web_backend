<?php
require_once '../PDO/MyPDO.imac-movies.include.php';

/**
 * Classe Country
 */
class Country {

	/***********************ATTRIBUTS***********************/
	
	// Identifiant
	private $code = null;
	// Nom
	private $name = null;


	/*********************CONSTRUCTEURS*********************/
	
	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Country à partir d'un id (via la bdd)
	 * @param int $id identifiant du country à créer (bdd)
	 * @return Country instance correspondant à $id
	 * @throws Exception s'il n'existe pas cet $id dans a bdd
	 */
	public static function createFromCode($code){
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM country WHERE code = :code");
		$stmt->execute(array(":code"=>$code));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "country");
		if (($object = $stmt->fetch()) !== false)
			return $object;
		else
			throw new Exception("unable to fetch country from code");
	}

	/********************GETTERS SIMPLES********************/
	
	/**
	 * Getter sur l'identifiant
	 * @return int $id
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * Getter sur le nom
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/*******************GETTERS COMPLEXES*******************/

		/**
	 * Récupère le pays d'un film
	 * @param  $idMovie identifiant du film
	 * @return Country objet du pays
	 */
	public static function getCountryFromMovieId($idMovie) {
		$stmt = MyPDO::getInstance()->prepare("
			SELECT 
				country.code,
				country.name
			FROM
				country, movie
			WHERE 
				movie.id = :idMovie AND
				country.code = movie.idCountry
		");
		$stmt->execute(array(":idMovie"=>$idMovie));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "country");
		if (($object = $stmt->fetch()) !== false)
			return $object;
		else
			throw new Exception("unable to fetch country from movie id");
	}

	/**
	 * Récupère tous les enregistrements de la table Country de la bdd
	 * qui ont au moins un film associé au country
	 * Tri par ordre alphabétique
	 * @return array<Country> liste d'instances de Country
	 */
	public static function getAll() {
		$stmt = MyPDO::getInstance()->prepare("
			SELECT
				`country`.`code`,
				`country`.`name`,
				COUNT(*) as \"nbmovies\"
			FROM `country`, `movie`
			WHERE
				`country`.`code` = `movie`.`idCountry`
			GROUP BY `country`.`name`
			HAVING nbmovies > 0
		");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "country");
		return $stmt->fetchAll();
	}
}

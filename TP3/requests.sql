-- 1
  -- a
  SELECT * FROM `cast`

  -- b
  SELECT * FROM `cast` WHERE `deathYear` is NULL

  -- c
  SELECT * FROM `cast` 
  WHERE 
    `deathYear` is NULL AND
    `birthYear` < YEAR(CURDATE())-65

  -- d
  SELECT * FROM `cast` WHERE `deathYear` is NULL 
  ORDER BY `birthYear` LIMIT 1

  -- e
  SELECT *, YEAR(CURDATE())-`birthYear` AS `age` FROM `cast` 
  WHERE
    `deathYear` is NULL AND
    30 < YEAR(CURDATE())-`birthYear` AND
    YEAR(CURDATE())-`birthYear` < 50 
  ORDER BY YEAR(CURDATE())-`birthYear` DESC

  -- f
  SELECT * FROM `movie` WHERE title LIKE "%the%"

-- 2
  -- a
  SELECT
    `movie`.`title`, 
    `movie`.`releaseDate` 
  FROM `movie`, `country` WHERE
    `movie`.`idCountry` = `country`.`code` AND 
    `country`.`name` = "United States of America"
  ORDER BY `movie`.`releaseDate` DESC

  -- b
  SELECT 
    `movie`.`title`, 
    `movie`.`releaseDate`, 
    `country`.`name` AS "country" 
  FROM `movie`, `country` WHERE
    `movie`.`idCountry` = `country`.`code` AND 
    YEAR(`movie`.`releaseDate`) >= YEAR(CURDATE())-10
  ORDER BY `movie`.`releaseDate` ASC

  -- c avec les ids (vachement plus lisible quand même ^^' )
  SELECT
    `movie`.`title`, 
    GROUP_CONCAT( `genre`.`name` SEPARATOR ", " ) AS "genre(s)"
  FROM `movie`, `genre`, `moviegenre` 
  WHERE
    (`movie`.`idCountry` = "USA" OR
    `movie`.`idCountry` = "IT") AND 
    YEAR(`movie`.`releaseDate`) <= YEAR(CURDATE())-20 AND
    `genre`.`id` = `moviegenre`.`idGenre` AND
    `movie`.`id` = `moviegenre`.`idMovie`
  GROUP BY `movie`.`title`

  -- c avec les noms de pays (askip c'est mieux en prod)
  SELECT 
    `movie`.`title`, 
    GROUP_CONCAT( `genre`.`name` SEPARATOR ", " ) AS "genre(s)"
  FROM `movie`, `country`, `genre`, `moviegenre` 
    WHERE (
      (
        `movie`.`idCountry` = `country`.`code` AND 
        `country`.`name` = "United States of America"
      ) OR 
      (
        `movie`.`idCountry` = `country`.`code` AND 
        `country`.`name` = "Italy"
      )
    ) AND 
    YEAR(`movie`.`releaseDate`) <= YEAR(CURDATE())-20 AND
    `genre`.`id` = `moviegenre`.`idGenre` AND
    `movie`.`id` = `moviegenre`.`idMovie`
  GROUP BY `movie`.`title`

  -- d
  SELECT DISTINCT 
    `cast`.`lastname`,  
    `cast`.`firstname` 
  FROM `actor`, `cast` 
  WHERE 
      `actor`.`idActor` = `cast`.`id`
  ORDER BY 
    `cast`.`lastname`, `cast`.`firstname`

  -- e
  SELECT
    `movie`.`title` AS "titre du film", 
    GROUP_CONCAT( `genre`.`name` SEPARATOR ", " ) AS "genre(s)",
    `actor`.`name` AS "rôle de Elodie D."
  FROM `movie`, `country`, `genre`, `moviegenre`, `actor`, `cast` 
  WHERE
    `movie`.`idCountry` = `country`.`code` AND
    `country`.`name` = "France" AND
    `moviegenre`.`idMovie` = `movie`.`id` AND
    `moviegenre`.`idGenre` = `genre`.id AND
    `actor`.`idMovie` = `movie`.`id` AND
    `actor`.`idActor` = `cast`.`id` AND
    `cast`.`lastname` = "Deshayes" AND
    `cast`.`firstname` = "Élodie"
  GROUP BY `movie`.`title`

  -- f
  SELECT
    castactor.`lastname` AS "nom de l'acteur",
    castactor.`firstname` AS "prenom de l'acteur",
    `actor`.`name` AS "rôle"
  FROM 
    `actor`,
    `director`,
    `cast` AS castactor,
    `cast` AS castdirector
  WHERE
    `actor`.`idActor` = castactor.`id` AND
    `director`.`idDirector` = castdirector.`id` AND
    `actor`.`idMovie` = `director`.`idMovie` AND
    castdirector.`lastname` = "Anik" AND
    castdirector.`firstname` = "Myriam"

-- 3
  -- a
  SELECT
    `genre`.`name` AS "genre", 
    COUNT(*) AS "nb de films du genre"
  FROM `movie`, `genre`, `moviegenre` 
  WHERE 
    `moviegenre`.`idMovie` = `movie`.`id` AND
    `moviegenre`.`idGenre` = `genre`.`id`
  GROUP BY `genre`.`name`

  -- b
  SELECT
    COUNT(*) AS "nb de films ayant une Voix Off comme personnage"
  FROM `movie`, `actor` 
  WHERE 
    `actor`.`idMovie` = `movie`.`id` AND
    `actor`.`name` = "Voix Off"

  -- c
  SELECT 
    `cast`.`lastname` AS "nom d'acteur jouant un(e) devellopeur(se)",
    `cast`.`firstname` AS "prenom"
  FROM `cast`, `actor` 
  WHERE 
    `actor`.`idActor` = `cast`.`id` AND
    (`actor`.`name` = "Développeuse" OR
     `actor`.`name` = "Développeur")

  -- d
  SELECT
    `movie`.`title`,
    COUNT(*) as "nbdirectors"
  FROM `movie`, `director` 
  WHERE
    `director`.`idMovie` = `movie`.`id`
  GROUP BY `movie`.`title`
  HAVING nbdirectors > 1
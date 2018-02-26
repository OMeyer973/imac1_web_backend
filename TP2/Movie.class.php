

<?php 
	
	class Movie {
		private $id;
		private $title;
		private $releaseDate;
		private $genre;
		private $director;

		public function __construct($id, $title, $releaseDate, $genre, $director) {
			$this->id = (int)$id;
			$this->title = (string)$title;
			$this->releaseDate = (string)$releaseDate;
			$this->genre = (string)$genre;
			$this->director = (string)$director;
		}

		//getters
		public function getId() {
			return $this->id;
		}
		public function getTitle() {
			return $this->title;
		}
		public function getReleaseDate() {
			return $this->releaseDate;
		}
		public function getGenre() {
			return $this->genre;
		}
		public function getDirector() {
			return $this->director;
		}

		//setters
		public function setId($id) {
			$this->id = (int)$id;
		}
		public function setTitle($title) {
			$this->title = (string)$title;
		}
		public function setReleaseDate($releaseDate) {
			$this->releaseDate = (string)$releaseDate;
		}
		public function setGenre($genre) {
			$this->Genre = (string)$Genre;
		}
		public function setDirector($director) {
			$this->director = (string)$director;
		}
		
		//fonctions
		public function renderHTML() {
			echo "<h3>film " . $this->id . "</h3><li> title : " . $this->title . "</li><li> release date : " . $this->releaseDate . "</li><li> genre : " . $this->genre . "</li><li> director : " . $this->director . "</li>";
		}
	}

?>

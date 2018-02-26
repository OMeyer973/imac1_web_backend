

<?php 
	
	class Personne {
		private $prenom;
		private $nom;
		private $age;
		private $ville;

		public function __construct($prenom, $nom, $age, $ville) {
			$this->prenom = ucwords((string)$prenom);
			$this->nom = ucwords((string)$nom);
			$this->age = (int)$age;
			$this->ville = ucwords((string)$ville);
		}

		//getters
		public function getPrenom() {
			return $this->prenom;
		}
		public function getNom() {
			return $this->nom;
		}
		public function getAge() {
			return $this->age;
		}
		public function getVille() {
			return $this->ville;
		}

		//setters
		public function setPrenom($prenom) {
			$this->prenom = (string)$prenom;
		}
		public function setNom($nom) {
			$this->Nom = (string)$Nom;
		}
		public function setAge($age) {
			$this->age = (int)$age;
		}
		public function setVille($ville) {
			$this->ville = (string)$ville;
		}
		
		//fonctions
		public function afficher() {
			$out = "Bjr, je suis " . $this->prenom . " " . $this->nom . " j'habite à " . $this->ville . " et j'ai " . $this->age . " ans.<br>";
			echo $out;
		}
	}

?>

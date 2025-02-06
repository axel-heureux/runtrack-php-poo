<?php
class Personne {
    protected $age;

    public function __construct($age = 14) {
        $this->age = $age;
    }

    public function afficherAge() {
        echo "J'ai {$this->age} ans <br>";
    }

    public function bonjour() {
        echo "Hello <br>";
    }

    public function modifierAge($nouvel_age) {
        $this->age = $nouvel_age;
    }
}

class Eleve extends Personne {
    public function __construct($age = 14) {
        parent::__construct($age);
    }

    public function allerEnCours() {
        echo "Je vais en cours <br>";
    }
}

class Professeur extends Personne {
    private $matiereEnseignee;

    public function __construct($matiereEnseignee, $age = 30) {
        parent::__construct($age);
        $this->matiereEnseignee = $matiereEnseignee;
    }

    public function enseigner() {
        echo "Le cours va commencer <br>";
    }
}

$personne = new Personne();
$eleve = new Eleve();

$eleve->afficherAge();
$eleve->allerEnCours();

$eleve->modifierAge(15);
$eleve->afficherAge();

$professeur = new Professeur("Mathématiques", 40);

$professeur->bonjour();
$professeur->enseigner();
?>

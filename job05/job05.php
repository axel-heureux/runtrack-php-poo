<?php

class Animal {
    private $age;
    private $prenom;

    public function __construct() {
        $this->age = 0;
        $this->prenom = "";
    }

    public function afficherAge() {
        echo "L'âge de l'animal est : " . $this->age . " ans.<br>";
    }

    public function vieillir() {
        $this->age++;
    }

    public function nommer($nom) {
        $this->prenom = $nom;
    }

    public function afficherNom() {
        echo "Le nom de l'animal est : " . $this->prenom . "<br>";
    }
}

// Instanciation de l'objet Animal
$animal = new Animal();

// Affichage de l'âge initial
$animal->afficherAge();

// Faire vieillir l'animal
$animal->vieillir();

// Affichage du nouvel âge
$animal->afficherAge();

// Nommer l'animal
$animal->nommer("Rex");

// Affichage du nom
$animal->afficherNom();

?>

<?php
class Voiture {
    private $marque;
    private $modele;
    private $annee;
    private $kilometrage;
    private $en_marche;
    private $reservoir;

    public function __construct($marque, $modele, $annee, $kilometrage) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->kilometrage = $kilometrage;
        $this->en_marche = false;
        $this->reservoir = 50;
    }

    // Assesseurs et mutateurs
    public function getMarque() {
        return $this->marque;
    }

    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }

    public function getKilometrage() {
        return $this->kilometrage;
    }

    public function setKilometrage($kilometrage) {
        $this->kilometrage = $kilometrage;
    }

    public function getEnMarche() {
        return $this->en_marche;
    }

    public function setEnMarche($en_marche) {
        $this->en_marche = $en_marche;
    }

    public function getReservoir() {
        return $this->reservoir;
    }

    public function setReservoir($reservoir) {
        $this->reservoir = $reservoir;
    }

    // Méthode pour démarrer la voiture
    public function demarrer() {
        if ($this->verifier_plein()) {
            $this->en_marche = true;
            echo "La voiture a démarré.\n";
        } else {
            echo "Le réservoir est trop vide pour démarrer.\n";
        }
    }

    // Méthode pour arrêter la voiture
    public function arreter() {
        $this->en_marche = false;
        echo "La voiture est arrêtée.\n";
    }

    // Méthode privée pour vérifier le niveau du réservoir
    private function verifier_plein() {
        return $this->reservoir > 5;
    }
}

$voiture = new Voiture("Toyota", "Corolla", 2020, 15000);

// Tentative de démarrage avec un réservoir plein (50)
$voiture->demarrer();

// Réduire le réservoir à 3
$voiture->setReservoir(3);

// Tentative de démarrage avec un réservoir trop bas
$voiture->demarrer();

// Arrêter la voiture
$voiture->arreter();
?>

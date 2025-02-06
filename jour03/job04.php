<?php
// Définition de la classe Forme
class Forme {
    // Méthode aire() qui renvoie 0 par défaut
    public function aire() {
        return 0;
    }
}

// Définition de la classe Rectangle qui hérite de Forme
class Rectangle extends Forme {
    // Attributs privés
    private $largeur;
    private $hauteur;

    // Constructeur
    public function __construct($largeur, $hauteur) {
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
    }

    // Surcharge de la méthode aire() pour calculer l'aire du rectangle
    public function aire() {
        return $this->largeur * $this->hauteur;
    }
}

// Instanciation de la classe Rectangle
$rectangle = new Rectangle(5, 10);

// Affichage de l'aire du rectangle
echo "L'aire du rectangle est : " . $rectangle->aire();
?>

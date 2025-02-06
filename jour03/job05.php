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

// Définition de la classe Cercle qui hérite de Forme
class Cercle extends Forme {
    // Attribut privé
    private $radius;

    // Constructeur
    public function __construct($radius) {
        $this->radius = $radius;
    }

    // Surcharge de la méthode aire() pour calculer l'aire du cercle
    public function aire() {
        return pi() * pow($this->radius, 2);
    }
}

// Instanciation des objets Rectangle et Cercle
$rectangle = new Rectangle(5, 10);
$cercle = new Cercle(7);

// Affichage des aires
echo "L'aire du rectangle est : " . $rectangle->aire() . "<br>";
echo "L'aire du cercle est : " . $cercle->aire();
?>

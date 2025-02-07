<?php

class Personnage {
    private $x;
    private $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function gauche() {
        $this->x--;
    }

    public function droite() {
        $this->x++;
    }

    public function haut() {
        $this->y--;
    }

    public function bas() {
        $this->y++;
    }

    public function position() {
        return "Position actuelle : (" . $this->x . ", " . $this->y . ")<br>";
    }
}

// Instanciation du personnage
$personnage = new Personnage(0, 0);

// Déplacement du personnage
$personnage->droite();
$personnage->bas();
$personnage->gauche();
$personnage->haut();

// Affichage de la position actuelle
echo $personnage->position();

?>

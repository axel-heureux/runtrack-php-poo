<?php
class Point {
    private $x;
    private $y;

    public function __construct($x,$y) {
        $this->x = $x;
        $this->y = $y;
    }
    public function afficherLesPoints() {
        echo "Coordonnées du point: (" . $this->x . ", " . $this->y . ")<br>";
    }

    public function afficherX() {
        echo "Valeur de x: " . $this->x . "<br>";
    }

    public function afficherY() {
        echo "Valeur de y: " . $this->y . "<br>";
    }

    public function changerX($nouveauX) {
        $this->x = $nouveauX;
    }

    public function changerY($nouveauY) {
        $this->y = $nouveauY;
    }
}

$point = new Point(3, 5);

$point->afficherLesPoints ();

$point->afficherX();
$point->afficherY();

$point->changerX(10);
$point->changerY(15);

$point->afficherLesPoints();
?>
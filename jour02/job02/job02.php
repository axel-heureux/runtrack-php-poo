<?php
class Livre {
    private $titre;
    private $auteur;
    private $nombre_de_pages;

    public function __construct($titre, $auteur, $nombre_de_pages) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->setNombreDePages($nombre_de_pages);
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    public function getNombreDePages() {
        return $this->nombre_de_pages;
    }

    public function setNombreDePages($nombre_de_pages) {
        if (is_int($nombre_de_pages) && $nombre_de_pages > 0) {
            $this->nombre_de_pages = $nombre_de_pages;
        } else {
            echo "Erreur : Le nombre de pages doit être un entier positif.<br>";
        }
    }
}

$livre = new Livre("1984", "George Orwell", 328);

echo "Titre : " . $livre->getTitre() . "<br>";
echo "Auteur : " . $livre->getAuteur() . "<br>";
echo "Nombre de pages : " . $livre->getNombreDePages() . "<br>";

$livre->setNombreDePages(-100);

$livre->setNombreDePages(350);

echo "Nombre de pages après modification : " . $livre->getNombreDePages() . "<br>";
?>

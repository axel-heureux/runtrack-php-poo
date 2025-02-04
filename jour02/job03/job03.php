<?php
class Livre {
    private $titre;
    private $auteur;
    private $nombre_de_pages;
    private $disponible;

    public function __construct($titre, $auteur, $nombre_de_pages) {
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->setNombreDePages($nombre_de_pages);
        $this->disponible = true;
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
            echo "Erreur : Le nombre de pages doit être un entier positif.\n";
        }
    }

    public function verification() {
        return $this->disponible;
    }

    public function emprunter() {
        if ($this->verification()) {
            $this->disponible = false;
            echo "Le livre a été emprunté.\n";
        } else {
            echo "Le livre n'est pas disponible.\n";
        }
    }

    public function rendre() {
        if (!$this->verification()) {
            $this->disponible = true;
            echo "Le livre a été rendu.\n";
        } else {
            echo "Le livre n'a pas été emprunté.\n";
        }
    }
}

$livre = new Livre("1984", "George Orwell", 328);

echo "Disponibilité du livre : " . ($livre->verification() ? "Disponible" : "Indisponible") . "\n";

$livre->emprunter();
echo "Disponibilité du livre après emprunt : " . ($livre->verification() ? "Disponible" : "Indisponible") . "\n";

$livre->rendre();
echo "Disponibilité du livre après retour : " . ($livre->verification() ? "Disponible" : "Indisponible") . "\n";

$livre->rendre();  // Test de rendre un livre qui n'a pas été emprunté
?>

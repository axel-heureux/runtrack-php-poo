<?php
class Personne {
    private $nom;
    private $prenom;

    public function __construct($nom, $prenom) {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    public function SePresenter() {
        return "Je m'appelle " . $this->prenom . " " . $this->nom . ".";
    }
}

$personne1 = new Personne("Dupont", "Jean");
$personne2 = new Personne("Martin", "Sophie");
$personne3 = new Personne("Durand", "Paul");

echo $personne1->SePresenter() . "<br>";
echo $personne2->SePresenter() . "<br>";
echo $personne3->SePresenter() . "<br>";

?>

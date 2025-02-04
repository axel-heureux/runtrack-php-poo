<?php
class Student {
    private $nom;
    private $prenom;
    private $numero_etudiant;
    private $credits;
    private $level;

    public function __construct($nom, $prenom, $numero_etudiant) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numero_etudiant = $numero_etudiant;
        $this->credits = 0;
        $this->level = $this->studentEval();  // Niveau de l'étudiant calculé dès la création
    }

    public function add_credits($credits) {
        if ($credits > 0) {
            $this->credits += $credits;
            $this->level = $this->studentEval();  // Mise à jour du niveau après ajout de crédits
        } else {
            echo "Erreur : Le nombre de crédits doit être supérieur à zéro.\n";
        }
    }

    private function studentEval() {
        if ($this->credits >= 90) {
            return "Excellent";
        } elseif ($this->credits >= 80) {
            return "Très bien";
        } elseif ($this->credits >= 70) {
            return "Bien";
        } elseif ($this->credits >= 60) {
            return "Passable";
        } else {
            return "Insuffisant";
        }
    }

    public function studentInfo() {
        echo "Nom : " . $this->nom . "\n";
        echo "Prénom : " . $this->prenom . "\n";
        echo "Numéro d'étudiant : " . $this->numero_etudiant . "\n";
        echo "Niveau : " . $this->level . "\n";
        echo "Crédits : " . $this->credits . "\n";
    }
}

$student = new Student("Doe", "John", 145);

// Ajout de crédits
$student->add_credits(30);
$student->add_credits(20);
$student->add_credits(50);

// Affichage des informations de l'étudiant
$student->studentInfo();
?>

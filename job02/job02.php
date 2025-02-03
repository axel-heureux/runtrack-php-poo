<?php
class Operation {
    public function __construct(public $nombre1 = 0, public $nombre2 = 0) {}

    public function addition() {
        return $this->nombre1 + $this->nombre2;
    }
}


$operation = new Operation(5, 10);


echo "Résultat de l'addition : " . $operation->addition();
?>

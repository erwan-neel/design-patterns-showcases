<?php

Interface Transport {
    public function deliver();
}

class Camion implements Transport {

    public function deliver()
    {
        echo "Je livre la marchandise avec mon camion.";
    }
}

class Bateau implements Transport {

    public function deliver()
    {
        echo "Je livre la marchandise avec mon bateau.";
    }
}

abstract class Livreur {
    protected Transport $transport;

    public function livrer() {
        $this->createTransport();
        $this->transport->deliver();
    }

    abstract function createTransport();
}

class LivreurCamion extends Livreur {
    function createTransport()
    {
        $this->transport = new Camion();
    }
}

class LivreurBateau extends Livreur {

    function createTransport()
    {
        $this->transport = new Bateau();
    }
}

function clientCode(Livreur $livreur) {
    $livreur->livrer();
}

$livreur = new LivreurCamion();
clientCode($livreur);

echo "\n\n";

$livreur = new LivreurBateau();
clientCode($livreur);



<?php
class panier
{
    private ?int $panier_id = null;
    private ?string $nom = null;
    private ?string $prix = null;
    private ?string $prix_t = null;


    public function __construct($panier_id = null, $nom, $prix, $prix_t)
    {
        $this->panier_id = $panier_id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->prix_t = $prix_t;
    }
    

    public function getid()
    {
        return $this->panier_id;
    }

    public function getnom()
    {
        return $this->nom;
    }

    public function setnom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function getprix()
    {
        return $this->prix;
    }

    public function setprix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    public function getprix_t()
    {
        return $this->prix_t;
    }

    public function setprix_t($prix_t)
    {
        $this->prix_t = $prix_t;
        return $this;
    }

}
?>

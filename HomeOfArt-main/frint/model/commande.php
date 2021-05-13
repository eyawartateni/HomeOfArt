<?php
class Commande{
    private ?int $idCommande = null;
    private ?int $idclt = null;
    private ?int $idprod= null;
    private ?int $adresse = null;
    private ?string $prix = null;
    
    
    function __construct(int $idCommande,int $idclt,int $idprod,string $adresse,int $prix){
    $this->idCommande=$idCommande;
    $this->idclt=$idclt;
    $this->idprod=$idprod;
    $this->adresse=$adresse;
    $this->prix=$prix;
   
    
    }
    
    function getCommande(): int{
    return $this->idCommande;
    }
    function getclt(): int{
    return $this->idclt;
    }
    function getprod(): int{
        return $this->idprod;
        }
    function getadresse(): string{
            return $this->adresse;
     }
    function getprix(): int{
    return $this->prix;
    }
   
    
}
?>
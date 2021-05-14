<?php

class Livraison{
    private ?int $idlivraison = null;
    private ?string $datelivraison = null;
    private ?int $idLivreur = null;
    private ?int $idCommande = null;
    private ?string $etat = null;
    private ?int $prix = null;
    private ?string $adresse = null;
    
    function __construct(string $datelivraison,int $idLivreur,int $idCommande,string $etat,int $prix,string $adresse){
    
    $this->datelivraison=$datelivraison;
    $this->idLivreur=$idLivreur;
    $this->idCommande=$idCommande;
    $this->etat=$etat;
    $this->prix=$prix;
    $this->adresse=$adresse;
    
    }
    
    function getidlivraison(): int{
    return $this->idlivraison;
    }
    function getdate(): string{
    return $this->datelivraison;
    }
    function getliv(): int{
        return $this->idLivreur;
        }
    function getcmd(): int{
            return $this->idCommande;
     }
    function getetat(): string{
    return $this->etat;
    }
    function getprix(): int{
    return $this->prix;
    }
    function getadresse():string{
    return $this->adresse;
    }
   
    function setdate(string $datelivraison): void{
    $this->datelivraison=$datelivraison;
    }
    function setid(int $idLivreur): void{
        $this->idLivreur=$idLivreur;
        }
        function setcmd(int $idCommande): void{
            $this->idCommande=$idCommande;
            }
    
    function setetat(string $etat): void{
    $this->etat=$etat;
    }
    function setprix(int $prix): void{
    $this->prix=$prix;
    }
    function setadresse(string $adresse): void{
    $this->adresse=$adresse;
    }
    }


?>
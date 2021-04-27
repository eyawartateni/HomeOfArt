<?php

class Livraison{
    private ?int $idlivraison = null;
    private ?string $datelivraison = null;
    private ?int $idLiv = null;
    private ?int $idcmd = null;
    private ?string $etat = null;
    private ?int $prix = null;
    private ?string $adresse = null;
    
    function __construct(int $idlivraison,string $datelivraison,int $idLiv,int $idcmd,string $etat,int $prix,string $adresse){
    $this->idlivraison=$idlivraison;
    $this->datelivraison=$datelivraison;
    $this->idLiv=$idLiv;
    $this->idcmd=$idcmd;
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
        return $this->idLiv;
        }
    function getcmd(): int{
            return $this->idcmd;
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
    function setid(int $idLiv): void{
        $this->idLiv=$idLiv;
        }
        function setcmd(int $idcmd): void{
            $this->idcmd=$idcmd;
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
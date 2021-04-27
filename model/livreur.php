<?php

class Livreur{
    private ?int $idLivreur = null;
    private ?string $nomLivreur = null;
    private ?string $prenomLivreur = null;
    private ?string $adresse = null;
    private ?string $email = null;
    private ?int $tel = null;
    private ?int $salaire = null;
    
    function __construct( int $idLivreur,string $nomLivreur, string $prenomLivreur, string $adresse,string $email,int $salaire,int $tel){
    $this->idLivreur=$idLivreur;
    $this->nomLivreur=$nomLivreur;
    $this->prenomLivreur=$prenomLivreur;
    $this->adresse=$adresse;
    $this->email=$email;
    $this->salaire=$salaire;
    $this->tel=$tel;
    
    }
    
    function getid(): ?int{
    return $this->idLivreur;
    }
    function getNom(): string{
    return $this->nomLivreur;
    }
    function getPrenom(): string{
    return $this->prenomLivreur;
    }
    function getAdresse(): string{
        return $this->adresse;
        }
    function getsalaire(): int{
    return $this->salaire;
    }
    function getEmail(): string{
    return $this->email;
    }
    function getTel(): int{
    return $this->tel;
    }
   
    function setNom(string $nomLivreur): void{
    $this->nomLivreur=$nomLivreur;
    }
    function setPrenom(string $prenomLivreur): void{
    $this->prenomLivreur=$prenomLivreur;
    }
    function setadresse(string $adresse): void{
        $this->adresse=$adresse;
        }
    function setsalaire(int $salaire): void{
    $this->salaire=$salaire;
    }
    function setEmail(string $email): void{
    $this->email=$email;
    }
    function settel(int $tel): void{
    $this->tel=$tel;
    }
    }


?>
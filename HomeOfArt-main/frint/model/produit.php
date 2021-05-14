<?PHP

class produit
{
private ?int $idproduit = null;
private ?string $libelle = null;
private ?string $categorie = null;
private ?string $quantite = null;
private ?int  $prix = null;
private ?string $descriptionP=null;



function __construct(string $libelle, string $categorie,string $quantite,int $prix,string $descriptionP){
$this->libelle=$libelle;
$this->categorie=$categorie;
$this->prix=$prix;
$this->quantite=$quantite;
$this->descriptionP=$descriptionP;

}

function getId(): int{
return $this->idproduit;
}
function getLibelle(): string{
return $this->libelle;
}
function getDescription(): string{
return $this->descriptionP;
}
function getCategorie(): string{
return $this->categorie;
}
function getPrix(): int{
    return $this->prix;
}

function getQuantite(): int{
    return $this->quantite;
    }


function setId(int $idproduit): void{
$this->idproduit=$idproduit;
}
function setlibelle(string $libelle): void{
$this->libelle=$libelle;
}
function setCategorie(string $categorie): void{
$this->categorie=$categorie;
}
function setprix(int $prix): void{
    $this->prix=$prix;
    }
    function setDescription(string $descriptionP):void{
    $this->descriptionP=$descriptionP;
    }
    



}


?>
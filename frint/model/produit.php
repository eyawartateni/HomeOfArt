<?PHP

class produit
{
private ?int $idproduit = null;
private ?string $libelle = null;
private ?string $categorie = null;
private ?int  $prix = null;
private ?string $descriptionP=null;



function __construct(string $idproduit, string $libelle, string $categorie,int $prix,string $descriptionP){

$this->idproduit=$idproduit;
$this->libelle=$libelle;
$this->categorie=$categorie;
$this->prix=$prix;
$this->descriptionP=$descriptionP;

}

function getId(): int{
return $this->idproduit;
}
function getlibelle(): string{
return $this->titre;
}
function getDescription(): string{
return $this->description;
}

function getprix(): int{
    return $this->prix;
    }


function setId(int $idproduit): void{
$this->idproduit=$idproduit;
}
function setlibelle(string $titre): void{
$this->titre=$titre;
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
<?PHP

class categorie
{

private ?string $nom_cat = null;
private ?int $stat_cat = null;



function __construct(string $nom_cat,int $stat_cat){

$this->nom_cat=$nom_cat;
$this->stat_cat=$stat_cat;
}

function getnom(): int{
return $this->nom_cat;
}
function getcat(): string{
return $this->stat_cat;
}

function setlibelle(string $nom_cat): void{
$this->nom_cat=$nom_cat;
}

function setstat(int $stat_cat): void{
$this->stat_cat=$stat_cat;
}




}


?>
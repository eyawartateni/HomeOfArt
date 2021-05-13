<?PHP



class Publication
{
private ?int $id_publication = null;
private ?string $titre = null;
private ?string $description = null;
private ?string $image_name = null;


function __construct(string $titre, string $description, string $image_name){

$this->titre=$titre;
$this->description=$description;
$this->image_name=$image_name;
}

function getId(): int{
return $this->id_publication;
}
function getTitre(): string{
return $this->titre;
}
function getDescription(): string{
return $this->description;
}
function getImage(): string{
return $this->image_name;
}



function setId(int $id_publication): void{
$this->id_publication=$id_publication;
}
function setTire(string $titre): void{
$this->titre=$titre;
}
function setDescription(string $description): void{
$this->description=$description;
}
function setImage(string $image_name): void{
$this->image_name=$image_name;
}


}


?>
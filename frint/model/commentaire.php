<?PHP

class Commentaire
{
private ?int $id_commentaire = null;
private ?string $pseudo = null;
private ?string $messages = null;
private ?int  $id_publication_commentaire = null;



function __construct(string $id_commentaire, string $pseudo, string $messages,string $id_publication_commentaire){

$this->id_commentaire=$id_commentaire;
$this->pseudo=$pseudo;
$this->messages=$messages;
$this->$id_publication_commentaire=$$id_publication_commentaire;

}

function getId(): int{
return $this->id_commentaire;
}
function getPseudo(): string{
return $this->titre;
}
function getMessage(): string{
return $this->description;
}

function getidpub(): string{
    return $this->id_publication_commentaire;
    }


function setId(int $id_commentaire): void{
$this->id_commentaire=$id_commentaire;
}
function setPseudo(string $titre): void{
$this->titre=$titre;
}
function setMessage(string $messages): void{
$this->messages=$messages;
}
function setidpub(string $id_publication_commentaire): void{
    $this->id_publication_commentaire=$id_publication_commentaire;
    }
    



}


?>
<?PHP

class Reponse
{
private ?int $id_reponse = null;
private ?int $id_commentaire_reponse = null;
private ?string $pseudo = null;
private ?string $messages = null;



function __construct(string $id_commentaire_reponse, string $pseudo,string $messages){

$this->id_commentaire_reponse=$id_commentaire_reponse;
$this->pseudo=$pseudo;
$this->messages=$messages;

}

function getId(): int{
return $this->id_reponse;
}
function getPseudo(): string{
return $this->pseudo;
}
function getMessage(): string{
return $this->messages;
}

function getidcom(): string{
    return $this->id_commentaire_reponse;
    }


function setId(int $id_reponse): void{
$this->id_reponse=$id_reponse;
}
function setPseudo(string $titre): void{
$this->pseudo=$pseudo;
}
function setMessage(string $messages): void{
$this->messages=$messages;
}
function setidpub(string $id_commentaire_reponse): void{
    $this->id_commentaire_reponse=$id_commentaire_reponse;
    }
    



}


?>
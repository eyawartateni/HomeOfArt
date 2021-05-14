<?php 
class Utilisateur
{

    private ?int $id_event = null;
    private ?string $nom_event=null;
    private ?string $type_event=null;
    private ?string $date_event=null;
    private ?int $nbre_participants=null;
    private ?string $artiste=null;
    function __construct(string $nom_event, string $type_event, string $date_event, int $nbre_participants, string $artiste){

        
        $this->nom_event=$nom_event;
        $this->type_event=$type_event;
        $this->date_event=$date_event;
        $this->nbre_participants=$nbre_participants;
        $this->artiste=$artiste;
        }
        
        function getId(): int{
        return $this->id_event;
        }
        function getNom(): string{
        return $this->nom_event;
        }
        function getType(): string{
        return $this->type_event;
        }
        function getDate(): string{
        return $this->date_event;
        }
        function getNbre(): int{
        return $this->nbre_participants;
        }
        function getArtiste(): string{
        return $this->artiste;
        }
        

        function setId(int $id_event): void{
            $this->id_event=$id_event;
            }
        function setNom(string $nom_event): void{
        $this->nom_event=$nom_event;
        }
        function setType(string $type_event): void{
        $this->type_event=$type_event;
        }
        function setDate(string $date_event): void{
        $this->date_event=$date_event;
        }
        function setNbre(int $nbre_participants): void{
        $this->nbre_participants=$nbre_participants;
        }
        function setArtiste(string $artiste): void{
        $this->artiste=$artiste;
        }
        }
       


?>
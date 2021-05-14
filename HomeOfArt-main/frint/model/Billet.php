<?php 
class Billet
{

    private ?int $id_billet = null;
    private ?int $id_evenement=null;
    private ?int $nbre=null;
    private ?int $prix=null;
    function __construct(int $id_evenement, int $nbre, int $prix ){

        
        $this->id_evenement=$id_evenement;
        $this->nbre=$nbre;
        $this->prix=$prix;
        
        }
        
            
        function getId(): int{
        return $this->id_evenement;
        }
        
        function getNbre(): int{
        return $this->nbre;
        }
        function getPrix(): int{
        return $this->prix;
        }
        

        function setId(int $id_evenement): void{
            $this->id_evenement=$id_evenement;
            }
            function setIdb(int $id_billet): void{
                $this->id_billet=$id_billet;
                }
        function setPrix(int $prix): void{
        $this->prix=$prix;
        }
        
        
        function setNbre(int $nbre): void{
        $this->nbre=$nbre;
        }
       
        }
       


?>
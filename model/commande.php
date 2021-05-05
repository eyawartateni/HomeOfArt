<?PHP
class commande{
	
	private $refcommande;
	private $prixtotal;
	private $idclient;
	private $etat;
	private $detail;
	private $date;

	function __construct($refcommande,$idclient,$prixtotal,$etat,$detail,$date){
		$this->prixtotal=$prixtotal;
		$this->refcommande=$refcommande;
		$this->idclient=$idclient;
		$this->etat=$etat;
		$this->detail=$detail;
		$this->date=$date;
	
	}
	
	function getprixtotal(){
		return $this->prixtotal;
	}
	function getrefcommande(){
		return $this->refcommande;
	}
	function getidclient(){
		return $this->idclient;
	}
	function getetat(){
		return $this->etat;
	}
	function getdetail(){
		return $this->detail;
	}
	
	function getdate(){
		return $this->date;
	}

	function setrefcommande($refcommande){
		$this->refcommande=$refcommande;
	}
	function setidclient($idclient){
		$this->idclient;
	}
	function setetat($etat){
		$this->etat;
	}
	function setdetail($detail){
		$this->detail;
	}
	function setprixtotal($prixtotal){
		$this->prixtotal=$prixtotal;
	}
	function setdate($date){
		$this->date=$date;
	}
	
}

?>
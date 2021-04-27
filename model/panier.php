<?PHP
class panier{
	
	
	private $idclient;
	private $nomproduit;
	private $imgproduit;
	private $prixproduit;
	private $qte;

	

	function __construct($idclient,$nomproduit,$imgproduit,$prixproduit,$qte){
		
		$this->nomproduit=$nomproduit;
		
		$this->imgproduit=$imgproduit;
		$this->idclient=$idclient;
		$this->prixproduit=$prixproduit;
		$this->qte=$qte;
		
	
	}
	
	
	function getnomproduit(){
		return $this->nomproduit;
	}
	
	
	function getimgproduit(){
		return $this->imgproduit;
	}
	function getidclient(){
		return $this->idclient;
	}
	function getprixproduit(){
		return $this->prixproduit;
	}
	function getqte(){
		return $this->qte;
	}

	function setnomproduit($nomproduit){
		$this->nomproduit=$nomproduit;
	}
	
	function setimgproduit($imgproduit){
		$this->imgproduit=$imgproduit;
	}
	function setidclient($idclient){
		$this->idclient=$idclient;
	}
		function setprixproduit($prixproduit){
		$this->prixproduit=$prixproduit;
	}
		function setqte($qte){
		$this->qte=$qte;
	}
	

	
}

?>
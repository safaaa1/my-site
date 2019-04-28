<?PHP
class Commande
{
	private $id;
	private $qte_prod;
	private $prix_total;
	private $etat;
	private $id_user;
	private $datee;


	function __construct($qte_prod,$prix_total,$id_user,$datee){
		
		$this->qte_prod=$qte_prod;
		$this->prix_total=$prix_total;
		$this->id_user=$id_user;
		$this->datee=$datee;

		//$this->etat=$etat;
	}
	
	function getId(){
		return $this->id;
	}
	function getId_user(){
		return $this->id_user;
	}
	function getDatee(){
		return $this->datee;
	}
	function getEtat(){
		return $this->etat;
	}
	function getQte_prod(){
		return $this->qte_prod;
	}
	function getPrix_total(){
		return $this->prix_total;
	}
	
	function setEtat($etat){
		$this->etat=$etat;
	}
	function setQte_prod($qte_prod){
		$this->qte_prod;
	}
	function setPrix_total($prix_total){
		$this->prix_total=$prix_total;
	}
		
}

?>
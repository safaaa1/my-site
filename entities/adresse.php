<?PHP
class Adresse
{
	private $id_user;
	private $pays;
	private $ville;
	private $adresse;
	private $code_postal;


	function __construct($id_user,$pays,$ville,$adresse,$code_postal){
		
		$this->id_user=$id_user;
		$this->pays=$pays;
		$this->ville=$ville;
		$this->adress=$adress;
		$this->code_postal=$code_postal;

		//$this->etat=$etat;
	}
	
	function getId_user(){
		return $this->id_user;
	}

	function getPays(){
		return $this->pays;
	}

	function getVille(){
		return $this->ville;
	}

	function getAdress(){
		return $this->adress;
	}

	function getCode_postal(){
		return $this->code_postal;
	}


}
?>
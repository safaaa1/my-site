<?PHP
class Produits{
	private $id;
	private $nom;
	private $genre;
	private $description;
	private $quantite;
	private $prix;
	private $couleur;
	private $image;
	private $reduction;
	private $fournisseur;
	private $type;


	function __construct($nom,$genre,$description,$quantite,$prix,$couleur,$image,$reduction,$fournisseur,$type){
		$this->nom=$nom;
		$this->genre=$genre;
		$this->description=$description;
		$this->quantite=$quantite;
		$this->prix=$prix;
		$this->couleur=$couleur;
		$this->image=$image;
		$this->reduction=$reduction;
		$this->fournisseur=$fournisseur;
		$this->type=$type;
	}
	
function getId(){
		return $this->id;
	}

	function getNom(){
		return $this->nom;
	}
	function getGenre(){
		return $this->genre;
	}
	function getDescription(){
		return $this->description;
	}
	function getQuantite(){
		return $this->quantite;
	}
    function getPrix(){
		return $this->prix;
	}
	function getCouleur(){
		return $this->couleur;
	}
	function getImage(){
		return $this->image;
	}
	function getReduction(){
		return $this->reduction;
	}
	function getFournisseur(){
		return $this->fournisseur;
	}
	function getType(){
		return $this->type;
	}


	
	/*function setNom_prod($nom_prod){
		$this->nom_prod=$nom_prod;
	}
	function setQte_prod($qte_prod){
		$this->qte_prod;
	}
	function setPrix_total($prix_total){
		$this->prix_total=$prix_total;
	}*/
		
}

?>
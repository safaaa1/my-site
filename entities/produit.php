<?PHP

class Produit {

protected $id;
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

public function __construct()
{
  
      $argv = func_get_args();
      switch( func_num_args() ) 
      {
      case 1:
        self::__construct1($argv[0] );
      break;
      case 11:
        self::__construct2( $argv[0], $argv[1],$argv[2],$argv[3],$argv[4],$argv[5],$argv[6],$argv[7],$argv[8],$argv[9],$argv[10] );
      break; 
      }
}
  public function __construct1($fournisseur)
{
    $this->fournisseur=$fournisseur;
}
  public function __construct2($id,$nom,$genre,$description,$quantite,$prix,$couleur,$image,$reduction,$fournisseur,$type)
  {
  $this->id=$id;
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

public function getId()
{
    return $this->id;
}
  public function setId($id)
{
    $this->id=$id;
}
public function getNom()
{
    return $this->nom;
}
public function setNom($nom)
{
    $this->nom=$nom;
}
public function getGenre()
{
    return $this->genre;
}
public function setGenre($genre)
{
    $this->genre=$genre;
}
public function getDescription()
{
    return $this->description;
}
public function setDescription($description)
{
    $this->description=$description;
}
public function getQuantite()
{
    return $this->quantite;
}
public function setQuantite($quantite)
{
    $this->quantite=$quantite;
}
public function getPrix()
{
    return $this->prix;
}
 public function setPrix($prix)
{
    $this->prix=$prix;
}
public function getCouleur()
{
    return $this->couleur;
}
public function setCouleur($couleur)
{
    $this->couleur=$couleur;
}
public function getImage()
{
    return $this->image;
}
public function setImage($image)
{
    $this->image=$image;
}
public function getReduction()
{
    return $this->reduction;
}
public function setReduction($reduction)
{
    $this->reduction=$reduction;
}
public function getFournisseur()
{
    return $this->fournisseur;
}
public function setFournisseur($fournisseur)
{
    $this->fournisseur=$fournisseur;
}
public function getType()
{
    return $this->type;
}
public function setType($type)
{
    $this->type=$type;
}


  
public static function ajouter_produit($nom,$genre,$description,$quantite,$prix,$couleur,$image,$fournisseur,$type)
{
    $db=Db::getInstance();
    $qry =$db->exec("INSERT INTO produits(nom,genre,description,quantite,prix,couleur,image,reduction,fournisseur,type)
    VALUES ('$nom','$genre','$description','$quantite','$prix','$couleur','$image',0,'$fournisseur','$type')");  
 }
public static function afficher_produit()
{
      $liste = [];
      $db = Db::getInstance();
      $results =$db->query("SELECT * from produits  order by id");
      foreach($results->fetchAll() as $produit)
      {
      $liste[] = new Produit( $produit['id'],$produit['nom'],$produit['genre'],$produit['description'],$produit['quantite'],$produit['prix'],$produit['couleur'],$produit['image'],$produit['reduction'],$produit['fournisseur'],$produit['type']);
      }
      return $liste;
}


public static function all()
{
      $liste = [];
      $db = Db::getInstance();
      $results =$db->query("SELECT * from produits  order by id");
      foreach($results->fetchAll() as $produit)
      {
     $liste[] = new Produit( $produit['id'],$produit['nom'],$produit['genre'],$produit['description'],$produit['quantite'],$produit['prix'],$produit['couleur'],$produit['image'],$produit['reduction'],$produit['fournisseur'],$produit['type']);
      }
      return $liste;
}
    
public static function allF($id_produits)
{
      $liste = [];
      $db = Db::getInstance();
      $results =$db->query("SELECT * from produits  where id='$id_produits' ");
      foreach($results->fetchAll() as $produit)
      {
     $liste[] = new Produit( $produit['id'],$produit['nom'],$produit['genre'],$produit['description'],$produit['quantite'],$produit['prix'],$produit['couleur'],$produit['image'],$produit['reduction'],$produit['fournisseur'],$produit['type']);
      }
      return $liste;
}

public static function delete_data($id)
{  
     $db=Db::getInstance();
     $req=$db->query("DELETE FROM produits WHERE id='$id' ");
}
public static function findBycategorie($categorie) 
{
      $liste = [];
      $db = Db::getInstance();
      $results =$db->query("SELECT * from produits  where genre='$categorie' ");
      foreach($results->fetchAll() as $produit)
      {
      $liste[] = new Produit( $produit['id'],$produit['nom'],$produit['genre'],$produit['description'],$produit['quantite'],$produit['prix'],$produit['couleur'],$produit['image'],$produit['reduction'],$produit['fournisseur'],$produit['type']);
      }
      return $liste;
}
public static function chercher_id($nom) 
{
      $liste = [];
      $db = Db::getInstance();
      $results =$db->query("SELECT * from produits  where nom='$nom' ");
      foreach($results->fetchAll() as $produit)
      {
       $liste[] = new Produit( $produit['id'],$produit['nom'],$produit['genre'],$produit['description'],$produit['quantite'],$produit['prix'],$produit['couleur'],$produit['image'],$produit['reduction'],$produit['fournisseur'],$produit['type']);
      }
      return $liste[0];
}
public static function findByprix($prixmax,$prixmin) 
{
      $liste = [];
      $db = Db::getInstance();
      $prixmaa=$prixmax;
      $prixmii=$prixmin;
      $results =$db->query("SELECT * from produits  where prix < '$prixmaa' AND prix > '$prixmii' ");
      foreach($results->fetchAll() as $produit)
      {
      $liste[] = new Produit( $produit['id'],$produit['nom'],$produit['genre'],$produit['description'],$produit['quantite'],$produit['prix'],$produit['couleur'],$produit['image'],$produit['reduction'],$produit['fournisseur'],$produit['type']);
      }
      return $liste;
}

public static function findBycolor($color) 
{
      $liste = [];
      $db = Db::getInstance();
      $results =$db->query("SELECT * from produits  where couleur='$color' ");
      foreach($results->fetchAll() as $produit)
      {
      $liste[] = new Produit( $produit['id'],$produit['nom'],$produit['genre'],$produit['description'],$produit['quantite'],$produit['prix'],$produit['couleur'],$produit['image'],$produit['reduction'],$produit['fournisseur'],$produit['type']);
      }
      return $liste;
}
public static function findBynom($nom) 
{
      $liste = [];
      $db = Db::getInstance();
      $results =$db->query("SELECT * from produits  where nom='$nom' ");
      foreach($results->fetchAll() as $produit)
      {
      $liste[] = new Produit( $produit['id'],$produit['nom'],$produit['genre'],$produit['description'],$produit['quantite'],$produit['prix'],$produit['couleur'],$produit['image'],$produit['reduction'],$produit['fournisseur'],$produit['type']);
      }
      return $liste;
}
public static function afficheproduit($produit) 
{
      $liste = [];
      $db = Db::getInstance();
      $results =$db->query("SELECT * from produits  where nom='$produit' ");
      foreach($results->fetchAll() as $produit)
      {
      $liste[] = new Produit( $produit['id'],$produit['nom'],$produit['genre'],$produit['description'],$produit['quantite'],$produit['prix'],$produit['couleur'],$produit['image'],$produit['reduction'],$produit['fournisseur'],$produit['type']);
      }
      return $liste;
}
public static function ch_ch()
{
      $liste = [];
      $db = Db::getInstance();
      $results =$db->query("SELECT  DISTINCT fournisseur from produits ");
      // we create a list of Post objects from the database results
      
      foreach($results->fetchAll() as $produit)
      {//foreach: for  // //fetchall->tableau d'après les infos brutes dans l'objet
     $liste[] = new Produit($produit['fournisseur']);
      }
      return $liste;
}

public static function ch_ch_1($fourni)
{
      $za =[];
      $db = Db::getInstance();
      $results =$db->query("SELECT SUM(prix) FROM produits  where fournisseur= '$fourni' ");
      $za=$results->fetchAll();
      return $za[0];
}
public static function  findById($id)
{
      $liste = [];
      $db = Db::getInstance();
      $req = $db->query("SELECT * from produits WHERE id='".$id."'");
      foreach($req->fetchAll() as $produit) 
    {
     $liste[] = new Produit( $produit['id'],$produit['nom'],$produit['genre'],$produit['description'],$produit['quantite'],$produit['prix'],$produit['couleur'],$produit['image'],$produit['reduction'],$produit['fournisseur'],$produit['type']);
     return $liste[0];
    }
}

public static function update_data($id,$nom,$genre,$description,$quantite,$prix,$couleur,$image,$reduction,$fournisseur,$type)
{
    $db=Db::getInstance();
    $qry =$db->exec("UPDATE produits SET  nom='$nom' , genre='$genre', description='$description', quantite='$quantite', prix='$prix', couleur='$couleur', image='$image', reduction='$reduction', fournisseur='$fournisseur', type='$type' WHERE id='".$id."' ");
    echo $qry;

}




}
?>
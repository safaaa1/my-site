<?PHP 
        
class Categorie
{
protected $id;
private $nom; 
private $image; 

public function __construct($id,$nom,$image)
{
    $this->id=$id;
    $this->nom=$nom;
    $this->image=$image;
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
public function getImage()
{
    return $this->image;
}
public function setImage($image)
{
    $this->image=$image;
}



public static function all()
{
    $liste = [];
    $db = Db::getInstance();
    $results =$db->query("SELECT * from categories  order by id");
    foreach($results->fetchAll() as $categorie)
    {
    $liste[] = new Categorie( $categorie['id'],$categorie['nom'],$categorie['image']);
    }
    return $liste;
}
public static function ajouter_categorie($nom,$image)
{
    $db=Db::getInstance();
    $qry =$db->exec("INSERT INTO categories(nom,image)
    VALUES ('$nom','$image')");  
}
public static function afficher_categorie()
{
    $liste = [];
    $db = Db::getInstance();
    $results =$db->query("SELECT * from categories  order by id");
    foreach($results->fetchAll() as $categorie)
    {
    $liste[] = new Categorie( $categorie['id'],$categorie['nom'],$categorie['image']);
    }
    return $liste;
}
public static function delete_data($id)
{  
    $db=Db::getInstance();
    $req=$db->query("DELETE FROM categories WHERE id='$id' ");
}
public static function update_data($nom,$image,$id)
{
    $db=Db::getInstance();
    $qry =$db->exec("UPDATE categories SET , nom='$nom' , image='$image' WHERE id='".$id."' ");
    echo $qry;
}
public static function findById($id)
{
    $liste = [];
    $db = Db::getInstance();
    $req = $db->query("SELECT * from categories WHERE id='".$id."'");
    foreach($req->fetchAll() as $categorie) 
    {
      $liste[] = new Categorie($categorie['id'],$categorie['nom'],$categorie['image']);
      return $liste[0];
    }
}
public static function chercher_id($nom) 
{
    $liste = [];
    $db = Db::getInstance();
    $req =$db->query("SELECT * from categories  where nom='$nom' ");
    foreach($req->fetchAll() as $categorie) 
    {
    $liste[] = new Categorie($categorie['id'],$categorie['nom'],$categorie['image']);
    return $liste[0];
    }
}



}
?>
<?PHP

class Favoris {

protected $id;
private $id_user;
private $id_categorie;

public function __construct( $id,$id_user, $id_categorie)
{ 
  $this->id=$id;
  $this->id_user=$id_user;
  $this->id_categorie=$id_categorie;
}
public function getId()
{
    return $this->id;
}
public function setId($id)
{
    $this->id=$id;
}
public function getId_user()
{
    return $this->id_user;
}
 public function setId_user($id_user)
{
    $this->id_user=$id_user;
}
public function getId_categorie()
{ 
    return $this->id_categorie;
}
public function setId_categorie($id_categorie)
{
    $this->id_categorie=$id_categorie;
}
public static function ajout_favoris($id_categorie,$id_user)
{
    $db=Db::getInstance();
    $qry =$db->exec("INSERT INTO favoris(id_user,id_categorie)
    VALUES ('$id_user','$id_categorie')"); 
    return $qry;
}
public static function all($id_user)
{
      $liste = [];
      $db = Db::getInstance();
      $results =$db->query("SELECT * from favoris  where id_user='$id_user' ");
      foreach($results->fetchAll() as $favoris)
      {
      $liste[] = new Favoris( $favoris['id'],$favoris['id_user'],$favoris['id_categorie']);
      }
      return $liste;
}
public static function verif_favoris($id_categorie,$id_user)
{
    $liste = [];
    $db = Db::getInstance();
    $results =$db->query("SELECT * from favoris  where id_user='$id_user' and id_categorie='$id_categorie' ");
    foreach($results->fetchAll() as $favoris)
    {
    $liste[] = new Favoris( $favoris['id'],$favoris['id_user'],$favoris['id_categorie']);
    }
    return $liste;
}
public static function verif_Clientfavoris($id_categorie)
{
    $liste = [];
    $db = Db::getInstance();
    $results =$db->query("SELECT * from favoris  where  id_categorie='$id_categorie' ");
    foreach($results->fetchAll() as $favoris)
    { 
    $liste[] = new Favoris( $favoris['id'],$favoris['id_user'],$favoris['id_categorie']);
    }
    return $liste;
}
public static function delete($id)
{
    $db=Db::getInstance();
    $req=$db->query("DELETE FROM favoris WHERE id_categorie='$id' ");
}





}
?>
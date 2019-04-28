<?PHP

class Rating {

protected $id;
private $id_user;
private $id_produit;
private $rate;

public function __construct( $id,$id_user, $id_produit, $rate)
{
  
  $this->id=$id;
  $this->id_user=$id_user;
  $this->id_produit=$id_produit;
  $this->rate=$rate;  
}

   public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id=$id;
  }
 public function getId_user(){
    return $this->id_user;
  }
 public function setId_user($id_user){
    $this->id_user=$id_user;
  }
   public function getId_produit(){
    return $this->id_produit;
  }
 public function setId_produit($id_produit){
    $this->id_produit=$id_produit;
  }
  public function getRate(){
    return $this->rate;
  }
 public function setRate($rate){
    $this->rate=$rate;
  }
          
public static function chercher_ratingClients($id_produit)
{
      $liste = [];
      $db = Db::getInstance();
      $results =$db->query("SELECT * from rating  where id_produit='$id_produit'  ");
      foreach($results->fetchAll() as $rating)
      {
      $liste[] = new Rating( $rating['id'],$rating['id_user'],$rating['id_produit'],$rating['rate']);
      }
      return $liste;   
}
public static function chercher_rating($id_produit,$id_user) 
  {
      $liste = [];
      $db = Db::getInstance();
      $results =$db->query("SELECT * from rating  where id_produit='$id_produit' and id_user='$id_user'  ");
      foreach($results->fetchAll() as $rating)
      {
      $liste[] = new Rating( $rating['id'],$rating['id_user'],$rating['id_produit'],$rating['rate']);
      }
      return $liste; 
}
public static function addRate($id_produit,$id_user,$raaate)
{
    $db=Db::getInstance();
    $qry =$db->exec("INSERT INTO rating(id_user,id_produit,rate)
    VALUES ('$id_user','$id_produit','$raaate')");  
}
public static function nbr_user_rating($id_produit) 
{   
      $db = Db::getInstance();
      $list = [];
      $res = $db->query("SELECT count(*) from rating where id_produit='$id_produit' ");
      $rows =$res->fetchAll();
      return $rows[0];
}
public static function sum_rating($id_produit)
{
      $za =[];
      $db = Db::getInstance();
      $results =$db->query("SELECT SUM(rate) FROM rating  where id_produit= '$id_produit' ");
      $za=$results->fetchAll();
      return $za[0];
}



}
?>
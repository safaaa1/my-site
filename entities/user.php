<?PHP 
        
class User {
  protected $id;
  private $full_name;
  private $pseudo;
  private $mot_de_passe;
  private $email;
  private $adresse;
  private $Numero_telephone;
  private $role;
  private $etats;
  private $carte_banquaire;
  /*******************************/
public function __construct($id ,$full_name,$pseudo,$mot_de_passe,$email,$adresse,$Numero_telephone,$role,$etat,$carte_banquaire)
{
    $this->id=$id;
    $this->full_name=$full_name;
    $this->pseudo=$pseudo;
    $this->mot_de_passe=$mot_de_passe;
    $this->email=$email;
    $this->adresse=$adresse;
    $this->Numero_telephone=$Numero_telephone;
    $this->role=$role;
    $this->etat=$etat;
    $this->carte_banquaire=$carte_banquaire;
}
 
  /**********************************/
  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id=$id;
  }
 public function getFull_name(){
    return $this->full_name;
  }
   public function getEtat(){
    return $this->etat;
  }
     public function getCarte_banquaire(){
    return $this->carte_banquaire;
  }


   public function getMot_de_passe(){
    return $this->mot_de_passe;
  }
 
  public function getPseudo(){
    return $this->pseudo;
  }
  public function getEmail(){
    return $this->email;
  }
  public function getAdresse(){
    return $this->adresse;
  }

  public function getNumero_telephone(){
    return $this->Numero_telephone;
  }
  public function setFull_name($full_name){
    $this->full_name=$full_name;
  }
  public function setPseudo($pseudo){
    $this->pseudo=$pseudo;
  }
  public function setEmail($email){
    $this->email=$email;
  }
  public function setAdresse($adresse){
    $this->adresse=$adresse;
  }
    public function setMot_de_passe($mot_de_passe){
    $this->mot_de_passe=$mot_de_passe;
  }
  public function setCarte_banquaire($carte_banquaire){
    $this->carte_banquaire=$carte_banquaire;
  }

  public function setNumero_telephone($Numero_telephone){
    $this->Numero_telephone=$Numero_telephone;
  }
 
public static function ajouter($full_name,$pseudo,$mot_de_passe,$email,$adresse,$Numero_telephone,$carte_banquaire)
  {
     $db=Db::getInstance();
     $qry =$db->exec("INSERT INTO user(full_name,pseudo,mot_de_passe,email,adresse,Numero_telephone,role,etats,carte_banquaire)
     VALUES ('$full_name','$pseudo','$mot_de_passe','$email','$adresse','$Numero_telephone','client','desactive','$carte_banquaire')");
     echo $qry;
 }
public static function verif($pseudo,$mot_de_passe)
{
      $liste = [];
      $db = Db::getInstance();
      $req = $db->query("SELECT * from user WHERE ( (pseudo='".$pseudo."') AND (mot_de_passe='".$mot_de_passe."'))");
      foreach($req->fetchAll() as $user) {
      $liste[] = new user( $user['id'],$user['full_name'],$user['pseudo'],$user['mot_de_passe'],$user['email'],$user['adresse'],$user['Numero_telephone'],$user['role'],$user['etats'],$user['carte_banquaire']);
      }
      return $liste[0];
} 

public static function verifrole($pseudo,$mot_de_passe)
{
      $liste = [];
      $db = Db::getInstance();
      $req = $db->query("SELECT * from user WHERE ( (pseudo='".$pseudo."') AND (mot_de_passe='".$mot_de_passe."') AND (role='client'))");
      foreach($req->fetchAll() as $user) {
      $liste[] = new User( $user['id'],$user['full_name'],$user['pseudo'],$user['mot_de_passe'],$user['email'],$user['adresse'],$user['Numero_telephone'],$user['role'],$user['etats'],$user['carte_banquaire']);
      }
      return $liste[0];
} 
 
public static function chercher_id($pseudo)
{
      $liste = [];
      $db = Db::getInstance();
      $req = $db->query("SELECT * from user WHERE  (pseudo='".$pseudo."')");
      foreach($req->fetchAll() as $user) {
      $liste[] = new User( $user['id'],$user['full_name'],$user['pseudo'],$user['mot_de_passe'],$user['email'],$user['adresse'],$user['Numero_telephone'],$user['role'],$user['etats'],$user['carte_banquaire']);
      }
      return $liste[0];
}
public static function chercher_mail($id)
{
      $liste = [];
      $db = Db::getInstance();
      $req = $db->query("SELECT * from user WHERE  (id='".$id."')");
      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $user) {//foreach: for  // //fetchall->tableau d'après les infos brutes dans l'objet
      $liste[] = new User( $user['id'],$user['full_name'],$user['pseudo'],$user['mot_de_passe'],$user['email'],$user['adresse'],$user['Numero_telephone'],$user['role'],$user['etats'],$user['carte_banquaire']);
      }
      return $liste[0];
} 
  
   

   
}
?>
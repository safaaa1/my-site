<?php
include("entities/produit.php");
include("entities/categorie.php");
include("entities/rating.php");
include("entities/user.php");
include("entities/favoris.php");

Class produit_core{

public function update_produit()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
   $pseudo=$_SESSION['pseudo'];
   $nom     =$_POST['nom'];
   $genre   =$_POST['genre'];
   $description   =$_POST['description'];
   $quantite=$_POST['quantite'];
   $prix    =$_POST['prix'];
   $couleur =$_POST['couleur'];
   $fournisseur =$_POST['fournisseur'];
   $type =$_POST['type'];
   $id= $_POST['id'];
   $reduction=0;
   if($_FILES["image"]['name'])
    {
      $image=$_FILES["image"]["name"];
      move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$_FILES["image"]["name"]);
    }
    if (empty($_POST['nom']))
    {
        ?>
        <script>
        Javascript:alert('Merci de remplir le champ !')
        document.location.replace("?core=produit&action=va_modifier");
        </script>
        <?php
    }
    else
    {
      $results = Produit::update_data($id,$nom,$genre,$description,$quantite,$prix,$couleur,$image,$reduction,$fournisseur,$type);
      $table= Produit::all();
      require_once 'views/produit_liste.php';
    } 
  }
}
public function modif_p()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
      $categories= Categorie::all();
      $table = Produit::findById($_GET['id']);
      require_once 'views/produit_modif_admin.php';
  }
}
public function produit_admin ()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
    include 'views/produit_liste.php';
  }
}
public function ajouter_produit()
{ 
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
   $pseudo=$_SESSION['pseudo'];
   $nom     =$_POST['nom'];
   $genre   =$_POST['genre'];
   $description   =$_POST['description'];
   $quantite=$_POST['quantite'];
   $prix    =$_POST['prix'];
   $couleur =$_POST['couleur'];
   $fournisseur =$_POST['fournisseur'];
   $type =$_POST['type'];
   if($_FILES["image"]['name'])
    {
      $image=$_FILES["image"]["name"];
      move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$_FILES["image"]["name"]);
    }
    if (empty($_POST['nom']))
    {
        ?>
        <script>
        Javascript:alert('Merci de remplir le champ !')
        document.location.replace("?core=produit&action=va_modifier");
        </script>
        <?php
    }
    else if (!is_numeric ( $_POST['prix']))
    {
        ?>
        <script>
        Javascript:alert('prix n est pas valide !')
        document.location.replace("?core=produit&action=va_modifier");
        </script>
        <?php
    } else if (!is_numeric ( $_POST['quantite']))
      {
        ?>
        <script>
        Javascript:alert('quantite n est pas valide !')
        document.location.replace("?core=produit&action=va_modifier");
        </script>
    <?php
      }
    else
    {
    $table= Produit::ajouter_produit($nom,$genre,$description,$quantite,$prix,$couleur,$image,$fournisseur,$type);
    $id_user=User::chercher_id($_SESSION['pseudo'])->getId();
    $id_categorie=Categorie::chercher_id($genre)->getId();
    $verifs=Favoris::verif_Clientfavoris($id_categorie);
    require 'css_js_templates/PHPMailer-master/PHPMailerAutoload.php';
   if(empty($verifs))
   {
    $table= Produit::afficher_produit();
    include 'views/produit_liste.php';
   }
   else
    {
    foreach($verifs as $verif) 
    {
      $id_client=$verif->getId_user();
      $nom_client=User::chercher_mail($id_client)->getFull_name();
      $adresse_mail=User::chercher_mail($id_client)->getEmail();
   
$mail = new PHPMailer();
$mail->IsSmtp();
$mail->SMTPAuth = true;
$mail->Debugoutput='html';
$mail->Host = "smtp.gmail.com";  //*S07219190
$mail->Port = 25;
$mail->isHTML(true);
$mail->Username = "electromagasin0@gmail.com";
$mail->Password = "*168831450#";
$mail->setFrom("electromagasin0@gmail.com");
$mail->Subject = "nouveau Produit: '$genre'";
$mail->Body= "bonjour '$nom_client'
 un nouveau produit est ajoutee a votre categorie preferee '$genre'  ";
$mail->AltBody ="5demt  baby";
$mail->AddAddress($adresse_mail);
$mail->SMTPOptions = array
(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true)
);
    }
    if(!$mail->send())
      { 
        echo "Maiiler Error: " . $mail->ErrorInfo;
      } 
      else
      {
          ?>
          <script>
          Javascript:alert('Mail sent !');
          </script>
          <?php
      }
          $table= Produit::afficher_produit();
          include 'views/produit_liste.php';
      }
    }
  }
}
public function afficher_produit()
{
  if(!isset($_SESSION['pseudo'])&&($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else{
        $table= Produit::afficher_produit();
        require_once 'views/produit_liste.php';
      }
}
public function va_modifier()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else{$table= Categorie::afficher_categorie();
  require_once 'views/produit_admin.php';
  }
}
public function delete()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
    $result = Produit::delete_data($_GET['id']);
    $table= Produit::all();
    include 'views/produit_liste.php';}
} 
public function cher_couleur()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
  $table_produit = Produit::findBycolor($_GET['color']);
  $table_categorie= Categorie::all();
  include 'views/categorie_client.php';
  }
}  
public function cher_nom()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
  $nom=$_POST['nom'];
  $table_produit = Produit::findBynom($nom);
  $table_categorie= Categorie::all();
  include 'views/categorie_client.php';
  }
}  
public function afficheproduit()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
    $nom=$_GET['nom'];
    $id_user=User::chercher_id($_SESSION['pseudo'])->getId();
    $id_produit=Produit::chercher_id($nom)->getId();
    $rating=Rating::chercher_rating($id_produit,$id_user);
    $nbrClients=Rating::nbr_user_rating($id_produit);
    $sumrating=Rating::sum_rating($id_produit);
    foreach($sumrating as $rate) {$sum=$rate;}
    foreach($nbrClients as $rate) {$nbr=$rate; if($nbr==0){$nbr=1;}}
    $ratesredClient=$sum/$nbr;
    $ratesgrisClient=5-($ratesredClient);
    if (empty($rating))
    {
      $ratesred=0;
      $ratesgris=5;
      $table_produit = Produit::afficheproduit($nom);
      require_once 'views/affiche_produit.php';   
    }
    else
        { 
         foreach($rating as $rate) {$ratesred=$rate->getRate();
         $ratesgris=5-($ratesred);}
         $table_produit = Produit::afficheproduit($nom);
         require_once 'views/affiche_produit.php';
        }
 
    }
}
public function ch()
{ 
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
  $table_produit = Produit::ch_ch();
  require_once 'views/chart.php';
  }
}
public function ch_2()
{ 
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
  require_once 'views/spot.php';
  }
}
/*
public function ch_3()
{ if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");}
  else{
@mysql_connect("localhost","root","");
@mysql_select_db("test_web");

if (isset($_POST['submit']))
{
    $name=$_FILES['file']['name'];
    $temp=$_FILES ['file']['tmp_name']; 
    move_uploaded_file($temp,"uploads/".$name);
    $url = "http://localhost/test_video/uploads/$name";
    //mysql_query("INSERT INTO `videos` value ('','$name','$url')");
    mysql_query("UPDATE `videos` SET `name`='$name',`url`='$url' WHERE id=1");
}
}
}
*/
public function rating()
{ 
  if(!isset($_SESSION['pseudo']))
  {
    header("location:?core=user&action=login");
  }
 else
 {
   $nom=$_GET['nom'];
   $raaate=$_GET['raaate'];
   $id_user=User::chercher_id($_SESSION['pseudo'])->getId();
   $id_produit=Produit::chercher_id($nom)->getId();
   $rating=Rating::chercher_rating($id_produit,$id_user);
   if(empty($rating))
   {
      $add_rate=Rating::addRate($id_produit,$id_user,$raaate);
      $ratings=Rating::chercher_rating($id_produit,$id_user);
      foreach($ratings as $rate) 
      {$ratesred=$rate->getRate();
      $ratesgris=5-($rate->getRate());}
      $table_produit = Produit::afficheproduit($nom);
      $rating=Rating::chercher_rating($id_produit,$id_user);
      $nbrClients=Rating::nbr_user_rating($id_produit);
      $sumrating=Rating::sum_rating($id_produit);
      foreach($sumrating as $rate) {$sum=$rate;}
      foreach($nbrClients as $rate) {$nbr=$rate;}
      $ratesredClient=$sum/$nbr;
      $ratesgrisClient=5-($ratesredClient);
      require_once 'views/affiche_produit.php';
   }
    else
    {
        ?>
        <script>
        Javascript:alert('vous avez déja noter !')
        document.location.replace("?core=produit&action=afficheproduit&nom=<?php echo $nom ?>");
        </script>
        <?php
    }
  }
}





}
?>
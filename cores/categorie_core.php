<?php
include("entities/produit.php");
include("entities/categorie.php");
include("entities/rating.php");
include("entities/user.php");
include("entities/favoris.php");

 Class categorie_core
{

public function ajouter_categorie()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
      $nom=$_POST['nom'];
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
        document.location.replace("?core=categorie&action=afficher_categorie");
        </script>
        <?php
    }else
    {
     $table= Categorie::ajouter_categorie($nom,$image);
     $table= Categorie::afficher_categorie();
     include 'views/categorie_admin.php';
   }
  }
}
public function afficher_categorie()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else{ $table= Categorie::afficher_categorie();
  require_once 'views/categorie_admin.php';}
}
public function delete()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
    $result = Categorie::delete_data($_GET['id']);
    $suppfavoris=Favoris::delete($_GET['id']);
    $table= Categorie::all();
    require_once 'views/categorie_admin.php';
  }
} 
public function modif()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
    $table = Categorie::findById($_GET['id']);
    require_once 'views/categorie_modif_admin.php';
  }
}
public function update_categorie()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
    $result = Categorie::update_data($_POST['nom'],$_POST['image'],$_POST['id']);
    $table= Categorie::all();
    require_once 'views/categorie_admin.php';
  }
}
public function categorie_client()
{
 if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {  
    $table_categorie= Categorie::all();
    $table_produit= Produit::all();
    require_once 'views/categorie_client.php';
  }
}
public function pageMS()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
    $nom=$_GET['nom']; 
    $table_produit = Produit::findBycategorie($nom);
    $table_categorie= Categorie::all();
    include 'views/categorie_client.php';
  }
}  
public function chercheprix()
{
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
    $prixmax=$_POST['prixmax'];
    $prixmin=$_POST['prixmin'];
    //*****chiffre
    $prixmax=$prixmax[1].$prixmax[2];
    $prixmin=$prixmin[1].$prixmin[2];
 
 /*
   for(i=1;i<$prixmax.size();i++)
   {
    $pri=$pri.$prixmax[i];
   }
*/

   if(isset($_POST['cherche']))
   {
  $table_produit = Produit::findByprix($prixmax,$prixmin);  
  $table_categorie= Categorie::all();
  include 'views/categorie_client.php';
   }
  }
}  
public function favoriscategorie()
{
  if(!isset($_SESSION['pseudo']))
  {
    header("location:?core=user&action=login");
  }
 else
  {
    $pseudo=$_SESSION['pseudo'];
    $nom=$_GET['nom'];
    $id_user=User::chercher_id($pseudo)->getId();
    $id_categorie=Categorie::chercher_id($nom)->getId();
    $verif=Favoris::verif_favoris($id_categorie,$id_user);
    if(empty($verif))
    {
        ?>
        <script>
        Javascript:alert(' favoris ajouter!')
        </script>
        <?php
      $favoris=Favoris::ajout_favoris($id_categorie,$id_user);
      $table_categorie= Categorie::all();
      $table_produit= Produit::all();
      include 'views/categorie_client.php';
    }
    else
    {
        ?>
        <script>
        Javascript:alert('cette categorie est déja dans votre favoris !')
        document.location.replace("?core=categorie&action=categorie_client");
        </script>
        <?php
        $table_categorie= Categorie::all();
        $table_produit= Produit::all();
        include 'views/categorie_client.php';
    }
  }
}





}
?>
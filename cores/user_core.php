<?php
include("entities/categorie.php");
include("entities/produit.php");
include("entities/user.php");

Class user_core
{

public function deconnecte()
{
   session_unset();
   session_destroy();
   require_once 'views/login.php';  
}
public function login()
{
    require_once 'views/login.php';
}
public function inscription()
{
    require_once 'views/inscription.php';
}

 public function ajouter_client()
  { 
    $full_name = $_POST['full_name'];
    $pseudo= $_POST['pseudo'];
    $mot_de_passe= $_POST['mot_de_passe'];
    $email= $_POST['email'];
    $adresse= $_POST['adresse'];
    $Numero_telephone= $_POST['Numero_telephone'];
    $carte_banquaire= $_POST['carte_banquaire'];
    if (!is_numeric ( $_POST['Numero_telephone']))
    {
        ?>
        <script>
        Javascript:alert('Numero_telephone n est pas valide !')
        document.location.replace("?core=user&action=inscription");
        </script>
        <?php
} 
    if (!is_numeric ( $_POST['carte_banquaire']))
    {
        ?>
        <script>
        Javascript:alert('carte_banquaire n est pas valide !')
        document.location.replace("?core=user&action=inscription");
        </script>
        <?php
    } 
    else
    {
    $user= User::ajouter($full_name,$pseudo,$mot_de_passe,$email,$adresse,$Numero_telephone,$carte_banquaire);
    require_once 'views/login.php';
    ?>
    <script>
    Javascript:alert('client ajouter avec succes !')
    document.location.replace("?core=user&action=login");
    </script>
    <?php
    }
}
public function mdp_oub()
{
    require_once 'views/mot_de_passe.php';
}
public function verifier_client()
{
	$pseudo= $_POST['pseudo'];
	$mot_de_passe= $_POST['Password'];
  $user= User::verif($pseudo,$mot_de_passe);
    if(empty($user))
    {
        header("location:?core=user&action=mdp_oub");
    }
    else{
           $role= User::verifrole($pseudo,$mot_de_passe);
           if(empty($role))
           {  
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['mot_de_passe'] = $mot_de_passe;
                $_SESSION['full_name'] = $user->getFull_name();
                header("location:?core=user&action=admin_home");
           
           }
           else
           {
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['mot_de_passe'] = $mot_de_passe; 
                $_SESSION['full_name'] = $user->getFull_name();     
                header("location:?core=user&action=client_page");
           }
        }
}
public function client_page()
{
    if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
    $tables = Produit::all();
    require_once 'views/client.php';
  }
}
public function logout()
{
    require_once 'views/login.php';
}
public function admin_home()
{ 
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
    require_once 'views/admin.php';
  }
}
public function gestion_produit_page()
{ 
  if(!isset($_SESSION['pseudo']))
  {
  header("location:?core=user&action=login");
  }
  else
  {
    require_once 'views/categorie_admin.php';
  }
}



}
?>
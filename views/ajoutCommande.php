<?PHP
include "../entities/commande.php";
include "../cores/commandeC_core.php";

if (isset($_POST['qte_prod']) and isset($_POST['prix_total']) and isset($_POST['id_user']) and isset($_POST['datee'])){
$commande1=new Commande(/*$_POST['id'],*/$_POST['qte_prod'],$_POST['prix_total'],$_POST['id_user'],$_POST['datee']);

if($_POST['prix_total']>=50){
$commande1C=new CommandeC_core();
$commande1C->ajouterCommande($commande1);
header('Location:../?core=user&action=client_page');
	}else{
		$commande1C=new CommandeC_core();
		$commande1C->ajouterCommande($commande1);
		?>
		 <script>
        Javascript:alert('livraison non disponible !')
        document.location.replace("../?core=user&action=client_page");
        </script>

	<?php
}


}else{
	echo "vérifier les champs";
}
//*/

?>
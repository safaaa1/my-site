<?PHP
include "../cores/panier_core.php";
include "../conf.php";
$DB = new DBA();
$panier=new panier_core($DB);




if(isset($_GET['id'])){
	$product = $DB->query('SELECT id FROM produits WHERE id=:id', array('id' => $_GET['id']));
//var_dump($product);

$panier->add($product[0]->id);
       ?>
        <script>
        Javascript:alert('panier ajouter !')
        document.location.replace("../?core=user&action=client_page");
        </script>
        <?php
	//die('le produit est ajouté <a href="javascript:history.back()">index</a>');
}else{
	die("aucun produit ajouté!!!");
}







?>
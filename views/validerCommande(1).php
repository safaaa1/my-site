<HTML>
<head>
</head>
<body>

	<?php 

include "../entities/commande.php";
include "../cores/commandeC_core.php";

	if (isset($_REQUEST['modifier'])){
	
	$commande2C = new CommandeC_core();
	$commande2C->modifierEmploye($_REQUEST['etat'],$_REQUEST['id_ini']);
	header('location: ui-buttons.php');
} ?>
<?PHP
if (isset($_GET['id'])){
	$commandeC=new CommandeC_core();
    $result=$commandeC->recupererCommande($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$qte_prod=$row['qte_prod'];
		$etat=$row['etat'];
		$prix_total=$row['prix_total'];

		//$nbH=$row['nbHeures'];
		//$tarifH=$row['tarifHoraire'];
?>


<form method="GET">
<table>
<caption>Modifier Commande</caption>
<tr>
<td>ID produit</td>
<td><input type="number" name="id" disabled="" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>Etat du commande</td>
	<td>
		<select name='etat'>
			<option value="valide" type="text">valide</option>
			<option value="non valide" type="text">non valide</option>
		</select>
	</td>
</tr>
<tr>
<td>quantite des produits</td>
<td><input type="text" name="qte_prod" disabled="" value="<?PHP echo $qte_prod ?>"></td>
</tr>
<tr>
<td>Prix de la commande</td>
<td><input type="text" name="prix_total" disabled="" value="<?PHP echo $prix_total ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}

?>
</body>
</HTMl>
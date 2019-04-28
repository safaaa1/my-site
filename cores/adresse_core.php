<?PHP
include "../config.php";


class Adresse_core
 {

	function ajouterAdresse($adresse){
		$sql="INSERT into adresse (id_user,pays,ville,adress,code_postal) values (:id_user,:pays,:ville,:adress,:code_postal)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $qte_prod=$commande->getQte_prod();
        $prix_total=$commande->getPrix_total();
        $id_user=$commande->getId_user();
        $datee=$commande->getDatee();       
        
        //$etat=$commande->getEtat();
		
		$req->bindValue(':qte_prod',$qte_prod);
		$req->bindValue(':prix_total',$prix_total);
		$req->bindValue(':id_user',$id_user);
		$req->bindValue(':datee',$datee);

		//$req->bindValue(':etat',$etat);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

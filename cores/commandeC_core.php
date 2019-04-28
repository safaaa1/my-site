<?PHP
include "../config.php";


class CommandeC_core
 {

	function ajouterCommande($commande){
		$sql="INSERT into commande (qte_prod,prix_total,id_user,datee) values (:qte_prod,:prix_total,:id_user,:datee)";
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
	
	function afficherEmployes(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * FROM  commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerCommande($id){
		$sql="DELETE FROM commande where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierEmploye($etat,$id){

		$sql="UPDATE commande SET etat=:etat WHERE id=$id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        
        
		//$datas = array(':etat'=>$etat/*, ':nom_prod'=>$nom_prod, ':qte_prod'=>$qte_prod*/);
		$req->bindValue(':etat',$etat);
		//$req->bindValue(':nom_prod',$nom_prod);
		//$req->bindValue(':qte_prod',$qte_prod);
	
		
		
            $s=$req->execute();
			
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
  // echo " Les datas : " ;
 // print_r($datas);
        }
		
	}
	function recupererCommande($id){
		$sql="SELECT * from commande where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	/*function commandeVal(){
		$sql="SELECT etat from commande WHERE etat LIKE 'v%' ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/
}

?>
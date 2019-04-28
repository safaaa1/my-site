<?PHP
include "../config.php";


class Notification_core
 {

	


 		function ajouterNotif($notification){
		$sql="INSERT into notification (user) values (:user)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $user=$notification->getUser();
		
		$req->bindValue(':user',$user);
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

function supprimerNotif(){
		$sql="TRUNCATE TABLE notification";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		//$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function afficherNotif(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="select count(*) from notification";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		$liste->execute();
		return $liste->fetchALL(PDO::FETCH_OBJ);		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	

 }
 ?>


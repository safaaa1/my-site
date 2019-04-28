<?PHP
include "../cores/notification_core.php";
include "../entities/notification.php";

include "../conf.php";



$notif=new Notification($_GET['id_user']);

$notifC = new Notification_core();
//$notif = $_SESSION['pseudo'];
$notifC->ajouterNotif($notif);
?>
  <script>
        Javascript:alert('Commande Vaidée !')
        document.location.replace("ui-buttons.php");
        </script>
    







?>
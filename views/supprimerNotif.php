<?PHP
include "../cores/notification_core.php";
$notif = new Notification_core();
//if (isset($_POST["id"])){
	$notif->supprimerNotif();
?>
	 <script>
        Javascript:alert('je suis notifié !!!!!')
        document.location.replace("../?core=user&action=client_page");
        </script>
		<?php//header('Location: ../?core=user&action=client_page');

//}

?>
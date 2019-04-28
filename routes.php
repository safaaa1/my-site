<?php
  function call($core, $action) {
    require_once('cores/' . $core . '_core.php');
    
    switch($core) {
        case 'user':
        $core = new user_core();
        break;

        case 'categorie':
        $core = new categorie_core();
        break;

        case 'produit':
        $core = new produit_core();
        break;

        case 'commandeC':
        $core = new commandeC_core();
        break;

        case 'panier':
        $core = new panier_core();
        break;

        case 'notificationC':
        $core = new notification_core();
        break;
    }

    $core->{ $action }();
  }
    // we're adding an entry for the new core and its actions
  $cores = array ('user' => ['login','inscription','admin_home','ajouter_client','verifier_client','logout','mdp_oub','gestion_produit_page','client_page','deconnecte'],

               'categorie'=>['ajouter_categorie','afficher_categorie','delete','modif','update_categorie','categorie_client','pageMS','chercheprix','favoriscategorie'] ,

               'produit'=>['produit_admin','ajouter_produit','afficher_produit','va_modifier','delete','cher_couleur','afficheproduit','ch','rating','cher_nom','modif_p','update_produit','ch_2','ch_3','top'],
               'commandeC'=>[''],
               'panier'=>['count'],
               'notificationC'=>['']
);

  if (array_key_exists($core, $cores)) 
     {if (in_array($action, $cores[$core]))  {call($core, $action);} 
     // else{call('categorie', 'accueil');}
     } 
  else {
    call('user', 'login');
  }
?>
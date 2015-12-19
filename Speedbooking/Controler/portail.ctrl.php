<?php
require_once '../Model/DAO.class.php';

if(isset($_POST['user_id']) && isset($_POST['user_mdp'])) {
    // Si les champs mdp et login sont remplis :
    $username = $_POST['user_id'];
    $passwd = $_POST['user_mdp'];
    $dao = new DAO();
    $result = $dao->connexion($username,$passwd);               // On vérifie que l'utilisateur et son mot de passe correspondent à un utilisateur connu


    if ($result != False) {
        session_start();
        $_SESSION['id'] = $result;                              // USER_ID On stock l'id de l'utilisateur
        session_write_close();
        include '../Controler/contacts.ctrl.php';                  // A remplacer par la vue correspondant à l'acceuil
    } else {
        // sinon on recharge la vue du portail
        include '../Views/view.externe.connexion_failed.php';
    }
} else {
    // sinon on recharge la vue du portail
    include '../Views/view.externe.connexion.php';
}

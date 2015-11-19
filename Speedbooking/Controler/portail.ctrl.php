<?php
require_once '../Model/DAO.class.php';

if(isset($_POST['user_id']) and isset($_POST['user_mdp'])) {
    // Si les champs mdp et login sont remplis :
    $username = $_POST['user_id'];
    $passwd = $_POST['user_mdp'];
    
    $result = $dao->connexion($username,$passwd);
    
    if ($result != False) {
        session_start();
        $_SESSION = $result['id'];                              // USER_ID On stock l'id du gars
        session_write_close();
        include '../Controler/test.ctrl.php';                   // A remplacer par la vue correspondant à l'acceuil
    }
} else {
    // sinon on recharge la vue du portail
    include '../Views/view.externe.connexion.php';
}
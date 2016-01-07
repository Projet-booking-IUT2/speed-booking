<?php

/**
 * Controleur qui gère les opérations sur les structures
 * @author gorkat
 */

require_once '../Model/DAO.class.php';

$dao = new DAO();

if(isset($_POST['addStruct'])) {
    $dao->createStructure($_POST['s_nom'], $_POST['s_adresse'], $_POST['s_tel']);
}

include "../Controler/contacts.ctrl.php";

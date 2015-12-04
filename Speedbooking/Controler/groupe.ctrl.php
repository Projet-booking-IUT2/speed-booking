<?php

require_once '../Model/DAO.class.php';

session_start();
$booker = $_SESSION['id'];
session_write_close();

$dao = new DAO();


if(isset($_GET['selected'])) {
    $nomG = $_GET['selected'];
    $data['groupe'] = $dao->StructureFromGroupe($nomG);
    } 
else if (isset($_POST['maj'])) {    
    $dao->updateGroupe($booker,$_POST['c_nom'], $_POST['c_membre'], $_POST['c_notes'],$_POST['c_style'],$_POST['c_mail']);
    }
else if(isset($_POST['add'])){                   // $nom, $prenom, $mail, $tel, $site, $metier, $struct, $notes, $freq_maj
    $dao->createNewGroupe($booker,$_POST['c_nom'], $_POST['c_membre'], $_POST['c_notes'],$_POST['c_style'],$_POST['c_mail']);
 }

$data['AllGroupe'] = $dao->readGroupeFromBooker($booker);

include '../Views/view.interne.groupe.php';
?>

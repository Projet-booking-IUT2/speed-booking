<?php

require_once '../Model/DAO.class.php';

session_start();
$booker = $_SESSION['id'];
session_write_close();

$dao = new DAO();


if(isset($_GET['selected'])) {
    $tab = explode(" ",$_GET['selected']);
    $tab2 = array_slice($tab, 1);
    $tab2 = implode(" ", $tab2);
    $data['groupe'] = $dao->StructureFromGroupe($tab[0], $tab2);
    } 
else if (isset($_POST['maj'])) {    
    $dao->updateGroupe($_POST['c_nom'], $_POST['c_notes'], $_POST['c_dureeMAJ']);
    }
else if(isset($_POST['add'])){                   // $nom, $prenom, $mail, $tel, $site, $metier, $struct, $notes, $freq_maj
    $dao->createNewGroupe($_POST['c_nom'], $_POST['c_membres'], $_POST['c_notes'], $_POST['c_dureeMAJ']);
 }

$data['AllGroupe'] = $dao->readGroupeFromBooker($booker);
?>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once '../Model/DAO.class.php';

session_start();
$booker = $_SESSION['id'];
session_write_close();

$dao = new DAO();


if(isset($_GET['selected'])) {
    $nomG = $_GET['selected'];
    $data['Evenements'] = $dao->ReadEvenementFromBooker($booker,$_POST['date']); 
} 
else if (isset($_POST['maj'])) {
    $dao->updateEvenementFromBooker($_POST['nom'],$_POST['date_eve'],$_POST['style']);
}
else if(isset($_POST['add'])){                   // $nom, $prenom, $mail, $tel, $site, $metier, $struct, $notes, $freq_maj
    $dao->createNewEvenement($_POST['nom'],$_POST['date_eve'],$_POST['style']);
} 
else if (isset($_GET['delete'])) {
     $dao->deleteContactFromID($_GET['id']);
}



include'view.interne.evenement.php';
<?php
require_once '../Model/DAO.class.php';

session_start();
$booker = $_SESSION['id'];
session_write_close();

$dao = new DAO();


////////////////////////////////////////////////////////////////////////////////
//  Affichage du contact selectionné dans la liste
////////////////////////////////////////////////////////////////////////////////





if(isset($_GET['selected'])) {
    $tab = explode(" ",$_GET['selected']);
    $tab2 = array_slice($tab, 1);
    $tab2 = implode(" ", $tab2);
    $data['contact'] = $dao->readContactFromNomPrenom($tab[0], $tab2);
    $data['lieuTravail'] = $dao->readStructureFromContact($tab[0], $tab2);
    $data['Ajour'] = $dao->estAJour($tab[0], $tab2);
} else if (isset($_POST['maj'])) {
    $dao->updateContactFromNomPrenom($_POST['c_nom'], $_POST['c_prenom'], $_POST['c_mail'], $_POST['c_tel'], $_POST['c_type'], $_POST['c_site'], $_POST['c_lieuTravail'], $_POST['c_notes'], $_POST['c_dureeMAJ']);
} else if(isset($_POST['add'])){                   // $nom, $prenom, $mail, $tel, $site, $metier, $struct, $notes, $freq_maj
        $dao->createNewContact($_POST['c_nom'], $_POST['c_prenom'], $_POST['c_mail'], $_POST['c_tel'], $_POST['c_type'], $_POST['c_lieuTravail'], $_POST['c_notes'], $_POST['c_dureeMAJ']);
 } else if (isset($_GET['delete'])) {
     $dao->deleteContactFromID($_GET['id']);
 }
     $data['AllContacts'] = $dao->readContactsFromBooker($booker);   // Pour affichage de la liste des contacts dans le menu Aside
     include '../Views/view.interne.contacts.MAIN.php';

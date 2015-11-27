<?php
require_once '../Model/DAO.class.php';

session_start();
$booker = $_SESSION['id'];
session_write_close();

$dao = new DAO();
$data['AllContacts'] = $dao->readContactsFromBooker($booker);

////////////////////////////////////////////////////////////////////////////////
//  Affichage du contact selectionné dans la liste
////////////////////////////////////////////////////////////////////////////////

if(isset($_GET['selected'])) {
    $tab = explode(" ",$_GET['selected']);
    $tab2 = array_slice($tab, 1);
    $tab2 = implode(" ", $tab2);
    $data['contact'] = $dao->readContactFromNomPrenom($tab[0], $tab2);
    $data['lieuTravail'] = $dao->readStructureFromContact($tab[0], $tab2);
} else if (isset($_POST['c_nom'])) {
    $dao->updateContactFromNomPrenom($_POST['c_nom'], $_POST['c_prenom'], $_POST['c_mail'], $_POST['c_tel'], $_POST['c_type'], $_POST['c_site'], $_POST['c_lieuTravail'], $_POST['c_notes'], $_POST['c_dureeMAJ']);
} else if(isset($_GET['addContact'])) {
    include '../Views/view.interne.contactNouveau.php';
    if(isset($_POST['c_nom']) and isset($_POST['c_prenom'])){
        $dao->createNewContact($_POST['c_nom'], $_POST['c_prenom'], $_POST['c_mail'], $_POST['c_tel'], $_POST['c_type'], $_POST['c_site'], $_POST['c_lieuTravail'], $_POST['c_notes'], $_POST['c_dureeMAJ']);
    }
}

include '../Views/view.interne.contacts.php';
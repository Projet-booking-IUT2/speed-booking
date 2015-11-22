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
    $data['contact'] = $dao->readContactFromNomPrenom($tab[0], $tab[1]);
} else if (isset($_POST['c_nom'])) {
    $dao->updateContactFromNomPrenom($_POST['c_nom'], $_POST['c_prenom'], $_POST['c_mail'], $_POST['c_tel'], $_POST['c_type'], $_POST['c_site']);
}

include '../Views/view.interne.contacts.php';
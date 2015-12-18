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
else if(isset($_POST['add'])){  
    if($_POST['membres']){
        foreach($_POST['membres'] as $m){
            $membres[]=$m;
        }
    }
    $dao->createNewGroupe($booker,$_POST['c_nom'],$membres, $_POST['c_notes'],$_POST['c_style'],$_POST['c_mail']);
 }
 else if(isset($_GET['delete'])){
     $dao->deleteGroupe($_GET['id']);
 }
if(isset($_GET['selectContact'])){
     if(isset($_POST['idG'])){
         $idG=$_POST['idG'];
         var_dump($idG);
         $data['Contacts']=$dao->ReadContactMusicienFromBokker($idG);
         var_dump($data['Contact']);
     }
     else{
         $data['Contacts']=$dao->ReadContactMusicienFromBokker();
     }
 }

$data['AllGroupe'] = $dao->readGroupeFromBooker($booker);

include '../Views/view.interne.groupe.php';
?>

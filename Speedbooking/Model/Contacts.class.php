<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author claudeld
 */
class Contacts {
    //put your code here
    public $prenom;
    public $nom;
    public $adresse;
    public $telephone;
    public $mail;
    
    public function _construct($nom,$prenom,$mail,$telephone,$adresse){
        $this->setNom($nom);
        $this->setPrenom($prenom);      
        $this->setAdresse($adresse);
        $this->setTelephone($telephone);
        $this->setMail($mail);
    }
    
    public function setNom($nom){
        $this->nom=$nom;
    }
    
    public function setPrenom($prenom){
        $this->prenom=$prenom;
    }
    
    public function setAdresse($adresse){
        $this->adresse=$adresse;
    } 

    public function setTelephone($telephone){
        $this->telephone=$telephone;
    }
    
    public function setMail($mail){
        $this->mail=$mail;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    public function getPrenom(){
        return $this->prenom;
    }
    
    public function getAdresse(){
        return $this->adresse;
    }
    
    public function getTelephone(){
        return $this->telephone;
    }
    
    public function getMail(){
        return $this->mail;
    }
}
?>
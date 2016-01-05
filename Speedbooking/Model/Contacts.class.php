<?php

/**
 * 
 * @author claudeld
 */
class Contacts {
    public $prenom;
    public $nom;
    public $adresse;
    public $telephone;
    public $mail;
    public $date_maj;
    
    public function _construct($nom,$prenom,$mail,$telephone,$adresse,$dateMaj){
        $this->setNom($nom);
        $this->setPrenom($prenom);      
        $this->setAdresse($adresse);
        $this->setTelephone($telephone);
        $this->setMail($mail);
        $this->setDate($dateMaj);
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
    
    public function setDate($dateMaj){
        $this->date_maj=$dateMaj;
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
    
    public function detDate(){
        return $this->date_maj;
    }
}
?>
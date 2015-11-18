<?php

class DAO {
    
    private $db;
    
    public function __construct() {
        $dsn = "mysql:host=projet-tut-info-1.iut2.upmf-grenoble.fr;dbname=2015_M3301_groupe3_dev"; // Data Source Name de la db de Developpement
        $username = "groupe3_dev";
        $passwd = "DxWGSBT4rTHD5JRZ";
        try {
            $this->db = new PDO($dsn, $username, $passwd);
        } catch (PDOException $e) {
            die("Erreur d'ouverture de la DB : ". $e->getMessage());
        }
    }
    
    public function readDev() {
        $q = "SELECT * FROM developpeurs";
        $sql = $this->db->query($q);
        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        return $res;
    }
}

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
    
    /**
     * Vérifie que le login et le mot de passe identifient un utilisateur connu de la db
     * @param type $username
     * @param type $passwd
     * @return integer l'id de l'utilisateur s'il existe
     * @return bool False sinon
     */
    public function connexion($username, $passwd) {
        $username = $this->db->quote($username);                                           // On quote proprement la variable $username
        
        $sql = $this->db->query("SELECT * FROM utilisateurs WHERE identifiant=$username"); // On vérifie si un tuple correspond au nom d'utilisateur
        if ($sql->rowCount() != 0) {
            // si une ligne est retournée, c'est que l'utilisateur existe
            $hash = fetch(PDO::FETCH_COLUMN, "motdepasse");                                 // on récupère le motdepasse de celui-ci (crypté)
                    
            if (password_verify($passwd, $hash)){                                           // On vérifie que les mots de passe correspondent avec la fonction password_verify
                $res = $sql->fetch(PDO::FETCH_COLUMN, "id");                                // si oui on renvoit l'id de l'utilisateur
                return $res;
            } else {                                                                        // On retourne Faux sinon
                return False;   
            }
        }
    }
    /**
     * Renvoit le mot de passe crypté
     * @param string $passwd
     * @return string Mot de passe haché
     */
    public function crypterPassword($passwd){
        $hash = password_hash($passwd,PASSWORD_BCRYPT,['cost' => 11]) ;
        return $hash;
    }

} // FIN CLASSE DAO



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Test de cout optimal pour hachage prise sur http://grunk.developpez.com/tutoriels/php/mots-de-passe-securises/#LI-C-2
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//    function getOptimalCost($timeTarget)
//    { 
//    $cost = 9;
//        do {
//            $cost++;
//            $start = microtime(true);
//            password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
//            $end = microtime(true);
//        } while (($end - $start) < $timeTarget);
//
//        return $cost;
//    }
//
//    echo getOptimalCost(0.3); // retourne 11
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
<?php

class DAO {
    
    private $db;
    
    public function __construct() {
//        $config = parse_ini_file('../config/config.ini');//Chemin vers le dossier config
        $config = parse_ini_file('../config/config_local.ini');//Chemin vers le dossier config
        try {
            $this->db = new PDO($config['database_path'], $config['database_userRoot'], $config['database_mdpRoot']);
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
     * @param type $username le nom d'utilisateur (ou login)
     * @param type $passwd le mot de passe entré par l'utilisateur
     * @return integer l'id de l'utilisateur s'il existe
     * @return bool False sinon
     */
    public function connexion($username, $passwd) {
        $username = $this->db->quote($username);                                            // On quote proprement la variable $username
        
        $sql = $this->db->query("SELECT * FROM Identifiants WHERE login=$username");        // On vérifie si un tuple correspond au nom d'utilisateur
        if ($sql) {
            // si une ligne est retournée, c'est que l'utilisateur existe
            $res = $sql->fetch(PDO::FETCH_ASSOC);                                           // on récupère le motdepasse de celui-ci (haché)
            $hash = $res['mdp'];
            if (password_verify($passwd, $hash)){                                           // On vérifie que les mots de passe correspondent avec la fonction password_verify
                return $res['contact'];                                                          // si oui on renvoit l'id de l'utilisateur
            } else {                                                                        // On retourne Faux sinon
                return False;   
            }
        }
    }
    /**
     * Renvoit le mot de passe hasché
     * CETTE FONCTION NE DOIT ÊTRE UTILISÉE QUE LORSQU'UN UTILISATEUR MODIFIE SON MOT DE PASSE VIA LE FORMULAIRE ADÉQUAT
     * CAR LE NOUVEAU MOT DE PASSE NE DOIT PAS ÊTRE STOCKÉ EN CLAIR DANS LA DB
     * @param string $passwd le nouveau mot de passe utilisateur
     * @return string Mot de passe haché
     */
    public function hacherPassword($passwd){
        $hash = password_hash($passwd,PASSWORD_BCRYPT,['cost' => 11]) ;
        return $hash;
    }
    
    
    
    ////////////////////////////////////////////////////////////////////////////
    // Méthodes CRUD sur Contacts
    ////////////////////////////////////////////////////////////////////////////
    /**
     * Retoune tous les contacts à partir de l'id d'un booker
     * @param integer $booker l'id du booker
     * @return Array $res Les noms et prenoms de chaque contact excepté ceux du booker.
     */
    public function readContactsFromBooker($booker) {
        $booker = $this->db->quote($booker);
        $sql = $this->db->query("SELECT nom, prenom FROM Contacts WHERE id <> $booker AND metier <> 'booker'");
        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    /**
     * Retourne toutes les infos concernant un contact.
     * @param string $nom le Nom du contact
     * @param string $prenom le Prenom du contact
     * @return Array $res Toutes les informations sur le contact.
     */
    public function readContactFromNomPrenom($nom,$prenom) {
        $nom = $this->db->quote($nom);
        $prenom = $this->db->quote($prenom);
        $sql = $this->db->query("SELECT * FROM Contacts WHERE nom=$nom AND prenom=$prenom");
        $res = $sql->fetch();
        return $res;
    }
    /**
     * Retourne le lieux de travaille pour un contact dont on donne le nom et prenom
     * @param type $nom
     * @param type $prenom
     */
    public function readStructureFromContact($nom, $prenom) {
        $nom = $this->db->quote($nom);
        $prenom = $this->db->quote($prenom);
        $sql = $this->db->query("select m.struct from Membres_structure m, Contacts c where c.nom = $nom and prenom = $prenom and m.contact = c.id;");
        $res = $sql->fetch();
        return $res[0];
    }
    /**
     * Met à jour un contact
     * @param string $nom
     * @param string $prenom
     * @param string $mail
     * @param string $tel
     * @param string metier
     */
    public function updateContactFromNomPrenom($nom,$prenom,$mail,$tel,$metier, $adresse) {
        $nom = $this->db->quote($nom);
        $prenom = $this->db->quote($prenom);
        $mail = $this->db->quote($mail);
        $tel = $this->db->quote($tel);
        $metier = $this->db->quote($metier);
        $adresse = $this->db->quote($adresse);
        $q = ("UPDATE Contacts SET email=$mail, telephone=$tel, metier=$metier, adresse=$adresse WHERE nom=$nom AND prenom=$prenom");
        $this->db->exec($q) or die("Update Contact ERROR : No Contact updated");
    }
    
    public function deleteContactFromNomPrenom($nom,$prenom) {
        $nom = $this->db->quote($nom);
        $prenom = $this->db->quote($prenom);
        
        $q = "DELETE FROM Contacts WHERE nom=$nom AND prenom=$prenom";
        $this->db->exec($q) or die("Delete Contact ERROR : No contact deleted");
    }
    ////////////////////////////////////////////////////////////////////////////
    // Méthodes CRUD sur Membres_structure
    ////////////////////////////////////////////////////////////////////////////
    /** Retourne le nom et prenom de chaque personne travaillant pour la structure demandée
     * @param string $struct le nom de la structure
     */
    public function readMembresFromStructure($struct) {
        $struct = $this->db->quote($struct);
        $sql = $this->query("select c.nom,c.prenom from Membres_structure m, Contacts c Where struct =$struct and m.contact = c.id");
        $res = $sql->fetchAll(PDO::FETCH_BOTH);
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
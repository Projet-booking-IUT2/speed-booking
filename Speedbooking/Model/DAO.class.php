<?php

class DAO {
    
    private $db;
    
    public function __construct() {
        $config = parse_ini_file('../config/config.ini');//Chemin vers le dossier config
//        $config = parse_ini_file('../config/config_local.ini');//Chemin vers le dossier config
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
     * Crée un nouveau contact
     * @param type $nom
     * @param type $prenom
     * @param type $mail
     * @param type $tel
     * @param type $metier
     * @param type $struct
     * @param type $notes
     * @param type $freq_maj
     */
    public function createNewContact($nom, $prenom, $mail, $tel, $metier, $struct, $notes, $freq_maj) {
        $nom = $this->db->quote($nom);
        $prenom = $this->db->quote($prenom);
        $mail = $this->db->quote($mail);
        $tel = $this->db->quote($tel);
        $metier = $this->db->quote($metier);
        $struct = $this->db->quote($struct);
        $notes = $this->db->quote($notes);
        $freq_maj = $this->db->quote($freq_maj);
        $q1 = "INSERT INTO Contacts (nom, prenom, tel, metier, mail, notes, derniere_maj, utilisateur) VALUES ($nom, $prenom, $tel, $metier, $mail, $notes, Now(), false)";
        $this->db->exec($q1) or die("erreur erreur erreur !!!!");
        $sql = $this->db->query("SELECT id FROM Contacts WHERE nom=$nom and prenom=$prenom");
        $id = $sql->fetch();
        $id = $id[0];
        $this->setProchaineDateMAJ($id, $freq_maj);
    }
    /**
     * Retoune tous les contacts à partir de l'id d'un booker
     * @param integer $booker l'id du booker
     * @return Array $res Les noms et prenoms de chaque contact excepté ceux du booker.
     */
    public function readContactsFromBooker($booker) {
        $booker = $this->db->quote($booker);
        $sql = $this->db->query("SELECT nom, prenom FROM Contacts WHERE id <> $booker AND metier <> 'booker' ORDER BY nom");
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
     * Met à jour le contact
     * @param type $nom
     * @param type $prenom
     * @param type $mail
     * @param type $tel
     * @param type $metier
     * @param type $adresse
     * @param type $lieuTravail
     * @param type $note
     */
    
    public function updateContactFromNomPrenom($nom,$prenom,$mail,$tel,$metier, $adresse, $lieuTravail, $note, $freq_maj) {
        $nom = $this->db->quote($nom);
        $prenom = $this->db->quote($prenom);
        $mail = $this->db->quote($mail);
        $metier = $this->db->quote($metier);
        $adresse = $this->db->quote($adresse);
        $note = $this->db->quote($note);
        $lieuTravail = $this->db->quote($lieuTravail);
        
        $sql = $this->db->query("SELECT id from Contacts WHERE nom=$nom and prenom=$prenom");
        $sql = $sql->fetch();
        $id = $this->db->quote($sql[0]);
        $q1 = ("UPDATE Contacts SET mail=$mail, tel=$tel, metier=$metier, mail=$adresse, notes=$note WHERE nom=$nom AND prenom=$prenom");
        $q2 = ("UPDATE Membres_structure SET struct=$lieuTravail WHERE contact=$id");
        $this->setProchaineDateMAJ($id, $freq_maj);
        $this->db->beginTransaction();
        $this->db->exec($q1);
        $this->db->exec($q2);
        $this->db->commit() or die("Update Contact ERROR : No Contact updated");
    }
    
    public function deleteContactFromID($id) {
        $q = "DELETE FROM Contacts WHERE id=$id";
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
    
    ////////////////////////////////////////////////////////////////////////////
    // Manupulation des date de mise à jour
    ////////////////////////////////////////////////////////////////////////////
    
    /**
     * Indique si le contact est à jour ou non
     * @param int $id l'id du contact
     * @return bool Vrai si le contact est à jour, Faux sinon
     */
    public function estAJour($nom, $prenom) {
        $nom = $this->db->quote($nom);
        $prenom = $this->db->quote($prenom);
        
        $sql = $this->db->query("Select prochaine_maj FROM Contacts WHERE nom=$nom AND prenom=$prenom");
        $sql1 = $sql->fetch();
        $prochMaj = $sql1[0];
        
        return ($prochMaj > date("Y-m-d"));
    }
    
    private function setProchaineDateMAJ($id, $freq_maj) {
        $date = date("Y-m-d");
        $prochMaj = date("Y-m-d", strtotime($date." + $freq_maj month"));
        $nvDate = $this->db->quote($prochMaj);
        $this->db->exec("UPDATE Contacts SET prochaine_maj=$nvDate WHERE id=$id");
    }
    
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    
        
    public function updateGroupe($booker,$c_nom,$style, $c_notes){
        $booker = $this->db->quote($booker);
        $c_nom = $this->db->quote($c_nom);
        $c_notes = $this->db->quote($c_notes);
        $dureeMAJ = $this->db->quote($dureeMAJ);
        $style = $this->db->quote($style);
        $sql = ("update Groupes set nom=$c_nom and style=$style and notes=$c_notes where booker_associe=$booker");
        $this->db->exec($sql);      
    }
    
    public function readGroupeFromBooker($booker){
        $booker = $this->db->quote($booker);
        $sql = $this->query("select * from Groupes Where booker_associe=$booker");
        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $res;
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

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
        $res1 = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($res1 as $key) {
            $key['Ajour'] = $this->estAJour($key['nom'], $key['prenom']);
            $res2[] = $key;
        }
        return $res2; 
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
    
        
    public function updateGroupe($booker,$nom, $membres, $notes,$style,$mail){    
        $booker = $this->db->quote($booker);
        $nom = $this->db->quote($nom);
        $notes = $this->db->quote($notes);
        $style = $this->db->quote($style);
        $mail = $this->db->quote($mail);
        $sql = ("update Groupes set nom=$nom, style=$style, mail=$mail where booker_associe=$booker and nom=$nom");
        $this->db->beginTransaction();
        $this->db->exec($sql);   
        $this->db->commit() or die("Update Groupe ERROR : No Groupe updated");
    }
    
    public function readGroupeFromBooker($booker){
        $booker = $this->db->quote($booker);
        $sql = $this->db->query("select * from Groupes Where booker_associe=$booker");
        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    
    public function StructureFromGroupe($nomG){
        //récuperation des infos du groupe 
        $nomG = $this->db->quote($nomG);
        $sql = $this->db->query("select * from Groupes Where nom=$nomG");
        $res[] = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        //récuperation de l'id des membres
        $idG = $this->db->quote($res[0][0]['id']);
        $sql2 = $this->db->query("select contact from Membres_groupe where groupe=$idG");
        $res[] = $sql2->fetchAll(PDO::FETCH_ASSOC);
        
        // récuperation du nom et prenom des membres
        $i=0;
        foreach($res[1] as $c){
            $idC = $this->db->quote($c['contact']);
            $sql3 = $this->db->query("select nom,prenom from Contacts where id=$idC");
            $res[1][$i] = $sql3->fetchAll(PDO::FETCH_ASSOC);
            $res[1][$i] = $res[1][$i][0];
            $i++;
        }
        $res[0]=$res[0][0];      
        return $res;
    }
    
    public function createNewGroupe($booker,$nom, $membres, $notes,$style,$mail){
        $booker = $this->db->quote($booker);
        $nom = $this->db->quote($nom);
        $membres = $this->db->quote($membres);
        $notes = $this->db->quote($notes);
        $style = $this->db->quote($style);
        $mail = $this->db->quote($mail);
        $q1 = "INSERT INTO Groupes(booker_associe,nom,style,mail) VALUES ($booker,$nom,$style,$mail)";
        $this->db->exec($q1) or die("erreur erreur erreur !!!!");    
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

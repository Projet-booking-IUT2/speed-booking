<?php
/**
 * Modélisation de la base de données.
 *
 * <p>Méthodes CRUD pour diverses tables, récupérations de données
 * pertinentes pour les différents controleurs, manipulations des tables.</p>
 */
class DAO {
    
    private $db;
    
    /**
     * Constructeur de la classe DAO.
     * 
     * Initialise la variable $db pour pointer vers la base de données 
     * avec les adresses et identifiants contenus dans les fichiers de 
     * configuration.
     * 
     *
     * @author gorkat
     */
    public function __construct() {
        $config = parse_ini_file('../config/config.ini');//Chemin vers le dossier config
//        $config = parse_ini_file('../config/config_local.ini');//Chemin vers le dossier config
        try {
            $this->db = new PDO($config['database_path'], $config['database_userRoot'], $config['database_mdpRoot']);
        } catch (PDOException $e) {
            die("Erreur d'ouverture de la DB : ". $e->getMessage());
        }
    }
    
    
    /**
     * Retourne le contenu de la table développeurs. POUR DEVELOPPEMENT / TEST UNIQUEMENT
     * @deprecated
     * @author gorkat
     * @return Tab_associatif Tableau associatif nom_colonne -> contenu
     */
    public function readDev() {
        $q = "SELECT * FROM developpeurs";
        $sql = $this->db->query($q);
        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        return $res;
    }
    
    
    /**
     * Vérifie que le login et le mot de passe identifient un utilisateur connu de la db
     * @author gorkat
     * @param string $username le nom d'utilisateur (ou login)
     * @param  string $passwd le mot de passe entré par l'utilisateur
     * @return integer|bool l'id de l'utilisateur s'il existe, false sinon
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
     * Hache le mot de passe passé en paramètre.
     * 
     * @author gorkat
     * @param string $passwd Mot de passe en clair
     * @return string Mot de passe haché
     */
    public function hacherPassword($passwd){
        $hash = password_hash($passwd,PASSWORD_BCRYPT,['cost' => 11]) ;
        return $hash;
    }
    
    
    //####################################################################
    //####################################################################
    // {{ Méthodes CRUD sur Contacts
    
    
    /**
     * Crée un nouveau contact.
     * 
     * Assainit les variables passées en paramètre, calcule la prochaine date de 
     * mise à jour nécessaire du contact et l'ajoute à la base de données.
     * 
     * @author gorkat
     * @param string $nom
     * @param string $prenom
     * @param string $mail
     * @param string $tel
     * @param string $metier
     * @param string $struct
     * @param string $notes
     * @param time $freq_maj
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
     * Retourne tous les contacts à partir de l'id d'un booker, booker exclus.
     * 
     * @author gorkat
     * @param integer $booker l'id du booker
     * @return Array $res Noms et prenoms de chaque contact excepté ceux du booker.
     */
    public function readContactsFromBooker($booker) {
        $booker = $this->db->quote($booker);
        $sql = $this->db->query("SELECT nom, prenom, id FROM Contacts WHERE id <> $booker AND metier <> 'booker' ORDER BY nom");
        $res1 = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($res1 as $key) {
            $key['Ajour'] = $this->estAJour($key['id']);
            $res2[] = $key;
        }
        return $res2; 
    }
    
    public function readIdContact($nom, $prenom){
        $nom = $this->db->quote($nom);
        $prenom = $this->db->quote($prenom);
        $sql = $this->db->query("SELECT * FROM Contacts WHERE nom=$nom AND prenom=$prenom");
        $res = $sql->fetch();
        return $res;
    }
    
    /**
     * Retourne toutes les infos concernant un contact.
     * 
     * @author gorkat
     * @param string $nom Nom du contact
     * @param string $prenom Prenom du contact
     * @return Tableau_assoc Informations sur le contact: tableau indexé par nom de champ et numéro de champ
     */
    public function readContactFromID($id) {
        $id = $this->db->quote($id);
        $sql = $this->db->query("SELECT * FROM Contacts WHERE id=$id");
        $res = $sql->fetch();
        return $res;
    }
    /**
     * Retourne la structure à laquelle appartient un contact dont on donne le nom et prenom
     * 
     * @author gorkat
     * @param string $nom
     * @param string $prenom
     */
    public function readStructureFromContact($nom, $prenom) {
        $nom = $this->db->quote($nom);
        $prenom = $this->db->quote($prenom);
        $sql = $this->db->query("select m.struct from Membres_structure m, Contacts c where c.nom = $nom and prenom = $prenom and m.contact = c.id;");
        $res = $sql->fetch();
        return $res[0];
    }
    
    /**
     * Met à jour le contact de nom et prénom donnés.
     * 
     * @author gorkat
     * @param string $nom
     * @param string $prenom
     * @param string $mail
     * @param string $tel
     * @param enum("booker","artiste","organisateur") $metier
     * @param string $adresse
     * @param string $lieuTravail
     * @param string $note
     * @param time $freq_maj
     */
    
    public function updateContactFromNomPrenom($nom,$prenom,$mail,$tel,$metier, $adresse, $lieuTravail, $note, $freq_maj) {
        $nom = $this->db->quote($nom);
        $prenom = $this->db->quote($prenom);
        $mail = $this->db->quote($mail);
        $metier = $this->db->quote($metier);
        $adresse = $this->db->quote($adresse);
        $note = $this->db->quote($note);
        $lieuTravail = $this->db->quote($lieuTravail);
        $tel = $this->db->quote($tel);
        $sql = $this->db->query("SELECT id from Contacts WHERE nom=$nom and prenom=$prenom");
        $sql = $sql->fetch();
        $id = $this->db->quote($sql[0]);
        $q1 = ("UPDATE Contacts SET nom=$nom, prenom=$prenom, mail=$mail, tel=$tel, metier=$metier, notes=$note WHERE id=$id");
        $aTravail = $this->readStructureFromContact($nom, $prenom);
        if ($aTravail){
            $q2 = ("UPDATE Membres_structure SET struct=$lieuTravail WHERE contact=$id");
        } else {
            $q2 = ("INSERT INTO Membres_structure VALUES ($id,$lieuTravail)");
        }
        $this->setProchaineDateMAJ($id, $freq_maj);
        $this->db->beginTransaction();
        $this->db->exec($q1);;
        $this->db->exec($q2);
        $this->db->commit();
    }
    
    /**
     * Supprime un contact d'identifiant donné.
     * 
     * @author gorkat
     * @param string $id Identifiant d'uun contact
     */
    public function deleteContactFromID($id) {
        $q = "DELETE FROM Contacts WHERE id=$id";
        $this->db->exec($q) or die("Delete Contact ERROR : No contact deleted");
    }
    
    
    // #########################################################################
    // #########################################################################
    // }}
    // {{ Méthodes CRUD sur Membres_structure
    
    
    /** 
     * Retourne le nom et prenom de chaque personne travaillant pour la structure demandée
     * 
     * @author gorkat
     * @param string $struct le nom de la structure
     * @return nom et prenom de chaque personne travaillant pour la structure demandée
     */
    public function readMembresFromStructure($struct) {
        $struct = $this->db->quote($struct);
        $sql = $this->query("select c.nom,c.prenom from Membres_structure m, Contacts c Where struct =$struct and m.contact = c.id");
        $res = $sql->fetchAll(PDO::FETCH_BOTH);
    }
    /**
     * Crée une nouvelle structure dans la bd
     * @param string $nom le nom de la structure ex:"HellFest"
     * @param string $adresse l'adresse du siège social ex:"22 AVENUE DE LA CAILLERIE BP 19206 44190 CLISSON"
     * @param string $tel un numéro de tél si besoin
     */
    public function createStructure($nom,$adresse,$tel){
        $nom = $this->db->quote($nom);
        $adresse = $this->db->quote($adresse);
        $tel = $this->db->quote($tel);
        
        $this->db->exec("INSERT INTO Structures(nom,adresse_siege,tel) VALUES($nom,$adresse,$tel)") or die("CreateStructure ERROR : no structure created");
    }
    
    public function readAllStructures(){
        $sql = $this->db->query("SELECT nom FROM Structures");
        $res = $sql->fetchAll();
        return $res;
    }
    // #########################################################################
    // #########################################################################
    // }}
    // {{ Manipulation des dates de mise à jour
    
    /**
     * Indique si le contact est à jour ou non
     *
     * @author gorkat
     * @param int $id l'id du contact
     * @return bool
     */
    public function estAJour($id) {
        $id = $this->db->quote($id);
        
        $sql = $this->db->query("Select prochaine_maj FROM Contacts WHERE id=$id");
        $sql1 = $sql->fetch();
        $prochMaj = $sql1[0];
        return ($prochMaj > date("Y-m-d"));
    }
    
    /**
     * Définit la date de prochaine mise à jour d'un contact.
     * 
     * @author gorkat
     * @param int $id identifiant du contact à modifier
     * @param string $freq_maj fréquence de mise à jour
     */
    private function setProchaineDateMAJ($id, $freq_maj) {
        $date = date("Y-m-d");
        $prochMaj = date("Y-m-d", strtotime($date." + $freq_maj month"));
        $nvDate = $this->db->quote($prochMaj);
        $this->db->exec("UPDATE Contacts SET prochaine_maj=$nvDate WHERE id=$id");
    }
    
     #########################################################################
     # Fonctions de recherches
     #########################################################################
     /**
      * Retourne un tableau contenant les nom, prenoms et id des personnes dont les renseignements contiennent $motCle.
      * @author gorkat
      * @param string $motCle le mot clé pour la recherche.
      * @return array un tableau contenant les nom, prenoms et id des personnes dont les renseignements contiennent $motCle.
      */
    public function rechercheMotCle($motCle) {
        $sql = $this->db->query("Select id,nom,prenom from Contacts Where nom like '$motCle%' or prenom like '$motCle%' or metier like '$motCle%' or mail like '$motCle%' or tel like '$motCle%'");
        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    // }}
    // {{ Manipulation des groupes   
    /**
     * Modifie les informations d'un groupe identifié par son nom et booker associé
     * 
     * @author claudeld
     * @param int $booker
     * @param string $nom
     * @param ??? $membres
     * @param string $notes
     * @param string $style
     * @param string $mail
     */
    public function updateGroupe($booker,$nom, $membres, $notes,$style,$mail){    
        $booker = $this->db->quote($booker);
        $nom = $this->db->quote($nom);
        $notes = $this->db->quote($notes);
        $style = $this->db->quote($style);
        $mail = $this->db->quote($mail);
        $sql = ("update Groupes set nom=$nom, style=$style, mail=$mail where booker_associe=$booker and nom=$nom");
        $this->db->beginTransaction();
        $this->db->exec($sql);
        $this->db->commit() or die("Update Groupe ERROR : No row updated");
    }
    
    /**
     * Retourne les groupes associés à un booker donné.
     * 
     * @author claudeld
     * @deprecated 0c74a2a177 Une view existe pour remplir le même role
     * @param int $booker
     * @return tableau_assoc Liste de groupes: tableau indexé par nom de champ et n° de champ
     * @see ./DB/create.sql
     */
    public function readGroupeFromBooker($booker){
        $booker = $this->db->quote($booker);
        $sql = $this->db->query("select * from Groupes Where booker_associe=$booker");
        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    
    /**
     * Retourne les infos du groupe donné et les membres de ce groupe.
     * 
     * @author claudeld
     * @param string $nomG
     * @return tableau_assoc ???
     */
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
    
    /**
     * Crée un groupe avec les attributs passés en paramètre
     *
     * @author claudeld
     * @param int $booker Booker associé au groupe
     * @param string $nom Nom du groupe
     * @param array $membres
     * @param string notes
     * @param string $style
     * @param string $mail
     *
     */
    public function createNewGroupe($booker,$nom, $membres, $notes,$style,$mail){
        $booker = $this->db->quote($booker);
        $nom = $this->db->quote($nom);
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        //$membres = $this->db->quote($membres);
        $notes = $this->db->quote($notes);
        $style = $this->db->quote($style);
        $mail = $this->db->quote($mail);
        $q1 = "INSERT INTO Groupes(booker_associe,nom,style,mail) VALUES ($booker,$nom,$style,$mail)";
        $this->db->exec($q1) or die("erreur erreur erreur !!!!");
        
        $q2 = $this->db->query("SELECT id FROM Groupes where nom=$nom");
        $res= $q2->fetchAll(PDO::FETCH_ASSOC);
        $idG=$res[0]['id'];
        
        foreach($membres as $m){
            $sq4="INSERT INTO Membres_groupe(contact,groupe) VALUES ($m,$idG)";
            $this->db->exec($sq4) or die("erreur erreur erreur !!!!");
        }
    }
    
    /**
     * Supprime le groupe de nom donné
     *
     * @author claudeld
     * @param string $nomG nom du groupe à supprimer
     */
    public function deleteGroupe($nomG){
        $nomG=$this->db->quote($nomG);
        $sql = $this->db->query("select * from Groupes Where nom=$nomG");
        $res[] = $sql->fetchAll(PDO::FETCH_ASSOC);
        $res[0]=$res[0][0]; 
        
        //récuperation de l'id des membres
        $idG = $this->db->quote($res[0]['id']);
        $sql1="DELETE FROM Membres_groupe WHERE groupe=$idG";
        $this->db->exec($sql1);
        
        
        $sql2="DELETE FROM Groupes WHERE nom=$nomG";
        $this->db->exec($sql2);
        
    }
    
    /**
     * Retourne les contacts associés à l'utilisateur appartenant au groupe donné en paramètre.
     * Si aucun groupe n'est donné, renvoie tous les contacts associés.
     * 
     * @author claudeld
     * @param int $idG Identifiant du groupe
     * @return tableau_assoc
     */
    public  function ReadContactMusicienFromBokker($idG=0){
        //$booker=$this->db->quote($booker);
        if($idG!=0){
            $sql = $this->db->query("SELECT nom,prenom,id FROM Contacts WHERE metier='Musicien'");
            $res1 = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($res1 as $c){
                $id=$c['id'];
                $sql2=$this->db->query("SELECT * FROM Membres_groupe where contact=$id AND groupe=$idG");
                $res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
                if(!$res2){
                    $res[]=$c;
                }
                else{
                    $res[]=null;
                }
            }
        }
        else{
            $sql = $this->db->query("SELECT nom,prenom,id FROM Contacts WHERE metier='Musicien'");
            $res = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $res;
    }

    /**
     * Renvoie l'évènement de nom et booker associé passés en paramètre.
     * @param string $booker id du booker
     * @param string $dates nom de l'évènement
     * @return tableau_assoc liste des évènements et de leurs attributs.
     */
    public function ReadEvenementFromBooker($booker,$dates){
     $booker=$this->db->quote($booker);
     $i=0;
     foreach ($dates as $d){
         $sql = $this->db->query("SELECT * FROM Evenements WHERE nom=$d AND booker_associe=$booker");
         $res[] = $sql->fetchAll(PDO::FETCH_ASSOC);
         $res[$i] = $res[$i][0];
         $i++;
     }
     return $res;
    }
    
    /**
     * Modifie un évènement
     * @param string $id identifiant de l'évènement à supprimer
     * @param string $nom
     * @param date $date
     * @param string $style
     */
    public function updateEvenementFromBooker($id,$nom,$date,$style){
        $id = $this->db->quote($id);
        $nom = $this->db->quote($nom);
        $date = $this->db->quote($date);
        $style = $this->db->quote($style);
        $sql = ("update Evenements set nom=$nom, style=$style, date_evt=$date where id=$id");
        $this->db->beginTransaction();
        $this->db->exec($sql);
        $this->db->commit() or die("Update Groupe ERROR : No row updated");
    }
    /**
     * Crée un évènement
     * @param string $booker Booker assoié à l'évènement
     * @param string $nom
     * @param date $date
     * @param string $style
     */
    public function createNewEvenement($booker,$nom,$date,$style){
        $booker = $this->db->quote($booker);
        $nom = $this->db->quote($nom);
        //$membres = $this->db->quote($membres);
        $date = $this->db->quote($date);
        $style = $this->db->quote($style);
        $q1 = "INSERT INTO Evenements(nom,date_evt,style,booker_associe) VALUES ($nom,$date,$style,$booker)";
        $this->db->exec($q1) or die("erreur erreur erreur !!!!");
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Test de cout optimal pour hachage, source http://grunk.developpez.com/tutoriels/php/mots-de-passe-securises/#LI-C-2
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

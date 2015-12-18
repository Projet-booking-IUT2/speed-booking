CREATE VIEW Utilisateurs AS
	SELECT * 
	FROM Contacts c,Identifiants i 
	WHERE c.utilisateur=True; 

CREATE VIEW Bookers AS
	SELECT * 
	FROM Contacts
	WHERE metier="booker";

CREATE VIEW Artistes AS
	SELECT *
	FROM Contacts c
	WHERE metier="artiste";

CREATE VIEW Organisateurs AS
	SELECT *
	FROM Contacts
	WHERE metier="organisateur";

CREATE VIEW espaceEchangePerso AS
	SELECT fichier
	FROM Espace_echange
	WHERE proprietaire = USER();

CREATE VIEW EvenementsAVenir AS
	SELECT *
	FROM Evenements
	WHERE date_evt>now();

CREATE VIEW GroupesAssocies AS
        SELECT *
        FROM Groupes
        WHERE booker_associe=USER();
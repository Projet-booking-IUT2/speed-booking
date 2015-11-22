CREATE VIEW Utilisateurs AS
	SELECT * 
	FROM Contacts c,Identifiants i 
	WHERE c.utilisateur=True; 

CREATE VIEW Bookers AS
	SELECT * 
	FROM Contacts
	WHERE metier="booker";

CREATE VIEW Groupes AS
	SELECT *
	FROM Contacts c, Groupes g
	WHERE metier="artiste";

CREATE VIEW espaceEchangePerso AS
	SELECT fichier
	FROM espaceEchange
	WHERE proprietaire = USER();

CREATE VIEW EvenementsAVenir AS
	SELECT *
	FROM Evenements
	WHERE date_evt>now();

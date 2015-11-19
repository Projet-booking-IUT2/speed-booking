CREATE TABLE Contacts (
	id int(6) NOT NULL AUTO_INCREMENT,
	nom varchar(50) not null,
	prenom varchar(50) not null,
	utilisateur boolean,
	metier varchar(12),
	email varchar(75) not null,
	telephone numeric(10),
	adresse varchar(500),
	derniere_maj date,
	PRIMARY KEY (id),
	CONSTRAINT chk_role check(type in ('organisateur','artiste','booker')
));

CREATE TABLE Identifiants (
    login varchar(30)not null,
    mdp varchar(2560) not null,
    primary key(login)
);

CREATE TABLE espaceEchange (
	fichier varchar(250),
	proprietaire varchar(30),

	primary key(fichier,proprietaire),
	foreign key(proprietaire) references Contacts(identifiant)
);

CREATE TABLE Evenements (
	id int(6) not null AUTO_INCREMENT,
	date_evt date,
	nom varchar(250),
	organisateur varchar(50),
	primary key(id), # Un evt peut avoir lieu plusieurs fois de suite avec le même nom, et plusieurs evt peuvent avoir lieu en mm temps
	foreign key(organisateur) references Contacts(identifiant),
	CONSTRAINT chk_role_correct check(organisateur) in ('organisateur')
);

CREATE TABLE Participants (
	artiste int(6) not null,
	evenement int(6) not null,

	primary key (artiste,evenement),
	foreign key(artiste) references Contacts(id),
	foreign key(evenement) references Evenements(id)
);

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
	FROM Contacts
	WHERE metier="artiste";

CREATE VIEW Organisateurs AS
	SELECT *
	FROM Contacts
	WHERE metier="organisateur";

CREATE VIEW espaceEchangePerso AS
	SELECT fichier as fichiers
	FROM espaceEchange
	WHERE proprietaire = USER();


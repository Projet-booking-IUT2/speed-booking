CREATE TABLE Contacts (
	id int(6) NOT NULL AUTO_INCREMENT,
	nom varchar(50) not null,
	prenom varchar(50),
	utilisateur boolean,
	metier varchar(12),
	email varchar(75) unique not null,
	telephone numeric(10),
	adresse varchar(500),
	derniere_maj date default now(),
	
	PRIMARY KEY (id),
	CONSTRAINT chk_syntaxe_email check(email like %@%.%)
	CONSTRAINT chk_role check(metier in ('organisateur','groupe','booker'))
	CONSTRAINT chk_nom check(NOT(metier like 'groupe' and prenom not null))
	# ;) thomas
	CONSTRAINT chk_orga check(NOT(metier like 'organisateur' and utilisateur=True ))
);

CREATE TABLE Identifiants (
	id int(6),
    login varchar(30)not null,
    mdp varchar(2560) not null,

    primary key(id),
    foreign key(id) references Contacts(id)
);

CREATE TABLE espaceEchange (
	fichier varchar(250),
	proprietaire varchar(30),

	primary key(fichier,proprietaire),
	foreign key(proprietaire) references Contacts(identifiant)
);

CREATE TABLE Lieux (
	id int(6) AUTO_INCREMENT,
	nom varchar(200),
	adresse varchar(500) not null,

	primary key (id)
);

CREATE TABLE Evenements (
	id int(6) not null AUTO_INCREMENT,
	date_evt date,
	nom varchar(250),
	lieu int(6),

	primary key(id), # Un evt peut avoir lieu plusieurs fois de suite avec le même nom, et plusieurs evt peuvent avoir lieu en mm temps
	foreign key(lieu) references Lieux(id),
	CONSTRAINT chk_role_correct check(organisateur) in ('organisateur')
);

CREATE TABLE Participants (
	artiste int(6) not null,
	evenement int(6) not null,

	primary key (artiste,evenement),
	foreign key(artiste) references Contacts(id),
	foreign key(evenement) references Evenements(id)
#contrainte artieste est bel est bien un artiste ?
);

CREATE TABLE Organisateurs (
	evenement int(6),
	organisateur int(6),

	primary key (evenement,organisateur),
	foreign key (evenement) references Evenements(id),
	foreign key (organisateur) references Contacts(id)
#contrainte organisateur est bel est bien un orga ?
);


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
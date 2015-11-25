CREATE TABLE Contacts (
	id int(6),
	nom varchar(30),
	prenom varchar(30),
	tel integer(10) not null,
	metier varchar(12) not null,
	mail varchar(100) not null,
	notes varchar(1000),
	derniere_maj date not null,
	prochaine_maj date,
	utilisateur boolean,

	primary key (id),
	CONSTRAINT chk_mail CHECK(mail LIKE '%@%.%'),
	CONSTRAINT enum_metier CHECK(metier LIKE ('booker','organisateur','artiste'))
);

CREATE TABLE Identifiants (
	contact int(6),
	login varchar(30) not null,
	mdp varchar(64) not null,

	primary key(contact),
	foreign key(contact) references Contacts(id)
);

CREATE TABLE Groupes (
	id int(6),
	booker_associe int(6) not null,
	nom varchar(50) not null,
	style varchar(30),
	mail varchar(100) not null,
	primary key (id),
	foreign key (booker_associe) references Contacts(id),
	CONSTRAINT chk_mail CHECK(mail LIKE '%@%.%')
);

CREATE TABLE Evenements (
	id int(6),
	nom varchar(70),
	date_evt date not null,
	style varchar(30),

	primary key (id)
);

CREATE TABLE Lieux (
	id int(6),
	adresse varchar(250) not null,
	nom varchar(50),

	primary key (id)
);

CREATE TABLE Structures (
	nom varchar(50),
	adresse_siege varchar(250),
	tel int(10) not null,
	mail varchar(150),

	primary key (nom),
	CONSTRAINT chk_mail CHECK(mail LIKE '%@%.%')
);

CREATE TABLE Espace_echange (
	fichier varchar(75),
	proprietaire int(6),

	primary key(fichier,proprietaire),
	foreign key(proprietaire) references Contacts(id)
);

CREATE TABLE Organise (
	organisateur varchar(50),
	evenement int(6),
	lieu int(6),

	primary key(organisateur,evenement,lieu),
	foreign key(organisateur) references Contact(id),
	foreign key(evenement) references Evenements(id),
	foreign key(lieu) references Lieux(id)
);

CREATE TABLE Participe (
	groupe int(6),
	evenement int(6),

	primary key(groupe,evenement),
	foreign key(groupe) references Groupes(id),
	foreign key(evenement) references Evenements(id)
);

CREATE TABLE Membres_groupe (
	contact int(6),
	groupe int(6),

	primary key(contact,groupe),
	foreign key(contact) references Contacts(id),
	foreign key(groupe) references Groupes(id)
);

CREATE TABLE Membres_structure (
	contact int(6),
	struct varchar(50),

	primary key(contact,struct),
	foreign key(contact) references Contacts(id),
	foreign key(struct) references Structures(id)
);

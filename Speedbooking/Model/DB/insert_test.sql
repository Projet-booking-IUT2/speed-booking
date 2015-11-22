# Ajouts classiques

INSERT INTO Contacts
	VALUES("Jean","Claude",false,"booker","jean-claude@placeholder.com","123 route des routes 38999 Pas-Grenoble");
INSERT INTO Contacts
	VALUES("Les joyeux lurons",null,true,"groupe","joyeuxlur@monsite.com","La grange, 73350 Bourg-st-Maurice");
INSERT INTO Contacts
	VALUES("Les joyeux hobbits",null,true,"groupe","joyeuxhob@monsite.com","La grange, 73350 Bourg-st-Maurice");
INSERT INTO Contacts
	VALUES("Laurent","Jay",true,"booker","liveB@live.com","252 rue des prairies 55403 Grignan");
INSERT INTO Contacts
	VALUES("Jaipas","Dinspiration",false,"organisateur","jenaitoujourspas@nowhere.com","000 route du néant 00000 nowhere-ville");
INSERT INTO Contacts
	VALUES("UnAutre","organisateur",true,"organisateur","jenaitoujourspas@nowhere.com","000 route du néant 00000 nowhere-ville");

INSERT INTO Identifiants 
	VALUES(SELECT id FROM Contacts WHERE nom="Les joyeux lurons","ljl","popop");
	# Pdt l'éxécution en conditions réelles, on pourra connaitre l'id de l'utilisateur 
INSERT INTO Identifiants 
	VALUES(SELECT id FROM Contacts WHERE nom="Laurent","yanoo","password");

INSERT INTO espaceEchange
	VALUES("/dossier/fichier",2);
INSERT INTO espaceEchange
	VALUES("/dossier/fichier",3);
INSERT INTO espaceEchange
	VALUES("/dossier/fichier2",2);
INSERT INTO espaceEchange
	VALUES("/dossier/fichier2",1);
INSERT INTO espaceEchange
	VALUES("/dossier/fichier2",4);
INSERT INTO espaceEchange
	VALUES("/dossier/fichier3",1);
INSERT INTO espaceEchange
	VALUES("/dossier/fichier4",4);

INSERT INTO Lieux
	VALUES("Le live bar","tréloindistan");
INSERT INTO Lieux
	VALUES("Meltdown du coin","Halles ste-claire");
INSERT INTO Lieux
	VALUES("Grand angle","Voiron");

INSERT INTO Evenements
VALUES(curdate(),"8 ft. under",3);
INSERT INTO Evenements
VALUES(2015-01-22,"concert passé",1);
INSERT INTO Evenements
VALUES(curdate(),"Rock n' blues",3);

INSERT INTO Participants
VALUES(2,3);
INSERT INTO Participants
VALUES(2,3);
INSERT INTO Participants
VALUES(3,1);

INSERT INTO Organisateurs
VALUES(5,1);
INSERT INTO Organisateurs
VALUES(5,2);
INSERT INTO Organisateurs
VALUES(6,3);



/*
# Ajouts à problèmes, à compléter

############## CONTACTS #################

#Ajout classique
#Ajout identique, refus à cause de l'email
INSERT INTO Contacts
	VALUES("Jean","Claude","false","booker","jean-claude@placeholder.com","123 route des routes 38999 Pas-Grenoble");
#Ajout preesque identique, email différent, l'id doit s'inrémenter
INSERT INTO Contacts
	VALUES("Jean","Claude","false","booker","claude-jean@placeholder.com","123 route des routes 38999 Pas-Grenoble");
#Ajout refusé, syntaxe email incorrecte
INSERT INTO Contacts
	VALUES("Email","Error","false","booker","plop","123 route des routes 38999 Pas-Grenoble");
#Ajout refusé, métier erroné
INSERT INTO Contacts
	VALUES("Jean","Claude","false","chanteur","jean-claude@placeholder.com","123 route des routes 38999 Pas-Grenoble");
#Ajout refusé, un orga ne peut pas etre utilsiateur
INSERT INTO Contacts
	VALUES("Jean","Claude",true,"organisateur","jean-claude@placeholder.com","123 route des routes 38999 Pas-Grenoble");
#Ajout refusé, un groupe ne peut pas avoir de prénom
INSERT INTO Contacts
	VALUES("Les joyeux lurons","en cavale",true,"groupe","joyeux2@monsite.com","La grange, 73350 Bourg-st-Maurice");



# Refusé, le participant n'est pas un groupe

#Refusé, l'organisateur n'est pas un organisateur
*/


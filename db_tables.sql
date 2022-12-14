CREATE TABLE fruit(
    id_fruit INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL,
    prix FLOAT(2) NOT NULL,
    description VARCHAR(2000) NOT NULL,
    origine VARCHAR(200) NOT NULL,
    image VARCHAR(50) NOT NULL
); 
CREATE TABLE categorie(
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    description VARCHAR(2000) NOT NULL
);

CREATE TABLE categorisation(id_fruit INT, id_categorie INT); ALTER TABLE
    categorisation ADD CONSTRAINT PK_categorisation PRIMARY KEY(id_fruit, id_categorie);
ALTER TABLE
    categorisation ADD CONSTRAINT FK_categorisation_fruit FOREIGN KEY(id_fruit) REFERENCES fruit(id_fruit);
ALTER TABLE
    categorisation ADD CONSTRAINT FK_categorisation_categorie FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie);

CREATE TABLE usertab(
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    adresse VARCHAR(60) NOT NULL,
    mail VARCHAR(60) NOT NULL,
    mdp VARCHAR(200) NOT NULL,
    telephone VARCHAR(30) NOT NULL,
    sexe VARCHAR(30) NOT NULL,
    status VARCHAR
        (20) NOT NULL
);

ALTER TABLE `usertab` ADD UNIQUE(`mail`);
ALTER TABLE `fruit` ADD UNIQUE(`nom`);


/*
CREATE TABLE commande(
    id_commande INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT NOT NULL,
    date_commande VARCHAR(60),
    prix FLOAT(2) NOT NULL
);



CREATE TABLE commandeFruit(
    id_commande INT NOT NULL,
    id_fruit INT NOT NULL,
    quantite INT NOT NULL
);

ALTER TABLE
    commande ADD CONSTRAINT FK_commande_user FOREIGN KEY(id_client) REFERENCES usertab(id_user);
ALTER TABLE
    commandeFruit ADD CONSTRAINT PK_commandeFruit PRIMARY KEY(id_commande, id_fruit);
ALTER TABLE
    commandeFruit ADD CONSTRAINT FK_commandeFruit_commande FOREIGN KEY(id_commande) REFERENCES commande(id_commande);
ALTER TABLE
    commandeFruit ADD CONSTRAINT FK_panier_fruit FOREIGN KEY(id_fruit) REFERENCES fruit(id_fruit);
*/
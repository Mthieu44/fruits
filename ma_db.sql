CREATE TABLE fruit(
    id_fruit INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL,
    prix FLOAT(2) NOT NULL,
    description VARCHAR(200) NOT NULL,
    origine VARCHAR(200) NOT NULL,
    image VARCHAR(50) NOT NULL
); CREATE TABLE categorie(
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL,
    description VARCHAR(200) NOT NULL
); CREATE TABLE categorisation(id_fruit INT, id_categorie INT); ALTER TABLE
    categorisation ADD CONSTRAINT PK_categorisation PRIMARY KEY(id_fruit, id_categorie);
ALTER TABLE
    categorisation ADD CONSTRAINT FK_categorisation_fruit FOREIGN KEY(id_fruit) REFERENCES fruit(id_fruit);
ALTER TABLE
    categorisation ADD CONSTRAINT FK_categorisation_categorie FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie);
INSERT INTO fruit(
    nom,
    prix,
    description,
    origine,
    image
)
VALUES(
    'Bananes',
    1.50,
    'Des bananes jaunes. Vendues à la grappe',
    'France',
    'banane.png'
);
INSERT INTO fruit(
    nom,
    prix,
    description,
    origine,
    image
)
VALUES(
    'Mangue',
    2.0,
    'Le meilleur fruit du monde. Vendues à lunité',
    'France',
    'mangue.png'
);
INSERT INTO categorie(nom, description)
VALUES('Fruits exotiques', 'Fruit sympa');
INSERT INTO categorie(nom, description)
VALUES(
    'Fruits jaune',
    'ces fruits sont jaunes, logique'
);
INSERT INTO categorisation
VALUES(1, 1);
INSERT INTO categorisation
VALUES(1, 2);
INSERT INTO categorisation
VALUES(2, 1);
CREATE TABLE usertab(
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    adresse VARCHAR(60) NOT NULL,
    mail VARCHAR(60) NOT NULL,
    mdp VARCHAR(200) NOT NULL,
    telephone VARCHAR(30) NOT NULL,
    STATUS VARCHAR
        (20) NOT NULL
);
INSERT INTO usertab(
    prenom,
    nom,
    adresse,
    mail,
    mdp,
    telephone,
STATUS
)
VALUES(
    'Admin',
    'Admin',
    'chez ta maman',
    'admin@test',
    '$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6',
    '123456789',
    'admin'
);
INSERT INTO usertab(
    prenom,
    nom,
    adresse,
    mail,
    mdp,
    telephone,
STATUS
)
VALUES(
    'Client',
    'Client',
    'chez ta maman',
    'client@test',
    '$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6',
    '123456789',
    'client'
);
INSERT INTO usertab(
    prenom,
    nom,
    adresse,
    mail,
    mdp,
    telephone,
STATUS
)
VALUES(
    'Responsable',
    'Responsable',
    'chez ta maman',
    'responsable@test',
    '$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6',
    '123456789',
    'admin'
);
/*CREATE TABLE commande(
    id_commande INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT NOT NULL,
    date_commande TIMESTAMP,
    prix FLOAT(2) NOT NULL
); CREATE TABLE panier(
    id_commande INT NOT NULL AUTO_INCREMENT,
    id_fruit INT NOT NULL,
    quantite INT NOT NULL
); ALTER TABLE
    commande ADD CONSTRAINT FK_commande_user FOREIGN KEY(id_client) REFERENCES usertab(id_user);
ALTER TABLE
    panier ADD CONSTRAINT PK_panier PRIMARY KEY(id_commande, id_fruit);
ALTER TABLE
    panier ADD CONSTRAINT FK_panier_commande FOREIGN KEY(id_commande) REFERENCES commande(id_commande);
ALTER TABLE
    panier ADD CONSTRAINT FK_panier_fruit FOREIGN KEY(id_fruit) REFERENCES fruit(id_fruit);*/

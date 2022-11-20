CREATE TABLE fruit(
    id_fruit INT PRIMARY KEY,
    nom VARCHAR(20) NOT NULL,
    prix FLOAT(2) NOT NULL,
    description VARCHAR(200) NOT NULL,
    image VARCHAR(50) NOT NULL
); CREATE TABLE categorie(
    id_categorie INT PRIMARY KEY,
    nom VARCHAR(20) NOT NULL,
    description VARCHAR(200) NOT NULL
); CREATE TABLE categorisation(id_fruit INT, id_categorie INT); ALTER TABLE
    categorisation ADD CONSTRAINT PK_categorisation PRIMARY KEY(id_fruit, id_categorie);
ALTER TABLE
    categorisation ADD CONSTRAINT FK_categorisation_fruit FOREIGN KEY(id_fruit) REFERENCES fruit(id_fruit);
ALTER TABLE
    categorisation ADD CONSTRAINT FK_categorisation_categorie FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie);
INSERT INTO fruit
VALUES(
    1,
    'Bananes',
    1.50,
    'Des bananes jaunes. Vendues à la grappe',
    'banane.png'
);
INSERT INTO fruit
VALUES(
    2,
    'Mangue',
    1.50,
    'Le meilleur fruit du monde. Vendues à lunité',
    'mangue.png'
);
INSERT INTO categorie
VALUES(
    1,
    'Fruits exotiques',
    'Fruit sympa'
);
INSERT INTO categorie
VALUES(
    2,
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
    id_user INT PRIMARY KEY,
    nom VARCHAR(20) NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    adresse VARCHAR(60) NOT NULL,
    mail VARCHAR(60) NOT NULL,
    mdp VARCHAR(200) NOT NULL,
    telephone VARCHAR(30) NOT NULL,
    status VARCHAR
        (20) NOT NULL
);
CREATE TABLE commande(
    id_commande INT PRIMARY KEY,
    id_client INT NOT NULL,
    date_commande TIMESTAMP,
    prix FLOAT(2) NOT NULL
); CREATE TABLE panier(
    id_commande INT NOT NULL,
    id_fruit INT NOT NULL,
    quantite INT NOT NULL
); ALTER TABLE
    commande ADD CONSTRAINT FK_commande_user FOREIGN KEY(id_client) REFERENCES usertab(id_user);
ALTER TABLE
    panier ADD CONSTRAINT PK_panier PRIMARY KEY(id_commande, id_fruit);
ALTER TABLE
    panier ADD CONSTRAINT FK_panier_commande FOREIGN KEY(id_commande) REFERENCES commande(id_commande);
ALTER TABLE
    panier ADD CONSTRAINT FK_panier_fruit FOREIGN KEY(id_fruit) REFERENCES fruit(id_fruit);
INSERT INTO usertab
VALUES(
    '1',
    'Admin',
    'Admin',
    'chez ta maman',
    'admin@test',
    '$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6',
    '123456789',
    'admin'
);
INSERT INTO usertab
VALUES(
    '2',
    'Client',
    'Client',
    'chez ta maman',
    'client@test',
    '$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6',
    '123456789',
    'client'
);
INSERT INTO usertab
VALUES(
    '3',
    'Responsable',
    'Responsable',
    'chez ta maman',
    'responsable@test',
    '$2y$10$JMuuaDMCavASPKf9KBcD1eaMHJ0zkeD8eYs7HjecoD8QeUVRhKQq6',
    '123456789',
    'admin'
);

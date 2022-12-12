DELIMITER //
CREATE OR REPLACE PROCEDURE addUser(
    IN _prenom TEXT,
    IN _nom TEXT,
    IN _adresse TEXT,
    IN _mail TEXT,
    IN _mdp TEXT,
    IN _telephone TEXT,
    IN _sexe TEXT,
    IN _status TEXT
)
BEGIN
    INSERT INTO usertab(
        prenom,
        nom,
        adresse,
        mail,
        mdp,
        telephone,
        sexe,
        status
    )
VALUES(
    _prenom,
    _nom,
    _adresse,
    _mail,
    _mdp,
    _telephone,
    _sexe,
    _status
);
END //
DELIMITER ;

DELIMITER //
CREATE OR REPLACE PROCEDURE modifUser(
    IN _id TEXT,
    IN _prenom TEXT,
    IN _nom TEXT,
    IN _adresse TEXT,
    IN _mail TEXT,
    IN _mdp TEXT,
    IN _telephone TEXT,
    IN _sexe TEXT,
    IN _status TEXT
)
BEGIN
    UPDATE usertab
    SET
        prenom = _prenom,
        nom = _nom,
        adresse = _adresse,
        mail = _mail,
        mdp = _mdp,
        telephone = _telephone,
        sexe = _sexe,
        status = _status
    WHERE id_user = _id;
END //
DELIMITER ;


DELIMITER //
CREATE OR REPLACE PROCEDURE deleteUser(
    IN _id TEXT
)
BEGIN
    DELETE FROM usertab
    WHERE id_user = _id;
END //
DELIMITER ;


DELIMITER //
CREATE OR REPLACE PROCEDURE addFruit(
    IN _nom TEXT,
    IN _prix TEXT,
    IN _description TEXT,
    IN _origine TEXT,
    IN _image TEXT
)
BEGIN
    INSERT INTO fruit(
        nom,
        prix,
        description,
        origine,
        image
    )
VALUES(
    _nom,
    _prix,
    _description,
    _origine,
    _image
);
END //
DELIMITER ;

DELIMITER //
CREATE OR REPLACE PROCEDURE modifFruit(
    IN _id TEXT,
    IN _nom TEXT,
    IN _prix TEXT,
    IN _description TEXT,
    IN _origine TEXT,
    IN _image TEXT
)
BEGIN
    UPDATE fruit
    SET
        nom = _nom,
        prix = _prix,
        description = _description,
        origine = _origine,
        image = _image
    WHERE id_fruit = _id;
END //
DELIMITER ;

DELIMITER //
CREATE OR REPLACE PROCEDURE deleteFruit(
    IN _id TEXT
)
BEGIN
    DELETE FROM categorisation
    where id_fruit = _id;
    DELETE FROM fruit
    WHERE id_fruit = _id;
END //
DELIMITER ;



DELIMITER //
CREATE OR REPLACE PROCEDURE addCategorie(
    IN _nom TEXT,
    IN _description TEXT
)
BEGIN
    INSERT INTO categorie(
        nom,
        description
    )
VALUES(
    _nom,
    _description
);

END //
DELIMITER ;

DELIMITER //
CREATE OR REPLACE PROCEDURE modifCategorie(
    IN _id TEXT,
    IN _nom TEXT,
    IN _description TEXT
)
BEGIN
    UPDATE categorie
    SET
        nom = _nom,
        description = _description
    WHERE id_categorie = _id;
END //
DELIMITER ;

DELIMITER //
CREATE OR REPLACE PROCEDURE deleteCategorie(
    IN _id TEXT
)
BEGIN
    DELETE FROM categorie
    WHERE id_categorie = _id;
END //
DELIMITER ;



DELIMITER //
CREATE OR REPLACE PROCEDURE addCategorieToFruit(
    IN _id_fruit TEXT,
    IN _id_categ TEXT
)
BEGIN
    INSERT INTO categorisation(
        id_fruit,
        id_categorie
    )
VALUES(
    _id_fruit,
    _id_categ
);

END //
DELIMITER ;


DELIMITER //
CREATE OR REPLACE PROCEDURE deleteCategorieToFruit(
    IN _id_fruit TEXT,
    IN _id_categ TEXT
)
BEGIN
    DELETE FROM categorisation
    WHERE id_categorie = _id_categ and id_fruit = _id_fruit;
END //
DELIMITER ;

DELIMITER //
CREATE OR REPLACE PROCEDURE getAllCategorie()
BEGIN
    SELECT * FROM categorie;
END //
DELIMITER ;

DELIMITER //
CREATE OR REPLACE PROCEDURE getCategorieByFruitId(
    IN _id_fruit TEXT
)
BEGIN
    SELECT id_categorie FROM categorisation WHERE id_fruit = _id_fruit;
END //
DELIMITER ;

DELIMITER //
CREATE OR REPLACE PROCEDURE getAllFruit()
BEGIN
    SELECT fruit.id_fruit, fruit.nom, fruit.prix, fruit.description, fruit.origine, fruit.image, categorie.id_categorie, categorie.nom as nomc, categorie.description as descriptionc FROM fruit, categorisation, categorie where fruit.id_fruit = categorisation.id_fruit and categorie.id_categorie = categorisation.id_categorie ;
END //
DELIMITER ;

DELIMITER //

DELIMITER //
CREATE OR REPLACE PROCEDURE getFruitById(
    IN _id_fruit TEXT
)
BEGIN
    SELECT fruit.id_fruit, fruit.nom, fruit.prix, fruit.description, fruit.origine, fruit.image, categorie.id_categorie, categorie.nom as nomc, categorie.description as descriptionc FROM fruit, categorisation, categorie where fruit.id_fruit = _id_fruit and fruit.id_fruit = categorisation.id_fruit and categorie.id_categorie = categorisation.id_categorie ;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE getFruitByName(
    IN _nom_fruit TEXT
)
BEGIN
    SELECT fruit.id_fruit, fruit.nom, fruit.prix, fruit.description, fruit.origine, fruit.image, categorie.id_categorie, categorie.nom as nomc, categorie.description as descriptionc FROM fruit, categorisation, categorie where fruit.nom = _nom_fruit and fruit.id_fruit = categorisation.id_fruit and categorie.id_categorie = categorisation.id_categorie ;
END //
DELIMITER ;

DELIMITER //
CREATE OR REPLACE PROCEDURE getAllUser()
BEGIN
    SELECT * FROM usertab;
END //
DELIMITER ; 
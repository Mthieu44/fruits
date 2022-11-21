DELIMITER //
CREATE PROCEDURE addUser(
    IN _prenom TEXT,
    IN _nom TEXT,
    IN _adresse TEXT,
    IN _mail TEXT,
    IN _mdp TEXT,
    IN _telephone TEXT,
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
    STATUS
    )
VALUES(
    _prenom,
    _nom,
    _adresse,
    _mail,
    _mdp,
    _telephone,
    _status
);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE modifUser(
    IN _id TEXT,
    IN _prenom TEXT,
    IN _nom TEXT,
    IN _adresse TEXT,
    IN _mail TEXT,
    IN _mdp TEXT,
    IN _telephone TEXT,
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
        status = _status
    WHERE id_user = _id;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE deleteUser(
    IN _id TEXT
)
BEGIN
    DELETE FROM usertab
    WHERE id_user = _id;
END //
DELIMITER ;


call addUser('test','test','test','test','test','test','test');
call modifUser(8,'cbien','cbien','cbien','cbien','cbien','cbien','cbien');
call deleteUser(8);




DELIMITER //
CREATE PROCEDURE addFruit(
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
CREATE PROCEDURE modifFruit(
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
CREATE PROCEDURE deleteFruit(
    IN _id TEXT
)
BEGIN
    DELETE FROM fruit
    WHERE id_fruit = _id;
END //
DELIMITER ;


call addFruit('banananan','10','c bon','france','banane.png');
call modifFruit(3,'banananan','10','c bon','france','banane.png');
call deleteFruit(3);

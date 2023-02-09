CREATE DATABASE IF NOT EXISTS form_securise;
USE form_securise;

CREATE TABLE connexion(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(500) NOT NULL,
    email VARCHAR(500) NOT NULL,
    mot_de_passe VARCHAR(32) NOT NULL,
    date_inscription DATE,
    PRIMARY KEY(id)
);

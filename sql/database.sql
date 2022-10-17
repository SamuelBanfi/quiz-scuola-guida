DROP DATABASE IF EXISTS quiz_scuola_guida;
CREATE DATABASE quiz_scuola_guida;
USE quiz_scuola_guida;

CREATE TABLE utente
(
    email VARCHAR(30) PRIMARY KEY,
    nome VARCHAR(20) NOT NULL,
    cognome VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    admin TINYINT(1) NOT NULL
);
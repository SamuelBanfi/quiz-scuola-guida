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

INSERT INTO utente VALUES("admin@gmail.com", "Admin", "istrator", "$2y$10$rt2kMEp4Ij2olyRLj2RA/uQ31zOTRbkNCF3fc7cPhAAQJjyYuIHOK", 1);

CREATE TABLE domanda
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    testo TEXT NOT NULL,
    risposta_1 VARCHAR(200) NOT NULL,
    risposta_2 VARCHAR(200) NOT NULL,
    risposta_3 VARCHAR(200) NOT NULL,
    risposta_corretta INT NOT NULL,
    immagine VARCHAR(200) NOT NULL,
    spiegazione_testo VARCHAR(200) NOT NULL,
    spiegazione_video VARCHAR(200) NOT NULL
);

CREATE TABLE impostazioni
(
    limite_tempo INT NOT NULL,
    limite_errori INT NOT NULL
);
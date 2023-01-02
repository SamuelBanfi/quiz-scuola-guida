DROP DATABASE IF EXISTS quiz_scuola_guida;
CREATE DATABASE quiz_scuola_guida;
USE quiz_scuola_guida;

/*SET GLOBAL event_scheduler = ON;
SET @@global.event_scheduler = ON;
SET GLOBAL event_scheduler = 1;
SET @@global.event_scheduler = 1;*/

CREATE TABLE utente
(
    email VARCHAR(30) PRIMARY KEY,
    nome VARCHAR(20) NOT NULL,
    cognome VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    admin TINYINT(1) NOT NULL,
    data_creazione DATETIME NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO utente(email,nome,cognome,password,admin) VALUES("admin@gmail.com", "Admin", "istrator", "$2y$10$rt2kMEp4Ij2olyRLj2RA/uQ31zOTRbkNCF3fc7cPhAAQJjyYuIHOK", 1);
INSERT INTO utente(email,nome,cognome,password,admin) VALUES("gino@gmail.com", "Gino", "Admin", "$2y$10$rt2kMEp4Ij2olyRLj2RA/uQ31zOTRbkNCF3fc7cPhAAQJjyYuIHOK", 1);
INSERT INTO utente(email,nome,cognome,password,admin) VALUES("samuel@gmail.com", "Samuel", "Banfi", "$2y$10$rt2kMEp4Ij2olyRLj2RA/uQ31zOTRbkNCF3fc7cPhAAQJjyYuIHOK", 0);
INSERT INTO utente(email,nome,cognome,password,admin) VALUES("dennis@gmail.com", "Dennis", "Donofrio", "$2y$10$rt2kMEp4Ij2olyRLj2RA/uQ31zOTRbkNCF3fc7cPhAAQJjyYuIHOK", 0);

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

INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');
INSERT INTO `domanda` (`testo`, `risposta_1`, `risposta_2`, `risposta_3`, `risposta_corretta`, `immagine`, `spiegazione_testo`, `spiegazione_video`) VALUES('Giusto2', '123', '132', '312', 1, 'application/quiz_images/1GXPyw29iBBfY9bfebmP.png', 'application/textual_explanations/gbaa5wM1aBFoawu6mkA0.txt', 'application/video_explanations/DlTh3YWxwvJZ1UtxGVlO.mp4');

CREATE TABLE impostazioni
(
    limite_tempo INT NOT NULL DEFAULT -1,
    limite_errori INT NOT NULL DEFAULT 3,
    limite_accesso_utente INT NOT NULL DEFAULT 1
);

INSERT INTO impostazioni (limite_tempo,limite_errori,limite_accesso_utente) VALUES (-1, 3, 1);

DELIMITER //
CREATE PROCEDURE elimina_utente()
BEGIN
    DECLARE limite_accesso_utente DATETIME DEFAULT (SELECT limite_accesso_utente FROM impostazioni);
    DECLARE utenti CURSOR FOR SELECT email,data_creazione,admin FROM utente;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finito = TRUE;

    OPEN utenti;
    loop_utenti: LOOP
        FETCH utenti INTO email,data_eliminazione,admin;

        IF finito THEN
            LEAVE loop_utenti;
        END IF;

        IF admin = 1 THEN
            CONTINUE loop_utenti;
        END IF;

        IF data_creazione + INTERVAL limite_accesso_utente MONTH < NOW() THEN
            DELETE FROM utente WHERE email = email;
        END IF;
    END LOOP;
    CLOSE utenti;
END
DELIMITER ;
/*
DELIMITER //
CREATE EVENT evento_elimina_utente
ON SCHEDULE EVERY 1 DAY
DO
    CALL elimina_utente();
// DELIMITER ;
*/
CREATE TABLE Utente(
    IDUtente INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(30),
    Cognome VARCHAR(30),
    DataNascita DATE,
    Email VARCHAR(50),
    Telefono VARCHAR(20)
    ON DELETE SET NULL
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Tecnico(
    IDTecnico INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(50),
    Cognome VARCHAR(50),
    DataNascita DATE,
    Email VARCHAR(50),
    Telefono VARCHAR(20)
    ON DELETE SET NULL
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE CategoriaProblema(
    IDCategoria INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NomeCategoria VARCHAR(50),
    Descrizione VARCHAR(500)
    ON DELETE SET NULL
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Posizione(
    IDPosizione INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NomeReparto VARCHAR(40),
    Piano INT(1), -- DA CONTROLLARE
    NumeroUfficio INT(1)
    ON DELETE SET NULL
    ON UPDATE CASCADE
)ENGINE=InnoDB;


CREATE TABLE Ticket(
    IDTicket INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    DescrizioneProblema VARCHAR(500),
    Stato ENUM('Aperto','Chiuso','In attesa')--DA CONTROLLARE
    Data DATE,
    Assegnato BOOLEAN,
    IDUtente INT(6),
    IDTecnico INT(6),
    IDCategoria INT(6),
    IDPosizione INT(6),
    FOREIGN KEY(IDUtente) REFERENCES Utente(IDUtente),
    FOREIGN KEY(IDTecnico) REFERENCES Tecnico(IDTecnico),
    FOREIGN KEY(IDCategoria) REFERENCES CategoriaProblema(IDCategoria),
    FOREIGN KEY(IDPosizione) REFERENCES Posizione(IDPosizione)
    ON DELETE SET NULL
    ON UPDATE CASCADE
)ENGINE=InnoDB;

--waji puzza
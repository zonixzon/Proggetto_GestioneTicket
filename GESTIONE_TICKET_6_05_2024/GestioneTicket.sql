CREATE TABLE Utente(
    IDUtente INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(30),
    Cognome VARCHAR(30),
    DataNascita DATE,
    Email VARCHAR(50),
    Telefono VARCHAR(50)
    ON DELETE SET NULL
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Tecnico(
    IDTecnico INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(50),
    Cognome VARCHAR(50),
    DataNascita DATE,
    Email VARCHAR(50),
    Telefono VARCHAR(10)
    ON DELETE SET NULL
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE CategoriaProblema(
    IDCategoria INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NomeCategoria VARCHAR(50),
    Descrizione VARCHAR(200)
    ON DELETE SET NULL
    ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE Ticket(
    IDTicket INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    DescrizioneProblema VARCHAR(500),
    Stato 
    DATA DATE,
    Assegnato BOOLEAN,
    IDUtente INT(6),
    IDTecnico INT(6),
    IDCategoria INT(6),
    IDPosizione INT(6),

    FOREIGN KEY(IDUtente) REFERENCES Utente(IDUtente),
    FOREIGN KEY(IDTecnico) REFERENCES Tecnico(IDUtente)
    ON DELETE SET NULL
    ON UPDATE CASCADE
)ENGINE=InnoDB;
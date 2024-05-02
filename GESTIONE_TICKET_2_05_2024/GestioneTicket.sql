
CREATE TABLE Utente(
    IDUtente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(30),
    Cognome VARCHAR(30),
    DataNascita DATE,
    Email VARCHAR(50),
    Telefono VARCHAR(50)
)



CREATE TABLE Tecnico(
    IDTecnico INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(50),
    Cognome VARCHAR(50),
    DataNascita DATE,
    Email VARCHAR(50),
    Telefono VARCHAR(10)
    ON DELETE SET NULL
    ON UPDATE CASCADE
)ENGINE=InnoDB;
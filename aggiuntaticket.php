<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aggiungi Ticket</title>
</head>
<body>

<h2>Aggiungi Ticket</h2>

<form action="#" method="post" id="myForm">
  <label for="descrizioneProblema">Descrizione:</label><br>
  <textarea id="descrizioneProblema" name="descrizioneProblema" rows="4" cols="50"></textarea><br><br>

  <input type="checkbox" id="software" name="tipologiaProblema" value="Software">
  <label for="software">Software</label><br>

  <input type="checkbox" id="hardware" name="tipologiaProblema" value="Hardware">
  <label for="hardware">Hardware</label><br><br>

  <input type="submit" value="Aggiungi">
</form>

<?php

// Crea una connessione
$conn = new mysqli("localhost", "root", "", "gestioneticket");

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Controlla se il modulo è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal form
    $descrizioneProblema = $_POST["descrizioneProblema"];
    $tipologiaProblema = $_POST["tipologiaProblema"];

    // Controlla se la categoria esiste già
    $categoriaExistQuery = "SELECT IDCategoria FROM Categorie WHERE NomeCategoria = '$tipologiaProblema'";
    $categoriaExistResult = $conn->query($categoriaExistQuery);

    if ($categoriaExistResult->num_rows == 0) {
        // Se la categoria non esiste, la aggiunge alla tabella "Categorie"
        $insertCategoriaQuery = "INSERT INTO Categorie (NomeCategoria) VALUES ('$tipologiaProblema')";
        $conn->query($insertCategoriaQuery);
    }

    // Inserisci il ticket nel database
    $sql = "INSERT INTO Ticket (DescrizioneProblema, Stato, Data, Assegnato, IDCategoria)
            SELECT '$descrizioneProblema', 'Chiuso', NOW(), FALSE, IDCategoria
            FROM Categorie WHERE NomeCategoria = '$tipologiaProblema'";

    if ($conn->query($sql) === TRUE) {
        echo "Ticket aggiunto con successo!";
    } else {
        echo "Errore durante l'aggiunta del ticket: " . $conn->error;
    }
}

// Chiudi la connessione
$conn->close();
?>

</body>
</html>

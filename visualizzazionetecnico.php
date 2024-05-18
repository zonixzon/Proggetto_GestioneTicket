<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visualizza Richieste Utenti</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    table, th, td {
      border: 1px solid black;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
    

<h2>Richieste Utenti in Attesa</h2>

<table>
  <thead>
    <tr>
      <th>ID Ticket</th>
      <th>Descrizione Problema</th>
      <th>Categoria</th>
      <th>Data</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Connessione al database
    $conn = new mysqli("localhost", "root", "", "gestioneticket");

    // Controllo della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Funzione per cambiare lo stato del ticket
    if (isset($_GET['change_status']) && isset($_GET['ticket_id']) && isset($_GET['new_status'])) {
        $ticket_id = $_GET['ticket_id'];
        $new_status = $_GET['new_status'];
    
        $update_query = "UPDATE Ticket SET Stato = '$new_status' WHERE IDTicket = $ticket_id";
        $conn->query($update_query);
    }
    

    // Query per selezionare i ticket in stato di attesa con le categorie
    $query = "SELECT T.IDTicket,t.IDCategoria, t.DescrizioneProblema, c.NomeCategoria, t.Data,u.Nome,u.Cognome
              FROM Ticket as t
              INNER JOIN Categorie as c ON t.IDCategoria = c.IDCategoria
              INNER JOIN Utenti as u ON t.IDUtente = u.IDUtente
              WHERE t.Stato = 'Chiuso'";
    $result = $conn->query($query);

    // Se ci sono risultati, li visualizziamo nella tabella
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["IDTicket"] . "</td>";
            echo "<td>" . $row["DescrizioneProblema"] . "</td>";
            echo "<td>" . $row["NomeCategoria"] . "</td>";
            echo "<td>" . $row["Data"] . "</td>";
            echo "<td>" . $row["Nome"] . " " . $row["Cognome"] . "</td>";
            echo "<td>";
            echo "<a href=\"?change_status=true&ticket_id=" . $row["IDTicket"] . "&new_status=Aperto\">Apri</a> | ";
            echo "<a href=\"?change_status=true&ticket_id=" . $row["IDTicket"] . "&new_status=Sospeso\">Attesa</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nessuna richiesta in attesa al momento.</td></tr>";
    }

    // Chiudiamo la connessione
    $conn->close();
    ?>
  </tbody>
</table>

</body>
</html>

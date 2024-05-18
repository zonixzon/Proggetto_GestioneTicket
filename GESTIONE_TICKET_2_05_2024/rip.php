<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="process_ticket.php" method="post">

    label for="descrizione_ticket">Descrizione del ticket:</label><br>
    <textarea id="descrizione_ticket" name="descrizione_ticket" rows="4" cols="50"></textarea><br><br>
    <input type="submit" value="Aggiungi ticket">

    </form>

    <?php
    
    $servername = "localhost"; // Indirizzo del server del database (solitamente "localhost" se è sullo stesso server)
    $username = "username"; // Nome utente del database
    $password = "password"; // Password del database
    $dbname = "gestione_ticket"; // Nome del database
    
    // Connessione al database
    $conn = new mysqli_connect("localhost","root","","progettogestioneticket")


        if(isset($_POST['descrizione_ticket'])){


        }




    ?>




</body>
</html>
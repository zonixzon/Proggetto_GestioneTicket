<?php
session_start();
// Controllo inizio sessione
if(isset($_SESSION["IDUtente"])) {
    // Se la sessione utente è settata, vuol dire che il login è stato effettuato ed è iniziata la sessione
    $tempo = time();
    $durataSessione = $tempo - $_SESSION['start_time'];
    if($durataSessione > 3600) {
        echo "Sessione terminata, riconnettersi"; 
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1 class="titolo">HOME</h1>

<?php
$conn = mysqli_connect("localhost", "root", "", "progettogestioneticket") or die("Errore di connessione al server".mysqli_error($conn));

<<<<<<< HEAD
if(isset($_SESSION["IDUtente"])) {
    $utente = $_SESSION["IDUtente"];
    $sql = "SELECT t.IDTicket, t.IDCategoria, cp.ticket 
            FROM utente AS U 
            INNER JOIN ticket AS t ON U.IDUtente = t.IDUtente 
            INNER JOIN posizione AS p ON t.IDPosizione = p.IDPosizione 
            INNER JOIN categoriaproblema AS cp ON t.IDCategoria = cp.IDCategoria 
            WHERE U.IDUtente = '$utente'";
    
    echo "Ciao ".$utente.", questi sono i tuoi ticket:";
    
    $ris = mysqli_query($conn, $sql);
    $righe = mysqli_num_rows($ris);
    
    if($righe >= 1) {
        echo "<table>";
        while($righeUtente = mysqli_fetch_array($ris)) {
            echo "<tr><td>".$righeUtente["IDTicket"]."</td><td>".$righeUtente["ticket"]."</td><td>".$righeUtente["IDCategoria"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nessun ticket trovato.";
    }
=======
$codice=$_SESSION["IDCodice"];
$utente=$_SESSION["IDUtente"];
if(is_null($_SESSION["IDCodice"])){
?>
<div class="Utente">

    <?php

    $sql= "SELECT T.ticket
    FROM utente as U INNER JOIN ticket as T 
    ON U.IDUtente = T.IDUtente INNER JOIN posizione as p ON T.IDPosizione=p.IDPosizione
    INNER JOIN categoriaproblema as cp ON p.IDCategoria=cp.IDCategoria
    WHERE U.IDUtente='$utente'";

    echo "Ciao ".$utente." questi sono i tuoi ticket:";
    $ris=mysqli_query($conn, $sql);
    $righe=mysqli_num_rows($ris);
    if($righe>=1){
        while($righeUtente=mysqli_fetch_array($ris)){
        echo "<tr><th>".$righeUtente["IDticket"]."</th>"."<th>".$righeUtente["IDUtente"]."</th>"."</th>"."<th>".$righeUtente["IDCategorie"]."</th></tr>";
            }
        }

>>>>>>> dcf797c1bfe2c1f9eeba6d41b4e92f8606cbc04a
}
?>
<div class="Visticket">
    

<div class="home">

    </div>

</body>
</html>

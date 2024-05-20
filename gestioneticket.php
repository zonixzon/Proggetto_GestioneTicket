<?php
session_start();
//Controllo inizio sessione
if(isset($_SESSION["IDUtente"])){ //Se session utente è settato vuol dire che il login è stato effettuato ed è iniziata la sessione
    $tempo=time();
    $durataSessione=$tempo-$_SESSION['start_time'];
    if($durataSessione>3600){
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
$conn=mysqli_connect("localhost", "root", "", "progettogestioneticket")
or die("Errore di connessione al server".my_sqli_error($conn));
 

$codice=$_SESSION["IDCodice"]
$utente=$_SESSION["IDUtente"]
if(is_null($_SESSION["IDCodice"])){
?>
<div class="Utente">

    <?php

    $sql= SELECT t.ticket
    FROM (utente as U INNER JOIN ticket as t 
    ON U.IDUtente = t.IDUtente) (ticket as t INNER JOIN posizione as p ON t.IDPosizione=p.IDPosizione)
    (ticket as t INNER JOIN categoriaproblema as cp ON t.IDCategoria=cp.IDCategoria)
    WHERE U.IDUtente='$utente';

    echo "Ciao ".$utente." questi sono i tuoi ticket:"
    $ris=mysqli_query($conn, $sql);
    $righe=mysqli_num_rows($ris);
    if($righe>=1){
        while($righeUtente=mysqli_fetch_array($ris)){
        echo "<tr><th>".$righeUtente["IDticket"]."</th>"."<th>".$righeUtente["IDUtente"]."</th>"."</th>"."<th>".$righeUtente["IDCategoria"]."</th></tr>";
            }
        }
    echo 
}
?>
<div class="Visticket">
    

<div class="home">

    </div>

</body>
</html>


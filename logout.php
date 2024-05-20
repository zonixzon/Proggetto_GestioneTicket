<?php
session_start();
session_unset();
session_destroy();
$_SESSION=array(); //per ripulire l'array session e resettarlo da capo
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="custom.css">
    <title>Document</title>
</head>
<body>
    <div class="centro">
        <h1 class="titoloLogout">DISCONNESSIONE EFFETTUATA</h1>
    </div>
    
    <div class="centro">
    <h2>Arrivederci</h2>
    </div>
    
    <div class="centro">
    <p>Per tornare alla pagina iniziale clicca <a href="gestioneticket.php">qui</a></p>
    </div>

</body>
</html>
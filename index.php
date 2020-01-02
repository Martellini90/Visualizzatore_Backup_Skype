<?php
    require_once 'php/accessi.php';
    require_once 'php/funzioni.php';
    require_once 'php/head.php';
    require_once 'php/accessi.php';
    //require_once 'php/Dbmanager.php';
    //require_once 'php/operazioniDB.php';
    
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Visualizzatore backup Skype</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css" media="screen">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/funzioni.js"></script>
</head>

<body>    
    <section class="d-flex">
        <div id="colonna-sx" class="col-lg-3">
            <h3>Colonna ID</h3>
            <?php require_once 'html/contatti.php'?>
        </div>
        
        <div id="colonna-dx" class="col-lg-9">
            <?php require_once 'html/messaggi.php'?>        
        </div>
    </section>   
</body>
</html>

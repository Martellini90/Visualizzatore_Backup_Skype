<?php    
    function scriviDB ($jsonSkype){
        $Tipi = 'i, s';
        
        
        $sSQL = "
            INSERT INTO `url` (IDArray, displayName)
                VALUES (1, 'prova')
        ";
        
        $sSQL = '';
        
        $Tabella = 'url';
        $Colonne = 'IDArray, displayName';

        $arValori = array(0, $jsonSkype ['conversations'][0]['displayName']);
        
        $db = new DbManager(dbHost,dbName,dbUser,dbPassword);
        
        //Prepara la connessione al Db usando il punto interrogativo (?) come segnaposto in attesa dei valori definitivi
        $Query = $db->prepare("INSERT INTO 'url' ('IDArray, displayName') VALUES (?, ?)");
        $sSQL  = $db->bind_param('is', 10, 'prova');
        
        Scrivi ($arValori);
        //$insert = $db->Esegui("INSERT INTO myTable (name, age) VALUES (?, ?)", 10, 'prova');

        
        $db->Esegui($sSQL);
    }

    /*function leggiDB (){
        $sSQL = " SELECT * FROM appartamenti WHERE nome_appartamento='$p'";
        $db = new DbManager(dbHost,dbName,dbUser,dbPassword);
        $db->Esegui($sSQL);

        if($risultati = $db->Recupera() ){
            $TITOLO = '<h1>Appartamento '. $risultati['nome_appartamento'] .'</h1>';
            $file_da_includere = 'html/appartamenti.php';
            $Foto = 'img/'. $risultati['Foto'];//Inserisco img
            $Metratura=$risultati['Metratura'].'m<sup>2</sup>';
            $Letti=$risultati['Letti'];
            $Descrizione = $risultati['Descrizione'];//Leggo il database
            $Servizi = 'img/servizi/ashton.png';
        };
    }*/
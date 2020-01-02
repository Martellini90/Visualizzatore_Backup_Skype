<?php
    $jsonSkype = file_get_contents(Backup);

    $jsonSkype = json_decode($jsonSkype, true);

    object_to_array ($jsonSkype);//Converte oggetti che incontra in array
    
    //Qui Dichiaro le Variabile necessarie
    $autorePost = '';
        
    $IDConversazione = GetVal('p');
 

<?php
    function GetVal($nomeparametro){
        $valore = ''; 
        if(isset($_GET[$nomeparametro]) )
        {
            $valore = $_GET[$nomeparametro];
        }
        return $valore;
    }

    //converte oggetti in array
    function object_to_array($input) {
        //analizza il codice in ingresso ($input) e se trova un oggetto lo converte in array.
        //se trova un array non fa niente
        if (is_object($input))
            $input = get_object_vars($input);

        return is_array($input) ? array_map(__FUNCTION__, $input) : $input;
    }

    //converte array in oggetto
    function array_to_object($input) {
        return is_array($input) ? (object) array_map(__FUNCTION__, $input) : $input;
    }

        function autorePost($From, $UserID){
            if($From === $UserID){
                echo 'mypost';
            } 
        }

        function stampa_info($input){
            if($input !== null){
                echo ($input);
            } 
        }
        
        function converti_data ($input){
            //Rimuove caratteri non numerici e li sostituisce con 'spazio'
            $data = preg_replace("/[^0-9-:]/", "", $input);
            
            //Rimuove ultimi 3 caratteri dalla stringa
            $data = substr($data, 0, -3);
            
            //Converte la data nel formato it (gg-mm-aaaa H:m)
            $data = date("d-m-Y H:i", strtotime($data)); 
            
            return $data;
        }
//////////////////////////////////////////////////////
//Scrive il contenuto dell'array su file.txt
    function scriviArray ($arContenuto, $file){
        $arContenuto = str_replace(['Array','(',')'], '', print_r($arContenuto, true));
        
        if(!is_file($file)){
            file_put_contents($file, print_r($arContenuto, true));
        };
    };
//////////////////////////////////////////////////////
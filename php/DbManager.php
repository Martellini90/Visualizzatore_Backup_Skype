<?php
/**********************CLASSI*************************
	Permettono di non dover utilizzare varibili globali
	
	Permettono di decidere l'ordine di esecuzione delle funzioni in esse contenute
**********************************************************/
class DbManager//Definisco la Classe
{
//	Definisco variabili con valore NULL	
	private $dbc = NULL;
	private $res = NULL;
	
	
//	Definisco le variabili che andranno a contenere i dati di accesso al database
	private $Database = '';//Server che ospita il database
	private $mDbname = '';//Nome del Database
	private $mDbUser = '';//Nome utente e PW
	private $mDbPassword = '';


/**********************************************************
	Prima funzione eseguita
	
	Serve per aprire la connessione la server
    
    Verifica che i parametri siano diversi da null
**********************************************************/       
	public function __construct($host,$dbname,$user,$password) 
	{
/**********************************************************
	$this è una sorta di richiamo alla classe in cui si trova
	
	($this->) Determina quale azione eseguire
	
	($this->) assegna alle variabili private precedentemente create il valore delle variabili $host e seguenti
**********************************************************/
        if ($host != null) {
            $this->mDbHost = $host;
        }
        if ($dbname != null) {
            $this->mDbname = $dbname;
        }
        if ($user != null) {
            $this->mDbUser = $user;
        }
        if ($password != null) {
            $this->mDbPassword = $password;
        }
        
        return true;
	}
        
	public function Apri()
	{
		//Assegno alla variabile $dbc la funzione mysqli_connect (connessione al database)
		$this->dbc = mysqli_connect(
								$this->mDbHost, 
								$this->mDbUser, 
								$this->mDbPassword,
								$this->mDbname
									);
		
		if(!$this->dbc)//Se $this è falso
		{
			exit("Connessione a ".$this->mDbHost." fallita !".mysqli_connect_error());
		}
	
	}
/**********************************************************
	Esegue la funzione
	
	Essa consente di inviare comandi al database
**********************************************************/	
	public function Esegui($sSQL)
	{
            
		if(!is_resource($this->dbc) || !mysqli_thread_id($this->dbc) )
		{
			$this->Apri();
		}
		
		$res = mysqli_query($this->dbc,$sSQL);
		if(!$res)
		{
				exit("Errore query $sSQL ==><br>". mysqli_error($this->dbc));
				//die();
		}

		$this->res = $res; 
            
	}
    public function Scrivi($Valori){
        generaTipi ($Valori);
    }
    
/**********************************************************
        Analizzando i parametri in ingresso, essa inserisce i tipi delle variabili parametro (intero, stringa,...)

**********************************************************/
        private function generaTipi($Parametri) {
            foreach ($Parametri as $value) {
                switch (gettype($value)) {
                    case 'integer':
                        $Tipi .= "i";
                        break;

                    case 'double':
                        $Tipi .= "d";
                        break;

                    case 'string':
                        $Tipi .= "s";
                        break;

                    default:
                        $Tipi .= "b";
                        break;
                }
            }
            return $Tipi;
        }
    
	
	
/**********************************************************
	Creo la funzione Recupera () utilizzando il comando return per restituire la funzione mysqli_fetch_assoc ()
**********************************************************/
	public function Recupera()
	{
        return mysqli_fetch_assoc($this->res);
	}


/**********************************************************
	Creo la funzione Chiudi () per riportare le variabili $this->dbc & $this->res a volore NULL
**********************************************************/	
	public function Chiudi()
	{
		mysqli_close($this->dbc);
		$this->dbc = NULL;
		$this->res = NULL;
	}
        
	public function __destruct()
	{
		$this->Chiudi();
	}
}
/**********************************************************
	Le due Variabili contengono dati di accesso a due diversi database.
	
	new crea una nuova classe riferendosi però alla classe DbManager.
**********************************************************/

//$db1 = new DbManager ('server1','classe1','root','root');//Accesso la database 1
//$db2 = new DbManager ('server2','classe2','root','root');//Accesso la database 2

/**********************************************************
	Assegno la Funzione Esegui alla variabile $db1
	
	Passo ad Esegui le query necessarie a recuperare i dati dal database
**********************************************************/

//$db1->Esegui("SELECT * FROM tabella");

/**********************************************************
	Ciclo while restituisce un Array oppure valore nullo
	
	Esso sostituisce mysqli_fetch_assoc semplificando notevolmente la scrittura del codice
	
	
**********************************************************/

//while ( $risultati = $db1->Recupera () )
	
?>
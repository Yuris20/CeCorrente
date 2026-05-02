<?php
//Dati per la connessione
$NomeHost="localhost";
$NomeUtente="root";
$Password="";
$NomeDatabase="my_cecorrente";

//Connessione
$connessione= new mysqli($NomeHost,$NomeUtente,$Password,$NomeDatabase);

//Verifica connessione database
if(!$connessione)
{
    
   echo ('errore non riesco a connettermi al database');
}
else
{
    //echo("Connesso con successo");
}

?>


<?php
$host="127.0.0.1";
$user="root";
$password="";
$connessione = mysqli_connect($host, $user, $password);
if(!$connessione)
{
    echo("STEP 1: Connessione al server  Mysql Fallita");
    echo("<br>");
    exit();
}
$provaDb=mysqli_select_db($connessione,"my_cecorrente");
if(!$provaDb)
{
    echo("STEP 1: Connesione al database C e Corrente fallita");
	 echo("<br>");
    
	$query= 'CREATE DATABASE my_cecorrente';
    $risultato= mysqli_query($connessione,$query);
	if(!$risultato)
	{
		 echo("STEP 2: Database non creato");
         echo("<br>");
	}
	else
	{
		echo("STEP 2: Database creato con successo");
         echo("<br>");
		$Db=mysqli_select_db($connessione,'my_cecorrente');
	}   
}

// Variabile temporanea, utilizzata per memorizzare la query corrente
$templine = '';
// Leggi all'interno del file
$lines = file('cecorrente.sql');
// Passa attraverso ogni linea
foreach ($lines as $line) 
{
// Saltalo se si tratta di un commento
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

// Aggiungi questa linea al segmento corrente
    $templine .= $line;
// Se ha un punto e virgola alla fine, è la fine della query
    if (substr(trim($line), -1, 1) == ';') {
        // Perform the query
        mysqli_query($connessione,$templine) or print('Errore durante l esecuzione della query \'<strong>' . $templine . '\': ' . mysqli_error($connessione) . '<br /><br />');
       // Ripristina la variabile temporanea vuota
        $templine = '';
    }
}
echo ("Ultimo Step:Database importato con successo");
echo("<br>");
?>
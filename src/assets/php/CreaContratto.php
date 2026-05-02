<?php
include('ConnessioneDb.php'); // Mi richiamo la connessione

// acquisizione dati dal form HTML
$CodiceCliente = $_GET['CodiceC'];

$DataOff = $_GET['DataOfferta'];
$DiF = $_GET['DataInizioFornitura'];
$KWM = $_GET['KWMax'];
$IndirizzoF= $_GET['IndirizzoFornitura'];

$Cap = $_GET['CAP'];

$IndirizF= $_GET['IndirizzoFornitura'];


// Recupero del codice comune 

$sql = "SELECT CodComune FROM comuni WHERE CAP = '$Cap' LIMIT 1";

$risultato=mysqli_query($connessione,$sql);

if (mysqli_num_rows($risultato) == 0)
{
                 echo(mysqli_error($connessione));
                echo(no);
}
else
{
    $riga=mysqli_fetch_array($risultato);
    {
                
                $CodComune=$riga['CodComune'];
    }
}


$sql = "INSERT INTO contratto (DataStipula,DataInizioFornitur,KWMax,IndirizzoFornitura,CodComune,CodCliente) VALUES ('$DataOff','$DiF','$KWM', '$IndirizzoF','$CodComune','$CodiceCliente')";

$risultato=mysqli_query($connessione,$sql);


if(!$risultato) 
{
    echo("<br>");
	echo("errore nella query dati non inseriti");
     echo(mysqli_error($connessione));
	exit();
}
else
{
    echo("Contratto registrato con successo");
    echo("<br>");
    echo($link ='<a id="backlink" href="'. $_SERVER['HTTP_REFERER'] . '">clicca qui per tornare indietro');
}
?>

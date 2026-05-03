<?php
include('ConnessioneDb.php'); // Mi richiamo la connessione


// acquisizione dati dal form HTML 

//Creazione contatore

$MC = $_GET['ModCont'];
$CCR = $_GET['CodiceContr'];

//Lettura contatore 
$CodiceCont = $_GET['CodC'];
$KWM = $_GET['KWC'];

$MatricolaD= $_GET['MD'];

if($CodiceCont=="")
{
    $sql = "INSERT INTO contatore (Modello,StatoContatore,CodC) VALUES ('$MC','1','$CCR')";


}
else
{
    $sql = "INSERT INTO lettura (KWh,MatricolaD,CodCont) VALUES ($KWM,'$MatricolaD','$CodiceCont')";

}


$risultato=mysqli_query($connessione,$sql);

if(!$risultato) 
{
    echo("<br>");
	echo("errore nella query dati non inseriti");
	exit();
}
else
{
    echo("Operazione effettuata con successo");
    echo("<br>");
    echo($link ='<a id="backlink" href="../../HomeDipendenti.php">clicca qui per tornare indietro');
}
?>

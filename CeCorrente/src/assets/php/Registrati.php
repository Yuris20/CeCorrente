<?php
include('ConnessioneDb.php'); // Mi richiamo la connessione

// acquisizione dati dal form HTML Obbligatori 
$IndirizzoFiscale = $_POST['IndirizzoFiscale'];
$cap = $_POST['cap'];
$emailPec = $_POST['email'];
$NumeroDiTel = $_POST['NumeroDiTel'];
$password = $_POST['password'];
//Opzionali Privato
$Nome = $_POST['Nome'];
$Cognome = $_POST['Cognome'];
//Opzionali Azienda 

$RagioneSociale=$_POST['RagioneSociale'];
$NomeReferente= $_POST['NomeReferente'];
$CognomeRef = $_POST['CognomeRef'];

// Recupero del codice comune 

$sql = "SELECT CodComune FROM comuni WHERE CAP = '$cap' LIMIT 1";

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
// verifica tipo 
echo("Sono il nome".$Nome);
echo("<br>");
echo("Sono la ragione".$RagioneSociale);
echo("<br>");
if($Nome=="");
   { 
   echo("Il nome è vuoto quindi");
    echo("<br>");
       $tipo='Azienda'; 
       
       $sql = "INSERT INTO cliente (IndirizzoFiscale,Telefono,NomeReferente,RagioneSociale,CognomeReferente,EmailPec,Tipo,Password, CodComune) VALUES ('$IndirizzoFiscale','$NumeroDiTel','$NomeReferente','$RagioneSociale','$CognomeRef','$emailPec','$tipo','$password','$CodComune')";

   }

if($RagioneSociale=="")
   {
    echo("La ragione Sociale e vuota quindi");
    echo("<br>");
    $tipo="Privato";
    $sql = "INSERT INTO cliente (IndirizzoFiscale,Telefono,Cognome,EmailPec,Tipo,Nome,Password, CodComune) VALUES ('$IndirizzoFiscale','$NumeroDiTel','$Cognome','$emailPec','$tipo','$Nome','$password','$CodComune')";

   }
   

$risultato=mysqli_query($connessione,$sql);

if(!$risultato) 
{
    echo("<br>");
	echo("errore nella query dati non inseriti");
    echo(mysqli_error($connessione));
    
    echo($emailPec);

    
}
else
{
    echo("Cliente aggiunto con successo");
    echo("<br>");
}


$sql = "SELECT CodCliente FROM cliente WHERE EmailPec = '$emailPec' LIMIT 1";

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
                
                $CodCliente=$riga['CodCliente'];
    }
}

echo("Ecco il tuo codice Cliente ".$CodCliente);

 echo($link ='<a id="backlink" href="../../index.php">clicca qui per tornare indietro');


?>

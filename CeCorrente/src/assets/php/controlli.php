<?php
include('ConnessioneDb.php'); // Mi richiamo la connessione

// acquisizione dati dal form HTML
$CodiceCliente = $_POST["codiceCliente"];
$password = $_POST["password"];

// lettura della tabella utenti

$sql = "SELECT * FROM cliente WHERE CodCliente='$CodiceCliente' AND Password='$password'";


$risultato=mysqli_query($connessione,$sql);
if (mysqli_num_rows($risultato) == 0)
{
     echo("Descrizione errore: " .mysqli_error($connessione));
     header("Location: ../../index.php");
   
}
else
{
$riga=mysqli_fetch_array($risultato);
{
    
        $CodiceCliente = $riga['CodCliente'];
        $password=$riga['Password'];
        $TipoUtente=$riga['Tipo'];
       session_start(); // inizia la sessione
        $_SESSION['CodiceCliente']=$CodiceCliente;
        $_SESSION['password']=$password;
        $_SESSION['TipoUser']=$TipoUtente;
     header("Location: ../../HomePageCliente.php");
}
};
?>

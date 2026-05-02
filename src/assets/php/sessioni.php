<?php
include('ConnessioneDb.php'); // Mi richiamo la connessione
session_start();


if(isset($_SESSION['MatricolaD']))  
{
    $matricolaD=$_SESSION['MatricolaD']; // recupero la matricola del dipendente
    $tipo=$_SESSION['TipoUser']; //Recupero il tipo dell'utente
}
elseif(!isset($_SESSION['CodiceCliente']))
{
   header("Location: index.php");
}
elseif (isset($_SESSION['CodiceCliente'])) 
{
   $CodiceCliente=$_SESSION['CodiceCliente']; //Recupero l'utente
    $tipo=$_SESSION['TipoUser']; //Recupero il tipo dell'utente
  // print_r($tipo);
}
?>  
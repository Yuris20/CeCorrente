<?php
include('ConnessioneDb.php'); // Mi richiamo la connessione

// acquisizione dati dal form HTML
$matricolaD=$_POST["matricolaD"];
$password = $_POST["password"];

// lettura della tabella utenti

echo($matricolaD);
echo($password);
$sql = "SELECT MatricolaD,LivelloDiAutorizzazione,Tipo FROM dipendenti WHERE MatricolaD='$matricolaD' AND Password='$password'";

        $risultato=mysqli_query($connessione,$sql);
        if (mysqli_num_rows($risultato) == 0)
        {
             echo("Descrizione errore: " .mysqli_error($connessione));
             header("Location: ../../index.php");

        }
        else
        {
            echo("ok");
            $riga=mysqli_fetch_array($risultato);
            {

                    $matricolaD = $riga['MatricolaD'];
                    $LivelloAuto=$riga['LivelloDiAutorizzazione'];
                    $Tipo=$riga['Tipo'];
                   session_start(); // inizia la sessione
                    $_SESSION['MatricolaD']=$matricolaD;
                    $_SESSION['LivelloAuto']=$LivelloAuto;
                    $_SESSION['Tipo']=$Tipo;
                header("Location: ../../HomeDipendenti.php");
            }
        };    
?>

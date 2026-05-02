<?php

           $sql = "SELECT COUNT(`CodCliente`) as tot FROM cliente;";

            
            $risultato=mysqli_query($connessione,$sql);
            if (mysqli_num_rows($risultato) == 0)
            {
          //      echo(mysqli_error($connessione));
        //        echo(no);
            }
            else
            {
            $riga=mysqli_fetch_array($risultato);
            {
                $Clienti= $riga['tot'];
            }
            };



            $sql = "SELECT DataStipula,DataInizioFornitur FROM contratto WHERE CodCliente ='$CodiceCliente'";

            $risultato=mysqli_query($connessione,$sql);
            if (mysqli_num_rows($risultato) == 0)
            {
            //     echo(mysqli_error($connessione));
            //    echo(no);
            }
            else
            {
            $riga=mysqli_fetch_array($risultato);
            {
                $DataStipula= $riga['DataStipula'];
                $DataInizioFornitura=$riga['DataInizioFornitur'];
            }
            };

            $sql = "select KWh from lettura left join contatore on lettura.CodCont=contatore.CodCont left join contratto on contatore.codc=contratto.codc where contratto.codcliente='$CodiceCliente' ORDER BY DataLettura DESC"; // recupero l'ultima lettura per fare il calcolo
            
            $risultato=mysqli_query($connessione,$sql);
            if (mysqli_num_rows($risultato) == 0)
            {
                // echo(mysqli_error($connessione));
                //echo(no);
            }
            else
            {
            $riga=mysqli_fetch_array($risultato);
            {
                $Lettura= $riga['KWh'];

            }
            };

$sql = "select CodCont from contatore left join contratto ON contatore.codc=contratto.codc where contratto.codcliente='$CodiceCliente' ORDER BY CodCont DESC;";

            $risultato=mysqli_query($connessione,$sql);
            if (mysqli_num_rows($risultato) == 0)
            {
            //     echo(mysqli_error($connessione));
            //    echo(no);
            }
            else
            {
            $riga=mysqli_fetch_array($risultato);
            {
                $CodCont= $riga['CodCont'];

            }
            };

$sql = "select DataInstallazione from contatore left join contratto ON contatore.codc=contratto.codc where contratto.codcliente='$CodiceCliente' ORDER BY CodCont DESC;";

            $risultato=mysqli_query($connessione,$sql);
            if (mysqli_num_rows($risultato) == 0)
            {
             //    echo(mysqli_error($connessione));
            //    echo(no);
            }
            else
            {
            $riga=mysqli_fetch_array($risultato);
            {
                $DataInstallazione= $riga['DataInstallazione'];

            }
            };


?>
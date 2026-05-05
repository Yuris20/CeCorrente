<?php
require_once 'assets/php/sessioni.php';
require_once 'assets/php/ConnessioneDb.php';
require_once 'inc/_global/config.php';
require_once 'inc/backend/config.php';
$cb->l_header_style = 'classic';

require_once 'inc/_global/views/head_start.php';
require_once 'inc/_global/views/head_end.php';
require_once 'inc/_global/views/page_start.php';
?>
    <div class="content">
        <!-- Progress -->
        <h2 class="content-heading">
            Bolletta ciente creata
        </h2>
        <!-- Addresses -->
        <h2 class="content-heading">Dati cliente</h2>
        <div class="row row-deck gutters-tiny">
            <!-- Billing Address -->
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Dati Società</h3>
                    </div>
                    <div class="block-content">
                        <div class="font-size-lg text-black mb-5">C'è Corrente</div>
                        <address>
                            Via Roma, n.9<br>
                            81031, Aversa (CE)<br>
                            <i class="fa fa-envelope-o mr-5"></i> <a href="javascript:void(0)">bolletta@cecorrente.it</a>
                        </address>
                    </div>
                </div>
            </div>
            <!-- END Billing Address -->

            <!-- Shipping Address -->
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Indirizzo Fornitura</h3>
                    </div>
                    <div class="block-content">

                        <?php
                        $CocC=$_GET['CC'];

                        $sql = "SELECT cliente.CodCliente,cliente.IndirizzoFiscale,comuni.CAP,comuni.Comune,comuni.Provincia,cliente.Nome,cliente.Cognome,RagioneSociale FROM cliente INNER JOIN  comuni RIGHT JOIN contratto ON cliente.CodCliente=contratto.CodCliente WHERE contratto.CodC='$CocC' GROUP BY CodCliente";

                        $risultato = mysqli_query($connessione,$sql);
                        while($riga=mysqli_fetch_array($risultato))
                        {
                            echo " 
         
           <div class='font-size-lg text-black mb-5'>
           ".$riga['Nome']."
                 ".$riga['Cognome']."</div>
                 ".$riga['RagioneSociale']."<address>
                 ".$riga['IndirizzoFiscale']."<br>
                   ".$riga['CAP'].",
                   ".$riga['Comune']." (
                    ".$riga['Provincia'].")<br> 
                    Italia
                    </address>
                 
                
          ";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- END Shipping Address -->

        </div>
        <!-- END Addresses -->

        <!-- Products -->
        <?php

        // Calcolo Della Bolletta
        $CostiQuotaFissa=$_GET['CostF'];
        $ComponenteEnergia=$_GET['ComponE'];
        $QuotaFissa=$_GET['QF'];
        $QuotaPotenza=$_GET['CQP'];
        $CostiQuotaVariabile=$_GET['CQV'];

        //Dati per Query Di Inserimento Bolletta

        $DataEmissione=$_GET['DataE'];
        $DataScadenzaPagamento=$_GET['DSP'];

        $sql = "select KWh from lettura left join contatore ON lettura.CodCont=contatore.CodCont WHERE contatore.CodC='$CocC' ORDER BY DataLettura DESC;";

        $risultato=mysqli_query($connessione,$sql);

        if (mysqli_num_rows($risultato) == 0)
        {
            echo(mysqli_error($connessione));
        }
        else
        {
            $riga=mysqli_fetch_array($risultato);
            {
                $Consumi=$riga['KWh'];
            }
        }
        $ImportoFinale=$CostiQuotaFissa+$ComponenteEnergia+$QuotaFissa+$QuotaPotenza+$CostiQuotaVariabile+$Consumi
        ?>

        <h2 class="content-heading">Esempio Bolletta</h2>
        <div class="block block-rounded">
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped">
                        <thead>
                        <tr>
                            <th>Data Emissione</th>
                            <th class="text-center">Data Scadenza</th>
                            <th class="text-right">Consumati Kw</th>
                            <th class="text-right">Importo da pagare</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <?php echo($DataEmissione) ?>
                            </td>
                            <td class="text-center"><?php echo($DataScadenzaPagamento)?></td>
                            <td class="text-center"><?php echo($Consumi) ?></td>
                            <td class="text-right"><?php echo($ImportoFinale) ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Products -->

        <?php

        $sql = "INSERT INTO bolletta (DataEmissione,DataScadenza,KWConsumati,Importo,CodC) VALUES ('$DataEmissione','$DataScadenzaPagamento','$Consumi','$ImportoFinale','$CocC')";

        $risultato=mysqli_query($connessione,$sql);

        if(!$risultato)
        {
            echo("Bolletta non creata perchè ".mysqli_error($connessione));
        }
        else
        {
            echo("Bolletta creata con successo");
        }

        ?>

    </div>
    <!-- END Page Content -->

<?php require_once 'inc/_global/views/page_end.php'; ?>
<?php require_once 'inc/_global/views/footer_start.php'; ?>
<?php require_once 'inc/_global/views/footer_end.php'; ?>
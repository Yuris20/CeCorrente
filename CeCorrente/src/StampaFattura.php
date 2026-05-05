<?php require_once 'assets/php/sessioni.php'; ?>
<?php require_once 'inc/_global/config.php'; ?>
<?php require_once 'inc/backend/config.php'; ?>
<?php require_once 'inc/_global/views/head_start.php'; ?>
<?php require_once 'inc/_global/views/head_end.php'; ?>
<?php require_once 'inc/_global/views/page_start.php'; ?>
    <!-- Page Content -->
    <div class="content">
        <!-- Invoice -->
        <h2 class="content-heading d-print-none">
            Bolletta
        </h2>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Codice Bolletta</h3>
                <div class="block-options">
                    <!-- Print Page functionality is initialized in Helpers.print() -->
                    <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
                        <i class="si si-printer"></i> Stampa Bolletta
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <!-- Invoice Info -->
                <div class="row my-20">
                    <!-- Company Info -->
                    <div class="col-6">
                        <p class="h3">C'è Corrente</p>
                        <address>
                            Via Roma, n.9 <br>
                            81031, Aversa (CE) <br>
                            bolletta@cecorrente.it
                        </address>
                    </div>
                    <!-- END Company Info -->

                    <!-- Client Info -->
                    <div class="col-6 text-right">
                        <?php
                        $sql = "SELECT cliente.CodCliente,cliente.IndirizzoFiscale,comuni.CAP,comuni.Comune,comuni.Provincia,cliente.Nome,cliente.Cognome,RagioneSociale FROM cliente INNER JOIN comuni ON CodCliente= '$CodiceCliente' GROUP BY CodCliente;";

                        $risultato = mysqli_query($connessione,$sql);
                        while($riga=mysqli_fetch_array($risultato))
                        {
                            echo " 
         <address>
           <p class='h3'>Cliente N°".$riga['CodCliente']."</p>
           ".$riga['Nome']."
                 ".$riga['Cognome']."
                 ".$riga['RagioneSociale']."<br>
                 ".$riga['IndirizzoFiscale']."<br>
                   ".$riga['CAP'].",
                   ".$riga['Comune']." (
                    ".$riga['Provincia'].")<br>
                 
                
           </address>";
                        }
                        ?>
                    </div>
                    <!-- END Client Info -->
                </div>
                <!-- END Invoice Info -->

                <!-- Table -->
                <div class="table-responsive push">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 60px;">Codice Bolletta</th>
                            <th class="text-right" style="width: 120px;">Data Emissione</th>
                            <th class="text-right" style="width: 120px;">Data Scadenza</th>
                            <th class="text-right" style="width: 120px;">Kw Consumati</th>
                            <th class="text-right" style="width: 120px;">Importo</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $id=$_GET['id'];
                        $sql = "SELECT * FROM bolletta WHERE CodiceBolletta='$id'";

                        $risultato = mysqli_query($connessione,$sql);
                        while($riga=mysqli_fetch_array($risultato))
                        {
                            echo " 
         <tr>
                <td class='text-center'>".$riga['CodiceBolletta']."</td>
                <td class='text-right'>".$riga['DataEmissione']."</td>
                 <td class='text-right'>".$riga['DataScadenza']."</td>
                <td class='text-right'>".$riga['KWConsumati']."</td> 
                 <td class='text-right'>".$riga['Importo']."</td>
                
          </tr>";
                            $Importo=$riga['Importo'];
                        }
                        $sql = "SELECT importoSaldato FROM pagamento WHERE CodiceBolletta ='$id'";

                        $risultato=mysqli_query($connessione,$sql);
                        $riga=mysqli_fetch_array($risultato);
                        {
                            ($ImportoSaldato= $riga['importoSaldato']);
                        }

                        $tot=$ImportoSaldato-$Importo;
                        ?>
                        <tr>
                            <td colspan="4" class="font-w600 text-right">Pagato</td>
                            <td class="text-right"><?php echo($ImportoSaldato)?></td>
                        </tr>
                        <tr class="table-warning">
                            <td colspan="4" class="font-w700 text-uppercase text-right">Totale da pagare</td>
                            <td class="font-w700 text-right">€<?php echo($tot)?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- END Table -->

                <!-- Footer -->
                <p class="text-muted text-center">Grazie per averci scelto!</p>
                <!-- END Footer -->
            </div>
        </div>
        <!-- END Invoice -->
    </div>
    <!-- END Page Content -->

<?php require_once 'inc/_global/views/page_end.php'; ?>
<?php require_once 'inc/_global/views/footer_start.php'; ?>
<?php require_once 'inc/_global/views/footer_end.php'; ?>
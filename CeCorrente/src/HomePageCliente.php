<?php
// Utilizzo di require_once per evitare inclusioni multiple e conflitti
require_once 'assets/php/sessioni.php';
require_once 'assets/php/HomeQuery.php';
require_once 'inc/_global/config.php';
require_once 'inc/backend/config.php';
require_once 'inc/_global/views/head_start.php';
?>
<?php $cb->get_css('js/plugins/slick/slick.css'); ?>
<?php $cb->get_css('js/plugins/slick/slick-theme.css'); ?>

<?php require_once 'inc/_global/views/head_end.php'; ?>
<?php require_once 'inc/_global/views/page_start.php'; ?>

    <!-- Page Content -->
    <div class="content">
        <div class="row invisible" data-toggle="appear">
            <!-- Row #1: Statistiche Utente -->
            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-bag fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="<?php echo htmlspecialchars($CodiceCliente); ?>"></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Codice Utente</div>
                    </div>
                </a>
            </div>

            <!-- ... (Resto del contenuto della dashboard) ... -->

            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-users fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="<?php echo htmlspecialchars($Clienti); ?>"></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Clienti</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row invisible" data-toggle="appear">
            <!-- Row #2: Timeline Eventi -->
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Ultimi eventi</h3>
                    </div>
                    <div class="block-content">
                        <ul class="list list-activity">
                            <li>
                                <i class="si si-pencil text-info"></i>
                                <div class="font-w600">Data sottoscrizione offerta</div>
                                <div class="font-size-xs text-muted"><?php echo htmlspecialchars($DataStipula);?></div>
                            </li>
                            <!-- Altri item della timeline... -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabella Bollette -->
        <div class="block block-fx-shadow">
            <div class="block-content">
                <table class="table table-borderless table-striped">
                    <thead>
                    <tr>
                        <th style="width: 100px;">CodiceBolletta</th>
                        <th>Stato</th>
                        <th class="d-none d-sm-table-cell">Data Emissione</th>
                        <th class="d-none d-sm-table-cell">Kw Consumati</th>
                        <th class="text-right">Importo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Nota di sicurezza: Assicurarsi che $CodiceCliente sia sanitizzato nel file HomeQuery.php o sessioni.php
                    $sql = "SELECT b.CodiceBolletta, b.DataEmissione, b.KWConsumati, b.Importo 
                  FROM bolletta b 
                  INNER JOIN contratto c ON b.CodC = c.CodC 
                  WHERE c.CodCliente = '$CodiceCliente'";

                    $risultato = mysqli_query($connessione, $sql);
                    while($riga = mysqli_fetch_array($risultato)) {
                        $id = $riga['CodiceBolletta'];
                        echo "<tr>
                      <td><a class='font-w600' href='StampaFattura.php?id=".urlencode($id)."'>".htmlspecialchars($id)."</a></td>
                      <td><span class='badge badge-danger'>Non Pagata</span></td>
                      <td class='d-none d-sm-table-cell'>".htmlspecialchars($riga['DataEmissione'])."</td>
                      <td class='d-none d-sm-table-cell'>".htmlspecialchars($riga['KWConsumati'])."</td> 
                      <td class='text-right'>".htmlspecialchars($riga['Importo'])."</td>
                    </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once 'inc/_global/views/page_end.php'; ?>

    <!-- Onboarding Modal... -->

<?php require_once 'inc/_global/views/footer_start.php'; ?>

    <!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/chartjs/Chart.min.js'); ?>
<?php $cb->get_js('js/plugins/slick/slick.min.js'); ?>
<?php $cb->get_js('js/pages/be_pages_dashboard.min.js'); ?>

<?php require_once 'inc/_global/views/footer_end.php'; ?>
<?php require_once 'assets/php/sessioni.php'; ?>
<?php require_once 'inc/_global/config.php'; ?>
<?php require_once 'inc/backend/config.php'; ?>
<?php require_once 'inc/_global/views/head_start.php'; ?>
<?php require_once 'inc/_global/views/head_end.php'; ?>
<?php require_once 'inc/_global/views/page_start.php'; ?>

    <div class="content">

        <!-- PAGE HEADER -->
        <h2 class="content-heading d-print-none">Bolletta</h2>

        <div class="block">

            <div class="block-header block-header-default">
                <h3 class="block-title">Codice Bolletta</h3>

                <div class="block-options">

                    <button type="button"
                            class="btn-block-option"
                            onclick="Codebase.helpers('print-page');">
                        <i class="si si-printer"></i> Stampa Bolletta
                    </button>

                    <button type="button"
                            class="btn-block-option"
                            data-toggle="block-option"
                            data-action="fullscreen_toggle">
                    </button>

                </div>

            </div>

            <div class="block-content">

                <div class="row my-20">

                    <!-- COMPANY -->
                    <div class="col-6">
                        <p class="h3">C'è Corrente</p>
                        <address>
                            Via Roma, n.9 <br>
                            81031, Aversa (CE) <br>
                            bolletta@cecorrente.it
                        </address>
                    </div>

                    <!-- CLIENT -->
                    <div class="col-6 text-right">

                        <?php

                        $CodiceCliente = $_GET['CodiceCliente'] ?? '';

                        $sqlCliente = "
SELECT
    cliente.CodCliente,
    cliente.IndirizzoFiscale,
    comuni.CAP,
    comuni.Comune,
    comuni.Provincia,
    cliente.Nome,
    cliente.Cognome,
    cliente.RagioneSociale
FROM cliente
INNER JOIN comuni ON cliente.CodComune = comuni.CodComune
WHERE cliente.CodCliente = ?
";

                        $stmt = mysqli_prepare($connessione, $sqlCliente);
                        mysqli_stmt_bind_param($stmt, "s", $CodiceCliente);
                        mysqli_stmt_execute($stmt);

                        $risultato = mysqli_stmt_get_result($stmt);

                        while ($riga = mysqli_fetch_assoc($risultato)) {
                            ?>

                            <address>
                                <p class="h3">
                                    Cliente N° <?= htmlspecialchars($riga['CodCliente'] ?? '') ?>
                                </p>

                                <?= htmlspecialchars($riga['Nome'] ?? '') ?>
                                <?= htmlspecialchars($riga['Cognome'] ?? '') ?>
                                <?= htmlspecialchars($riga['RagioneSociale'] ?? '') ?><br>

                                <?= htmlspecialchars($riga['IndirizzoFiscale'] ?? '') ?><br>

                                <?= htmlspecialchars($riga['CAP'] ?? '') ?>,
                                <?= htmlspecialchars($riga['Comune'] ?? '') ?>
                                (<?= htmlspecialchars($riga['Provincia'] ?? '') ?>)
                            </address>

                        <?php } ?>

                    </div>

                </div>

                <!-- TABLE -->

                <div class="table-responsive push">

                    <table class="table table-bordered table-hover">

                        <thead>
                        <tr>
                            <th class="text-center">Codice Bolletta</th>
                            <th class="text-right">Data Emissione</th>
                            <th class="text-right">Data Scadenza</th>
                            <th class="text-right">Kw Consumati</th>
                            <th class="text-right">Importo</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php

                        $id = $_GET['id'] ?? '';

                        $sql = "
SELECT *
FROM bolletta
WHERE CodiceBolletta = ?
";

                        $stmt = mysqli_prepare($connessione, $sql);
                        mysqli_stmt_bind_param($stmt, "s", $id);
                        mysqli_stmt_execute($stmt);

                        $risultato = mysqli_stmt_get_result($stmt);

                        $Importo = 0;

                        while ($riga = mysqli_fetch_assoc($risultato)) {

                            $Importo = $riga['Importo'] ?? 0;

                            ?>

                            <tr>
                                <td class="text-center"><?= htmlspecialchars($riga['CodiceBolletta'] ?? '') ?></td>
                                <td class="text-right"><?= htmlspecialchars($riga['DataEmissione'] ?? '') ?></td>
                                <td class="text-right"><?= htmlspecialchars($riga['DataScadenza'] ?? '') ?></td>
                                <td class="text-right"><?= htmlspecialchars($riga['KWConsumati'] ?? '') ?></td>
                                <td class="text-right">€ <?= htmlspecialchars($riga['Importo'] ?? '') ?></td>
                            </tr>

                        <?php } ?>

                        <?php

                        $sql = "
SELECT importoSaldato
FROM pagamento
WHERE CodiceBolletta = ?
";

                        $stmt = mysqli_prepare($connessione, $sql);
                        mysqli_stmt_bind_param($stmt, "s", $id);
                        mysqli_stmt_execute($stmt);

                        $ris = mysqli_stmt_get_result($stmt);

                        $row = mysqli_fetch_assoc($ris);

                        $ImportoSaldato = $row['importoSaldato'] ?? 0;

                        $tot = $ImportoSaldato - $Importo;

                        ?>

                        <tr>
                            <td colspan="4" class="font-w600 text-right">Pagato</td>
                            <td class="text-right">€ <?= htmlspecialchars($ImportoSaldato) ?></td>
                        </tr>

                        <tr class="table-warning">
                            <td colspan="4" class="font-w700 text-uppercase text-right">Totale da pagare</td>
                            <td class="font-w700 text-right">€ <?= htmlspecialchars($tot) ?></td>
                        </tr>

                        </tbody>

                    </table>

                </div>

                <p class="text-muted text-center">Grazie per averci scelto!</p>

            </div>

        </div>

    </div>

<?php require_once 'inc/_global/views/page_end.php'; ?>
<?php require_once 'inc/_global/views/footer_start.php'; ?>
<?php require_once 'inc/_global/views/footer_end.php'; ?>
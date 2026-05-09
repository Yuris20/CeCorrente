<?php

require_once 'assets/php/sessioni.php';
require_once 'assets/php/ConnessioneDb.php';
require_once 'inc/_global/config.php';
require_once 'inc/backend/config.php';

$cb->l_header_style = 'classic';

require_once 'inc/_global/views/head_start.php';
require_once 'inc/_global/views/head_end.php';
require_once 'inc/_global/views/page_start.php';

$CocC = $_GET['CC'] ?? '';

$CostiQuotaFissa = $_GET['CostF'] ?? 0;
$ComponenteEnergia = $_GET['ComponE'] ?? 0;
$QuotaFissa = $_GET['QF'] ?? 0;
$QuotaPotenza = $_GET['CQP'] ?? 0;
$CostiQuotaVariabile = $_GET['CQV'] ?? 0;

$DataEmissione = $_GET['DataE'] ?? '';
$DataScadenzaPagamento = $_GET['DSP'] ?? '';

if (empty($CocC)) {
    die("Parametro CC non valido");
}

?>

    <div class="content">

        <h2 class="content-heading">Bolletta cliente creata</h2>

        <h2 class="content-heading">Dati cliente</h2>

        <div class="row row-deck gutters-tiny">

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
                            <a href="mailto:bolletta@cecorrente.it">bolletta@cecorrente.it</a>
                        </address>
                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <div class="block block-rounded">

                    <div class="block-header block-header-default">
                        <h3 class="block-title">Indirizzo Fornitura</h3>
                    </div>

                    <div class="block-content">

                        <?php
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
INNER JOIN contratto ON cliente.CodCliente = contratto.CodCliente
LEFT JOIN comuni ON cliente.CodComune = comuni.CodComune
WHERE contratto.CodC = ?
GROUP BY cliente.CodCliente
";

                        $stmtCliente = mysqli_prepare($connessione, $sqlCliente);
                        mysqli_stmt_bind_param($stmtCliente, "s", $CocC);
                        mysqli_stmt_execute($stmtCliente);

                        $risultatoCliente = mysqli_stmt_get_result($stmtCliente);

                        while ($riga = mysqli_fetch_assoc($risultatoCliente)) {
                            ?>

                            <div class="font-size-lg text-black mb-5">
                                <?= htmlspecialchars($riga['Nome'] ?? '') ?>
                                <?= htmlspecialchars($riga['Cognome'] ?? '') ?>
                            </div>

                            <?= htmlspecialchars($riga['RagioneSociale'] ?? '') ?>

                            <address>
                                <?= htmlspecialchars($riga['IndirizzoFiscale'] ?? '') ?><br>
                                <?= htmlspecialchars($riga['CAP'] ?? '') ?>,
                                <?= htmlspecialchars($riga['Comune'] ?? '') ?>
                                (<?= htmlspecialchars($riga['Provincia'] ?? '') ?>)
                                <br>
                                Italia
                            </address>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

        <?php
        $sqlConsumi = "
SELECT KWh
FROM lettura
LEFT JOIN contatore ON lettura.CodCont = contatore.CodCont
WHERE contatore.CodC = ?
ORDER BY DataLettura DESC
LIMIT 1
";

        $stmtConsumi = mysqli_prepare($connessione, $sqlConsumi);
        mysqli_stmt_bind_param($stmtConsumi, "s", $CocC);
        mysqli_stmt_execute($stmtConsumi);

        $risultatoConsumi = mysqli_stmt_get_result($stmtConsumi);

        $Consumi = 0;

        if ($riga = mysqli_fetch_assoc($risultatoConsumi)) {
            $Consumi = $riga['KWh'] ?? 0;
        }

        $ImportoFinale =
                $CostiQuotaFissa +
                $ComponenteEnergia +
                $QuotaFissa +
                $QuotaPotenza +
                $CostiQuotaVariabile +
                $Consumi;

        ?>

        <h2 class="content-heading">Esempio Bolletta</h2>

        <div class="block block-rounded">

            <div class="block-content">

                <div class="table-responsive">

                    <table class="table table-borderless table-striped">

                        <thead>
                        <tr>
                            <th>Data Emissione</th>
                            <th class="text-center">Scadenza</th>
                            <th class="text-center">Consumi KW</th>
                            <th class="text-right">Importo</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td><?= htmlspecialchars($DataEmissione ?? '') ?></td>
                            <td class="text-center"><?= htmlspecialchars($DataScadenzaPagamento ?? '') ?></td>
                            <td class="text-center"><?= htmlspecialchars($Consumi ?? 0) ?></td>
                            <td class="text-right">€ <?= htmlspecialchars(number_format($ImportoFinale, 2)) ?></td>
                        </tr>
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <?php

        $sqlInsert = "
INSERT INTO bolletta
(DataEmissione, DataScadenza, KWConsumati, Importo, CodC)
VALUES (?, ?, ?, ?, ?)
";

        $stmtInsert = mysqli_prepare($connessione, $sqlInsert);

        mysqli_stmt_bind_param(
                $stmtInsert,
                "ssdds",
                $DataEmissione,
                $DataScadenzaPagamento,
                $Consumi,
                $ImportoFinale,
                $CocC
        );

        $ok = mysqli_stmt_execute($stmtInsert);

        ?>

        <div class="alert alert-info">
            <?= $ok ? "Bolletta creata con successo" : "Errore creazione bolletta" ?>
        </div>

    </div>

<?php require_once 'inc/_global/views/page_end.php'; ?>
<?php require_once 'inc/_global/views/footer_start.php'; ?>
<?php require_once 'inc/_global/views/footer_end.php'; ?>
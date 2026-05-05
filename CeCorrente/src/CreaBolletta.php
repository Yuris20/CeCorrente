<?php
require_once 'assets/php/sessioni.php';
require_once 'inc/_global/config.php';
require_once 'inc/backend/config.php';
require_once 'inc/_global/views/head_start.php';
require_once 'inc/_global/views/head_end.php';
require_once 'inc/_global/views/page_start.php';
?>
<!-- Page Content -->
<div class="content">
    <!-- Hero -->
    <div class="block block-rounded">
        <div class="block-content block-content-full bg-pattern" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/various/bg-pattern-inverse.png');">
            <div class="py-20 text-center">
                <h2 class="font-w700 text-black mb-10">
                    Crea Bolletta
                </h2>
                <h3 class="h5 text-muted mb-0">
                    Attenzione !
                </h3>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <form action="InviaFattura.php" method="get">
        <!-- Settings -->
        <h2 class="h4 font-w300 mt-50">Creatore di bolletta</h2>
        <div class="block">
            <div class="block-content">
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Valori da cambiare in base al cliente Privato/Azienda
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="form-group">
                            <label for="CostF">Costi quota Fissa</label>
                            <input type="text" class="form-control form-control-lg" id="CostF" name="CostF" placeholder="Per ogni mese" value="4.30">
                        </div>
                        <div class="form-group">
                            <label for="ComponE">Quota Energia</label>
                            <input type="text" class="form-control form-control-lg" id="ComponE" name="ComponE" placeholder="Componente energia" value="0.31">
                        </div>
                        <div class="form-group">
                            <label for="QF">Quota Fissa</label>
                            <input type="text" class="form-control form-control-lg" id="QF" name="QF" placeholder="Quota Fissa" value="1.62">
                        </div>
                        <div class="form-group">
                            <label for="CQP">Costi Quota Potenza</label>
                            <input type="text" class="form-control form-control-lg" id="CQP" name="CQP" placeholder="Per ogni mese" value="0.083">
                        </div>
                        <div class="form-group">
                            <label for="CQV">Costi Quota Variabile</label>
                            <input type="text" class="form-control form-control-lg" id="CQV" name="CQV" placeholder="Costi quota variabile" value="1.62">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-building fa-fw mr-5 text-muted"></i> Dati per la fatturazione
                </h3>
            </div>
            <div class="block-content">
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Si prega di inserire tutti i campi
                        </p>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="CC">Codice Contratto</label>
                                    <input type="number" class="form-control form-control-lg" id="CC" name="CC" value="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="DataE">Data Emissione</label>
                            <input type="date" class="form-control form-control-lg" id="DataE" name="DataE" required>
                        </div>
                        <div class="form-group">
                            <label for="DSP">Data Scadenza Pagamento</label>
                            <input type="date" class="form-control form-control-lg" id="DSP" name="DSP" required>
                        </div>
                        <div class="form-group">
                            <label for="PC">Prezzo Corrente</label>
                            <input type="number" class="form-control form-control-lg" id="PC" name="PC" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-alt-primary">Crea Bolletta</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Settings -->
    </form>

</div>
<!-- END Page Content -->

<?php require_once 'inc/_global/views/page_end.php'; ?>
<?php require_once 'inc/_global/views/footer_start.php'; ?>
<?php require_once 'inc/_global/views/footer_end.php'; ?>

<?php
require_once 'assets/php/sessioni.php';
require_once 'inc/_global/config.php';
require_once 'inc/backend/config.php';

$cb->l_header_style = 'modern';

require_once 'inc/_global/views/head_start.php';
?>
<?php require_once 'inc/_global/views/head_end.php'; ?>
<?php require_once 'inc/_global/views/page_start.php'; ?>

<div class="content">
    <!-- User Profile -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-user-circle mr-5 text-muted"></i> Profilo Utente
            </h3>
        </div>

        <div class="block-content">
            <form action="<?php echo $cb->assets_folder; ?>/php/CreaContratto.php" method="GET">
                <div class="row items-push">
                    <div class="col-lg-3">
                        <p class="text-muted">
                            Inserisci le informazioni del cliente
                        </p>
                    </div>

                    <div class="col-lg-7 offset-lg-1">

                        <!-- Codice Cliente -->
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="CodiceC">Codice Cliente</label>
                                <input type="text" id="CodiceC" class="form-control form-control-lg"
                                       name="CodiceC" placeholder="Inserisci il codice cliente" required>
                            </div>
                        </div>

                        <!-- Data Stipula Offerta -->
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="DataOfferta">Data Stipula Offerta</label>
                                <input type="date" id="DataOfferta" class="js-flatpickr form-control bg-white"
                                       name="DataOfferta" placeholder="d-m-Y" data-date-format="d-m-Y" required>
                            </div>
                        </div>

                        <!-- Data Inizio Fornitura -->
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="DataInizioFornitura">Data Inizio Fornitura</label>
                                <input type="date" id="DataInizioFornitura" class="form-control form-control-lg"
                                       name="DataInizioFornitura">
                            </div>
                        </div>

                        <!-- KW Max -->
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="KWMax">KW Max</label>
                                <input type="number" id="KWMax" class="form-control form-control-lg"
                                       name="KWMax" placeholder="Inserisci i KW del contatore" value="3.0" required>
                            </div>
                        </div>

                        <!-- Indirizzo Fornitura -->
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="IndirizzoFornitura">Indirizzo Fornitura</label>
                                <input type="text" id="IndirizzoFornitura" class="form-control form-control-lg"
                                       name="IndirizzoFornitura" placeholder="Inserisci indirizzo" required>
                            </div>
                        </div>

                        <!-- CAP -->
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="CAP">CAP</label>
                                <input type="number" id="CAP" class="form-control form-control-lg"
                                       name="CAP" placeholder="80013" required>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-primary">Crea contratto</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END User Profile -->

</div>

<?php require_once 'inc/_global/views/page_end.php'; ?>
<?php require_once 'inc/_global/views/footer_start.php'; ?>
<?php require_once 'inc/_global/views/footer_end.php'; ?>

<?php
require_once 'assets/php/sessioni.php';
require_once 'inc/_global/config.php';
require_once 'inc/_global/views/head_start.php';
?>

<?php require_once 'inc/_global/views/head_end.php'; ?>
<?php require_once 'inc/_global/views/page_start.php'; ?>

    <div class="bg-body-light hero-bubbles">

        <div class="row no-gutters justify-content-center">
            <div class="hero-static col-lg-7">
                <div class="content content-full overflow-hidden">

                    <div class="py-50 text-center">

                        <h1 class="h4 font-w700 mt-30 mb-10">
                            Ciao Matricola <?php echo $_SESSION['MatricolaD'] ?? ''; ?>
                        </h1>

                    </div>

                    <form action="assets/php/Lettura-CreazioneCont.php" method="POST">

                        <div class="block block-rounded block-shadow">

                            <!-- INSTALLAZIONE -->
                            <div class="block-content block-content-full">

                                <h2>Installazione contatore</h2>

                                <input type="text" name="ModCont" class="form-control form-control-lg" placeholder="Modello">

                                <br>

                                <input type="number" name="CodiceContr" class="form-control form-control-lg" placeholder="Codice contratto">

                                <input type="hidden" name="azione" value="installazione">

                                <br>

                                <button type="submit" class="btn btn-success">
                                    Installa contatore
                                </button>

                            </div>

                            <hr>

                            <!-- LETTURA -->
                            <div class="block-content block-content-full">

                                <h2>Lettura contatore</h2>

                                <input type="text" name="CodC" class="form-control form-control-lg" placeholder="Codice contatore">

                                <br>

                                <input type="text" name="KWC" class="form-control form-control-lg" placeholder="KWh consumati">

                                <input type="hidden" name="azione" value="lettura">

                                <br>

                                <button type="submit" class="btn btn-primary">
                                    Inserisci lettura
                                </button>

                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

<?php require_once 'inc/_global/views/page_end.php'; ?>
<?php require_once 'inc/_global/views/footer_start.php'; ?>

<?php $cb->get_js('js/pages/op_installation.min.js'); ?>

<?php require_once 'inc/_global/views/footer_end.php'; ?>
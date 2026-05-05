<?php
require_once 'assets/php/sessioni.php';
require_once 'inc/_global/config.php';
require_once 'inc/_global/views/head_start.php';
require_once 'inc/_global/views/head_end.php';
require_once 'inc/_global/views/page_start.php';
?>

<div class="bg-body-light bg-pattern" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/various/bg-pattern-inverse.png');">
    <div class="row no-gutters justify-content-center">
        <div class="hero-static col-lg-7">
            <div class="content content-full overflow-hidden">

                <!-- Header -->
                <div class="py-50 text-center">
                    <a class="link-effect font-w700" href="HomeDipendenti.php">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-primary-dark">C'è </span>
                        <span class="font-size-xl">Corrente</span>
                    </a>
                    <h1 class="h4 font-w700 mt-30 mb-10">Home Page Dipendenti</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Ciao questi sono tutti i tuoi strumenti a disposizione</h2>
                </div>
                <!-- END Header -->

                <!-- Status -->
                <div class="row no-gutters d-flex justify-content-center">
                    <div class="col-md-10 col-xl-7">

                        <div class="d-flex justify-content-between">
                            <a class="btn btn-hero btn-alt-secondary" href="../src/assets/php/Esci.php">
                                <i class="fa fa-arrow-left mr-5"></i> Esci
                            </a>
                        </div>

                        <hr>

                        <div class="alert alert-danger d-flex align-items-center justify-content-between mb-15" role="alert">
                            <div class="flex-fill mr-10">
                                <p class="mb-0">Attenzione il sito è ancora in sviluppo !</p>
                            </div>
                            <div class="flex-00-auto">
                                <i class="fa fa-fw fa-2x fa-bug"></i>
                            </div>
                        </div>

                        <ul class="list-group push">
                            <a class="list-group-item d-flex justify-content-between align-items-center font-w600" href="LetturaContatore.php">
                                Lettura Contatore
                                <span class="badge badge-pill badge-success">Funzionante</span>
                            </a>

                            <a class="list-group-item d-flex justify-content-between align-items-center font-w600" href="CreaOffertaCliente.php">
                                Contrattualizzazione cliente
                                <span class="badge badge-pill badge-success">Funzionante</span>
                            </a>

                            <a class="list-group-item d-flex justify-content-between align-items-center font-w600" href="CreaBolletta.php">
                                Crea Bolletta
                                <span class="badge badge-pill badge-success">Funzionante</span>
                            </a>

                            <li class="list-group-item d-flex justify-content-between align-items-center font-w600">
                                Ricerca Fattura
                                <span class="badge badge-pill badge-danger">Non Funzionante</span>
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- END Status -->

            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php require_once 'inc/_global/views/page_end.php'; ?>
<?php require_once 'inc/_global/views/footer_start.php'; ?>
<?php require_once 'inc/_global/views/footer_end.php'; ?>

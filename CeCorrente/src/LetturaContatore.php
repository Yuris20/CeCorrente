<?php
require 'assets/php/sessioni.php';
require 'inc/_global/config.php';
require 'inc/_global/views/head_start.php';
?>

<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

    <div class="bg-body-light hero-bubbles">
        <span class="hero-bubble wh-40 pos-t-20 pos-l-10 bg-primary"></span>
        <span class="hero-bubble wh-30 pos-t-20 pos-l-80 bg-success"></span>
        <span class="hero-bubble wh-20 pos-t-40 pos-l-25 bg-corporate"></span>
        <span class="hero-bubble wh-40 pos-t-30 pos-l-90 bg-pulse"></span>
        <span class="hero-bubble wh-30 pos-t-40 pos-l-20 bg-danger"></span>
        <span class="hero-bubble wh-30 pos-t-60 pos-l-25 bg-warning"></span>
        <span class="hero-bubble wh-30 pos-t-60 pos-l-80 bg-info"></span>
        <span class="hero-bubble wh-40 pos-t-75 pos-l-70 bg-flat"></span>
        <span class="hero-bubble wh-40 pos-t-75 pos-l-10 bg-earth"></span>
        <span class="hero-bubble wh-30 pos-t-90 pos-l-90 bg-elegance"></span>
        <div class="row no-gutters justify-content-center">
            <div class="hero-static col-lg-7">
                <div class="content content-full overflow-hidden">
                    <!-- Header -->
                    <div class="py-50 text-center">
                        <a class="link-effect font-w700" href="index.php">
                            <i class="si si-fire"></i>
                            <span class="font-size-xl text-primary-dark">C'è </span><span class="font-size-xl">Corrente</span>
                        </a>
                        <h1 class="h4 font-w700 mt-30 mb-10">Ciao Matricola <?php echo($matricolaD)?></h1>
                        <h2 class="h5 font-w400 text-muted mb-0">Questa è la pagina per segnalare l'installazione di un contatore oppure l'inserimento  dei Kwh Consumati</h2>
                        <h2 class="h5 font-w400 text-muted mb-0">

                            <?php echo($link ='<a id="backlink" href="'. $_SERVER['HTTP_REFERER'] . '">Se vuoi tornare indietro clicca qui  </a>'); ?>

                        </h2>

                    </div>
                    <!-- END Header -->


                    <form class="js-validation-installation" action="<?php echo $cb->assets_folder; ?>/php/Lettura-CreazioneCont.php" method="GET">
                        <div class="block block-rounded block-shadow">
                            <!-- Database section -->
                            <div class="block-content block-content-full">
                                <h2 class="content-heading text-black pt-20">Installazione contatore</h2>
                                <div class="row items-push">
                                    <div class="col-lg-4">
                                        <p class="text-muted">
                                            Perfavore iniserisci i dati richiesti per una corretta installazione del contatore.
                                        </p>
                                    </div>
                                    <div class="col-lg-6 offset-lg-1">
                                        <div class="form-group">
                                            <label for="install-db-name">Modello Contatore</label>
                                            <input type="text" class="form-control form-control-lg"  name="ModCont" placeholder="Supremo">
                                        </div>
                                        <div class="form-group">
                                            <label for="install-db-prefix">Codice Contratto</label>
                                            <input type="number" class="form-control form-control-lg" name="CodiceContr" placeholder="38081">
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="form-group row">
                                        <div class="col-lg-6 offset-lg-5">
                                            <button type="submit" class="btn btn-hero btn-alt-success min-width-150 mb-10">
                                                <i class="fa fa-arrow-right mr-10"></i> Installa contatore
                                            </button>
                                            <button type="reset" class="btn btn-hero btn-alt-secondary min-width-150 mb-10">
                                                <i class="fa fa-repeat mr-10"></i> Cancella tutto
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- END Database section -->

                            <!-- Administrator section -->
                            <div class="block-content block-content-full">
                                <h2 class="content-heading text-black pt-20">Lettura Contatore</h2>
                                <div class="row items-push">
                                    <div class="col-lg-4">
                                        <p class="text-muted">
                                            Perfavore inserisci il il codice del contatore.
                                        </p>
                                    </div>
                                    <div class="col-lg-6 offset-lg-1">
                                        <div class="form-group">
                                            <label for="install-admin-email">Codice Contatore</label>
                                            <input type="text" class="form-control form-control-lg"  name="CodC">
                                        </div>
                                        <div class="form-group">
                                            <label for="install-admin-email">Khw consumati</label>
                                            <input type="text" class="form-control form-control-lg" name="KWC">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Administrator section -->

                            <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-lg-6 offset-lg-5">
                                        <button type="submit" class="btn btn-hero btn-alt-success min-width-150 mb-10">
                                            <i class="fa fa-arrow-right mr-10"></i> Inserisci lettura
                                        </button>
                                        <button type="reset" class="btn btn-hero btn-alt-secondary min-width-150 mb-10">
                                            <i class="fa fa-repeat mr-10"></i> Cancella tutto
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control form-control-lg"  name="MD" value="<?php echo($matricolaD)?>">
                    </form>
                    <!-- END Installation Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

    <!-- Page JS Code -->
<?php $cb->get_js('js/pages/op_installation.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>
<?php require_once 'inc/_global/config.php'; ?>
<?php require_once 'inc/_global/views/head_start.php'; ?>
<?php require_once 'inc/_global/views/head_end.php'; ?>
<?php require_once 'inc/_global/views/page_start.php'; ?>

<div class="bg-body-dark bg-pattern" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/various/bg-pattern-inverse.png');">
    <div class="row mx-0 justify-content-center">
        <div class="hero-static col-lg-6 col-xl-4">
            <div class="content content-full overflow-hidden">

                <!-- Header -->
                <div class="py-30 text-center">
                    <a class="link-effect font-w700" href="index.php">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-primary-dark">C'è</span><span class="font-size-xl">Corrente</span>
                    </a>
                    <h1 class="h4 font-w700 mt-30 mb-10">Registrati</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Siamo felici di averti a bordo!</h2>
                </div>
                <!-- END Header -->

                <div class="block-header bg-gd-emerald">
                    <h3 class="block-title">Perfavore inserisci i campi richiesti</h3>
                </div>

                <div class="js-wizard-validation-material block">

                    <!-- Step Tabs -->
                    <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" role="tab" data-toggle="tab" href="#step1">1. Indirizzo</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" role="tab" data-toggle="tab" href="#step2">2. Anagrafica</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" role="tab" data-toggle="tab" href="#step3">3. Privato</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" role="tab" data-toggle="tab" href="#step4">4. Azienda</a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->

                    <!-- Form -->
                    <form class="js-wizard-validation-material-form" action="<?php echo $cb->assets_folder; ?>/php/Registrati.php" method="post">

                        <div class="block-content block-content-full tab-content" style="min-height: 260px;">

                            <!-- STEP 1 -->
                            <div class="tab-pane active" id="step1" role="tabpanel">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" id="IndirizzoFiscale" type="text" name="IndirizzoFiscale">
                                        <label for="IndirizzoFiscale">Indirizzo Fiscale</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" id="CAP" type="text" name="cap" required>
                                        <label for="CAP">CAP</label>
                                    </div>
                                </div>
                            </div>
                            <!-- END STEP 1 -->

                            <!-- STEP 2 -->
                            <div class="tab-pane" id="step2" role="tabpanel">
                                <div class="form-group">
                                    <label for="signup-email">Email-Pec</label>
                                    <input type="email" id="signup-email" class="form-control" name="email" placeholder="es: yurisan@cecorrente.kit" required>
                                </div>

                                <div class="form-group">
                                    <label for="Telefono">Telefono</label>
                                    <input type="tel" id="Telefono" class="js-masked-phone form-control js-masked-enabled" name="NumeroDiTel" placeholder="(999) 999-9999" required>
                                </div>

                                <div class="form-group">
                                    <label for="signup-password">Password</label>
                                    <input type="password" id="signup-password" class="form-control" name="password" placeholder="********" required>
                                </div>
                            </div>
                            <!-- END STEP 2 -->

                            <!-- STEP 3 -->
                            <div class="tab-pane" id="step3" role="tabpanel">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" id="Nome" type="text" name="Nome">
                                        <label for="Nome">Nome</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" id="Cognome" type="text" name="Cognome">
                                        <label for="Cognome">Cognome</label>
                                    </div>
                                </div>
                            </div>
                            <!-- END STEP 3 -->

                            <!-- STEP 4 -->
                            <div class="tab-pane" id="step4" role="tabpanel">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" id="RagioneSociale" type="text" name="RagioneSociale">
                                        <label for="RagioneSociale">Ragione Sociale</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" id="NomeReferente" type="text" name="NomeReferente">
                                        <label for="NomeReferente">Nome Referente</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" id="CognomeRef" type="text" name="CognomeRef">
                                        <label for="CognomeRef">Cognome Referente</label>
                                    </div>
                                </div>
                            </div>
                            <!-- END STEP 4 -->

                        </div>

                        <!-- Navigation -->
                        <div class="block-content block-content-sm block-content-full bg-body-light">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-alt-secondary" data-wizard="prev">
                                        <i class="fa fa-angle-left mr-5"></i> Indietro
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-alt-secondary" data-wizard="next">
                                        Avanti <i class="fa fa-angle-right ml-5"></i>
                                    </button>
                                    <button type="submit" class="btn btn-alt-primary d-none" data-wizard="finish">
                                        <i class="fa fa-check mr-5"></i> Registrati
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php require_once 'inc/_global/views/page_end.php'; ?>
<?php require_once 'inc/_global/views/footer_start.php'; ?>

<?php $cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $cb->get_js('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js'); ?>
<?php $cb->get_js('js/plugins/jquery-validation/additional-methods.js'); ?>
<?php $cb->get_js('js/plugins/jquery-auto-complete/jquery.auto-complete.min.js'); ?>

<?php $cb->get_js('js/pages/op_auth_signup.min.js'); ?>
<?php $cb->get_js('js/pages/be_forms_wizard.min.js'); ?>
<?php $cb->get_js('js/pages/be_forms_plugins.min.js'); ?>

<?php require_once 'inc/_global/views/footer_end.php'; ?>

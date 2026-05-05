<?php require_once 'inc/_global/config.php'; ?>
<?php require_once 'inc/_global/views/head_start.php'; ?>
<?php require_once 'inc/_global/views/head_end.php'; ?>
<?php require_once 'inc/_global/views/page_start.php'; ?>

<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/photos/photo34@2x.jpg');">
    <div class="row mx-0 bg-black-op">

        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h3 font-w600 text-white">
                    Pagina accesso dipendenti.
                </p>
                <p class="font-italic text-white-op">
                    C'è Corrente &copy; <span class="js-year-copy"></span>
                </p>
            </div>
        </div>

        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible"
             data-toggle="appear" data-class="animated fadeInRight">
            <div class="content content-full">

                <!-- Header -->
                <div class="px-30 py-10">
                    <a class="link-effect font-w700" href="index.php">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-primary-dark">C'è </span>
                        <span class="font-size-xl">Corrente</span>
                    </a>
                    <h1 class="h3 font-w700 mt-30 mb-10">Ciao, sei nella pagina login dei dipendenti</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Perfavore inserisci le credenziali</h2>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <form class="js-validation-signin px-30"
                      action="<?php echo $cb->assets_folder; ?>/php/controlloDip.php"
                      method="post">

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" name="matricolaD" required>
                                <label for="login-username">MatricolaD</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="password" class="form-control" name="password" required>
                                <label for="login-password">Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                            <i class="si si-login mr-10"></i> Accedi
                        </button>
                    </div>

                </form>
                <!-- END Sign In Form -->

            </div>
        </div>

    </div>
</div>
<!-- END Page Content -->

<?php require_once 'inc/_global/views/page_end.php'; ?>
<?php require_once 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php require_once $cb->assets_folder . '/js/plugins/jquery-validation/jquery.validate.min.js'; ?>

<!-- Page JS Code -->
<?php require_once $cb->assets_folder . '/js/pages/op_auth_signin.min.js'; ?>

<?php require_once 'inc/_global/views/footer_end.php'; ?>

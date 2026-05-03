<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Page Content -->
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
          <h1 class="h4 font-w700 mt-30 mb-10">Login</h1>
          <h2 class="h5 font-w400 text-muted mb-0">Siamo felici di riaverti!</h2>
        </div>
        <!-- END Header -->

        <!-- Sign In Form -->
       
        <form class="js-validation-signin" action="<?php echo $cb->assets_folder; ?>/php/controlli.php" method="post">
          <div class="block block-themed block-rounded block-shadow">
            <div class="block-header bg-gd-dusk">
              <h3 class="block-title">Perfavore inserisci le credenziali</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option">
                  <i class="si si-wrench"></i>
                </button>
              </div>
            </div>
            <div class="block-content">
              <div class="form-group row">
                <div class="col-12">
                  <label for="login-username">CodiceCliente</label>
                  <input type="text" class="form-control" name="codiceCliente" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12">
                  <label for="login-password">Password</label>
                  <input type="password" class="form-control" name="password" required>
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-sm-6 text-sm-right push">
                  <button type="submit" class="btn btn-alt-primary">
                    <i class="si si-login mr-10"></i> Accedi
                  </button>
                </div>
              </div>
            </div>
            <div class="block-content bg-body-light">
              <div class="form-group text-center">
                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="Registrati.php">
                  <i class="fa fa-plus mr-5"></i> Crea un'account
                </a>
              </div>
            </div>
          </div>
        </form>
        <!-- END Sign In Form -->
      </div>
    </div>
  </div>
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php  $cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>

<!-- Page JS Code -->
<?php $cb->get_js('js/pages/op_auth_signin.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>
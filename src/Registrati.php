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
          <h1 class="h4 font-w700 mt-30 mb-10">Registrati</h1>
          <h2 class="h5 font-w400 text-muted mb-0">Siamo felici di averti a bordo!</h2>
        </div>
        <!-- END Header -->

       
      <div class="block-header bg-gd-emerald">
              <h3 class="block-title">Perfavore inserisci i campi richiesti</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option">
                  <i class="si si-wrench"></i>
                </button>
              </div>
            </div>
      <div class="js-wizard-validation-material block">
        <!-- Step Tabs -->
        <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" href="#wizard-validation-material-step1" data-toggle="tab">1. Indirizzo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#wizard-validation-material-step2" data-toggle="tab">2. Anagrafica</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#wizard-validation-material-step3" data-toggle="tab">3. Privato</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#wizard-validation-material-step4" data-toggle="tab">4. Azienda</a>
          </li>
        </ul>
        <!-- END Step Tabs -->

        <!-- Form -->
        <form class="js-wizard-validation-material-form" action="<?php echo $cb->assets_folder; ?>/php/Registrati.php" method="post">
         
         
          <!-- Steps Content -->
          <div class="block-content block-content-full tab-content" style="min-height: 267px;">
            <!-- Step 1 -->
            <div class="tab-pane active" id="wizard-validation-material-step1" role="tabpanel">
              <div class="form-group">
                <div class="form-material floating">
                  <input class="form-control" type="text" name="IndirizzoFiscale" >
                  <label for="wizard-validation-material-firstname">Indirizzo Fiscale</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-material floating">
                  <input class="form-control" type="text" name="cap" required>
                  <label for="wizard-validation-material-firstname">CAP</label>
                </div>
              </div>
            </div>
            <!-- END Step 1 -->
in caso non faccia scrivere l'indirizzo scrivete prima il CAP
            <!-- Step 2 -->
            <div class="tab-pane" id="wizard-validation-material-step2" role="tabpanel">
              <div class="form-group row">
                <div class="col-12">
                  <label for="signup-email">Email-Pec</label>
                  <input type="email" class="form-control" name="email" placeholder="es: yurisan@cecorrente.kit" required>
                </div>
              </div>    
            <div class="form-group row">
             <div class="col-12">
                  <label class="form-label" for="example-masked-phone">Telefono</label>
                  <input type="tel" class="js-masked-phone form-control js-masked-enabled"  name="NumeroDiTel" placeholder="(999) 999-9999" required>
             </div>
            </div>
         <div class="form-group row">
                <div class="col-12">
                  <label for="signup-password">Password</label>
                  <input type="password" class="form-control"  name="password" placeholder="********" required>
                </div>
              </div>
            </div>
            <!-- END Step 2 -->

            <!-- Step 3 -->
            <div class="tab-pane" id="wizard-validation-material-step3" role="tabpanel">
              <div class="form-group">
                <div class="form-material floating">
                  <input class="form-control" type="text" name="Nome">
                  <label for="wizard-validation-material-location">Nome</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-material floating">
                  <input class="form-control" type="text" name="Cognome">
                  <label for="wizard-validation-material-location">Cognome</label>
                </div>
              </div>
              
            </div>
            <!-- END Step 3 -->
            
                 <!-- Step 4 -->
            <div class="tab-pane" id="wizard-validation-material-step4" role="tabpanel">
              <div class="form-group">
                <div class="form-material floating">
                  <input class="form-control" type="text" name="RagioneSociale">
                  <label for="wizard-validation-material-location">Ragione sociale</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-material floating">
                  <input class="form-control" type="text" name="NomeReferente">
                  <label for="wizard-validation-material-location">Nome Referente</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-material floating">
                  <input class="form-control" type="text" name="CognomeRef">
                  <label for="wizard-validation-material-location">Cognome Referente</label>
                </div>
              </div>
              
            </div>
            <!-- END Step 4 -->
            
            
          </div>
          <!-- END Steps Content -->

          <!-- Steps Navigation -->
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
          <!-- END Steps Navigation -->
        </form>
        <!-- END Form -->
      </div>
      <!-- END Validation Wizard 2 -->
    </div>
       
        <!-- END Sign Up Form -->
      </div>
    </div>
  </div>

<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>

<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $cb->get_js('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js'); ?>
<?php $cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $cb->get_js('js/plugins/jquery-validation/additional-methods.js'); ?>
<?php $cb->get_js('js/plugins/jquery-auto-complete/jquery.auto-complete.min.js'); ?>


<!-- Page JS Code -->
<?php $cb->get_js('js/pages/op_auth_signup.min.js'); ?>
<?php $cb->get_js('js/pages/be_forms_wizard.min.js'); ?>
<?php $cb->get_js('js/pages/be_forms_plugins.min.js'); ?>


<?php require 'inc/_global/views/footer_end.php'; ?>
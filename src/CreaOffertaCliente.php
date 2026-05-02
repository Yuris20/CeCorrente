<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php
// Configurazione tema
$cb->l_header_style = 'modern';
?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'assets/php/sessioni.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Page Content -->
<!-- User Info -->
<!-- END User Info -->

<!-- Main Content -->
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
           <div class="form-group row">
              <div class="col-12">
                <label>CodiceCliente</label>
                <input type="text" class="form-control form-control-lg" name="CodiceC" placeholder="inserisci il codice cliente" required>
              </div>
            </div>
            <div class="form-group row">
            </div>
               <div class="form-group row">
             <div class="col-12">
                <label for="example-flatpickr-custom">Data Stipula Offerta</label>
                <input type="date" class="js-flatpickr form-control bg-white" name="DataOfferta" placeholder="d-m-Y" data-date-format="d-m-Y" required>
              </div>
            </div>
            
            <div class="form-group row">
              <div class="col-12">
                <label for="profile-settings-name">Data Inizio Forniutra</label>
                <input type="date" class="form-control form-control-lg" name="DataInizioFornitura">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <label for="profile-settings-name">KWMax</label>
                <input type="number" class="form-control form-control-lg" name="KWMax" placeholder="Inserisci i KW del contatore" value="3.0" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <label for="profile-settings-email">Indirizzo Fornitura</label>
                <input type="text" class="form-control form-control-lg"  name="IndirizzoFornitura" placeholder="Inserisci indirizzo" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <label for="profile-settings-email">Cap</label>
                <input type="number" class="form-control form-control-lg" name="CAP" placeholder="80013" required>
              </div>
            </div>
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

  <!-- 
  
  <div class="block">
    <div class="block-header block-header-default">
      <h3 class="block-title">
        <i class="fa fa-asterisk mr-5 text-muted"></i> Sostituzione contatore
      </h3>
    </div>
    <div class="block-content">
      <form action="" method="post" onsubmit="return false;">
        <div class="row items-push">
          <div class="col-lg-3">
            <p class="text-muted">
             Inserisci le informazioni per il contatore
            </p>
          </div>
          <div class="col-lg-7 offset-lg-1">
            <div class="form-group row">
              <div class="col-12">
                <label for="profile-settings-password">Nome Modello contatore</label>
                <input type="text" class="form-control form-control-lg" name="Modello" placeholder="Inserisci il modello del contatore" value="Supremo" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <label for="example-flatpickr-custom">Data Installazione</label>
                <input type="date" class="js-flatpickr form-control bg-white" name="DataInstall" placeholder="d-m-Y" data-date-format="d-m-Y" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <button type="submit" class="btn btn-alt-primary">Inserisci contatore</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  -->
  <!-- END Change Password -->

</div>
<!-- END Main Content -->
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>
<?php require 'inc/_global/views/footer_end.php'; ?>
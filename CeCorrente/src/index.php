<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/landing/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-white bg-pattern" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/various/bg-pattern-inverse.png');">
  <div class="d-flex align-items-center">
    <div class="content content-full">
      <div class="row no-gutters w-100 py-100 overflow-hidden">
        <div class="col-md-5 py-30 d-flex align-items-center invisible" data-toggle="appear">
          <div class="text-center text-md-left">
            <h1 class="font-w600 font-size-h2 mb-20">
              Progetto C'è Corrente
            </h1>
            <p class="font-size-lg nice-copy text-muted mb-30">
              Il progetto permette la creazione di un'account con le seguenti funzionalità:
           <br>        
              1)I clienti visualizzano le varie bollette
              <br>   
              2)I dipendenti dell'ufficio provvedono alla creazione del contratto e della bolletta
              <br>   
              3)I dipendenti operatori effettuano la lettura e l'installazione
              <br>   
            </p> 
          </div>
        </div>
        <div class="col-md-7 py-30 d-none d-md-flex align-items-md-center justify-content-md-end invisible" data-toggle="appear" data-class="animated fadeInRight">
          <img class="img-fluid" src="<?php echo $cb->assets_folder; ?>/media/various/logo-home.JPG" srcset="<?php echo $cb->assets_folder; ?>/media/various/landing-promo-hero@2x.png 2x" alt="Hero Promo">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Hero -->

<!-- Key Features -->
<div class="bg-body-light overflow-hidden">
  <div class="content content-full">
    <div class="row no-gutters justify-content-center text-center nice-copy py-50">
      <div class="col-xl-4">
        <div class="w-100 py-30 invisible" data-toggle="appear" data-class="animated fadeInUp" data-offset="-150">
          <p>
            <i class="fa fa-cubes fa-4x text-default"></i>
          </p>
          <h4 class="mb-5">
            Realizzato in PhP 7.3
          </h4>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="w-100 py-30 invisible" data-toggle="appear" data-class="animated fadeInUp" data-offset="-150" data-timeout="150">
          <p>
            <i class="fa fa-code fa-4x text-pulse"></i>
          </p>
          <h4 class="mb-5">
            MySQL
          </h4>
          <p class="text-muted mb-0">
          per la parte database
          </p>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="w-100 py-30 invisible" data-toggle="appear" data-class="animated fadeInUp" data-offset="-150" data-timeout="300">
          <p>
            <i class="fa fa-rocket fa-4x text-elegance"></i>
          </p>
          <h4 class="mb-5">
            Bootstrap 4 e JavaScript
          </h4>
          <p class="text-muted mb-0">
            ed anche altri tool
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Key Features -->

<!-- Unlimited Dashboards -->
<div class="bg-white">
  <div class="content content-full">
    <div class="pt-100 pb-50">
      <div class="position-relative">
        <span class="text-back">01</span>
        <h2 class="font-w700 mb-10 text-center">
          Pagine <span class="text-primary">Progetto</span>
        </h2>
        <h3 class="h4 font-w400 text-muted text-center mb-50">
          NB: per visualizzare le pagine occorre registrati e/o effettuare il login con le seguenti credenziali 
          <br>
          Cliente : 1 Password : admin 
          <br>
          Operatore : 1 Password : admin
          <br>
          Ufficio : 2 Password : admin
        </h3>
      </div>
      <div class="row nice-copy my-10">
        <div class="col-md-4 py-20">
          <a class="options-container push" href="index.php">
            <img class="img-fluid options-item" src="<?php echo $cb->assets_folder; ?>/media/various/logo-home.JPG" alt="Dashboard Default">
            <div class="options-overlay bg-white-op-90">
              <div class="options-overlay-content h5 font-w700 text-uppercase">
                <i class="fa fa-link fa-4x"></i>
              </div>
            </div>
          </a>
          <h4 class="font-size-xl font-w700 mb-10">
            <span class="text-uppercase">Index</span>
          </h4>
          <p>
           Sarebbe questa pagina.
          </p>
        </div>
        <div class="col-md-4 py-20">
          <a class="options-container push" href="AccessoClienti.php">
            <img class="img-fluid options-item" src="<?php echo $cb->assets_folder; ?>/media/various/Accesso.JPG" alt="Dashboard Classic">
            <div class="options-overlay bg-white-op-90">
              <div class="options-overlay-content h5 font-w700 text-uppercase">
                <i class="fa fa-link fa-4x"></i>
              </div>
            </div>
          </a>
          <h4 class="font-size-xl font-w700 mb-10">
            <span class="text-uppercase">Accesso Clienti</span>
          </h4>
          <p>
          Pagina per effettuare l'accesso dei clienti.
          </p>
        </div>
        <div class="col-md-4 py-20">
          <a class="options-container push" href="AccessoDipendenti.php">
            <img class="img-fluid options-item" src="<?php echo $cb->assets_folder; ?>/media/various/AccessoDip.JPG" alt="Dashboard Clean">
            <div class="options-overlay bg-white-op-90">
              <div class="options-overlay-content h5 font-w700 text-uppercase">
                <i class="fa fa-link fa-4x"></i>
              </div>
            </div>
          </a>
          <h4 class="font-size-xl font-w700 mb-10">
            <span class="text-uppercase">Accesso Dipendenti</span>
          </h4>
          <p>
          Pagina di accesso dei dipendenti.
          </p>
        </div>
        <div class="col-md-4 py-20">
          <a class="options-container push" href="Registrati.php">
            <img class="img-fluid options-item" src="<?php echo $cb->assets_folder; ?>/media/various/Registrati.JPG" alt="Dashboard Social">
            <div class="options-overlay bg-white-op-90">
              <div class="options-overlay-content h5 font-w700 text-uppercase">
                <i class="fa fa-link fa-4x"></i>
              </div>
            </div>
          </a>
          <h4 class="font-size-xl font-w700 mb-10">
            <span class="text-uppercase">Registrati</span>
          </h4>
          <p>
           Pagina registrazione dei clienti.
          </p>
        </div>
        <div class="col-md-4 py-20">
          <a class="options-container push" href="HomePageCliente.php">
            <img class="img-fluid options-item" src="<?php echo $cb->assets_folder; ?>/media/various/HomP.JPG" alt="Dashboard Corporate">
            <div class="options-overlay bg-white-op-90">
              <div class="options-overlay-content h5 font-w700 text-uppercase">
                <i class="fa fa-link fa-4x"></i>
              </div>
            </div>
          </a>
          <h4 class="font-size-xl font-w700 mb-10">
            <span class="text-uppercase">Home Page</span>
          </h4>
          <p>
           Home Page dei clienti.
          </p>
        </div>
        <div class="col-md-4 py-20">
          <a class="options-container push" href="CreaOffertaCliente.php">
            <img class="img-fluid options-item" src="<?php echo $cb->assets_folder; ?>/media/various/CreaOfferta.JPG" alt="a">
            <div class="options-overlay bg-white-op-90">
              <div class="options-overlay-content h5 font-w700 text-uppercase">
                <i class="fa fa-link fa-4x"></i>
              </div>
            </div>
          </a>
          <h4 class="font-size-xl font-w700 mb-10">
            <span class="text-uppercase">Crea Contratto</span>
          </h4>
          <p>
         Pagina per la creazione di un contratto
          </p>
        </div> 
        <div class="col-md-4 py-20">
          <a class="options-container push" href="StampaFattura.php">
            <img class="img-fluid options-item" src="<?php echo $cb->assets_folder; ?>/media/various/StampaF.JPG" alt="a">
            <div class="options-overlay bg-white-op-90">
              <div class="options-overlay-content h5 font-w700 text-uppercase">
                <i class="fa fa-link fa-4x"></i>
              </div>
            </div>
          </a>
          <h4 class="font-size-xl font-w700 mb-10">
            <span class="text-uppercase">Ricerca Fattura</span>
          </h4>
          <p>
          Pagina per ricercare una fattura funziona solo da cliente
          </p>
        </div>
        <div class="col-md-4 py-20">
          <a class="options-container push" href="LetturaContatore.php">
            <img class="img-fluid options-item" src="<?php echo $cb->assets_folder; ?>/media/various/KC2.JPG" alt="a">
            <div class="options-overlay bg-white-op-90">
              <div class="options-overlay-content h5 font-w700 text-uppercase">
                <i class="fa fa-link fa-4x"></i>
              </div>
            </div>
          </a>
          <h4 class="font-size-xl font-w700 mb-10">
            <span class="text-uppercase">Lettura del contatore e installazione</span>
          </h4>
          <p>
          Tool per effettuare la lettura del contatore e l'installazione (funziona solo da operatore)
          </p>
        </div>
        <div class="col-md-4 py-20"> 
          <a class="options-container push" href="HomeDipendenti.php">
            <img class="img-fluid options-item" src="<?php echo $cb->assets_folder; ?>/media/various/HD.JPG" alt="a">
            <div class="options-overlay bg-white-op-90">
              <div class="options-overlay-content h5 font-w700 text-uppercase">
                <i class="fa fa-link fa-4x"></i>
              </div>
            </div>
          </a>
          <h4 class="font-size-xl font-w700 mb-10">
            <span class="text-uppercase">Home Page Dipendente</span>
          </h4>
          <p>Home page del dipendente.</p>
        </div>
        <div class="col-md-4 py-20">
          <a class="options-container push" href="CreaBolletta.php">
            <img class="img-fluid options-item" src="<?php echo $cb->assets_folder; ?>/media/various/CB.JPG" alt="a">
            <div class="options-overlay bg-white-op-90">
              <div class="options-overlay-content h5 font-w700 text-uppercase">
                <i class="fa fa-link fa-4x"></i>
              </div>
            </div>
          </a>
          <h4 class="font-size-xl font-w700 mb-10">
            <span class="text-uppercase">Crea Bolletta</span>
          </h4>
          <p>Crea Bolletta e visualizza</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Unlimited Dashboards -->
 
<!-- Call to Action -->
<div class="bg-white">
  <div class="content content-full text-center overflow-hidden">
    <div class="py-100">
      <h2 class="font-w700 mb-10">
        Yuri Sangiuliano <i class="fa fa-heart text-danger"></i> Mat <a class="link-effect">A130000</a>
      </h2>
      <h3 class="h4 font-w400 text-muted mb-50">Traccia <br>
      Realizzare una web application per la gestione delle attività di una ditta che fornisce energia elettrica. Più precisamente bisogna gestire i clienti della ditta (privati o aziende), gestire i contratti, i contatori e i dipendenti della ditta (operatori o impiegati di ufficio).
      </h3>
      <h3 class="h4 font-w400 text-muted mb-50">NB<br>
        il sito è scalabile con l'aggiunta di molte altre funzioni.
      </h3>
      <a class="btn btn-hero btn-lg btn-noborder btn-alt-success mb-10 invisible" data-toggle="appear" data-class="animated zoomIn" href="../Documentazione-Altro/DocumentazioneC'%C3%A8Corrente.pdf">
        <i></i>Documentazione
      </a>
    </div>
  </div>
</div>
<!-- END Call to Action -->


<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>
<?php require 'inc/_global/views/footer_end.php'; ?>

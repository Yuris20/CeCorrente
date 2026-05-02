<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend/config.php'; ?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'assets/php/sessioni.php'; ?>

<!-- Page JS Plugins CSS -->
<?php $cb->get_css('js/plugins/slick/slick.css'); ?>
<?php $cb->get_css('js/plugins/slick/slick-theme.css'); ?>

<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<!-- Query -->
<?php require 'assets/php/HomeQuery.php'; ?>

<!-- Page Content -->
<div class="content">
  <div class="row invisible" data-toggle="appear">
    <!-- Row #1 -->
    <div class="col-6 col-xl-3">
      <a class="block block-link-shadow text-right" href="javascript:void(0)">
        <div class="block-content block-content-full clearfix">
          <div class="float-left mt-10 d-none d-sm-block">
            <i class="si si-bag fa-3x text-body-bg-dark"></i>
          </div>
          <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="<?php echo($CodiceCliente) ?>"></div>
          <div class="font-size-sm font-w600 text-uppercase text-muted">Codice Utente</div>
        </div>
      </a>
    </div>
    <div class="col-6 col-xl-3">
      <a class="block block-link-shadow text-right" href="javascript:void(0)">
        <div class="block-content block-content-full clearfix">
          <div class="float-left mt-10 d-none d-sm-block">
            <i class="si si-wallet fa-3x text-body-bg-dark"></i>
          </div>
          <div class="font-size-h3 font-w600"><span data-toggle="countTo" data-speed="1000" data-to="<?php echo($Lettura) ?>"></span></div>
          <div class="font-size-sm font-w600 text-uppercase text-muted">Ultima lettura</div>
        </div>
      </a>
    </div>
    <div class="col-6 col-xl-3">
      <a class="block block-link-shadow text-right" href="javascript:void(0)">
        <div class="block-content block-content-full clearfix">
          <div class="float-left mt-10 d-none d-sm-block">
            <i class="si si-envelope-open fa-3x text-body-bg-dark"></i>
          </div>
          <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="<?php echo($CodCont) ?>"></div>
          <div class="font-size-sm font-w600 text-uppercase text-muted">Matricola contatore</div>
        </div>
      </a>
    </div>
    <div class="col-6 col-xl-3">
      <a class="block block-link-shadow text-right" href="javascript:void(0)">
        <div class="block-content block-content-full clearfix">
          <div class="float-left mt-10 d-none d-sm-block">
            <i class="si si-users fa-3x text-body-bg-dark"></i>
          </div>
          <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="<?php echo($Clienti) ?>"></div>
          <div class="font-size-sm font-w600 text-uppercase text-muted">Clienti</div>
        </div>
      </a>
    </div>       
    <!-- END Row #1 -->
  </div>
  <div class="row invisible" data-toggle="appear">
    <!-- Row #2 -->
     
    <div class="col-md-6">
    
      <div class="block">
    <div class="block-header block-header-default">
      <h3 class="block-title">Ultimi eventi</h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
          <i class="si si-refresh"></i>
        </button>
        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
      </div>
    </div>
    <div class="block-content">
      <ul class="list list-activity">
        <li>
          <i class="si si-wallet text-success"></i>
          <div class="font-w600">Nuovo cliente</div>
          <div class="font-size-xs text-muted">Stato mai aggiornato</div>
        </li>
        <li>
          <i class="si si-pencil text-info"></i>
          <div class="font-w600">Data sottoscrizione offerta</div>
          <div>
            <a href="javascript:void(0)">
              <i class="fa fa-file-text-o"></i> Offerta.doc 
            </a>
          </div>
          <div class="font-size-xs text-muted"><?php echo($DataStipula);?></div>
        </li>
        <li>
          <i class="si si-wrench text-warning"></i>
          <div class="font-w600">Data presunta installazione</div>
          <div>
            <a href="javascript:void(0)">Appena aggiornato</a>
          </div>
          <div class="font-size-xs text-muted"><?php echo($DataInizioFornitura);?></div>
        </li>
        <li>
          <i class="si si-wrench text-warning"></i>
          <div class="font-w600">Data insatallazione</div>
          <div>
            <a href="javascript:void(0)">Aggiornato</a>
          </div>
          <div class="font-size-xs text-muted"><?php echo($DataInstallazione);?></div>
        </li>
      </ul>
    </div>
  </div>
  <!-- END Timeline Activity -->

    </div>
    <!-- END Row #2 -->
  </div>
  
<div class="block block-fx-shadow">
    <div class="block-content">
      <!-- Orders Table -->
      <table class="table table-borderless table-striped">
        <thead>
          <tr>
            <th style="width: 100px;">CodiceBolletta</th>
            <th>Stato</th>
            <th class="d-none d-sm-table-cell">Data Emissione</th>
            <th class="d-none d-sm-table-cell">Kw Consumati</th>
            <th class="text-right">Importo</th>
          </tr>
        </thead>
        <tbody>

<?php
            $sql = "SELECT bolletta.CodiceBolletta,bolletta.DataEmissione,bolletta.KWConsumati,bolletta.Importo FROM `bolletta` INNER JOIN contratto ON  bolletta.CodC=contratto.CodC AND contratto.CodCliente='$CodiceCliente'";
            
$risultato = mysqli_query($connessione,$sql);
while($riga=mysqli_fetch_array($risultato))
{
    $id=$riga['CodiceBolletta'];
    
    echo " 
         <tr>
                <td>
                <a class='font-w600' href='StampaFattura.php?id=$id'>".$riga['CodiceBolletta']."</a>    
                </td>
                <td>
                    <span class='badge badge-danger'>Non Pagata ( non implementato)</span>
                </td>
                <td class='d-none d-sm-table-cell'>".$riga['DataEmissione']."</td>
                <td class='d-none d-sm-table-cell'>".$riga['KWConsumati']."</td> 
                 <td class='text-right'>".$riga['Importo']."</td>
                
          </tr>";
} 
            ?>
        <!--    
          <tr>
            <td>
              <a class="font-w600" href="javascript:void(0)">1687</a>
            </td>
            <td>
              <span class="badge badge-success">Pagata</span>
            </td>
            <td class="d-none d-sm-table-cell">
              2017/10/23
            </td>
            <td class="d-none d-sm-table-cell">
              <a href="javascript:void(0)">7</a>
            </td>
            <td class="text-right">
              <span class="text-black">$969</span>
            </td>
          </tr>
    -->
        </tbody>
      </table>
      <!-- END Orders Table -->
    </div>
  </div>


<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>

<div class="modal fade" id="modal-onboarding" tabindex="-1" role="dialog" aria-labelledby="modal-onboarding" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
    <div class="modal-content rounded">
      <div class="block block-rounded block-transparent mb-0 bg-pattern" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/various/bg-pattern-inverse.png');">
        <div class="block-header justify-content-end">
          <div class="block-options">
            <a class="font-w600 text-danger" href="#" data-dismiss="modal" aria-label="Close">
              Salta introduzione
            </a>
          </div>
        </div>
        <div class="block-content block-content-full">
          <div class="js-slider slick-dotted-inner" data-dots="true" data-arrows="false" data-infinite="false">
            <div class="pb-50">
              <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-8">
                  <i class="si si-fire fa-4x text-primary"></i>
                  <h3 class="font-size-h2 font-w300 mt-20">Ciao!</h3>
                  <p class="text-muted">
                    Siamo molto fieri di averti come cliente, per visualizzare tutte le funzionalità della nostra Web-App
                  </p>
                  <button type="button" class="btn btn-sm btn-hero btn-noborder btn-primary mb-10 mx-5" onclick="jQuery('.js-slider').slick('slickGoTo', 1);">
                    clicca qui <i class="fa fa-arrow-right ml-5"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="slick-slide pb-50">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                  <h3 class="font-size-h2 font-w300 mb-5">Visualizza Bolletta</h3>
                  <p class="text-muted">
                  Nella tua Dashbord hai la possibilità di visualizzare la bolletta
                  </p>
                  <h3 class="font-size-h2 font-w300 mb-5">Se</h3>
                  <p class="text-muted">
                  Se non visualizzi la bolletta comunicalo al supporto cell.800800800
                  </p>
                  <div class="text-center">
                    <button type="button" class="btn btn-sm btn-hero btn-noborder btn-primary mb-10 mx-5" onclick="jQuery('.js-slider').slick('slickGoTo', 2);">
                      Visualizza Altro <i class="fa fa-arrow-right ml-5"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="slick-slide pb-50">
              <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-8">
                  <i class="si si-note fa-4x text-primary"></i>
                  <h3 class="font-size-h2 font-w300 mt-20">Se hai altre domande mandaci una mail</h3>
                  <button type="button" class="btn btn-sm btn-hero btn-noborder btn-success mb-10 mx-5" data-dismiss="modal" aria-label="Close">
                    chiudi <i class="fa fa-check ml-5"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- END Onboarding Modal -->

<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/chartjs/Chart.min.js'); ?>
<?php $cb->get_js('js/plugins/slick/slick.min.js'); ?>

<!-- Page JS Code -->
<?php $cb->get_js('js/pages/be_pages_dashboard.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>

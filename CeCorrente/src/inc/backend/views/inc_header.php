<?php
/**
 * backend/views/inc_header.php
 *
 * 
 *
 */
?>

<!-- Header -->
<header id="page-header">
  <!-- Header Content -->
  <div class="content-header">
    <!-- Left Section -->
    <div class="content-header-section">

    <!-- Right Section -->
    <div class="content-header-section">
      <!-- User Dropdown -->
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user d-sm-none"></i>
          <span class="d-none d-sm-inline-block">Menù</span>
          <i class="fa fa-angle-down ml-5"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
         <a class="dropdown-item" href="HomePageCliente.php">
            <i class="si si-user mr-5"></i> Home Page
          </a>
          <a class="dropdown-item" href="LetturaContatore.php">
            <i class="si si-user mr-5"></i> Effettua una lettura
          </a>
          <!-- END Side Overlay -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/CeCorrente/src/assets/php/Esci.php">
            <i class="si si-logout mr-5"></i>Esci
          </a>
        </div>
      </div>
      <!-- END User Dropdown -->  
      <!-- END Toggle Side Overlay -->
    </div>
    <!-- END Right Section -->
  </div>
</div>
</header>
<!-- END Header -->

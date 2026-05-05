<?php
?>

<!-- Fonts and Codebase framework -->
<link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap"
        crossorigin="anonymous"
        referrerpolicy="no-referrer">
<link rel="stylesheet" id="css-main" href="<?php echo $cb->assets_folder; ?>/css/codebase.min.css">

<!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
<!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
<?php if ($cb->theme) { ?>
  <link rel="stylesheet" id="css-theme" href="<?php echo $cb->assets_folder; ?>/css/themes/<?php echo $cb->theme; ?>.min.css">
<?php } ?>
<!-- END Stylesheets -->
</head>
<body>

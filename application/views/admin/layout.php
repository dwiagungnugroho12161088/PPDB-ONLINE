<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>PPDB ONLINE</title>
    <link rel="shortcut icon" href="<?php echo base_url('asset/img/ppdbfac.png');?>" />
    <link href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/hovernav/hovernav.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/bootstrap_datepicker/css/datepicker.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/css/style.css'); ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('asset/html5shiv/html5shiv.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/respond/respond.min.js'); ?>"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <div id="navigasi">
        <?php
            $this->load->view('admin/navbar');
        ?>
    </div> <!-- end navigasi -->


    <div class="main-content">
        <?php $this->load->view($main_view); ?>
    </div>

    <script src="<?php echo base_url('asset/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/hovernav/hovernav.js'); ?>"></script>
    <script src="<?php echo base_url('asset/bootstrap_datepicker/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('asset/tinymce_4_1_6/js/tinymce/tinymce.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/ppdb.js'); ?>"></script>

</div><!-- wrapper-->

<!-- Noscript -->
<noscript>
    <p class="noscript">Javascript pada browser Anda tidak diaktifkan. Silakan mengaktifkan Javascript.</p>
    <style type="text/css">
        #wrapper { display:none; }
        .noscript {
            text-align: center;
            color: #ff0000;
            font-size: 1.5em;
            vertical-align: 50%;
            margin: 250px;
            border: 1px solid;
        }
    </style>
</noscript>
</body>
</html>
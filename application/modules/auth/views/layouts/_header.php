<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
<meta name="author" content="Coderthemes">

<link rel="shortcut icon" href="images/favicon_1.ico">

<title><?=APP_NOME?></title>

<!-- Base Css Files -->
<link href="<?=base_url('resources/css/bootstrap.min.css')?>" rel="stylesheet" />

<!-- Font Icons -->
<link href="<?=base_url('resources/assets/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" />
<link href="<?=base_url('resources/assets/ionicon/css/ionicons.min.css')?>" rel="stylesheet" />
<link href="<?=base_url('resources/css/material-design-iconic-font.min.css')?>" rel="stylesheet">

<!-- animate css -->
<link href="<?=base_url('resources/css/animate.css')?>" rel="stylesheet" />

<!-- Waves-effect -->
<link href="<?=base_url('resources/css/waves-effect.css')?>" rel="stylesheet">

<!-- sweet alerts -->
<link href="<?=base_url('resources/assets/sweet-alert/sweet-alert.min.css')?>" rel="stylesheet">

<!-- Custom Files -->
<link href="<?=base_url('resources/css/helper.css')?>" rel="stylesheet" type="text/css" />
<? if(isset($style)): ?>
<link href="<?=base_url('resources/css/'.$style.'.css')?>" rel="stylesheet" type="text/css" />
<? else:?>
<link href="<?=base_url('resources/css/styleGreen.css')?>" rel="stylesheet" type="text/css" />
<? endif?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script src="<?=base_url('resources/js/modernizr.min.js')?>"></script>
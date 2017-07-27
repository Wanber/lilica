<!DOCTYPE html>
<!--[if IE 7]><html id="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="wp-content/themes/lilica/bootstrap.min.css">

  <script src="wp-content/themes/lilica/js/jquery.min.js"></script>

  <script src="wp-content/themes/lilica/js/bootstrap.min.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="wp-content/themes/lilica/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="wp-content/themes/lilica/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<nav class="menu">
  <div class="itens-esquerda">
    <ul class="list-inline">
      <li><a class="scroll" href="#sobre"><?php echo get_setting("secao-1") ?></a></li>
      <li><a class="scroll" href="#produtos"><?php echo get_setting("secao-2") ?></a></li>
      <li><a class="scroll" href="#clientes"><?php echo get_setting("secao-3") ?></a></li>
    </ul>
  </div>
  <div class="scroll logo" id="logo"></div>
  <div class="itens-direita">
    <ul class="list-inline">
      <li><a class="scroll" href="#blog"><?php echo get_setting("secao-4") ?></a></li>
      <li><a class="scroll" href="#contato"><?php echo get_setting("secao-5") ?></a></li>

    </ul>
  </div>
</nav>

<div id="body" class="clearfix"></div>
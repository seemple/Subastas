<? header('Content-Type: text/html; charset=utf-8'); ?>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Alberto Bieule - <? echo $data["titulo"];?></title>
        <meta name="description" content="<? echo strip_tags($data["description"]);?>" />
        <meta name="author" content="Corporacion de Rematadores y Corredores Inmobiliarios" />
        <meta property="og:title" content="CRCI - <?php echo $data["titulo"];?>" />
        <meta property="og:url" content="<?php echo current_url();?>" />
        <meta property="og:description" content="<?php echo strip_tags ( $data["description"]);?>" />
        <? if ($data["url"]=="ampliar") {?> 
        <meta property="og:image" content="<?php echo $data["imagen"]?>" />
        <? } else { ?>
        <meta property="og:image" content="<? echo base_url(); ?><?php echo $data["imagen"]?>" />
        <? } ?>

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="<? echo base_url();?>web/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<? echo base_url();?>web/assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
		<link href="<? echo base_url();?>web/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link href="<? echo base_url();?>web/assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet" type="text/css" />
		<link href="<? echo base_url();?>web/assets/plugins/owl-carousel/owl.transitions.css" rel="stylesheet" type="text/css" />
		<link href="<? echo base_url();?>web/assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
		<link href="<? echo base_url();?>web/assets/css/animate.css" rel="stylesheet" type="text/css" />
		<link href="<? echo base_url();?>web/assets/css/superslides.css" rel="stylesheet" type="text/css" />

		<!-- REALESTATE -->
		<link href="<? echo base_url();?>web/assets/css/realestate.css" rel="stylesheet" type="text/css" />

		<!-- THEME CSS -->
		<link href="<? echo base_url();?>web/assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="<? echo base_url();?>web/assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="<? echo base_url();?>web/assets/css/layout-responsive.css" rel="stylesheet" type="text/css" />
		<link href="<? echo base_url();?>web/assets/css/color_scheme/red.css" rel="stylesheet" type="text/css" />
		<link id="css_dark_skin" href="<? echo base_url();?>web/assets/css/layout-dark-ok.css" rel="stylesheet" type="text/css" />  

		
	
		<!-- Morenizr -->
		<script type="text/javascript" src="<? echo base_url();?>web/assets/plugins/modernizr.min.js"></script>
	</head>

	<body><!-- Available classes for body: boxed , pattern1...pattern10 . Background Image - example add: data-background="assets/images/boxed_background/1.jpg"  -->

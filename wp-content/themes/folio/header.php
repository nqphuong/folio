<html lang="en">
<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mr.3j Blog content">
    <meta name="author" content="RichardNguyen">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico"><!--OK-->
    
    <title><?php bloginfo('title'); ?></title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css"><!--OK-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css"><!--OK-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.css"><!--OK-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css"><!--OK-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/supersized.css"><!--OK-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/nivo-theme.css"><!--OK-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/nivo-lightbox.css"><!--OK-->
    
    <!-- Main Stylsheets -->
    <!--link rel="stylesheet" href="style.css"><!--OK-->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css"><!--OK-->
    <!-- Theme Color Stylesheet -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/theme_color.css"><!--OK-->
    
    <!-- Google Font -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet" type="text/css">
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style id="fit-vids-style">.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>

    <?php //wp_head(); ?>
</head>

<body>
<header class="header">
	<!-- begin nav -->
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span>Tap me!</span>
						</button>
						<!-- begin logo in navigation -->
						<a class="navbar-brand" href="<?php get_site_url(); ?>">
								<i class="fa fa-bug"></i>
								<span>Blog</span>
						</a>
						<!-- end logo in navigation -->
					</div>	

					<div class="navbar-collapse collapse">
                        <?php //wp_nav_menu(); ?>
						<?php custom_get_main_menu(); ?>
					</div>

				</div>
			</div>
		</div>
	</nav>
	<!-- end nav -->

</header>

<section class="intro">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="intro-content">
					<div>[ Daily quote ]</i></div>
					<h1>If you can't explain it to a six year old, you <strong>don't understand</strong> it yourself.</h1>
					<h2><i>Albert Einstein</i></h2>

				</div>

			</div>
		</div>
	</div>
</section>

<section class="blog">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9">
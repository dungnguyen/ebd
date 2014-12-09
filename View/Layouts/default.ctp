<?php echo $this->element('functions'); ?>
<!DOCTYPE HTML>
<!-- BEGIN html -->
<html lang = "en">
<!-- BEGIN head -->
<head>
	<title><?php echo $title_for_layout;?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="" />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="shortcut icon" href="images/icon/ebdfavicon.ico" type="image/x-icon" />

	<!-- Stylesheets -->
	<?php
	echo $this->Html->css(array(
		'reset',
		'main-stylesheet',
		'lightbox',
		'shortcode',
		'fonts',
		'colors',
		'responsive',
		));
	echo $this->fetch('css');
	?>
</head>

<!-- BEGIN body -->
<body>

	<!-- BEGIN .boxed -->
	<div class="boxed">

		<!-- BEGIN .header -->
		<div class="header">

			<!-- BEGIN .wrapper -->
			<div class="wrapper">

				<div class="header-logo">
					<a href="/"><img src="images/logo-header.png" alt="" /></a>
				</div>				
				<div class="header-addons">
					<div class="header-weather">
						<?php echo $this->element('weather'); ?>
					</div>
					<div class="header-search">
						<form action="#" method="get">
							<input type="text" placeholder="Search the Directory" value="" class="search-input" />
							<input type="submit" value="Search" class="search-button" />
						</form>
					</div>
				</div>

				<!-- END .wrapper -->
			</div>

			<div class="main-menu sticky">
				<?php echo $this->element('top_nav'); ?>
			</div>

			<div class="secondary-menu">
				<?php echo $this->element('top_subnav'); ?>
			</div>

			<!-- END .header -->
		</div>

		<!-- BEGIN .content -->
		<div class="content">
			<?php echo $content_for_layout ?>
			<!-- BEGIN .content -->
		</div>

		<!-- BEGIN .footer -->
		<div class="footer">
			<?php echo $this->element('footer'); ?>
			<!-- END .footer -->
		</div>

		<!-- END .boxed -->
	</div>

	<!-- Scripts -->
	<?php
	echo $this->Html->script(array(
		'jquery-latest.min',
		'theme-scripts',
		'lightbox',
		));
	echo $this->fetch('script');
	?>
	<!-- END body -->
</body>
<!-- END html -->
</html>
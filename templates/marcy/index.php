<?php
	defined('CMSPATH') or die; // prevent unauthorized access
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/templates/marcy/pico.css">
	<link rel="stylesheet" href="/templates/marcy/style.css">
	<!--CMSHEAD-->

</head>
<body>
	<nav class='container'>
		<?php CMS::Instance()->render_widgets('Top Nav');?>
	</nav>

	<div id='messages'>
	<?php CMS::Instance()->display_messages();?>
	</div>

	<?php CMS::Instance()->render_widgets('Header');?>

	<?php CMS::Instance()->render_widgets('Above Content');?>
	<main class='container'>
		<?php CMS::Instance()->render_controller(); ?>
	</main>

	<?php CMS::Instance()->render_widgets('After Content');?>
	
	<footer class='container'>
		<?php CMS::Instance()->render_widgets('Footer');?>
	</footer>
	<?php if (Config::$debug) { CMS::Instance()->showinfo();} ?>
</body>
</html>
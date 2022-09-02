<?php
	defined('CMSPATH') or die; // prevent unauthorized access
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/templates/marcy/pico.css">
	<link rel="stylesheet" href="/templates/marcy/style.css">
	<!--CMSHEAD-->

</head>
<body>
	<div class='container'>
		<?php CMS::Instance()->render_widgets('Top Nav');?>
	</div>

	<div id='messages'>
	<?php CMS::Instance()->display_messages();?>
	</div>

	<?php CMS::Instance()->render_widgets('Header');?>

	<?php CMS::Instance()->render_widgets('Above Content');?>
	<main class='container'>
		<?php CMS::Instance()->render_controller(); ?>
	</main>

	<?php CMS::Instance()->render_widgets('After Content');?>
	
	<footer data-theme="dark">
		<section class="container">
			<ul class='flex' id='socials'>
				<li>
					<a target="_blank" class='hasicon' href="https://www.facebook.com/marcymitchellart">
						<span class='hidden'>Facebook</span>
						<svg role="presentation" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
					</a>
				</li>
				<li>
					<a target="_blank" class='hasicon' href="https://www.instagram.com/marcymitchellart/?hl=en">
						<span class='hidden'>Instagram</span>
						<svg role="presentation" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
					</a>
				</li>
				<li>
					<a target="_blank" href="https://linktr.ee/marcymitchellart">
						LinkTree
					</a>
				</li>
			</ul>
		</section>
		<section class='container'>
			<p>All content copyright &copy;2022 - Marcy Mitchell. All rights reserved.</p>
		</section>
		<?php CMS::Instance()->render_widgets('Footer');?>
	</footer>

	<?php if (Config::$debug) { CMS::Instance()->showinfo();} ?>
</body>
</html>
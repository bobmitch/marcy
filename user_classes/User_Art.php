<?php
defined('CMSPATH') or die; // prevent unauthorized access

// user space class for User stuff

class User_Art {
	public static function render_art_grid_item($art) {
		?>
		<div class="artgrid_item">
			<a href='<?=Config::$uripath;?>/my-work/<?=$art->alias;?>'>
			<?php 
				$art_image = new Image($art->f_artthumbnail);
				$art_image->render(300,'artgrid_image');
			?>
			</a>
		</div>
		<?php
	}
}
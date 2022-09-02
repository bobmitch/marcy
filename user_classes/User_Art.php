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
				$art_image->render(400,'artgrid_image');
				echo "<p class='art_title'>" . $art->title . "</p>";
			?>
			</a>
		</div>
		<?php
	}

	public static function render_location_name($id) {
		// get location
		// if 'listlocation' is true, then wrap in link, otherwise just return name
		$location = Content::get_all_content_for_id($id);
		if ($location->f_listlocation) {
			echo "<a href='" . Config::$uripath . "/galleries/" . $location->alias . "'>" . $location->title . "</a>";
		}
		else {
			echo $location->title;
		}
	}
}
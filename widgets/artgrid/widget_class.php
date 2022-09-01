<?php
defined('CMSPATH') or die; // prevent unauthorized access

class Widget_artgrid extends Widget {
	public function render() {
		$user_arts = json_decode($this->options[0]->value);
		$art_count = 0;
		if (is_array($user_arts)) {
			$art_count = sizeof($user_arts);
		}
		
		//CMS::pprint_r (json_decode($this->options[0]->value));
		// ->fields->art->default

		// get 8 pieces - user provided first
		$art_content_items=[];
		for ($n=0; $n<8; $n++) {
			if ($n<$art_count) {
				// user provided
				$art_id = $user_arts[$n]->fields->art->default;
			}
			else {
				// get rando
				$art_id = DB::fetch('SELECT id FROM content WHERE content_type=2 ORDER BY RAND() LIMIT 1;')->id;
			}
			$art_content_items[] = Content::get_all_content_for_id($art_id);
		}

		// display
		// CMS::pprint_r ($art_content_items);
		?>
		<div class="container">
			<div class="artgrid_wrap">
				
				<?php foreach ($art_content_items as $art):?>
					<div class="artgrid_item">
						<?php 
							$art_image = new Image($art->f_artthumbnail);
							$art_image->render(300,'artgrid_image');
						?>
					</div>
				<?php endforeach; ?>
				
			</div>
		</div>
		<?php
	}
}
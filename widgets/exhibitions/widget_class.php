<?php
defined('CMSPATH') or die; // prevent unauthorized access

class Widget_exhibitions extends Widget {
	public function render() {
		// group
		$content_search = new Content_Search();
		$content_search->type_filter = 4; // exhibition
		$content_search->page = 1;
		$content_search->published_only = true;
		$content_search->list_fields = ['exhibitionaddress','exhibitioncity','exhibitionstate'];
		$content_search->filters = array('category'=>1); // group
		$content_search->order_by = "title";
		$content_search->order_direction = "DESC";
		$content_search->page_size = 99999999; // silly large number
		$group = $content_search->exec();
		// solo
		$content_search = new Content_Search();
		$content_search->type_filter = 4; // exhibition
		$content_search->page = 1;
		$content_search->published_only = true;
		$content_search->list_fields = ['exhibitionaddress','exhibitioncity','exhibitionstate'];
		$content_search->filters = array('category'=>2); // solo
		$content_search->order_by = "title";
		$content_search->order_direction = "DESC";
		$content_search->page_size = 99999999; // silly large number
		$solo = $content_search->exec();
		?>
		<section class='container smaller'>
			<h2>Solo Exhibitions</h2>
			<div class='flex cardwidth'>
				<?php foreach ($solo as $e):?>
					<aside>
						<p><strong><?=$e->title;?></strong></p>
						<p><?=$e->f_exhibitionaddress;?><br><?=$e->f_exhibitioncity;?>, <?=$e->f_exhibitionstate;?></p>
					</aside>
				<?php endforeach; ?>
			</div>
		</section>
		<section class='container'>
			<h2>Group Exhibitions</h2>
			<div class='flex cardwidth'>
				<?php foreach ($group as $e):?>
					<aside>
						<p><strong><?=$e->title;?></strong></p>
						<p><?=$e->f_exhibitionaddress;?><br><?=$e->f_exhibitioncity;?>, <?=$e->f_exhibitionstate;?></p>
					</aside>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
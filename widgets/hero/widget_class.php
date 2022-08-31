<?php
defined('CMSPATH') or die; // prevent unauthorized access

class Widget_hero extends Widget {
	public function render() {
		//CMS::pprint_r ($this);

		$cta_text = $options[3]->value;
		$cta_url = $options[4]->value;
		?>
		<header class='hero_wrap container' style='background-image:url(/image/<?php echo $this->options[2]->value; ?>)'>
			<div class=''>
				<aside class='hero_content'>
					<h1><?php echo $this->options[0]->value; ?></h1>
					<div>
					<?php echo $this->options[1]->value; ?>
					</div>
					<?php if ($cta_text && $cta_url):?>
					<a class='herocta btn cta' href='<?php echo $cta_url;?>'><?php echo $cta_text;?></a>
					<?php endif; ?>
				</aside>
			</div>
		</header>
		<?php
	}
}
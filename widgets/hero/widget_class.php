<?php
defined('CMSPATH') or die; // prevent unauthorized access

class Widget_hero extends Widget {
	public function render() {
		//CMS::pprint_r ($this);

		$cta_text = $options[3]->value;
		$cta_url = $options[4]->value;
		?>
		<header class='hero_wrap container' style='background-image:url(/image/<?php echo $this->options[2]->value; ?>/1800/webp)'>
			
		</header>
		<?php
	}
}
<?php
defined('CMSPATH') or die; // prevent unauthorized access

class Widget_exhibitions extends Widget {
	public function render() {
		CMS::pprint_r ($this);
	}
}
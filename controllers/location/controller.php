<?php
defined('CMSPATH') or die; // prevent unauthorized access

// router

$segments = CMS::Instance()->uri_segments;
$view_id = CMS::Instance()->page->view;
CMS::Instance()->page->view_configuration_object = json_decode(CMS::Instance()->page->view_configuration);

if ($segments) {
	$view = "location";
}
else {
	$view = "all";
}

$controller = new Controller(realpath(dirname(__FILE__)),$view);
$controller->load_view($view); 



<?php
defined('CMSPATH') or die; // prevent unauthorized access

// router

$segments = CMS::Instance()->uri_segments;
$view_id = CMS::Instance()->page->view;
CMS::Instance()->page->view_configuration_object = json_decode(CMS::Instance()->page->view_configuration);
$segs = sizeof($segments);
$view = Content::get_view_location(CMS::Instance()->page->view);
$tag_alias = null;

if ($segs==0||$segs>1) {
	$view="art";
}
else {
	$view="single-art";
}


$controller = new Controller(realpath(dirname(__FILE__)),$view);
$controller->load_view($view); 



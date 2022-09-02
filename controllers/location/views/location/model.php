<?php
defined('CMSPATH') or die; // prevent unauthorized access
$location_alias = CMS::Instance()->uri_segments[0]; // has to exist per controller
$location_id = DB::fetch('select id from content where content_type=3 and alias=?',$location_alias)->id;
$location = Content::get_all_content_for_id($location_id);
$grid_images = json_decode($location->f_locationimages);
?>


<?php
defined('CMSPATH') or die; // prevent unauthorized access
$location_alias = CMS::Instance()->uri_segments[0]; // has to exist per controller
$location_id = DB::fetch('select id from content where content_type=3 and alias=?',$location_alias)->id;
$location = Content::get_all_content_for_id($location_id);
$grid_images = json_decode($location->f_locationimages);
// get all art at this location
$content_search = new Content_Search();
$content_search->type_filter = 2;
$content_search->page = 1;
$content_search->published_only = true;
$content_search->list_fields = ['artlocation','artthumbnail'];
$content_search->filters = array('f_artlocation'=>$location_id);
$content_search->order_by = "created";
$content_search->order_direction = "DESC";
$content_search->page_size = 99999999; // silly large number
$arts = $content_search->exec();
?>


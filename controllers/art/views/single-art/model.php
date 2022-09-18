<?php
defined('CMSPATH') or die; // prevent unauthorized access

$alias = CMS::Instance()->uri_segments[0];
/* $art = new Content('art');
$art->load_from_alias($alias); */

$art_categories_raw = DB::fetchAll('select * from categories where content_type=2');
// get array where key is id of category for lookup
$art_categories_keyed = array_combine(array_column($art_categories_raw,'id'), $art_categories_raw);

$art_id = DB::fetch('select id from content where alias=? and content_type=2',$alias)->id;
$art = Content::get_all_content_for_id($art_id);
$tags = Tag::get_tags_for_content($art->id, $content_type_id=2);

$image_id = $art->f_artthumbnail;
$image = new Image($image_id);

$grid_images = json_decode($art->f_artimages);
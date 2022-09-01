<?php
defined('CMSPATH') or die; // prevent unauthorized access

$alias = CMS::Instance()->uri_segments[0];
/* $art = new Content('art');
$art->load_from_alias($alias); */

$art_id = DB::fetch('select id from content where alias=? and content_type=2',$alias)->id;
$art = Content::get_all_content_for_id($art_id);

$image_id = $art->f_artthumbnail;
$image = new Image($image_id);
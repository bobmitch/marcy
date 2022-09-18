<?php
defined('CMSPATH') or die; // prevent unauthorized access

$segments = CMS::Instance()->uri_segments;
if ($segments[0]=='tagged' && sizeof($segments)==2) {
    $tag = DB::fetch('select * from tags where alias=?',$segments[1]);
}

$available_tags = Tag::get_tags_available_for_content_type (2); // art content

$alias = CMS::Instance()->uri_segments[0];

$searchtext = Input::getvar('searchtext','STRING');

$content_search = new Content_Search();
$content_search->type_filter = 2;
$content_search->page = 1;
$content_search->order_by = "created";
$content_search->order_direction = "DESC";
$content_search->list_fields = ['artdimensions','artthumbnail'] ;
$content_search->page_size = 99999999; // silly large number
if ($searchtext) {
    $content_search->searchtext = $searchtext;
}
if ($tag) {
    $content_search->tags = [$tag->id];
}

$my_art = $content_search->exec();
$my_art_count = $content_search->get_count();

//CMS::pprint_r ($my_art); exit();
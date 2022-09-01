<?php
defined('CMSPATH') or die; // prevent unauthorized access

// not really single-art, just too lazy to change to my-art

$searchtext = Input::getvar('searchtext','STRING');

$content_search = new Content_Search();
$content_search->type_filter = 2;
$content_search->page = 1;
$content_search->order_by = "created";
$content_search->order_direction = "DESC";
$content_search->page_size = 99999999; // silly large number
if ($searchtext) {
    $content_search->searchtext = $searchtext;
}

$my_art = $content_search->exec();
$my_art_count = $content_search->get_count();

//CMS::pprint_r ($my_art);
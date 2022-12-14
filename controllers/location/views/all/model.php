<?php
defined('CMSPATH') or die; // prevent unauthorized access

$content_search = new Content_Search();
$content_search->type_filter = 'location';
$content_search->published_only = true;
$content_search->list_fields = ['locationaddress','locationcity','locationstate','listlocation'];
// only return locations that are listable
$content_search->filters = array('f_listlocation'=>'1');

$locations = $content_search->exec();

$intro = Content::get_all_content_for_id(16); // Locations Introduction content item

//CMS::pprint_r ($locations);

?>


<?php
defined('CMSPATH') or die; // prevent unauthorized access

$alias = CMS::Instance()->uri_segments[0];
$art = new Content('art');
$art->load_from_alias($alias);


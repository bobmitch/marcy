<?php
defined('CMSPATH') or die; // prevent unauthorized access
?>

<section class='container'>
    <h1><?=$art->title;?></h1>
    <div class='fullimage'>
        <?php $image->render('web','fullimage');?>
    </div>
</section>




<?php
CMS::pprint_r ($art);
?>
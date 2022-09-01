<?php
defined('CMSPATH') or die; // prevent unauthorized access
?>

<section class='container'>
    <h1><?=$art->title;?></h1>
    <section class='fullimage'>
        <?php $image->render('web','fullimage');?>
    </section>
    <?php if ($art->f_artdescription):?>
    <section class='artdesc'>
        <?=$art->f_artdescription;?>
    </section>
    <?php endif; ?>
</section>




<?php
CMS::pprint_r ($grid_images);
CMS::pprint_r ($art);
?>
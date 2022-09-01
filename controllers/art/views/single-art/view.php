<?php
defined('CMSPATH') or die; // prevent unauthorized access
?>

<section class='container'>
    <h1><?=$art->title;?></h1>

    <article class='artinfo'>
        <header>
            <div class='artinfo_wrap'>
                <!-- <div class='artinfo_item'>
                    <label>Title</label>
                    <p><?=$art->title;?></p>
                </div> -->
                <div class='artinfo_item'>
                    <label>Size</label>
                    <p><?=$art->f_artdimensions;?></p>
                </div>
                <div class='artinfo_item'>
                    <label>Medium</label>
                    <p><?=$art->f_artmedia;?></p>
                </div>
                <div class='artinfo_item'>
                    <label>Location</label>
                    <p><?php User_Art::render_location_name($art->f_artlocation);?></p>
                </div>
                <?php if ($art->f_price):?>
                    <div class='artinfo_item'>
                        <label>Price</label>
                        <p>$<?=$art->f_price;?></p>
                    </div>
                <?php endif; ?>
                <div class='artinfo_item'>
                    <label>Completed</label>
                    <p><?= date('M d Y',strtotime($art->start));?></p>
                </div>
            </div>
        </header>
        <?php if ($art->f_artdescription):?>
            <aside class='artdesc'>
                <?=$art->f_artdescription;?>
            </aside>  
        <?php endif; ?>
    </article>

    <section class='fullimage'>
        <?php $image->render('web','fullimage');?>
    </section>
    
    <?php if ($grid_images):?>
        <section class="artgrid_wrap">
            <?php foreach ($grid_images as $grid_image):?>
                <div class="artgrid_item">
                    <?php 
                    $image = new Image($grid_image->fields->artimage->default);
                    $image->render(300,'grid_image_only'); 
                    ?>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>
</section>




<?php
//CMS::pprint_r ($art);
?>
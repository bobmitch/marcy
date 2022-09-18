<?php
defined('CMSPATH') or die; // prevent unauthorized access
?>
<?php //CMS::pprint_r ($art); ?>
<section class='container'>
    
    <h1>
        <?=$art->title;?>
    </h1>
    <p class='art_info_main'>
        <?=$art->f_artdimensions;?>" <?=strtolower($art->f_artmedia);?> on <?=strtolower($art->f_artsupports);?>, <?=$art->f_artframed ? "framed" : "unframed";?>. 
        Completed <?= date('M Y',strtotime($art->start));?>.
    </p>

    <?php if ($tags):?>
        <ul class='taglist'>
            <?php foreach ($tags as $tag):?>
                <li class='tag'><a role='button' class='secondary' href='<?= Config::$uripath . "/art/tagged/" . $tag->alias;?>'><?=$tag->title;?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($art->f_shopurl && $art->category!=4):?>
        <p>
            <a role='button' target='_blank' href='<?= $art->f_shopurl; ?>'>
            Buy Online &nbsp;&nbsp;
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
            </a>
        </p>
    <?php endif; ?>

    <article class='artinfo'>
        <header>
            <div class='artinfo_wrap'>

                <div class='artinfo_item'>
                    <label>Status</label>
                    <p class="<?php echo $art_categories_keyed[$art->category]->title ?? "Available";?>"><?php echo $art_categories_keyed[$art->category]->title ?? "Available";?></p>
                </div>

                <?php if ($art->f_price):?>
                    <div class='artinfo_item <?php echo $art_categories_keyed[$art->category]->title ?? "Available";?>'>
                        <label>Price</label>
                        <p>$<?=$art->f_price;?></p>
                    </div>
                <?php endif; ?>
                
                <div class='artinfo_item'>
                    <label>Location</label>
                    <p><?php User_Art::render_location_name($art->f_artlocation);?></p>
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
                    $image->render(400,'grid_image_only'); 
                    ?>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>
</section>




<?php
//CMS::pprint_r ($art);
?>
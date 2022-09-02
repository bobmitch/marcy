<?php
defined('CMSPATH') or die; // prevent unauthorized access
?>

<?php if (!$location->f_listlocation):?>
    <p>This location is currently unlisted.</p>
<?php else: ?>
    <h1><?= $location->title;?></h1>

    <article class='artinfo'>
        <header>
            <div class='artinfo_wrap'>
                
                <div class='artinfo_item'>
                    <label>Address</label>
                    <p>
                        <?php if ($location->f_locationaddress):?>
                            <?=$location->f_locationaddress;?><br>
                        <?php endif; ?>
                        <?=$location->f_locationcity;?>, <?=$location->f_locationstate;?>
                    </p>
                </div>
                <?php if ($location->f_locationweb):?>
                    <div class='artinfo_item'>
                        <label>Website</label>
                        <p><a target='_blank' href='<?=$location->f_locationweb;?>'><?=$location->f_locationweb;?></a></p>
                    </div>
                <?php endif; ?>
            </div>
        </header>
        <?php if ($location->f_locationdesc):?>
            <aside class='artdesc'>
                <?=$location->f_locationdesc;?>
            </aside>  
        <?php endif; ?>
    </article>

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

    <?php //CMS::pprint_r ($location); ?>
<?php endif; ?>
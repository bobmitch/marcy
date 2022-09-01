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
                        <?=$location->f_locationaddress;?><br>
                        <?=$location->f_locationcity;?>, <?=$location->f_locationstate;?>
                    </p>
                </div>
                <?php if ($location->f_locationweb):?>
                    <div class='artinfo_item'>
                        <label>Website</label>
                        <p><?=$location->f_locationweb;?></p>
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

    <?php //CMS::pprint_r ($location); ?>
<?php endif; ?>
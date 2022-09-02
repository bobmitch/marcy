<?php
defined('CMSPATH') or die; // prevent unauthorized access
//CMS::pprint_r ($my_art);
?>

<div class="container">
    <?php if ($tag):?>
        <h1>Work tagged &ldquo;<?=$tag->title;?>&rdquo;</h1>
    <?php else:?>
        <h1>My Work</h1>
    <?php endif; ?>

    <?php if ($available_tags):?>
        <ul class='taglist'>
            <?php foreach ($available_tags as $tag):?>
                <li class='tag'><a role='button' class='secondary' href='<?= Config::$uripath . "/my-work/tagged/" . $tag->alias;?>'><?=$tag->title;?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div class="artgrid_wrap">
        
        <?php foreach ($my_art as $art):?>
            <?php User_Art::render_art_grid_item($art); ?>
        <?php endforeach; ?>
        
    </div>
</div>
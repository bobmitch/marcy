<?php
defined('CMSPATH') or die; // prevent unauthorized access
//CMS::pprint_r ($my_art);
?>

<div class="container">
    <div class="artgrid_wrap">
        
        <?php foreach ($my_art as $art):?>
            <?php User_Art::render_art_grid_item($art); ?>
        <?php endforeach; ?>
        
    </div>
</div>
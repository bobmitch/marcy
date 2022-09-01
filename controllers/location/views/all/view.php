<?php
defined('CMSPATH') or die; // prevent unauthorized access
?>

<h1>Galleries</h1>

<div class='grid'>
    <?php foreach ($locations as $location):?>
        <article>
            <h5><?php echo $location->title;?></h5>
            <?php CMS::pprint_r ($location); ?>
        </article>
    <?php endforeach; ?>
</div>
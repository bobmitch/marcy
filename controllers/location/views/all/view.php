<?php
defined('CMSPATH') or die; // prevent unauthorized access
?>

<h1>Galleries</h1>


    <?= $intro->f_markup; ?>


<div class='grid'>
    <?php foreach ($locations as $location):?>
        <article>
            <h5><?php echo $location->title;?></h5>
            <?php //CMS::pprint_r ($location); ?>
            <p>
                <?php if ($location->f_locationaddress) { echo $location->f_locationaddress . "<br>"; } ?>
                <?= $location->f_locationcity . "<br>" . $location->f_locationstate; ?>
            </p>
            <p><a role="button" class='secondary small' href="<?php echo Config::$uripath . "/galleries/" . $location->alias;?>" >More Info</a></p>
        </article>
    <?php endforeach; ?>
</div>
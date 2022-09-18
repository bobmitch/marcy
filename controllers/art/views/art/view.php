<?php
defined('CMSPATH') or die; // prevent unauthorized access
//CMS::pprint_r ($my_art);
?>

<div class="container">
    <hgroup>
        <?php if ($tag):?>
            <h1>My Work</h1>
            <h2>Work tagged &ldquo;<?=$tag->title;?>&rdquo;</h2>
        <?php else:?>
            <h1>My Work</h1>
            <h2>Shown from newest to oldest</h2>
        <?php endif; ?>
    </hgroup>

    <?php if ($available_tags):?>
        <ul class='taglist'>
            <?php foreach ($available_tags as $tag):?>
                <li class='tag'><a role='button' class='secondary' href='<?= Config::$uripath . "/my-work/tagged/" . $tag->alias;?>'><?=$tag->title;?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <section id='filter_art'>
        <form action="" method="GET" >
            <div class='grid'>
                <div>
                    <label for="status">Status</label>
                    <select id="status" required>
                        <option value="All" selected>All</option>
                        <?php foreach ($available_catids as $cat): ?>
                            <option value='<?=$cat->id;?>'><?=$cat->title;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="framed">Framed</label>
                    <select id="framed" required>
                        <option value="All" selected>Either</option>
                        <option value="framed">Framed</option>
                        <option value="unframed">Unframed</option>
                    </select>
                </div>
                <label for='maxprice'>Max Price <span id='maxprice_wrap'>($<span id='maxprice_val'>5000</span>)</span>
                    <input oninput='update_maxprice();' id='maxprice' name='maxprice' type='range' value='5000' step='50' min='10' max='10000'>
                </label>
            </div>
        </form>
    </section>

    <div class="artgrid_wrap">
        
        <?php foreach ($my_art as $art):?>
            <?php User_Art::render_art_grid_item($art); ?>
        <?php endforeach; ?>
        
    </div>
</div>

<script>
    function update_maxprice() {
        let maxprice = document.getElementById('maxprice').value.toString();
        document.getElementById('maxprice_val').innerText = maxprice;
    }
</script>
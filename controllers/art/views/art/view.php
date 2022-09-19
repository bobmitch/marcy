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
            <?php if ($artstatus):?>
                <!-- show filters --> 
                <p>Searching for <?php echo $artstatus=="All" ? 'both available and sold' : ($artstatus==3 ? 'available' : 'unavailable');?> 
                    work that is <?php echo $framed==2 ? 'either framed or unframed' : ($framed ? 'framed' : 'unframed');?>  
                    with a max price of $<?=$maxprice;?>
                    <?php if ($searchtext):?>
                        <br>Title must also contain &ldquo;<?=$searchtext;?>&rdquo;
                    <?php endif; ?>
                </p>
            <?php else: ?>
                <h2>Shown from newest to oldest</h2>
            <?php endif; ?>
        <?php endif; ?>
    </hgroup>

    <?php if ($available_tags):?>
        <ul class='taglist'>
            <?php foreach ($available_tags as $atag):?>
                <li class='tag'><a role='button' class='secondary' href='<?= Config::$uripath . "/art/tagged/" . $atag->alias;?>'><?=$atag->title;?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    
    <?php if (!$tag):?>
        <details>
            <summary>Search / Filter</summary>
            <section id='filter_art'>
                <form action="" method="GET" >
                    <div class='grid'>
                        <label>
                            Name
                            <input name='searchtext' id='searchtext'>
                        </label>
                        <div>
                            <label for="status">Status</label>
                            <select name='status' id="status" required>
                                <option value="All" selected>All</option>
                                <?php foreach ($available_catids as $cat): ?>
                                    <option value='<?=$cat->id;?>'><?=$cat->title;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label for="framed">Framed</label>
                            <select name='framed' id="framed" required>
                                <option value="2" selected>Either</option>
                                <option value="1">Framed</option>
                                <option value="0">Unframed</option>
                            </select>
                        </div>
                        <label for='maxprice'>Max Price <span id='maxprice_wrap'>($<span id='maxprice_val'>10000</span>)</span>
                            <input oninput='update_maxprice();' id='maxprice' name='maxprice' type='range' value='10000' step='50' min='10' max='10000'>
                        </label>
                        <label>&nbsp;
                            <button type="submit">Search</button>
                        </label>
                    </div>
                </form>
            </section>
        </details>
    <?php endif; ?>

    <div class="artgrid_wrap">
        <?php $rendered = 0; ?>
        <?php foreach ($my_art as $art):?>
            <?php if ( ($maxprice && $maxprice >= $art->f_price) || !$maxprice ):?>
                <?php User_Art::render_art_grid_item($art); $rendered++;?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php if ($rendered===0): ?>
        <p>Sorry, we didn't find any art that matched your search criteria, please try again.</p>
    <?php endif; ?>
</div>

<script>
    function update_maxprice() {
        let maxprice = document.getElementById('maxprice').value.toString();
        document.getElementById('maxprice_val').innerText = maxprice;
    }
</script>
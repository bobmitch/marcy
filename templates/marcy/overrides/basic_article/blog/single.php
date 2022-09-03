<?php
$blog = $blog_content_items[0]; 
$tags = Tag::get_tags_for_content($blog->id, 1); 
?>
<!-- <h4 class='title is-4'><?php echo $blog->title; ?></h4> -->
<div class='single_blog_wrap'>
    
    <?php if ($blog->f_og_image) {
        $image = new Image($blog->f_og_image);
        $image->render(600,'medium pull-right');
    }
    ?>
    <?php echo $blog->f_markup; ?>
</div>
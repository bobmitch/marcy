<?php
defined('CMSPATH') or die; // prevent unauthorized access
// basic_article/blog override
?>
<?php if ($blog_content_item):?>
	<hgroup>
		<h1 class='title is-1'><?php echo CMS::Instance()->page->title;?></h1>
		<h5 class='title is-5'><?php echo date("F jS, Y", strtotime($blog->start));?></h5>
	</hgroup>
<?php else: ?>
	<h1 class='title is-1'><?php echo CMS::Instance()->page->title;?></h1>
<?php endif; ?>

<?php if (sizeof($blog_content_items)==0):?>
<p>No blog entries found!</p>
<?php endif; ?>
<?php if (!$blog_content_item):?>
	<?php if ($filter_tag):?>
	<h5>Found <?php echo sizeof($blog_content_items);?> article(s) tagged &ldquo;<?php echo $filter_tag->title;?>&rdquo;</h5>
	<?php endif; ?>
	<section class='blog_list_wrap'>
	<?php foreach ($blog_content_items as $blog):?>
		<?php $tags = Tag::get_tags_for_content($blog->id, 1); ?>
		<article class='blog_wrap_item'>
			<hgroup class='title_and_date'>
				<h4 class='title is-4'><?php echo $blog->title; ?></h4>
				<h5 class='title is-5'><?php echo date("F jS, Y", strtotime($blog->start));?></h5>
            </hgroup>
			<div class='blog_tag_list_wrap'>
				<ol class='blog_tag_list'>
					<?php foreach ($tags as $tag):?>
						<?php if ($tag->public):?>
						<li>
							<a href='<?php echo CMS::Instance()->page->get_url();?>/tag/<?php echo $tag->alias;?>' class='blog_list_tag_link'><?php echo $tag->title;?></a>
						</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ol>
			</div>
			<?php if ($blog->f_og_description || $blog->f_og_image):?>
				<p class='preview'>
				<?php if ($blog->f_og_image) {
					$thumb = $img = new Image($blog->f_og_image);
					$thumb->render(600,'thumb square pull-right');
				}
				echo $blog->f_og_description; ?>
				</p>
			<?php endif; ?>
			<a role='button' class='readmore secondary small' href='<?php echo CMS::Instance()->page->get_url() . "/" . $blog->alias;?>'>Read More</a>
			
		</article>
	<?php endforeach; ?>
	</section>
	<?php if ($articles_per_page<999 && $articles_per_page):?>
	<nav class="pagination" role="navigation" aria-label="pagination">
		<a href="?page=<?php echo $cur_page-1;?>" class="pagination-previous <?php echo $show_prev ? "" : " is-disabled "; ?>">Previous</a>
		<a href="?page=<?php echo $cur_page+1;?>"class="pagination-next <?php echo $show_next ? "" : " is-disabled "; ?>">Next page</a>
	</nav>
	<?php endif; ?>
<?php else:?>
	<?php	include_once('single.php');?>
<?php endif; ?>

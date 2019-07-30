
<?php get_header(); ?>

<div class="main">
	<div class="article_container">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<article <?php post_class(); ?>>
				<div class="single_title"><h2><?php the_title(); ?></h2></div>

				<div class="text"><?php the_content(); ?></div>

				<?php  // 改ページを有効
				wp_link_pages(array(
					'before'			=> '<nav class="entry-links">',
					'after'				=> '</nav>',
					'link_before'		=> '',
					'link_after'		=> '',
					'next_or_number'	=> 'number',
					'separator'			=> '',
				)); ?>

				<div class="post_info">
					<time datetime="<?php echo get_the_date( 'Y/m/d' ); ?>"><?php echo get_the_date(); ?></time>

					<span><i class="fa fa-folder-open"></i><?php the_category(', '); ?></span>
				</div>	<!-- /post_info -->

				<?php if(get_the_tags()): ?>
					<?php $post_tags = get_the_tags(); ?>
					<div class="tag">
						<div class="tag_title">
							タグ
						</div>	<!-- /tag_title -->

						<?php my_get_post_tags(); ?>
					</div>	<!-- /tag -->
				<?php endif; ?>

				<?php comments_template(); ?>
			</article>
		<?php endwhile; endif; ?>
	</div>	<!-- /article_container -->

	<?php get_template_part('template-parts/pagenation'); ?>

	<?php get_sidebar(); ?>
</div>	<!-- /main -->

<?php get_footer(); ?>

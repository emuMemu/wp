
<?php get_header(); ?>

<div class="main">
	<div class="article_container">
		<div><h2><?php bloginfo('description'); ?></h2></div>

		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<article <?php post_class(); ?>>
				<div class="article_img_title">
					<?php if (has_post_thumbnail()) {
						// アイキャッチ画像
						the_post_thumbnail();
					} ?>

					<div class="article_title">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>	<!-- /article_title -->
				</div>	<!-- /article_img_title -->

				<?php the_excerpt(); ?>

				<div class="post_info">
					<time datetime="<?php echo get_the_date( 'Y/m/d' ); ?>"><?php echo get_the_date(); ?></time>

					<span><i class="fa fa-folder-open"></i><?php the_category(', '); ?></span>

					<span class="com"><a href="<?php comments_link(); ?>">
						<?php comments_number(
							'',
							'<i class="fa fa-comment"></i>(1件)',
							'<i class="fa fa-comment"></i>(%件)'
						); ?>
					</a></span>
				</div>	<!-- /post_info -->
			</article>
		<?php endwhile; endif; ?>

		<?php get_template_part('template-parts/pagenation_num'); ?>
	</div>	<!-- /article_container -->

	<?php get_sidebar(); ?>
</div>	<!-- /main -->

<?php get_footer(); ?>

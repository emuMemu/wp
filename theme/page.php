
<?php get_header(); ?>

<div class="main">
	<div class="article_container">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<article <?php post_class(); ?>>
				<div class="single_title"><h2><?php the_title(); ?></h2></div>

				<div class="text"><?php the_content(); ?></div>
			</article>
		<?php endwhile; endif; ?>
	</div>	<!-- /article_container -->

	<?php get_template_part('template-parts/pagenation'); ?>
</div>	<!-- /main -->

<?php get_footer(); ?>

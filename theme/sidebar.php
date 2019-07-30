
<aside class="sidebar">
	<div class="widget_container">
		<div class="widget widget_text widget_custom_html">
			<div class="widget-title">プロフィール</div>

			<div class="p_img">
				<?php if(get_header_image()): ?>
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header() -> width; ?>" height="<?php echo get_custom_header() -> height; ?>" alt="">
				<?php endif; ?>
			</div>

			<div class="wprofile">
				<div class="wprofile-content">
					<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
				</div>	<!-- /wprofile-content -->
			</div>	<!-- /wprofile -->
		</div>	<!-- /widget_custom_html -->

		<div class="widget widget_search">
			<div class="widget-title">検索</div>
			<?php get_search_form(); ?>
		</div>	<!-- /widget_search -->

		<?php if(is_active_sidebar('sidebar')): ?>
			<?php dynamic_sidebar('sidebar'); ?>
		<?php endif; ?>

		<div class="widget widget_ranking">
			<div class="widget-title">人気記事</div>

			<div class="wpost-items m_ranking">
				<?php
				// get_post_viewsで適宜アクセス数を確認
				// $counter = get_post_views();
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 5,
					'meta_key' => 'view_counter',
					'orderby' => 'meta_value_num',
					'order' => 'DESC',
				);
				$popular_posts = get_posts($args);

				foreach($popular_posts as $post): setup_postdata($post); ?>
					<div class="wpost-item">
						<div class="entry-item-img">
							<?php if (has_post_thumbnail()) {
								// アイキャッチ画像中
								the_post_thumbnail('medium');} ?>
						</div>	<!-- /entry-item-img -->

						<div class="wpost-item-body">
							<div class="wpost-item-title">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</div>	<!-- /wpost-item-title -->
						</div>	<!-- /wpost-item-body -->
					</div>	<!-- /wpost-item -->
				<?php endforeach; wp_reset_postdata(); ?>
			</div>	<!-- /m_ranking -->
		</div>	<!-- /widget_ranking -->

		<div class="widget widget_archive">
			<div class="widget-title">アーカイブ</div>

			<ul>
				<?php wp_get_archives($args); ?>
			</ul>
		</div>	<!-- /widget_archive -->
	</div>	<!-- /widget_container -->
</aside>	<!-- /sidebar -->

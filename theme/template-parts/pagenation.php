
<?php if(is_single()): ?>
	<div class="page_nav">
		<span class="old">
			<?php previous_post_link('%link', '&laquo; Old'); ?>
		</span>	<!-- /old -->

		<span class="new">
			<?php next_post_link('%link', 'New &raquo;'); ?>
		</span>	<!-- /new -->
	</div>	<!-- /page_nav -->

<?php else: ?>

	<?php if($wp_query->max_num_pages > 1): ?>
		<div class="page_nav">
			<span class="old">
				<?php next_posts_link('&laquo; Old'); ?>
			</span>	<!-- /old -->

			<span class="new">
				<?php previous_posts_link('New &raquo;'); ?>
			</span>	<!-- /new -->
		</div>	<!-- /page_nav -->
	<?php endif; ?>
<?php endif; ?>

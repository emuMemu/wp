
<div id="comments">
	<?php if(have_comments()): ?>
		<div class="comments">
			<h3>コメント</h3>

			<ul>
				<?php wp_list_comments( 'format=html5&type=comment&callback=mytheme_comment' ); ?>
			</ul>
		</div>	<!-- /comments -->
	<?php endif; ?>

	<?php comment_form('format=html5&title_reply=コメントを残す&label_submit=送信'); ?>
</div>	<!-- /#comments -->

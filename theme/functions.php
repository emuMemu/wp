<?php

// テーマのセットアップ
add_action('after_setup_theme', function() {
	// アイキャッチ画像を有効化
	add_theme_support('post-thumbnails');
	// 投稿とコメントのRSSフィードのリンクを有効化
	add_theme_support('automatic-feed-links');
	// タイトルタグ自動生成
	add_theme_support('title-tag');
	// HTML5マークアップの使用を許可する
	add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption',));
});

// CSSとJavaScriptの読み込み
add_action('wp_enqueue_scripts', function() {
	wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all');
	wp_enqueue_style('highlight', get_template_directory_uri() . '/highlight/styles/Monokai.css', array(), false, 'all');
	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.min.css', array(), '1.0.0', 'all');
	// wp_enqueue_style('dark_style', get_template_directory_uri() . '/css/dark_style.min.css', array(), '1.0.0', 'all');

	wp_enqueue_script('highlight', get_template_directory_uri() . '/highlight/highlight.pack.js', array(), false, true);
	wp_add_inline_script('highlight', 'hljs.initHighlightingOnLoad();');

	wp_enqueue_script('jq331', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array('jquery'), '3.3.1', true);
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jq331'), '1.0.0', true);
});

// メニューの登録
add_action('init', function() {
	register_nav_menus(array(
		'header_menu' => 'ヘッダーメニュー',
		'footer_menu' => 'フッターメニュー',
	));
});

// ウィジェットの登録
add_action('widgets_init', function() {
	register_sidebar(array(
		'name'			=> 'サイドバー',
		'description'	=> 'サイドバー',
		'id'			=> 'sidebar',
		'before_widget'	=> '<div class="widget">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget_title">',
		'after_title'	=> '</h4>'
	));
});

// アクセスカウンター
function set_post_views() {
	global $post;
	$count = 0;
	$count_key = 'view_counter';
	if($post) {
		$id = $post->ID;
		$count = get_post_meta($id, $count_key, true);
	}

	if($count === '') {
		delete_post_meta($id, $count_key);
		add_post_meta($id, $count_key, '1');
	} elseif($count > 0) {
		if(!is_user_logged_in()) {
			$count++;
			update_post_meta($id, $count_key, $count);
		}
	}
}
add_action('template_redirect', 'set_post_views', 10);

// 検索結果から固定ページを除外
function my_posts_search($search, $wp_query) {
	// 検索結果ページ・メインクエリ・管理画面以外
	if($wp_query->is_search() && $wp_query->is_main_query() && !is_admin()) {
		// 検索結果を投稿タイプに絞る
		$search .= " AND post_type = 'post' ";
		return $search;
	}
	return $search;
}
add_filter('posts_search','my_posts_search', 10, 2);

// タグ取得
function my_get_post_tags($id = 0) {
	global $post;
	// 引数が渡されなければ投稿IDを見るように設定
	if (0 === $id) {
		$id = $post->ID;
	}
	// タグ一覧を取得
	$tags = get_the_tags($id);

	if (!empty($tags)) {
		foreach($tags as $tag){
			echo '
			<div class="entry-tag-item">
				<a href="'. esc_url(get_tag_link($tag->term_id)) .'">'. esc_html($tag->name) .'</a>
			</div>	<!-- /entry-tag-item -->
			';
		}
	}
}

// highlight
add_filter('wpcom_markdown_transform_post', function($text) {
	$text = str_replace("    ", "\t", $text);
	return $text;
});

// precode
add_shortcode('code', function($atts, $content = null) {
	return '<div class="precode"><pre><code class="' . $atts['class'] . '">' . $content . '</code></pre></div>	<!-- /precode -->';
});





// カスタムヘッダー
$custom_header_defaults = array(
	'default-image'	=> get_bloginfo('template_url').'/images/1.jpg',
	'width'			=> 200,
	'height'		=> 200,
	'header-text'	=> false,	// ヘッダー画像上にテキストをかぶせる
);
add_theme_support('custom-header', $custom_header_defaults);

// カスタム背景
add_theme_support('custom-background');

// 抜粋の文字数
add_filter('excerpt_length', function($length) {
	return 50;
});

// 抜粋省略記号の変更
add_filter('excerpt_more', function($more) {
	return '...';
});

// RSS フィールド <link>の設定を出力
add_theme_support('automatic-feed-links');

// コメント
function mytheme_comment($comment, $args, $depth) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>

	<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<article id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<div class="comment-name-datetime">
				<div class="comment-author vcard">
					<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
				</div>

				<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php
					/* translators: 1: date, 2: time */
					printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time('H:i') ); ?></a>
				</div>
			</div>

			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation">
					<?php _e( 'あなたのコメントは管理者の承認待ちです。' ); ?>
				</em><br />
			<?php endif; ?>

			<?php comment_text(); ?>
		</article>
	</li>
<?php
}

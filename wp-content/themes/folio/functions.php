<?php

//Writing comment script
wp_register_script('custom_script', get_template_directory_uri() . '/js/custom.js', array(), false, true);
wp_localize_script('custom_script', 'comment_reply_ajax', array('ajax_url'=>get_template_directory_uri() . '/comment_reply.php'));
wp_enqueue_script('custom_script');

define(MAX_RECENT_POSTS, 5);
define(MAX_RECENT_COMMENTS, 5);

//Add thumbnail to post
add_theme_support('post-thumbnails');

//Add menu
add_theme_support('menus');

register_sidebar(array(
    'name'=> __('Right Hand Sidebar'),
    'id'=> 'right-sidebar',
    'description'=> __('Widget in this area will be shown on the right hand-side.'),
    'before_title'=> '<span class="name">',
    'after_title'=> '</span>',
    'before_widget'=> '<div id="%1$s" class="sidebar widget %2$s">',
    'after_widget'=> '</div><!-- widget end -->'
                       ));

// Main menu
function custom_get_main_menu(){
    $html = '';
    $html .=            '<ul class="nav nav-pills nav-main pull-right">
							<!-- begin navigation items -->
							<li><a href="' . get_site_url() . '">Home</a></li>' .
							custom_get_menu_categories() .
							//'<li><a href="contact.html">About me</a></li>' .
							//'<li><a href="contact.html">Contact</a></li>' .
							'<!-- end navigation items -->' .
						'</ul>';
    
    echo $html;
}

//Get list of category in menu
function custom_get_menu_categories(){
	$categories = get_categories(array('taxonomy'=>'category'));
	$html = '';
	$html .= '
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Category</a>
				<ul class="dropdown-menu">';
	
	foreach($categories as $obj){
		$category = get_object_vars($obj);
		$html .=
			'<li>
				<a href="' . get_site_url() . '?cat=' . $category['term_id'] . '">' . $category['name'] . '</a>
			</li>';
	}

	$html.=	'</ul>
		</li>';

	return $html;
}

//Recent posts
function custom_get_recent_posts(){
	$lastposts = get_posts(array('numberposts'=>MAX_RECENT_POSTS));
	$html = '';
	$html .= 
			'<div class="col-xs-12 col-sm-6 col-md-12 sidebar-item">
				<span class="name">Recent Blog Posts</span>
				<ul class="links">';
	foreach($lastposts as $obj){
		$post = get_object_vars($obj);
		$html .=
				'<li>
					<a href="' . get_site_url() . '/id/' . $post['ID'] . '">' . $post['post_title'] . '</a>' .
				'</li>';
	}
	
	$html .= 	'</ul>
			</div>';

	echo $html;
}

//Popular post
function custom_get_polular_posts(){
	$lastposts = get_posts(array('numberposts'=>MAX_RECENT_POSTS));
	$html = '';
	$html .= '
					<div class="col-xs-12 col-sm-6 col-md-12 sidebar-item">
						<span class="name">Popular Blog Posts</span>
						<ul class="popular-posts">';
	foreach($lastposts as $obj){
		$post = get_object_vars($obj);
		$html .=
				'<li>
					<a href="' . get_site_url() . '?p=' . $post['ID'] . '">' .
						$post['post_title'] .
						'<i class="fa fa-heart-o"> 265</i>
					</a>
				</li>';
	}
	
	$html .= '</ul>
				</div>';
				

	echo $html;
}

//Recent blog comment
function custom_get_recent_blog_comments(){
	$params = array('status'=>'approve', 'orderby'=>'comment_date', 'number'=>MAX_RECENT_COMMENTS);
	$comments = get_comments($params);
	//var_dump($comments);
	$html = '';
	$html .= '
					<div class="col-sm-12 sidebar-item">
						<span class="name">Recent Blog Comments</span>
						<ul class="popular-posts">';
	foreach($comments as $obj){
		$comment = get_object_vars($obj);
		$objectPost = get_post($comment['comment_post_ID']);
		$oDate = new DateTime($comment['comment_date']);
		$html .=
					'<li>
						<a href="#" style="white-space:normal;">
							<span class="comment">' . $comment['comment_author'] . '</span>' .
							'<span class="seperator">/</span>' .
							$objectPost->post_title .
						'</a>
					</li>';
	}
	
	$html .= '</ul>
		</div>';
		
	echo $html;
}

//Category
function custom_get_categories(){
	$categories = get_categories(array('taxonomy'=>'category'));
	$html = '';
	$html .= '
					<div class="col-xs-12 col-sm-6 col-md-12 sidebar-item">
						<span class="name">Categories</span>
						<ul class="popular-posts">';
	foreach($categories as $obj){
		$category = get_object_vars($obj);
		$html .=
			'<li>
				<a href="' . get_site_url() . '/cat/' . $category['slug'] . '">' . 
					$category['name'] .
					'<i class="fa fa-pencil">&nbsp;&nbsp;&nbsp;' . $category['category_count'] . '</i>
				</a>
			</li>';
	}
							
	$html.=	'</ul>
		</div>';

	echo $html;
}

function custom_get_categories_footer(){
	$categories = get_categories(array('taxonomy'=>'category'));
	$html = '';
	$html .= '
						<ul class="popular-posts">';
	foreach($categories as $obj){
		$category = get_object_vars($obj);
		$html .=
			'<li>
				<a href="' . get_site_url() . '?cat=' . $category['term_id'] . '">' . 
					$category['name'] .
					'<i class="fa fa-pencil">&nbsp;&nbsp;&nbsp;' . $category['category_count'] . '</i>
				</a>
			</li>';
	}
							
	$html.=	'</ul>';

	echo $html;
}

function custom_get_comment_child($parent_id = 0, $comments, $display = true){
	$html = '';
	$html .= '<li class="single-comment">';
	foreach($comments as $obj){
		$comment = get_object_vars($obj);
		$oCommentDate = new DateTime($comment['comment_date']);
		if(intval($comment['comment_parent']) == $parent_id){
			$html .= '<div class="author-image">' .
						'<img src="' . get_template_directory_uri() . '/images/thumbs/80x80.gif" alt="author image">' .
							'</div>' .
								'<div class="author-data">' .
									'<strong>' .
										$comment['comment_author'] . ' on ' . $oCommentDate->format('M d, Y') . ' at ' . $oCommentDate->format('H:i:s') .
									'</strong>' .
									'</div>' .
									'<div class="author-text">' . 
										'<p>' .
											$comment['comment_content'] .
											'<a class="reply" href="javascript:comment_reply_child(' . $comment['comment_ID'] . ')">Reply</a>' .
										'</p>' .
									'</div>' .

									'<ul class="children">' .
									custom_get_comment_child(intval($comment['comment_ID']), $comments, false) .
									'</ul>';
		}
	}
	
	$html .= '</li>';
	
	if($display)
		echo $html;
	
	return $html;
}

//Image thumbnail by default
function custom_the_post_thumbnail(){
	$html = '<img width="600" height="400"
		src="http://localhost/wordpress/wp-content/uploads/2014/12/default3.jpg"
		class="attachment-full wp-post-image" alt="default">';
	
	echo $html;
}

//Remove admin bar
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	//if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	//}
}

//Pagination
//Source :
// - http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/
function custom_pagination_nav(){
	if(is_singular()) return;
	
	global $wp_query;
	if($wp_query->max_num_pages <= 1) return;
	$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
	
	$max = intval($wp_query->max_num_pages);
	
	if($paged >= 1){
		$links[] = $paged;
	}
	
	if($paged >= 3){
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	
	if($paged + 2 <= $max){
		$links[] = $paged + 1;
		$links[] = $paged + 2;
	}
	
	echo '<div class="navigation"><ul>' . "\n";
	if(get_previous_posts_link()){
		echo "<li>" . get_previous_posts_link() . "</li>\n";
	}
	
	if(!in_array(1, $links)){
		$class = 1 == $paged ? ' class="active" ' : '';
		echo "<li $class><a class=\"btn-border\" href=\"" . esc_url(get_pagenum_link(1)) . "\">1</a></li>\n";
		
		if(!in_array(2, $links)){
			echo '<li>...</li>';
		}
	}
	
	sort($links);
	foreach($links as $link){
		$class = $link == $paged ? ' class="active" ' : '';
		echo "<li$class><a class=\"btn-border\" href=\"" . esc_url(get_pagenum_link($link)) . "\">$link</a>\n";
	}
	
	if(!in_array($max, $links)){
		if(!in_array($max - 1, $links)){
			echo '<li>...</li>\n';
			$class = $paged == $max ? ' class="active"' : '';
			echo "<li$class><a class=\"btn-border\" href=\"" . esc_url(get_pagenum_link($max)) . "\">$max</a>\n";
		}
	}
	
	if(get_next_posts_link()){
		echo "<li>" . get_next_posts_link() . "</li>\n";
	}
	echo '</ul></div>';
}

//
function custom_image_slider($srcs){
	$html = '';
	$html .= '
		<div id="owl-demo" class="image-show owl-carousel owl-theme">';
	foreach($srcs as $src){
		$html .= '
			<div class="item"><img src="' . $src . '"></div>';
	}
		   
	$html.='
		</div>';
	
	return $html;
}

?>
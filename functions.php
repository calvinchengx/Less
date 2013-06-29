<?php

// Define the version as a constant so we can easily replace it throughout the theme
define( 'LESS_VERSION', 1.1 );

/*-----------------------------------------------------------------------------------*/
/* Add Rss to Head
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/* register main menu
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'less' ),
	)
);

/*-----------------------------------------------------------------------------------*/
/* Enque Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function less_scripts()  { 

	// theme styles
	wp_enqueue_style( 'less-style', get_template_directory_uri() . '/style.css', '10000', 'all' );
			
	// add fitvid
	wp_enqueue_script( 'less-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), LESS_VERSION, true );
	
	// add theme scripts
	wp_enqueue_script( 'less', get_template_directory_uri() . '/js/theme.min.js', array(), LESS_VERSION, true );
  
}
add_action( 'wp_enqueue_scripts', 'less_scripts' );

function style_my_inline($content){

	//what you use to denote your code
	$inline_marker = "`";

	//regex for code
	$pattern = "/".$inline_marker."[\w\D\d]+?".$inline_marker."/";
	preg_match_all($pattern,$content,$matches);

	//what you want your surrounding markup to be 
	$prepend_tag = "<span class = \"code\">";
	$append_tag = "</span>";

	//for each occurance in preg match results...
	foreach($matches as $match){
	    for($i=0;$i<count($match);$i++){
		//remove inline marker from match text
		$match_without_inline_marker = str_replace($inline_marker,'',$match[$i]);
		//add surrounding markup to match
		$match_with_tags = $prepend_tag.$match_without_inline_marker.$append_tag;
		//replace match in original content with marked-up match
		$content = str_replace($match[$i],$match_with_tags,$content);
	    }
	}

	return $content + "boohoo";
}

apply_filters( 'the_content', 'style_my_inline');

function disqus_count($disqus_shortname) {
    wp_enqueue_script('disqus_count','http://'.$disqus_shortname.'.disqus.com/count.js');
    echo '<a href="'. get_permalink() .'#disqus_thread"></a>';
}

// custom previous_post_link and next_post_link
function custom_previous_post_link($format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '',$limit = -1) {

	if ( is_attachment() )
		$post = & get_post($GLOBALS['post']->post_parent);
	else
		$post = get_previous_post($in_same_cat, $excluded_categories);

	if ( !$post )
		return;

	$title = apply_filters('the_title', $post->post_title, $post);
	if ($limit>-1) {$title = substr($title,0,$limit).'&hellip;';}
	$string = '<a href="'.get_permalink($post->ID).'">';
	$link = str_replace('%title', $title, $link);
	$link = $pre . $string . $link . '</a>';

	$format = str_replace('%link', $link, $format);

	echo $format;
}

function custom_next_post_link($format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '',$limit = -1) {
	$post = get_next_post($in_same_cat, $excluded_categories);

	if ( !$post )
		return;

	$title = apply_filters('the_title', $post->post_title, $post);
	if ($limit>-1) {$title = substr($title,0,$limit).'&hellip;';}
	$string = '<a href="'.get_permalink($post->ID).'">';
	$link = str_replace('%title', $title, $link);
	$link = $string . $link . '</a>';
	$format = str_replace('%link', $link, $format);

	echo $format;
}

function category_tree($category, $el="li") {
	
	// Example usage: 
	// category_tree(get_the_category(get_the_UD())

	//# getting the main category of the page
	$catid=$category[0]->category_parent;
	if($catid==0){
	  $catid=$category[0]->cat_ID;
	}

	//# now letz get the children categories of the main category
	$categories = get_categories('child_of='.intval($catid)); 					 

	if ($el == "li"):
		echo '<ul>';
	endif;

	foreach ($categories as $category) {
	    //# check if it is a real parent category with subcategories
	
	    $category_link = get_category_link(intval($category->cat_ID));
	    
            if ($category_link):
		    if ($category->parent ==$catid):
			echo '<'.$el; 
			echo ' class="cat">';
			echo '<a href="'.$category_link.'">'.$category->cat_name.'</a>';
			echo '</'.$el.'>';
			//# here we go, getting the subcategories
			$subcategories=  get_categories('child_of='.intval($category->cat_ID));
			foreach ($subcategories as $subcategory) {
			    echo '<'.$el; 
			    echo ' class="subcat" style="padding-left:12px">';
			    $subcategory_link = get_category_link(intval($subcategory->cat_ID));
			    echo '<a href="'.$category_link.'">'.$subcategory->cat_name.'</a>';
			    echo '</'.$el.'>';
			}
		    endif;
	    endif;

	}

	if ($el == "li"):
		echo '</ul>';
	endif;

}

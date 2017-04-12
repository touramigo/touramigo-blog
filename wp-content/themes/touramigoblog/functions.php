<?php   register_nav_menus(
    array(
    'primary'=>__('Menu 1'),
    'primary1'=>__('Menu 2'),
    )
); 
add_theme_support('post-thumbnails');
 
if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
}
add_image_size ('blog', 1920, 966, true);
add_image_size ('popular', 178, 115, true);
add_image_size ('related', 560, 364, true);
add_image_size ('cat', 1920, 720, true);
add_image_size ('home', 2000, 720, true);
add_image_size ('home2', 360, 234, true);
add_image_size ('home3', 760, 494, true);



function disqus_embed($disqus_shortname) {
    global $post;
    wp_enqueue_script('disqus_embed', 'http://'.$disqus_shortname.'.disqus.com/embed.js');
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = "'.$disqus_shortname.'";
        var disqus_title = "'.$post->post_title.'";
        var disqus_url = "'.get_permalink($post->ID).'";
        var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
    </script>';
}
function true_loadmore_scripts() {
	wp_enqueue_script('jquery'); 
 	wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
}
 
add_action( 'wp_enqueue_scripts', 'true_loadmore_scripts' );
function true_load_posts(){


$unserializedecode = base64_decode($_POST['query']);
	$args = unserialize(stripslashes($unserializedecode));
	$args['paged'] = $_POST['page'] + 1; 
	$args['post_status'] = 'publish';
	$q = new WP_Query($args);
	if( $q->have_posts() ):
		while($q->have_posts()): $q->the_post();
			



?>
			       <article class="article-preview article-preview_big">
                <a href="<?php the_permalink(); ?>" class="a-p-photo">
                 <?php
$thumb_id3 = get_post_thumbnail_id();
$thumb_url3 = wp_get_attachment_image_src($thumb_id3,'related', true);

?>
  <?php if($thumb_url3[0]) {?>
                                    <img src="<?php echo $thumb_url3[0];?>" alt="">
<?php } ?>
                    <i class="a-p-photo__shadow a-p-photo__shadow_big"></i>
                    <span class="a-p-photo__signature">By <?php the_author(); ?></span>
                </a><!--a-p-photo-->

                <div class="a-p-bottom">


<?php $term_list = wp_get_post_terms(get_the_ID(), array('category'), array("fields" => "ids")) ?>
                            <a href="<?php  echo get_category_link($term_list[0]); ?>" class="a-p__type"><?php  echo get_cat_name($term_list[0]); ?></a>
                  

                    <a href="<?php the_permalink(); ?>">
                        <span class="a-p-top">
<?php if(get_field('mins_reading')) { ?>
                            <span class="a-p__reading"><?php the_field('mins_reading'); ?> <?php the_field('mins_reading_text'); ?></span>
<?php } ?>
                            <span class="a-p__time"> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' AGO'; ?></span>
                        </span><!--a-p-top-->

                        <span class="a-p__title">
                        <?php  the_title(); ?> 
                        </span>

                    </a>

                </div><!--a-p-bottom-->

            </article>
			<?php
		
	endwhile;
	endif;
	wp_reset_postdata();
	die();
	
	
}
 
 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');


class menuvert_walker extends Walker_Nav_Menu
{
function start_lvl( &$output, $depth ) {
 static $column = 1;
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); 
 $column += 1;
    $classes = array(
        'sub-menu',
        ( $display_depth % 2  ? 'menu-sub-categories' : 'menu-sub-categories' ),
        ( $display_depth >=2 ? ' menu-sub-categories' : '' ),
  ( $column ==2 ? 'active' : '' ),
        'menu-depth-' . $display_depth
        );

    $class_names = implode( ' ', $classes );
  
    // build html
    $output .= "\n" . $indent . '<div class="menu-category-sub-wr"><ul class=" ' . $class_names . '">' . "\n";

}

  function end_lvl(&$output, $depth)
   {
       $indent = str_repeat("\t", $depth);
       $output .= "$indent</ul></div>\n";
   }

      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
          $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';



           $class_names = $value = '';
 
           $classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

     

    


if($depth != '0') {
    $class_names = ' class="menu-sub-category '. esc_attr( $class_names ) . '"';
           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
}
if($depth != '1') {
     $class_names = ' class="menu-category '. esc_attr( $class_names ) . '"';
           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
}

           $output .= $indent . '';
 
           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
   
     
 
            $item_output = $args->before;








if($depth != '0') {


  if( in_array( 'current-menu-item', $classes ) ||
    in_array( 'current-menu-ancestor', $classes ) ||
    in_array( 'current-menu-parent', $classes ) ||
    in_array( 'current-page-parent', $classes ) ||
    in_array( 'current-page-ancestor', $classes )
    ) {

  $item_output .= '<a class="menu-sub-category__link active"  '. $attributes .'>';
  }
else {
  $item_output .= '<a class="menu-sub-category__link "  '. $attributes .'>';
}


  
}
if($depth != '1') {
  $item_output .= '<div><a class="menu-category__link "  '. $attributes .'>';
}


            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
if($depth != '0') {
   $item_output .= '</a>';
}
if($depth != '1') {
$item_output .= '</a></div>';
}
            
            $item_output .= $args->after;
 
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }



          



 function end_el(&$output, $item, $depth=0, $args=array()) {
if($depth == '0') {
    $output .= "</li>\n";
} else {
$output .= "</li>\n";
}
    }
}


class menuvert2_walker extends Walker_Nav_Menu
{
function start_lvl( &$output, $depth ) {
 static $column = 1;
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); 
 $column += 1;
    $classes = array(
        'sub-menu',
        ( $display_depth % 2  ? 'menu-sub-categories' : 'menu-sub-categories' ),
        ( $display_depth >=2 ? ' menu-sub-categories' : '' ),
  ( $column ==2 ? 'active' : '' ),
        'menu-depth-' . $display_depth
        );

    $class_names = implode( ' ', $classes );
  
    // build html
    $output .= "\n" . $indent . '<ul class=" ' . $class_names . '">' . "\n";

}

  function end_lvl(&$output, $depth = 0, $args = Array())
   {
       $indent = str_repeat("\t", $depth);
       $output .= "$indent</ul>\n";
   }

      function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0)
      {
           global $wp_query;
          $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';



           $class_names = $value = '';
 
           $classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

     

    



     $class_names = ' class=" '. esc_attr( $class_names ) . '"';
           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';


           $output .= $indent . '';
 
           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
   
     
 
            $item_output = $args->before;









  if( in_array( 'current-menu-item', $classes ) ||
    in_array( 'current-menu-ancestor', $classes ) ||
    in_array( 'current-menu-parent', $classes ) ||
    in_array( 'current-page-parent', $classes ) ||
    in_array( 'current-page-ancestor', $classes )
    ) {

  $item_output .= '<a class="menu-links__link active"  '. $attributes .'>';
  }
else {
  $item_output .= '<a class="menu-links__link "  '. $attributes .'>';

 }

            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;

   $item_output .= '</a>';

            
            $item_output .= $args->after;
 
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }



          



 function end_el(&$output, $item, $depth=0, $args=array()) {

$output .= "</li>\n";

    }
}

function my_acf_options_page_settings( $acf_options_page_settings )
{
  $acf_options_page_settings['title'] = 'Options';
  $acf_options_page_settings['pages'] = array('Home',  'Header',  'Footer',  'Disqus');
  $acf_options_page_settings['capability'] = 'edit_themes';

  return $acf_options_page_settings;
}
add_filter('acf/options_page/settings', 'my_acf_options_page_settings');
function custom_menu_order( $menu_ord ) {  
    
    if (!$menu_ord) return true;  
    
    
    // vars
    $menu = 'acf-options-home';
    
    
    // remove from current menu
    $menu_ord = array_diff($menu_ord, array( $menu ));
    
    
    // append after index.php [0]
    array_splice( $menu_ord, 5, 0, array( $menu ) );
    
    
    // return
    return $menu_ord;
}  

add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order  
add_filter('menu_order', 'custom_menu_order');
function searchExcludePages($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
 
	return $query;
}
 
add_filter('pre_get_posts','searchExcludePages');

function is_subcategory ($catid) {
    $cat_data = get_category($catid);
    if ( $cat_data->parent )
        return true;
    else
        return false;
}
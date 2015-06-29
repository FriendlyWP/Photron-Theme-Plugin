<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
//require_once( 'library/custom-post-type.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes

add_image_size('tiny-thumb', 150);
add_image_size('footer-thumb', 400, 225, true);

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );
function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'tiny-thumb' => __('150px wide'),
        //'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar Widgets', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

  register_sidebar(array(
    'id' => 'footer1',
    'name' => __( 'Footer Widgets', 'bonestheme' ),
    'description' => __( 'Widgets which appear in the site footer.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/************** ADD FILE TYPES TO MEDIA LIBRARY FILTERS ****************/
add_filter( 'post_mime_types', 'custom_mime_types' );
function custom_mime_types( $post_mime_types ) {
        $post_mime_types['application/msword'] = array( __( 'Word Docs' ), __( 'Manage Word Docs' ), _n_noop( 'Word Docs <span class="count">(%s)</span>', 'Word Docs <span class="count">(%s)</span>' ) );
        $post_mime_types['application/vnd.ms-excel'] = array( __( 'Excel Files' ), __( 'Manage Excel Files' ), _n_noop( 'Excel Files <span class="count">(%s)</span>', 'Excel Files <span class="count">(%s)</span>' ) );
        $post_mime_types['application/vnd.ms-powerpoint'] = array( __( 'PowerPoint Files' ), __( 'Manage PowerPoint Files' ), _n_noop( 'PowerPoint Files <span class="count">(%s)</span>', 'PowerPoint Files <span class="count">(%s)</span>' ) );
        $post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ), _n_noop( 'PDFs <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );
        $post_mime_types['application/zip'] = array( __( 'ZIPs' ), __( 'Manage ZIPs' ), _n_noop( 'ZIP <span class="count">(%s)</span>', 'ZIPs <span class="count">(%s)</span>' ) );
        
        return $post_mime_types;
}

/************ RESPONSIVE VIDEO ******************/
// remove dimensions from oEmbed videos
add_filter( 'embed_oembed_html', 'tdd_oembed_filter', 10, 4 ) ; 
function tdd_oembed_filter($html, $url, $attr, $post_ID) {
   // $html = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&autohide=1&controls=0&HD=1&autoplay=1", $html);
    $return = '<figure class="video-container">'.$html.'</figure>';

    return $return;
}

// customize embed settings
function custom_youtube_settings($code){
  if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
    $return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&autohide=1&controls=0&HD=1&autoplay=1", $code);
    return $return;
  }
  return $code;
}
 
//add_filter('embed_handler_html', 'custom_youtube_settings');
//add_filter('embed_oembed_html', 'custom_youtube_settings');

// Filter video output 
add_filter('oembed_result','lc_oembed_result', 10, 3);
function lc_oembed_result($html, $url, $args) {
  // $args includes custom argument
  $newargs = $args;

  // get rid of discover=true argument
  array_pop( $newargs );

  $parameters = http_build_query( $newargs );
  
  // Modify video parameters
  $html = str_replace( '?feature=oembed', '?feature=oembed'.'&amp;'.$parameters, $html );
  return $html;
} 

/**************** SHORTCODES ***************/

// ENABLE SHORTCODES IN ALL TEXT WIDGETS
add_filter('widget_text', 'do_shortcode');

/************* ACF ****************/
if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(array(
        'title' => 'Copyright & Address',
        'parent' => 'options-general.php',
        'capability' => 'manage_options'
    ));
}

/**** MENU SOCIAL ICONS ****/
add_filter( 'storm_social_icons_use_latest', '__return_true' );


// FILTER WORDPRESS SEO BY YOAST outputs in the WordPress control panel
// remove WP-SEO columns from edit-list pages in admin
add_filter( 'wpseo_use_page_analysis', '__return_false' );

// put WP-SEO panel at bottom of edit screens (low priority)
add_filter('wpseo_metabox_prio' , 'my_wpseo_metabox_prio' );
function my_wpseo_metabox_prio() {
  return 'low' ;                                
}

function save_other_video_thumbnail($post_id) {
    $postdata = get_postdata($post_id);
    if ( $postdata['post_status'] == 'draft' OR $postdata['post_status'] == 'future') {
        get_video_thumbnail($post_id);
    }
}

if (function_exists('get_video_thumbnail')) {
  add_action('save_post', 'save_other_video_thumbnail', 10, 1);
}


/***  WOOCOMMERCE STUFF ***/

add_theme_support( 'woocommerce' );

// remove 'sort by' dropdown
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
// remove 'results x of y' notice at top
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// Display 40 products per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 40;' ), 20 );

/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );

function child_manage_woocommerce_styles() {
  //remove generator meta tag
  remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

  //first check that woo exists to prevent fatal errors
  if ( function_exists( 'is_woocommerce' ) ) {
    //dequeue scripts and styles
    if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
      wp_dequeue_style( 'woocommerce_frontend_styles' );
      wp_dequeue_style( 'woocommerce_fancybox_styles' );
      wp_dequeue_style( 'woocommerce_chosen_styles' );
      wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
      wp_dequeue_style( 'woocommerce-layout' );
      wp_dequeue_style( 'woocommerce-smallscreen' );
      wp_dequeue_style( 'woocommerce-general' );
      wp_dequeue_script( 'wc_price_slider' );
      wp_dequeue_script( 'wc-single-product' );
      wp_dequeue_script( 'wc-add-to-cart' );
      wp_dequeue_script( 'wc-cart-fragments' );
      wp_dequeue_script( 'wc-checkout' );
      wp_dequeue_script( 'wc-add-to-cart-variation' );
      wp_dequeue_script( 'wc-single-product' );
      wp_dequeue_script( 'wc-cart' );
      wp_dequeue_script( 'wc-chosen' );
      // MUST ENQUEUE WOOCOMMERCE OR JS ERROR AND RESPONSIVE LIGHTBOX WON'T WORK
      //wp_dequeue_script( 'woocommerce' );
      wp_dequeue_script( 'prettyPhoto' );
      wp_dequeue_script( 'prettyPhoto-init' );
      wp_dequeue_script( 'jquery-blockui' );
      wp_dequeue_script( 'jquery-placeholder' );
      wp_dequeue_script( 'fancybox' );
      wp_dequeue_script( 'jqueryui' );
    }

  }



}

// Replace WooThemes Breadcrumbs with Yoast breadcrumbs
add_action( 'init', 'hh_breadcrumbs' );
function hh_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
    add_action( 'woocommerce_before_main_content','hh_yoast_breadcrumb', 20, 0);
    function hh_yoast_breadcrumb() {
        if ( function_exists('yoast_breadcrumb')  && !is_front_page() ) {
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        }
    }

}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );        // Remove the description tab
    unset( $tabs['reviews'] );      // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;

}

/*
 * wc_remove_related_products
 * 
 * Clear the query arguments for related products so none show.
 * Add this code to your theme functions.php file.  
 */
function wc_remove_related_products( $args ) {
  return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10); 

// SINGLE PRODUCT 
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action('woocommerce_single_product_summary', 'display_content', 20 );

function display_content() {
  $content = get_the_content(get_queried_object_id());
  $content = apply_filters('the_content', $content);
  echo $content;
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );


add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +
function woo_archive_custom_cart_button_text() {
        return __( 'View Details', 'woocommerce' ); 
}

function get_terms_dropdown($taxonomy, $args, $default_text='Choose your country'){
  $myterms = get_terms($taxonomy, $args);
  $output ="<select id='js-select' name='distributor-country-list form-control'>";
  $output .='<option value="">'. $default_text  . '</option>';
  if ($taxonomy == 'distributor_country') {
    $output .='<option value="united-states">United States</option>';  
  }
  foreach($myterms as $term){
    $root_url = get_bloginfo('url');
    $term_taxonomy=$term->taxonomy;
    $term_slug=$term->slug;
    $term_name =$term->name;
    $link = $term_slug;
    $output .="<option value='".$link."'>".$term_name."</option>";
  }
  $output .="</select>";
return $output;
}

function get_terms_dropdown_link($taxonomy, $args, $default_text='Choose your country'){
  $myterms = get_terms($taxonomy, $args);
  $output ="<select id='js-select-link' name='distributor-list form-control'>";
  $output .='<option value="">'. $default_text  . '</option>';
  $root_url = get_bloginfo('url');
  $term_taxonomy=$term->taxonomy;
  if ($taxonomy == 'distributor_country') {
    $output .='<option value="' . $root_url . '/contact/distributors/country/united-states">United States</option>';  
  }
  foreach($myterms as $term){
    
    $term_slug=$term->slug;
    $term_name =$term->name;
    $term_url = get_term_link($term->slug, $term->taxonomy);
    $link = $term_slug;
    $output .="<option value='".$term_url."'>".$term_name."</option>";
  }
  $output .="</select>";
return $output;
}
add_shortcode( 'distributor_dropdown', 'get_terms_dropdown_shortcode' );
function get_terms_dropdown_shortcode($atts) {
  extract( shortcode_atts( array(
        'taxonomy' => '', // registered taxonomy id; for instance: distributor_country
        'args' => '', // for get_terms; for instance: array('hide_empty=0,orderby=menu_order')
        'default_text' => 'Choose your country',
   ), $atts ) );
  ob_start();
  $myterms = get_terms($taxonomy, $args);
  var_dump($myterms);
  $output ="<select id='js-select-link' name='distributor-list form-control'>";
  $output .='<option value="">'. $default_text  . '</option>';
  $root_url = get_bloginfo('url');
  $term_taxonomy=$term->taxonomy;
  if ($taxonomy == 'distributor_country') {
    $output .='<option value="' . $root_url . '/contact/distributors/country/united-states">United States</option>';  
  }
  foreach($myterms as $term){
    
    $term_slug=$term->slug;
    $term_name =$term->name;
    $term_url = get_term_link($term->slug, $term->taxonomy);
    $link = $term_slug;
    $output .="<option value='".$term_url."'>".$term_name."</option>";
  }
  $output .="</select>";
  ob_get_clean();
return $output;
}

// DEBUGGING FOR JQUERY SCRIPTS
if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
    add_action ('wp_enqueue_scripts', 'wpcs_init');
    add_action ('admin_enqueue_scripts', 'wpcs_init');
}
 
function wpcs_init() {
    global $wp_scripts;
    if (isset($wp_scripts->registered['jquery']->ver)) {
        $jquery_version = $wp_scripts->registered['jquery']->ver;
        wp_deregister_script ('jquery');
        wp_register_script ('jquery', "http://ajax.googleapis.com/ajax/libs/jquery/{$jquery_version}/jquery.js");
    }
}

/***** TINY MCE TINYMCE CHANGES *****/
add_filter( 'mce_buttons_2', 'fb_mce_editor_buttons' );
function fb_mce_editor_buttons( $buttons ) {

    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

/**
 * Add styles/classes to the "Styles" drop-down
 */ 
add_filter( 'tiny_mce_before_init', 'fb_mce_before_init' );
function fb_mce_before_init( $settings ) {
    $style_formats = array(
        array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'button',
            ),
       array(
            'title' => 'Orange Button',
            'selector' => 'a',
            'classes' => 'button orange',
            ),
        array(
            'title' => 'Larger Text',
            'inline' => 'span',
            'classes' => 'larger',
            'wrapper' => true,
        ),
        array(
            'title' => 'Smaller Text',
            'inline' => 'span',
            'classes' => 'smaller',
            'wrapper' => true,
        ),
    );

    // Merge old & new styles
    $settings['style_formats_merge'] = true;

    $settings['style_formats'] = json_encode( $style_formats );
    unset($settings['preview_styles']);
    return $settings;
}

add_action( 'after_setup_theme', 'my_theme_add_editor_fonts' );
function my_theme_add_editor_fonts() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic' );
    add_editor_style( $font_url );
}

/***** GRAVITY FORMS ******/

add_filter( 'gform_notification_5', 'route_notification', 1, 2 );
function route_notification($notification, $form , $entry) {
    global $post;
    if ( ($notification["name"] == "Response to Form Submitter - US Version - ENGLISH") || ($notification["name"] == "Response to Form Submitter - US Version - Spanish") || ($notification["name"] == "Response to Form Submitter - US Version - Portuguese") ) { // The name of your admin notification 
      $email_to = get_post_meta($post->ID, 'email', true);
      if ($email_to){
          $notification['to'] .= ',' . $email_to;
      }
    }
    return $notification;
}

/**
* Merge Tags as Dynamic Population Parameters - gravity forms
* http://gravitywiz.com/dynamic-products-via-post-meta/
*/
add_filter('gform_pre_render', 'gw_prepopluate_merge_tags');
function gw_prepopluate_merge_tags($form) {
    
    $filter_names = array();
    
    foreach($form['fields'] as &$field) {
        
        if(!rgar($field, 'allowsPrepopulate'))
            continue;
        
        // complex fields store inputName in the "name" property of the inputs array
        if(is_array(rgar($field, 'inputs')) && $field['type'] != 'checkbox') {
            foreach($field['inputs'] as $input) {
                if(rgar($input, 'name'))
                    $filter_names[] = array('type' => $field['type'], 'name' => rgar($input, 'name'));
            }
        } else {
            $filter_names[] = array('type' => $field['type'], 'name' => rgar($field, 'inputName'));
        }
        
    }
    
    foreach($filter_names as $filter_name) {
        
        $filtered_name = GFCommon::replace_variables_prepopulate($filter_name['name']);
        
        if($filter_name['name'] == $filtered_name)
            continue;
        
        add_filter("gform_field_value_{$filter_name['name']}", create_function("", "return '$filtered_name';"));
    }
    
    return $form;
}

// ON EVENTS ARCHIVE ONLY SHOW 5 EVENTS IN LIST VIEW
add_action('pre_get_posts', 'fwp_num_posts');
function fwp_num_posts( $query ){
    if ( ! is_admin() && $query->is_main_query() ) {
      if ( is_post_type_archive( 'event' ) ) {
        $query->set('posts_per_page', 5 );
      }
    }
}
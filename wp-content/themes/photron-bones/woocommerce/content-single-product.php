<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	

	<div class="summary entry-summary">
		<?php
			/**
			 * woocommerce_before_single_product_summary hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
			//the_content();
		?>

	</div><!-- .summary -->

	<div class="moreinfo">
		
		<?php echo '<ul class="prod-tags">'; 
		echo display_options('memory_option');
		echo display_options('resolution_option');
		echo display_options('frame_rate_option');
		echo display_options('full_res_fps_option');
		echo display_options('sensitivity_option');
		echo display_options('data_rate_option');
		echo display_options('miscellaneous_option');
		echo '</ul>';
		?>
		<?php //echo do_shortcode('[tabby title="General"]'); ?>
			<?php //the_content(); ?>
		<?php if ( function_exists('get_field') && get_field('product_features') ) {
			echo do_shortcode('[tabby title="Key Features"]'); 
				the_field('product_features'); 
		} ?>
		<?php if ( function_exists('get_field') && get_field('product_specifications') ) {
			echo do_shortcode('[tabby title="Specifications"]'); 
				the_field('product_specifications'); 
		} ?>
		
		<?php
		// echo do_shortcode('[tabby title="Tech Specs"]'); 
		//	 echo WC_Compare_Hook_Filter::show_compare_fields(get_queried_object_id()); 
		?>

		<?php 

		$args = array(
	            'posts_per_page' => 1, // only pull one since this is just a test
	            'post_type' => 'video',
	            'meta_query' => array(
					array(
						'key' => 'related_cameras', // name of custom field
						'value' => '"' . get_queried_object_id() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
						'compare' => 'LIKE'
					)
				)
	        ); 
        	// get posts with the current taxonomy archive term; if we're anywhere eles, all videos will be shown
            $videos = get_posts($args);
            if ($videos)  {
            	echo do_shortcode('[tabby title="Videos"]'); 
            	echo do_shortcode('[videos camera="' . get_queried_object_id() . '"]');
            }
		?>

		<?php /*if ( function_exists('get_field') && get_field('product_data_sheets') ) {
			echo do_shortcode('[tabby title="DataSheet"]'); 
				the_field('product_data_sheets'); 
		}*/
		if (function_exists('get_field') && have_rows('data_sheets')) {
			echo do_shortcode('[tabby title="DataSheet"]'); 
			while( have_rows('data_sheets') ): the_row();
				$file_title = get_sub_field('display_name');
				$attachment_id = get_sub_field('file');
				$url = wp_get_attachment_url( $attachment_id );
				$filetype = wp_check_filetype( $url );
				$type = $filetype['ext'];
				if ($file_title == '') {
					$file_title = get_the_title( $attachment_id );
				}
				echo '<a target="_blank" href="' . $url . '" class="button datasheet filetype filetype-' . $type . '">' . $file_title . '</a>';
			endwhile;
		}

		if (function_exists('get_field') && get_field('product_spec_tables')) {
			$prod_spec = get_field('product_spec_tables');
			echo do_shortcode('[tabby title="Specs & Frame Rates"]'); 
			echo '<div class="table-container"><iframe src="' . $prod_spec . '"></iframe></div>';
		}
		 ?>
		<?php echo do_shortcode('[tabbyending]'); ?>
	</div>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );

	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
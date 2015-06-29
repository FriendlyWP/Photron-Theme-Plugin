<?php 
//adding scripts file in the footer
wp_enqueue_style('flexslider',  get_template_directory_uri() . '/library/css/flexslider.css', array(), '', false );
wp_enqueue_script('flexslider',  get_template_directory_uri() . '/library/js/libs/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '', true );
?>

<script type="text/javascript" language="javascript">
jQuery(document).ready(function($) {
   $('.flexslider').flexslider({
    animation: "slide",
    easing: "swing",
     controlNav: false,
     directionNav: false,
     pauseOnHover: true,
      start: function(){
         $('.flexContent').show(); 
    },
  });
   
});
</script>
						
<?php
if (function_exists('get_field') ) {
 	if (get_field('frames')) {
 	//echo '<div class="slideshow">';
 	echo '<div class="flexslider" >';
 	echo '<ul class="slides">';	
		 
		while(has_sub_field('frames')):
			$overlay_heading_text = get_sub_field('overlay_heading_text');
			$overlay_smaller_text = get_sub_field('overlay_smaller_text');
			$button_text = get_sub_field('button_text');
			$button_destination = get_sub_field('button_destination');
			//$slide_video = get_sub_field('slide_video');
			//$slide_video_id = youtubeid($slide_video);
			$slide_image = get_sub_field('slide_image');
				$image_info =  wp_get_attachment_image_src( $slide_image, 'feature-slide' );
				//echo '<div class="ls-slide"  data-ls="slidedelay: 8000;">';
                echo '<li class="flexContent">';
		 		
		 		if ( $slide_image ) {
		 			if ($button_destination) {
		 				echo '<a href="' . $button_destination . '">';
		 			}
		 			  echo '<img class="slide-image" src="' . $image_info[0] . '" />';
		 			if ($button_destination) {
                        echo '</a>';
                    }
                    if ($overlay_heading_text || $overlay_smaller_text || $button_text ) {
                           echo '<span class="flex-caption"><span>';
                            if ( $overlay_heading_text ) {
                                echo '<h3>' . $overlay_heading_text . '</h3>';
                            }
                            if ( $overlay_smaller_text ) {
                                echo '<p>' .  $overlay_smaller_text . '&nbsp;&nbsp;&nbsp;';
                            }
                                if ( $button_text ) {
                                    echo '<a href="' . $button_destination . '" class="button orange">' . $button_text . '</a>';
                                }
                            if ( $overlay_smaller_text ) {
                                echo '</p>';
                            }
                            echo '</span></span>';
                    } 
                    


		 		} /* elseif ( $slide_video ) {
		 			//echo '<iframe data-title="Video 1" data-caption="some caption" width="420" height="315" src="//www.youtube.com/embed/aXsjsfoiRJk?html5=1" frameborder="0" allowfullscreen></iframe>';
		 			echo '<div class="ls-l" data-ls="offsetxin: 0; offsetyin: 0;"><iframe frameborder="0" allowfullscreen="0" width="845" height="555" frameborder="0" title="" type="text/html" src="http://www.youtube.com/embed/' . $slide_video_id . '?showinfo&enablejsapi=1&html5=1&rel=0&wmode=opaque"></iframe></div>';
                    /*if ($overlay_heading_text ) {
                            echo '<div class="ls-l vidpos" style="top:540px; left:0px;position:relative; width:auto; height:auto;z-index:99;"><span class="overlay"><span>';
                           
                            echo '<h3>' . $overlay_heading_text . '</h3>';
                           
                            echo '</span></span></div>';
                    } 
                    if ($button_destination) {
                        echo '<a href="' . $button_destination . '" class="ls-link"></a>';
                    } */
		 		//} 
		 		
		 		 
		 		echo '</li>';
 		endwhile; 
 	echo '</ul>';
	//echo '</div>';
	echo '</div>';
	}
}
?>
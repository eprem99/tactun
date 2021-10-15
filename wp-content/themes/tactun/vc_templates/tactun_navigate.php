<?php extract(shortcode_atts(array(

), $atts));
          echo  '<ul class="navigate">';
	            echo do_shortcode( $content );  
	      echo '</ul>';             


?>

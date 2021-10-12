<?php extract(shortcode_atts(array(

), $atts));
          echo  '<div class="accordion">';
	            echo do_shortcode( $content );  
	      echo '</div>';             


?>

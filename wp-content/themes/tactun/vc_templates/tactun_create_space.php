<?php

extract(shortcode_atts(array(
    'create_space_desktop' => '',
    'create_space_tablet' => '',
    'create_space_mobile' => '',
    'create_space_color'  => '',
), $atts));

// Unique ID for each Space
$create_space_id = uniqid( 'CreateSpace_' );

?>

<div class="create-space" id="<?php echo esc_attr( $create_space_id ); ?>" style="<?php if(!empty($create_space_color)){ echo 'background-color:'.$create_space_color;} ?>">

<script>
    (function($){
        "use strict";

        // vars
        var CreateSpaceID = '<?php echo esc_js( $create_space_id ); ?>';

        function tactun_Create_Space() {

            // Desktop sized devices
            if (window.matchMedia('(min-width: 1200px)').matches && <?php echo esc_js($create_space_desktop); ?>) {
                $('#' + CreateSpaceID).css( 'height', <?php echo esc_js($create_space_desktop); ?> );
            }

            // Tablet sized devices
            else if (window.matchMedia('(max-width: 1199px) and (min-width: 700px)').matches && <?php echo esc_js($create_space_tablet); ?>) {
                $('#' + CreateSpaceID).css( 'height', <?php echo esc_js($create_space_tablet); ?> );
            }

            // Mobile sized devices
            else if (window.matchMedia('(max-width: 699px) and (min-width: 1px)').matches && <?php echo esc_js($create_space_desktop); ?>) {
                $('#' + CreateSpaceID).css( 'height', <?php echo esc_js($create_space_mobile); ?> );
            }

            // Otherwise
            else {
                $('#' + CreateSpaceID).css ( 'height', '' );
            }

        }

        // Initialize
        $(document).ready(function(){
           tactun_Create_Space();
        });

        // Check when window resized
        $(window).resize(function(){
           tactun_Create_Space();
        });


    })(jQuery);
</script>

</div>

<?php
// Register and load the widget
function tactun_load_widget_soc() {
    register_widget( 'tactun_widget_soc' );
}
add_action( 'widgets_init', 'tactun_load_widget_soc' );
 
// Creating the widget 
class tactun_widget_soc extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'tactun_widget_soc', 
 
// Widget name will appear in UI
__('Soc icons', 'tactun'), 
 
// Widget description
array( 'description' => __( 'Soc icons', 'tactun' ), ) 
);
}

// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
global $tactun_options; 
if($title){
    echo '<div class="widget_title">'.$title.'</div>';
}
?>
<div class="social-icons">
    <?php if( $tactun_options['footer_social_facebook'] == true ) { ?>
        <a class="social_icons social-icon-facebook" href="<?php echo esc_url( $tactun_options['footer_social_facebook_url'] ) ?>" target="_blank">
            <svg id="facebook" height="18px" viewBox="0 0 512 512" width="18px" xmlns="http://www.w3.org/2000/svg"><path d="m483.738281 0h-455.5c-15.597656.0078125-28.24218725 12.660156-28.238281 28.261719v455.5c.0078125 15.597656 12.660156 28.242187 28.261719 28.238281h455.476562c15.605469.003906 28.257813-12.644531 28.261719-28.25 0-.003906 0-.007812 0-.011719v-455.5c-.007812-15.597656-12.660156-28.24218725-28.261719-28.238281zm0 0" fill="#1999fc"/><path d="m353.5 512v-198h66.75l10-77.5h-76.75v-49.359375c0-22.386719 6.214844-37.640625 38.316406-37.640625h40.683594v-69.128906c-7.078125-.941406-31.363281-3.046875-59.621094-3.046875-59 0-99.378906 36-99.378906 102.140625v57.035156h-66.5v77.5h66.5v198zm0 0" fill="#fff"/></svg>
        </a>
    <?php } ?>

    <?php if( $tactun_options['footer_social_twitter'] == true ) { ?>
        <a class="social_icons social-icon-twitter" href="<?php echo esc_url( $tactun_options['footer_social_twitter_url'] ) ?>" target="_blank">
            <svg version="1.1" id="twitter" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
            <path style="fill:#1999fc;" d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                C480.224,136.96,497.728,118.496,512,97.248z"/>
            </svg>
        </a>
    <?php } ?>

    <?php if( $tactun_options['footer_social_youtube'] == true ) { ?>
        <a class="social_icons social-icon-youtube" href="<?php echo esc_url( $tactun_options['footer_social_youtube_url'] ) ?>" target="_blank">
            <svg id="youtube" height="682pt" viewBox="-21 -117 682.66672 682" width="682pt" xmlns="http://www.w3.org/2000/svg"><path d="m626.8125 64.035156c-7.375-27.417968-28.992188-49.03125-56.40625-56.414062-50.082031-13.703125-250.414062-13.703125-250.414062-13.703125s-200.324219 0-250.40625 13.183593c-26.886719 7.375-49.03125 29.519532-56.40625 56.933594-13.179688 50.078125-13.179688 153.933594-13.179688 153.933594s0 104.378906 13.179688 153.933594c7.382812 27.414062 28.992187 49.027344 56.410156 56.410156 50.605468 13.707031 250.410156 13.707031 250.410156 13.707031s200.324219 0 250.40625-13.183593c27.417969-7.378907 49.03125-28.992188 56.414062-56.40625 13.175782-50.082032 13.175782-153.933594 13.175782-153.933594s.527344-104.382813-13.183594-154.460938zm-370.601562 249.878906v-191.890624l166.585937 95.945312zm0 0"/></svg>
        </a>
    <?php } ?>

    <?php if( $tactun_options['footer_social_rss'] == true ) { ?>
        <a class="social_icons social-icon-rss" href="<?php echo esc_url( $tactun_options['footer_social_rss_url'] ) ?>" target="_blank">
           <svg id="rss" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 448 448" style="enable-background:new 0 0 448 448;" xml:space="preserve">
            <g>
                <g>
                    <circle cx="64" cy="384" r="64"/>
                </g>
            </g>
            <g>
                <g>
                    <path d="M0,149.344v85.344c117.632,0,213.344,95.68,213.344,213.312h85.312C298.656,283.328,164.672,149.344,0,149.344z"/>
                </g>
            </g>
            <g>
                <g>
                    <path d="M0,0v85.344C200,85.344,362.688,248,362.688,448H448C448,200.96,247.04,0,0,0z"/>
                </g>
            </g>
            </svg>
        </a>
    <?php } ?>
</div>

<?php
}
         
// Widget Backend 
public function form( $instance ) {

// Check values
if( $instance) {
$title = esc_attr($instance['title']);
} else {
$title = '';
}

?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

?>
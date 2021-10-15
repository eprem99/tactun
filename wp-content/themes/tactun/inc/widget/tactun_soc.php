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
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M25 10H22C20.6739 10 19.4021 10.5268 18.4645 11.4645C17.5268 12.4021 17 13.6739 17 15V18H14V22H17V30H21V22H24L25 18H21V15C21 14.7348 21.1054 14.4804 21.2929 14.2929C21.4804 14.1054 21.7348 14 22 14H25V10Z" fill="white" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
<circle cx="20" cy="20" r="19.5" stroke="white"/>
</svg>
        </a>
    <?php } ?>

    <?php if( $tactun_options['footer_social_twitter'] == true ) { ?>
        <a class="social_icons social-icon-twitter" href="<?php echo esc_url( $tactun_options['footer_social_twitter_url'] ) ?>" target="_blank">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="20" cy="20" r="19.5" stroke="white"/>
        <path d="M31 11.0101C30.0424 11.6877 28.9821 12.2059 27.86 12.5449C27.2577 11.8502 26.4573 11.3579 25.567 11.1344C24.6767 10.9109 23.7395 10.9671 22.8821 11.2954C22.0247 11.6237 21.2884 12.2082 20.773 12.9699C20.2575 13.7316 19.9877 14.6338 20 15.5543V16.5574C18.2426 16.6032 16.5013 16.2122 14.931 15.4193C13.3607 14.6265 12.0103 13.4564 11 12.0132C11 12.0132 7 21.0415 16 25.054C13.9405 26.4564 11.4872 27.1595 9 27.0603C18 32.076 29 27.0603 29 15.5242C28.9991 15.2448 28.9723 14.9661 28.92 14.6916C29.9406 13.6819 30.6608 12.4072 31 11.0101Z" fill="white" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
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
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="20" cy="20" r="19.5" stroke="white"/>
<path d="M24 16C25.5913 16 27.1174 16.6321 28.2426 17.7574C29.3679 18.8826 30 20.4087 30 22V29H26V22C26 21.4696 25.7893 20.9609 25.4142 20.5858C25.0391 20.2107 24.5304 20 24 20C23.4696 20 22.9609 20.2107 22.5858 20.5858C22.2107 20.9609 22 21.4696 22 22V29H18V22C18 20.4087 18.6321 18.8826 19.7574 17.7574C20.8826 16.6321 22.4087 16 24 16Z" fill="white"/>
<path d="M14 17H10V29H14V17Z" fill="white"/>
<path d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z" fill="white"/>
<path d="M24 16C25.5913 16 27.1174 16.6321 28.2426 17.7574C29.3679 18.8826 30 20.4087 30 22V29H26V22C26 21.4696 25.7893 20.9609 25.4142 20.5858C25.0391 20.2107 24.5304 20 24 20C23.4696 20 22.9609 20.2107 22.5858 20.5858C22.2107 20.9609 22 21.4696 22 22V29H18V22C18 20.4087 18.6321 18.8826 19.7574 17.7574C20.8826 16.6321 22.4087 16 24 16Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M14 17H10V29H14V17Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
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
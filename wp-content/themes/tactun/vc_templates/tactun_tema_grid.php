<?php extract(shortcode_atts(array(
    'featured_img' => '',
    'tactun_title' => '',
	'tactun_subtitle' => '',
    'steps' => '',
), $atts));

$image  = wp_get_attachment_image($featured_img, 'tactun-image-374x257-cropped');
$class = chars_class();
$steps = vc_param_group_parse_atts($steps);
?>
    <div class="mb-4 <?php echo $class; ?>">
        <div class="team-grid fetured">
            <div class="team-grid-img"> <?php echo $image; ?></div>
            <div class="team-block">
            	<div class="team-name"><?php echo $tactun_title; ?></div>
				<div class="team-subname"><?php echo $tactun_subtitle; ?></div>
                <div class="team-grid-text">
                    <?php
                    foreach ($steps as $el) {
                        echo '<p>';
                        if(!empty($el['title'])){
                            echo '<span>'.$el['title'].'</span>';
                            echo ' - ';
                        }
                        if(!empty($el['desc'])){
                            echo $el['desc'];
                        }
                        echo '</p>';
                    }
                 ?></div>
            </div>
        </div>
    </div>  

<?php extract(shortcode_atts(array(
    'tactun_title' => '',
    'tactun_description' => '',
), $atts));

if(!empty($tactun_title) || !empty($tactun_link)){
echo '<div class="panel">';
echo '<div class="actitle">';
echo '<span>';
echo $tactun_title;
echo '<i class="icon"></i>';
echo '</span>';
echo '</div>';
echo '<div class="acdesc">';
echo $tactun_description;
echo '</div></div>';

}

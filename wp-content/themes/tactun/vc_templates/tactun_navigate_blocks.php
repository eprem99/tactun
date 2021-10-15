<?php extract(shortcode_atts(array(
    'tactun_title' => '',
    'tactun_link' => '',
    'tactun_sub' => '',
), $atts));

if(!empty($tactun_title) || !empty($tactun_link)){
echo '<li class="navs sub">';
echo '<a class="navsik" href="'.$tactun_link.'">'.$tactun_title.'</a>';
if($content){
  echo  '<ul class="sub-navigate">';
        echo do_shortcode( $content );  
  echo '</ul>';   
  }   
echo '</li>';
}

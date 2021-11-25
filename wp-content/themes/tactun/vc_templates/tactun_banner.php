<?php extract(shortcode_atts(array(
     'banner_img' => '',
     'tactun_paralax' => '',
     'tactun_angle_top' => '',
     'tactun_angle_bottom' => '',
     'tactun_title' => '',
     'tactun_descrition' => '',
     'tactun_window_width' => '',
     'tactun_window' => '',
     'tactun_tablet' => '',
     'tactun_mobile' => '',
     'tactun_colors' => '', 
     'tactun_button_text' => '',
     'tactun_button_link' => '',
     'tactun_button_color' => '',
     'tactun_colors' => '', 
     'tactun_title_size' => '',
     'tactun_title_weight' => '',
     'tactun_title_line' => '',
     'tactun_backgraund_color' => '',
     'tactun_backgraund_gradient' => '',
     'tactun_backgraund_color_text' => '',
     'tactun_backgraund_color_desc' => '',
     'tactun_backgraund_title_color' => '',
), $atts));

if(!empty($banner_img)){
  $featured_img = wp_get_attachment_image_url( $banner_img, 'full' );
       if($tactun_paralax != 1){
      echo '<div class="banner-block">';
      // if($tactun_angle_top == 1){
      //   echo '<svg class="decor tactun_angle_top" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
      //   <path d="M0 100 L100 0 L100 100" stroke-width="0" fill=""></path>
      //   </svg>';
      // }
      echo '<div class="banner" style="background-image:url('.$featured_img.')">';
      if(!empty($tactun_title || $tactun_descrition)){
        echo '<div class="container">';
        echo '<div class="banner-blocks">';
        if(!empty($tactun_title)){
              echo '<div class="banner-title">'.$tactun_title.'</div>';
        }
        if(!empty($tactun_descrition)){
              echo '<div class="banner-description">'.$tactun_descrition.'</div>';
        }
        if(!empty($tactun_button_text)){
          echo '<div class="banner-button"><a href="'.$tactun_button_link.'">'.$tactun_button_text.'</a></div>';
        }
        echo '</div>';
        // if($tactun_angle_bottom == 1){
        //   echo '<svg class="decor tactun_angle_bottom" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
        //   <path d="M0 100 L100 0 L100 100" stroke-width="0" fill=""></path>
        //   </svg>';
        // }
        echo '</div>';
      }
      echo '</div></div>';
      }else{
        echo '<div class="banner-block">';
        // if($tactun_angle_top == 1){
        //   echo '<svg class="decor tactun_angle_top" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
        //   <path d="M0 100 L100 0 L100 100" stroke-width="0" fill=""></path>
        //   </svg>';
        // }
      echo '<div class="parallax-window banner" data-image-src="'.$featured_img.'">';
      if(!empty($tactun_title || $tactun_descrition)){
        echo '<div class="container">';
        echo '<div class="banner-blocks">';
        if(!empty($tactun_title)){
              echo '<div class="banner-title">'.$tactun_title.'</div>';
        }
        if(!empty($tactun_descrition)){
              echo '<div class="banner-description">'.$tactun_descrition.'</div>';
        }
        if(!empty($tactun_button_text)){
          echo '<div class="banner-button"><a href="'.$tactun_button_link.'">'.$tactun_button_text.'</a></div>';
        }
              echo '</div></div>';
          }
          echo '</div>';
          // if($tactun_angle_bottom == 1){
          //   echo '<svg class="decor tactun_angle_bottom" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
          //   <path d="M0 100 L100 0 L100 100" stroke-width="0" fill="url(#grad1)"></path>
          //   </svg>';
         // }
          echo '</div>';
      }
}elseif(!empty($tactun_backgraund_color) && empty($banner_img)){
  echo '<div class="banner-block">';
  if($tactun_angle_top == 1){
    // echo '<svg class="decor tactun_angle_top" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
    // <path d="M0 100 L100 0 L100 100" stroke-width="0" fill="url(#grad1)"></path>
    // </svg>';
  }
    echo '<div class="banner">';
  if(!empty($tactun_title || $tactun_descrition)){
    echo '<div class="container">';
    echo '<div class="banner-blocks">';
    if(!empty($tactun_title)){
          echo '<div class="banner-title">'.$tactun_title.'</div>';
    }
    if(!empty($tactun_descrition)){
          echo '<div class="banner-description">'.$tactun_descrition.'</div>';
    }
    if(!empty($tactun_button_text)){
      echo '<div class="banner-button"><a href="'.$tactun_button_link.'">'.$tactun_button_text.'</a></div>';
    }
      echo '</div></div>';
  }
  echo '</div>';
  if($tactun_angle_bottom == 1){
    // echo '<svg class="decor tactun_angle_bottom" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
    // <path d="M0 100 L100 0 L100 100" stroke-width="0" fill="url(#grad1)"></path>
    // </svg>';
  }
  echo '</div>';
}

?>
<style type="text/css" media="screen">
  <?php if(!empty($tactun_mobile)){ ?>
  @media (max-width: 760px){
    .banner{
      height: <?php echo $tactun_mobile; ?>px;
    }
  }
  <?php } ?>
    <?php if(!empty($tactun_tablet)){ ?>
  @media (min-width: 770px){
    .banner{
      height: <?php echo $tactun_tablet; ?>px;
    }
  }
  <?php } ?>
  <?php if(!empty($tactun_window)){ ?>
    @media (min-width: 1024px){
      .banner{
        height: <?php echo $tactun_window; ?>px;
      }
    }
    <?php } ?>  
    <?php if(!empty($tactun_backgraund_color) && empty($tactun_backgraund_gradient)){ ?>
     .banner:before {
          background-color: <?php echo $tactun_backgraund_color; ?>;
          content: "";
     }

  <?php }elseif(!empty($tactun_backgraund_color) && !empty($tactun_backgraund_gradient)){ ?>
      .banner:before {
        background: <?php echo $tactun_backgraund_color; ?>;
        background: linear-gradient(90deg, <?php echo $tactun_backgraund_color; ?> 0%, <?php echo $tactun_backgraund_gradient; ?> 100%);
        content: "";
        }
  <?php } ?>
    <?php if(!empty($tactun_backgraund_color_text)){ ?>
      .banner-blocks {
        color: <?php echo $tactun_backgraund_color_text; ?>;
     }
 <?php } ?>

    <?php if(!empty($tactun_window_width)){ ?>
/*       .banner-block {
        width: <?php // echo $tactun_window_width; ?> 
     } */
 <?php } ?>
    <?php if(!empty($tactun_title_size)){ ?>
      .banner-title {
        font-size: <?php echo $tactun_title_size; ?> 
     }
 <?php } ?>
 <?php if(!empty($tactun_title_weight)){ ?>
      .banner-title {
        font-weight: <?php echo $tactun_title_weight; ?> 
     }
 <?php } ?>

    <?php if(!empty($tactun_backgraund_color) && empty($tactun_backgraund_gradient)){ ?>
     .banner {
          background-color: <?php echo $tactun_backgraund_title_color; ?>;
     }
  <?php }elseif(!empty($tactun_backgraund_color) && !empty($tactun_backgraund_gradient)){ ?>
      .banner {
        background: <?php echo $tactun_backgraund_color; ?>;
        background: linear-gradient(90deg, <?php echo $tactun_backgraund_color; ?>, <?php echo $tactun_backgraund_gradient; ?>);
     }
  <?php } ?>
 <?php if(empty($tactun_descrition)){ ?>
    .banner-blocks {
      max-width: 100%;
    }
<?php } ?>
<?php if(!empty($tactun_descrition)){ ?>
    .banner-description {
      color: #fff;
    }
<?php } ?>
<?php if(strlen($tactun_title) > 50 && !empty($tactun_title_line)){ ?>
    .banner-title::before {
      height: 90%;
    }
<?php } ?>
<?php if(!empty($tactun_title_line)){ ?>
  .banner-title {
    padding-left: 13px;
  }
<?php } ?>
<?php if($tactun_backgraund_color_desc){ ?>
  .banner-description {
    color: <?php echo $tactun_backgraund_color_desc; ?>;
  }
<?php } ?>
<?php
    if(!empty($tactun_button_color)){ ?>
      .banner-button a {
        background: <?php echo $tactun_button_color; ?>;
      }
    <?php } ?>        
</style>

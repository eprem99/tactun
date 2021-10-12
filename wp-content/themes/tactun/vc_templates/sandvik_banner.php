<?php extract(shortcode_atts(array(
     'banner_img' => '',
     'tactun_paralax' => '',
     'tactun_title' => '',
     'tactun_descrition' => '',
     'tactun_bredcrumbs' => '',
     'tactun_window_width' => '',
     'tactun_window' => '',
     'tactun_tablet' => '',
     'tactun_mobile' => '',
     'tactun_colors' => '', 
     'tactun_title_size' => '',
     'tactun_title_weight' => '',
     'tactun_title_line' => '',
     'tactun_backgraund_color' => '',
     'tactun_backgraund_gradient' => '',
     'tactun_backgraund_color_text' => '',
     'tactun_backgraund_color_desc' => '',
     'tactun_backgraund_title_color' => '',
     'tactun_backgraund_title_gradient' => '',
), $atts));

if(!empty($banner_img)){
  $featured_img = wp_get_attachment_image_url( $banner_img, 'full' );
       if($tactun_paralax != 1){
      echo '<div class="banner" style="background-image:url('.$featured_img.')">';
      if(!empty($tactun_title || $tactun_descrition || $tactun_bredcrumbs)){
        echo '<div class="container">';
        echo '<div class="banner-block">';
        if(!empty($tactun_bredcrumbs)){
              echo '<div class="banner-breadcrumbs">'.the_breadcrumb().'</div>';
        }
        if(!empty($tactun_title)){
              echo '<div class="banner-title">'.$tactun_title.'</div>';
        }
        if(!empty($tactun_descrition)){
              echo '<div class="banner-description">'.$tactun_descrition.'</div>';
        }
              echo '</div></div>';
          }
      echo '</div>';
      }else{
      echo '<div class="parallax-window banner" data-image-src="'.$featured_img.'">';
      if(!empty($tactun_title || $tactun_descrition || $tactun_bredcrumbs)){
        echo '<div class="container">';
        echo '<div class="banner-block">';
        if(!empty($tactun_bredcrumbs)){
              echo '<div class="banner-breadcrumbs">'.the_breadcrumb().'</div>';
        }
        if(!empty($tactun_title)){
              echo '<div class="banner-title">'.$tactun_title.'</div>';
        }
        if(!empty($tactun_descrition)){
              echo '<div class="banner-description">'.$tactun_descrition.'</div>';
        }
              echo '</div></div>';
          }
      echo '</div>';
      }
}elseif(!empty($tactun_backgraund_color) && empty($banner_img)){
    echo '<div class="banner">';
  if(!empty($tactun_title || $tactun_descrition || $tactun_bredcrumbs)){
    echo '<div class="container">';
    echo '<div class="banner-block">';
    if(!empty($tactun_bredcrumbs)){
          echo '<div class="banner-breadcrumbs">'.the_breadcrumb().'</div>';
    }
    if(!empty($tactun_title)){
          echo '<div class="banner-title">'.$tactun_title.'</div>';
    }
    if(!empty($tactun_descrition)){
          echo '<div class="banner-description">'.$tactun_descrition.'</div>';
    }
      echo '</div></div>';
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
      .banner-block {
        color: <?php echo $tactun_backgraund_color_text; ?>;
     }
 <?php } ?>
     <?php if(!empty($tactun_backgraund_title_color) && empty($tactun_backgraund_title_gradient)){ ?>
      .banner-block {
        background-color: <?php echo $tactun_backgraund_title_color; ?>;
        padding: 20px;
     }
 <?php }else{ ?>
  .banner-title{
    text-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);
  }
 <?php } ?>
    <?php if(!empty($tactun_backgraund_title_color) && !empty($tactun_backgraund_title_gradient)){ ?>
      .banner-block {
        background-color: <?php echo $tactun_backgraund_color; ?>;
        background: linear-gradient(90deg, <?php echo $tactun_backgraund_title_color; ?>, <?php echo $tactun_backgraund_title_gradient; ?>);
        padding: 20px;
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
    .banner-block {
      max-width: 100%;
    }
<?php } ?>
<?php if(!empty($tactun_descrition)){ ?>
    .banner-description {
      color: #6f7684;
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
</style>

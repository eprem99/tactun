<?php
/**
 * Template for the Archives
 */
get_header(); 
$cat_ID = get_query_var('cat');
if($cat_ID){
  $banner = get_term_meta($cat_ID, 'page_banner_image', true ); 
  $contact_enable = get_term_meta($cat_ID, 'page_contact_enabla', true );  
  $contact_image = get_term_meta($cat_ID, 'page_contact_image', true );  
  $page_banner_color = get_term_meta($cat_ID, 'page_banner_color', true);
  $contact_title = get_term_meta($cat_ID, 'page_contact_title', true );  
  $contact_description = get_term_meta($cat_ID, 'page_contact_description', true );
  $contact_shortcode = get_term_meta($cat_ID, 'page_contact_shortcode', true );  
  $banner_title = get_term_meta($cat_ID, 'banner_title', true ); 
  $banner_color = get_term_meta($cat_ID, 'page_contact_color', true ); 
  $banner_backgraund = get_term_meta($cat_ID, 'page_contact_backgraund', true ); 
  $height = get_term_meta($cat_ID, 'banner_banner_height', true );
}


?>
<div class="archive-blog">
<div class="container-fulid archive-banner" style="background-image: url('<?php echo wp_get_attachment_image_url( $banner, 'full' ) ?>');<?php if($height){ echo 'height: '.$height.'px;';} ?>">
    <?php if(!empty($banner_title)){ ?>
    <div class="container">    
        <div class="row">
            <div class="col-md-12 banner-title" style="text-shadow: 0 3px 6px rgba(0, 0, 0, 0.16);">
                <?php echo $banner_title; ?>
            </div>
        </div>
    </div>
<?php } ?>
</div>    

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter" class="filter-scroll">
                <div class="row">
                  <div class="col-lg col-md-6 col-sm-6">
                      <?php
                        if( $blogusers = get_users() ) : 
                     
                          echo '<select class="dropdown" name="author" style="width: 100%"><option value="">Author</option>';
                          foreach ( $blogusers as $user ) :
                            echo '<option value="' . $user->ID . '">' . $user->display_name . '</option>'; // ID of the category as the value of an option
                          endforeach;
                          echo '</select>';
                        endif;
                      ?>
                  </div>
                  <div class="col-lg col-md-6 col-sm-6">
                      <?php
                        if( $terms = get_terms( array( 'taxonomy' => 'solution_categories', 'orderby' => 'name' ) ) ) : 
                     
                          echo '<select class="dropdown" name="solutionfilter" style="width: 100%"><option value="">Product Line</option>';
                          foreach ( $terms as $term ) :
                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
                          endforeach;
                          echo '</select>';
                        endif;
                      ?>
                  </div>
                  <div class="col-lg col-md-12 col-sm-12">
                      <?php
                        if( $tags = get_terms( array( 'taxonomy' => 'post_tag', 'orderby' => 'name' ) ) ) : 
                     
                          echo '<select class="dropdown" name="categoryfilter" style="width: 100%"><option value="">Business Area</option>';
                          foreach ( $tags as $tag ) :
                            echo '<option value="' . $tag->term_id . '">' . $tag->name . '</option>'; // ID of the category as the value of an option
                          endforeach;
                          echo '</select>';
                        endif;
                      ?>
                  </div>
                  <div class="col-lg-1 col-md-12 col-xs-12 pl-0">
                      <button>Filter</button>
                  </div>
                </div>   
                <input type="hidden" name="action" value="blogfilter">

            </form>
        </div>

    </div>
  </div>  
<?php
// Post type query
$query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'order' => 'ASC',
));

?>
<div class="container-fulid section home">
    <div class="news_title">Top Stories</div>
    <div class="news-backgraund">
<div class="news-slider">
    <div class="swiper-wrapper">
    <?php if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); 
    $html = post_tags(get_the_id(), 'solution_categories');
    $tags = get_the_terms(get_the_id(), 'solution_categories');
    $color = get_term_meta($tags[0]->term_id, 'category_color', true);
    $text = get_the_excerpt();

    ?>
    <div class="swiper-slide <?php echo $tags[0]->slug ?>">
    <div class="col-sm-12 pl-0 pr-0">
        <div class="row flex-sm-column-reverse">
            <div class="col-md-5">
            <div class="news-block">
                <div class="tags"><?php echo $html; ?></div>
                <div class="news-grid-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                <div class="news-date"><?php the_date('d M o') ?></div>
                <div class="news-grid-text"><p><?php echo substr($text, 0, 142); ?></p></div>
                <div class="slider-more"><a class="btn-icon" href="<?php the_permalink(); ?>"><span></span></a></div>
            </div>
        </div>
        <div class="col-md-6 offset-md-1">
            <div class="news-grid-img"><?php the_post_thumbnail('tactun-image-374x257-cropped'); ?></div>
        </div>
        </div>
       </div> 
    </div>  

<style type="text/css">
    .news-slider .swiper-wrapper .<?php echo $tags[0]->slug ?> .news-block .post_tags {
        color: <?php echo $color; ?>;
    }
    .news-slider .swiper-wrapper .<?php echo $tags[0]->slug ?> .news-block .btn-icon span::after, .news-slider .swiper-wrapper .<?php echo $tags[0]->slug ?> .news-block .btn-icon span::before, .news-slider .swiper-wrapper .<?php echo $tags[0]->slug ?> .news-grid-name::before {
        background: <?php echo $color; ?> !important;
        color: <?php echo $color; ?>;
    }  
    .news-slider .swiper-wrapper .<?php echo $tags[0]->slug ?> .news-block .btn-icon:hover span::after, .news-slider .swiper-wrapper .<?php echo $tags[0]->slug ?> .news-block .btn-icon:hover span::before {
        background: #6f7684 !important;
    }   
</style>
<?php endwhile; wp_reset_postdata(); endif; ?>
</div>
<div class="swiper-pagination"></div>
</div>

</div>
</div>
</div>
<div class="container">
    <div class="archives_content">
        <div class="content-area">  
            <div class="row">
                <div class="col-md-12 news_title">
                    <?php echo esc_html__( 'Latest Updates', 'tactun' ); ?>
                </div>
            </div>
             <div id="response" class="row">
                <?php
                // The post loop
                if( have_posts() ):
                    while( have_posts() ): the_post();
                        get_template_part( 'template-parts/blog/blogpage' );
                    endwhile;
                endif;
                ?>
           </div>
            <?php
            // Pagination
            the_posts_pagination(
                array(
                    'show_all'     => true,
                    'screen_reader_text' => ' ', 
                    'prev_text'          => '<span class="screen-reader-text">' . __( 'Previous', 'tactun' ) . '</span>',
                    'next_text'          => '<span class="screen-reader-text">' . __( 'Next', 'tactun' ) . '</span>',
                )
            );

            ?>

        </div>

    </div>
</div>

<?php if($contact_enable == true){ ?>

<div id="contact" class="container-fulid subscribe mt-5" style="background-image: url('<?php echo wp_get_attachment_image_url( $contact_image, 'full' ) ?>'); background-repeat: no-repeat; background-size: cover; color: #fff; text-align: center; position:relative;">
<div class="container">
<div class="row">
    <div class="col-md-8 col-xs-8 offset-xs-2 offset-md-2">
         <div class="news_title"><?php echo $contact_title; ?></div>
            <div class="news_description"><?php echo $contact_description; ?></div>
        </div>
</div>
<div class="row">
    <div class="col-md-8 col-xs-8 offset-xs-2 offset-md-2">
        <div class="subscribe-form">
         <?php echo do_shortcode($contact_shortcode); ?>
       </div>
    </div>
</div>
</div>
</div>
<style type="text/css" media="screen">
<?php if(!empty($banner_color)){ ?>
   .news_title,
   .news_description {
      color: <?php echo $banner_color ?> ;
   }
<?php } ?>
<?php if(!empty($page_banner_color)){ ?>
   .archive-banner:before{
      content: "";
      background: <?php echo $page_banner_color ?> ;
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
   }
<?php } ?>
<?php if(!empty($banner_backgraund)){ ?>
.subscribe::before {
  content: "";
  background-color: <?php echo $banner_backgraund ?>;
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}
<?php } ?>
</style>
<?php } ?>
   </div>

<?php get_footer(); ?>
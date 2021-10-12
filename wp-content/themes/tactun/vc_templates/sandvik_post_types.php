<?php 
extract(shortcode_atts(array(
	  'posts_title' => '',
    'posts_description' => '',
    'tactun_posttype' => '',
    'solution_category' => '',
    'solution_per_row' => '',
    'posts_display' => '',
    'posts_slider' => '',
    'posts_display_window' => '',
    'posts_display_tablet' => '',
    'posts_display_mobile' => '',
), $atts));

// Post type query
$query = new WP_Query(array(
    'post_type' => $tactun_posttype,
    'tax_query' => array(
        array(
            'taxonomy' => 'solution_categories',
            'field'    => 'id',
            'terms'    => $solution_category
        ) 
    ),
    'posts_per_page' => esc_attr( $posts_display ),
    'order' => 'ASC',
));  

?>
<?php if(!empty($posts_title)){ ?>
    <div class="posts_title"><?php echo $posts_title; ?></div>
<?php } ?>
<?php if(!empty($posts_description)){ ?>
    <div class="posts_description"><?php echo $posts_description; ?></div>
<?php } ?>

<div class="row this-posts">
    <?php if($posts_slider == true){
          $class = 'swiper-slide';
    ?>
    <div class="swiper-wrapper">
    <?php }else{
        $class = '';
    } ?>
    <?php if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); 
	  $tags = get_the_terms(get_the_id(), 'solution_categories');
    $color = get_term_meta($tags[0]->term_id, 'category_color', true);
	  $html = post_tags(get_the_id(), 'solution_categories');
    $text = get_the_excerpt( );
    ?>
<div class="mb-4 <?php echo $solution_per_row.' '.$class;?>">    
<div class="posts-block <?php echo $tags[0]->slug ?>">
    <div class="post-grid-img"><?php the_post_thumbnail('tactun-image-374x211-cropped'); ?></div>
    <div class="post-block">
    	<div class="tags"><?php echo $html; ?></div>
        <div class="post-grid-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        <div class="post-grid-text"><p><?php echo substr($text, 0, 80); ?></p></div>
        <div class="post-more"><a class="btn-icon" href="<?php the_permalink(); ?>"><span></span></a></div>
    </div>
</div>
<style type="text/css">
    .<?php echo $tags[0]->slug ?> .post-grid-name::before, 
    .<?php echo $tags[0]->slug ?> .post-more a span::after, 
    .<?php echo $tags[0]->slug ?> .post-more a span::before {
        background: <?php echo $color; ?>;
    }
    .<?php echo $tags[0]->slug ?> .post_tags{
        color: <?php echo $color; ?>;
    }
</style>
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>

</div>
<?php if($posts_slider == true){ ?>
    <div class="swiper-pagination"></div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
        
      var swiper = new Swiper('.this-posts', {
      slidesPerView: 3,
      spaceBetween: 10,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        300: {
          slidesPerView: <?php echo $posts_display_mobile; ?>,
          spaceBetween: 0,
        },
        540: {
          slidesPerView: <?php echo $posts_display_tablet; ?>,
          spaceBetween: 0,
        },
        1024: {
          slidesPerView: <?php echo $posts_display_window; ?>,
          spaceBetween: 0,
        },
      }
    }); 
    });            
</script>

<?php } ?>

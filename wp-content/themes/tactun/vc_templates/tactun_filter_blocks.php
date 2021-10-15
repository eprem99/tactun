<?php 
extract(shortcode_atts(array(
    'filter_enabled' => '',
    'filter_pagination' => '',
	  'filter_type' => '',
    'post_per_row' => '',
    'posts_per_page' => '',
    'tactun_title' => '',
    'tactun_description' => '',
), $atts));
$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

// Post type query
$query = new WP_Query(array(
    'post_type' => $filter_type,
    'posts_per_page' => esc_attr( $posts_per_page ),
    'paged' => $paged,
    'order' => 'ASC',
));  

if($filter_enabled == true){
  if($filter_type == 'event'){

?>

<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
  <div class="row">
      <div class="col-lg col-md-6 col-sm-6">
          <?php
            if( $terms = get_terms( array( 'taxonomy' => 'solution_categories', 'orderby' => 'name' ) ) ) : 
         
              echo '<select class="dropdown" name="categoryfilter" style="width: 100%"><option value="">Industry</option>';
              foreach ( $terms as $term ) :
                echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
              endforeach;
              echo '</select>';
            endif;
          ?>
      </div>
      <div class="col-lg col-md-6 col-sm-6">
          <?php
            if( $terms = get_terms( array( 'taxonomy' => 'country_categories', 'orderby' => 'name' ) ) ) : 
         
              echo '<select class="dropdown" name="countryfilter" style="width: 100%"><option value="">Country</option>';
              foreach ( $terms as $term ) :
                echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
              endforeach;
              echo '</select>';
            endif;
          ?>
      </div>
      <div class="col-lg col-md-12 col-sm-12">
           <input id="date" type="text" name="dates" value="" placeholder="Date">
           <span class="date-selection__arrow" role="presentation"><b role="presentation"></b></span>
           <script>
               jQuery(document).ready(function($) {
                    $.dateRangePickerLanguages['custom'] =
                      {
                        'selected': ''
                      };
                  $('#date').dateRangePicker({
                    customValueLabel: '<input id="clear" type="button" class="clear-btn" value="Cancel"> <input type="button" class="apply-btn" value="Save"> ',
                    showCustomValues: true,
                    separator : ' - ',
                    language:'custom'
                  });
                $('#clear').click(function(evt)
                {
                  evt.stopPropagation();
                  $('#date').data('dateRangePicker').clear();
                  $('#date').data('dateRangePicker').close();
                });
               });  
           </script>
      </div>
      <div class="col-lg-1 col-md-12 col-xs-12 pl-0">
          <button><?php echo esc_html__( 'Filter', 'tactun' ); ?></button>
      </div>
   </div>   
  <input type="hidden" name="posttype" value="<?php echo $filter_type; ?>">
  <input type="hidden" name="perrow" value="<?php echo $post_per_row; ?>">
  <input type="hidden" name="action" value="myfilter">

</form>
  <?php }elseif($filter_type == 'story'){ ?>
    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
  <div class="row">
      <div class="col-lg col-md-6 col-sm-6">
          <?php
            if( $terms = get_terms( array( 'taxonomy' => 'product_line', 'orderby' => 'name' ) ) ) : 
         
              echo '<select class="dropdown" name="categoryfilter" style="width: 100%"><option value="">Product Line</option>';
              foreach ( $terms as $term ) :
                echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
              endforeach;
              echo '</select>';
            endif;
          ?>
      </div>
      <div class="col-lg col-md-6 col-sm-6">
          <?php
            if( $terms = get_terms( array( 'taxonomy' => 'post_tag', 'orderby' => 'name' ) ) ) : 
         
              echo '<select class="dropdown" name="tagfilter" style="width: 100%"><option value="">Business Area</option>';
              foreach ( $terms as $term ) :
                echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
              endforeach;
              echo '</select>';
            endif;
          ?>
      </div>
      <div class="col-lg col-md-12 col-sm-12">
          <?php
            if( $terms = get_terms( array( 'taxonomy' => 'solution_categories', 'orderby' => 'name' ) ) ) : 
         
              echo '<select class="dropdown" name="solutionfilter" style="width: 100%"><option value="">Industry</option>';
              foreach ( $terms as $term ) :
                echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
              endforeach;
              echo '</select>';
            endif;
          ?>
      </div>
      <div class="col-lg-1 col-md-12 col-xs-12 pl-0">
          <button><?php echo esc_html__( 'Filter', 'tactun' ); ?></button>
      </div>
   </div>   
  <input type="hidden" name="posttype" value="<?php echo $filter_type; ?>">
  <input type="hidden" name="perrow" value="<?php echo $post_per_row; ?>">
  <input type="hidden" name="action" value="csfilter">

</form>
  <?php }elseif($filter_type == 'resource'){ ?>
    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
  <div class="row">
      <div class="col-lg col-md-6 col-sm-6">
          <?php
            if( $terms = get_terms( array( 'taxonomy' => 'product_line', 'orderby' => 'name' ) ) ) : 
         
              echo '<select class="dropdown" name="categoryfilter" style="width: 100%"><option value="">Product Line</option>';
              foreach ( $terms as $term ) :
                echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
              endforeach;
              echo '</select>';
            endif;
          ?>
      </div>
      <div class="col-lg col-md-6 col-sm-6">
          <?php
            if( $terms = get_terms( array( 'taxonomy' => 'post_tag', 'orderby' => 'name' ) ) ) : 
         
              echo '<select class="dropdown" name="tagfilter" style="width: 100%"><option value="">Business Area</option>';
              foreach ( $terms as $term ) :
                echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
              endforeach;
              echo '</select>';
            endif;
          ?>
      </div>
      <div class="col-lg-1 col-md-12 col-xs-12 pl-0">
          <button><?php echo esc_html__( 'Filter', 'tactun' ); ?></button>
      </div>
   </div>   
  <input type="hidden" name="posttype" value="<?php echo $filter_type; ?>">
  <input type="hidden" name="perrow" value="<?php echo $post_per_row; ?>">
  <input type="hidden" name="action" value="resfilter">

</form>
  <?php } ?>
<?php } ?>

<?php if(!empty($tactun_title)){ ?>
    <div class="posts_title filter"><?php echo $tactun_title; ?></div>
<?php } ?>

<?php if(!empty($tactun_description)){ ?>
    <div class="posts_description"><?php echo $tactun_description; ?></div>
<?php } ?>

<div id="response" class="row this-posts">
    <?php if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); ?>

          <div id="post-<?php the_ID() ?>" class="<?php echo $post_per_row; ?> mb-4">
              <?php 
                   if($filter_type == 'event'){
                        get_template_part( 'template-parts/event/eventpost' );
                   }elseif($filter_type == 'story'){
                        get_template_part( 'template-parts/stories/storiespost' );
                   }elseif($filter_type == 'resource'){
                        get_template_part( 'template-parts/stories/storiespost' );
                   }
               ?>
          </div>

    <?php endwhile; wp_reset_postdata();?> 

    <?php endif; ?>
</div>
<?php if($filter_pagination == true){ ?>
    <?php $total = isset( $query->max_num_pages ) ? $query->max_num_pages : 1; ?>
      <?php if (( $total > 1)&&(get_query_var('paged')!=$total)) : ?>
      <script>
        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
        var true_posts = 6;
        var post_type = '<?php echo $filter_type;?>';
        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
        var max_pages = '<?php echo $query->max_num_pages; ?>';
        var post_per_row = '<?php echo $post_per_row;?>';
      </script>
        <div class="col-md-12 text-center mb-4 mt-4">
          <a id="true_loadmore" href="#">
            More
          </a>
      </div>
  <?php endif; ?>
    <?php } ?>
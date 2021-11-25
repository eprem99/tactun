</div>
<footer>
<div class="angle_top"></div>
<div class="container">
     <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
          <div class="row footer-sidebars">
               <?php dynamic_sidebar( 'footer-1' ); ?>
          </div>
     <?php endif; ?>
    <?php get_template_part( 'template-parts/footer/copyright' ); ?>
</div>    
</footer>
     <?php $copyright = tactun_option( 'scroll_top', false); 
          if($copyright == true){ ?>
            <div id="scrolltop">
               <svg width="45" height="45" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g style="mix-blend-mode:exclusion">
                    <path d="M32 63C49.1208 63 63 49.1208 63 32C63 14.8792 49.1208 1 32 1C14.8792 1 1 14.8792 1 32C1 49.1208 14.8792 63 32 63Z" stroke="#D0D0D0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M44 32L32 20L20 32" stroke="#D0D0D0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M32 44V20" stroke="#D0D0D0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
               </svg>
          </div>
     <?php } ?>       
<?php wp_footer(); ?>
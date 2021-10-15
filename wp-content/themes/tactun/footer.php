   </div>
</div>
<footer>
<div class="decor-top"><svg class="decor" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
<linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
        <stop offset="0%" style="stop-color:#333C42;stop-opacity:1"></stop>
        <stop offset="100%" style="stop-color:#6D7482;stop-opacity:1"></stop>
</linearGradient>
<path d="M0 100 L100 0 L100 100" stroke-width="0" fill="url(#grad1)"></path>
</svg></div>
<div class="container">
     <div class="row footer-sidebars">
     <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
          <!-- <div class="footer-sidebars"> -->
               <?php dynamic_sidebar( 'footer-1' ); ?>
          <!-- </div> -->
     <?php endif; ?>
    </div>
    <div class="copyright row">
        <div class="col-md-12 col-sm-12 text-cener socials">
             <?php dynamic_sidebar( 'footer-social' ); ?>
        </div>
        <div class="col-md-12 text-center">
             <?php $copyright = tactun_option( 'copyright_text', false); 
             if(!empty($copyright)){
                  echo $copyright;
             }
             ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
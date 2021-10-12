   </div>
</div>
<footer>
<div class="container-fluid">
     <div class="row">
        <div class="foot-md-3">
        <?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
        <div class="foot-md-2">
             <?php dynamic_sidebar( 'footer-2' ); ?>
        </div>
        <div class="foot-md-7">
             <?php dynamic_sidebar( 'footer-3' ); ?>
        </div>
    </div>
    <div class="copyright row">
        <div class="col-xs-6 col-md-7 col-sm-8">
             <?php dynamic_sidebar( 'footer-4' ); ?>
        </div>
        <div class="col-xs-6 col-md-5 col-sm-4 text-right socials">
             <?php dynamic_sidebar( 'footer-social' ); ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
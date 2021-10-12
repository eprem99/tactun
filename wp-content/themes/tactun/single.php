<?php
/**
 * Template for Single Posts
 */

get_header(); ?>
    <div class="container">
        <div class="row blogpost_content">
            <div class="content-area col-md-12 mb-7">

                <?php

                if( have_posts() ):
                    while( have_posts() ): the_post(); ?>
                        <div id="post-<?php the_ID() ?>" <?php post_class() ?>>
                            <?php get_template_part( 'template-parts/blog/blogpost' ); ?>
                        </div>
                    <?php endwhile;
                endif;

                ?>

            </div>
        </div>
    </div>


<?php get_footer(); ?>
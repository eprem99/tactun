<?php
/**
 * Template for Single Solution
 */

get_header(); ?>

    <div class="container">

                <?php

                if( have_posts() ):
                    while( have_posts() ): the_post(); ?>
                        <div id="post-<?php the_ID() ?>" <?php post_class() ?>>
                            <?php get_template_part( 'template-parts/solution/solutionpost' ); ?>
                        </div>
                    <?php endwhile;
                endif;

                ?>

    </div>


<?php get_footer(); ?>
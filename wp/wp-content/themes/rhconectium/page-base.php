<?php
/**
 * Template Name: Base
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package RH Conectium
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="wrapper wrapper_base">
                <?php 
                    if (have_posts() ):
                        while (have_posts() ):the_post();
                            the_content(); 
                        endwhile;
                    endif;
                ?>           
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

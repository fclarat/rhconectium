<?php
/**
 * Template Name: Search Empresa Results Page
 *
 * @package RH Conectium
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main site-main-desplazado" role="main">
            <section id="content_mejores_empresas_home" class="bkg_points">
                <div class="shadow_long"></div>
                <div class="wrapper">    
            <?php if ( have_posts() ) : ?>

                    <h2 class="titulo_sombreado"><?php printf( __( 'Resultados para: %s', 'rhconectium' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                    <?php  
                    $term = get_term_by('slug',$_GET['rubro'],'rubros');
                    if(isset($_GET['rubro']) && $_GET['rubro']!='' ):
                    ?>
                    <h2 class="titulo_sombreado"><?php printf( __( 'En el rubro: %s', 'rhconectium' ), '<span>' . $term->name . '</span>' ); ?></h2>
                    <?php  
                    endif;
                    ?>

                <?php /* Start the Loop */ ?>
                    <ul class="listado_mejores_empresas">
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */
                    get_template_part( 'content', 'search-empresa' );
                    ?>

                <?php endwhile; ?>
                    </ul>
            <?php else : ?>

                <h1>No hay empresas que concuerden con la búsqueda realizada.</h1>

            <?php endif; ?>
                </div>
            </section>
		</main><!-- #main -->
	</section><!-- #primary -->


<?php get_footer(); ?>

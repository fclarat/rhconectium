<?php
/**
 * Template Name:  Mis Empresas
 *
 * @package RH Conectium
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main site-main-desplazado" role="main">
            <section id="content_mejores_empresas_home" class="bkg_points">
                <div class="shadow_long"></div>
                <div class="wrapper">    
            <?php
            $user_ID = get_current_user_id(); 
            $args=array(
                'author' => $user_ID,
                'post_type' => 'empresas',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );

            $my_query = new WP_Query($args);
            if ( $my_query->have_posts() ) : ?>

                    <h2 class="titulo_sombreado">Mis Empresas</h2>

                <?php /* Start the Loop */ ?>
                    <ul class="listado_mejores_empresas">
                <?php while ( $my_query->have_posts() ) :$my_query-> the_post(); ?>

                        <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <aside class="content_logo_empresa">
                                <?php 
                                $logo_url = null; 
                                if(get_field('logo')){
                                    $logo = get_field('logo');
                                    $logo_url = $logo['url'];
                                }else{
                                   $logo_url = get_bloginfo('template_url').'/img/logo_empresa.jpg';
                                }
                                ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $logo_url; ?>" alt="Empresa"></a>
                            </aside> 
                            <aside class="content_nombre_empresa">
                                <h3 class="nombre_empresa"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="rubro_empresa">
                                <?php 
                                    $post_terms = get_the_terms($post->ID,'rubros');
                                    $i = 0;
                                    $len = count($post_terms);
                                    foreach ($post_terms as $term) {
                                        echo $term->name;
                                        if ($i != $len - 1){
                                            echo ', ';    
                                        }
                                        $i++;
                                    }
                                ?>
                                </p>
                            </aside>
                            <?php $datos = getDatosVotacion($post->ID); ?>
                            <aside class="content_recomendacion">
                                <div class="content_porcentaje_blue"><span class="porcentaje_recomendado"><?php if($datos['total'] > 0 ){ echo ceil(($datos['votos_positivos']/$datos['total'])*100); }else{ echo "0";} ?>%</span></div>
                                <p>LA RECOMIENDA</p>
                            </aside>
                            <aside class="content_porcentajes">
                                <p><span class="porcentaje"><?php if($datos['votos_positivos'] > 0 ){ echo ceil(($datos['calidad_servicio_positivo']/($datos['votos_positivos']))*100); }else{ echo "0";} ?>%</span>Por calidad de servicios</p>
                                <p><span class="porcentaje"><?php if($datos['votos_positivos'] > 0 ){ echo ceil(($datos['cumplimiento_plazos_positivo']/($datos['votos_positivos']))*100); }else{ echo "0";} ?>%</span>Por cumplimiento de plazos</p>
                                <p><span class="porcentaje"><?php if($datos['votos_positivos'] > 0 ){ echo ceil(($datos['aspectos_administrativos_positivo']/($datos['votos_positivos']))*100); }else{ echo "0";} ?>%</span>Por Aspectos administrativos</p>
                            </aside>

                            <div class="clearfix"></div>
                            <div><a class="btn_round_blue btn_editar_empresa" href="<?php echo get_permalink( get_page_by_path( 'editar-empresa' ) ) ?>?id=<?php the_ID(); ?>" title="Editar Empresa">Editar Empresa</a></div>
                        </li><!-- #post-## -->

                <?php endwhile; ?>
                    </ul>
            <?php else : ?>

                <?php wp_redirect( home_url() ); exit; ?>

            <?php endif; ?>
                </div>
            </section>
		</main><!-- #main -->
	</section><!-- #primary -->


<?php get_footer(); ?>

<?php
/**
 * Template Name: Home
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

			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php if( have_rows('slider_diapositiva') ): ?>
				 	<section class="slider">
				 		<div class="flexslider">
							<ul class="slides">
						 
							<?php while( have_rows('slider_diapositiva') ): the_row(); 
						 
								// vars
								$image = get_sub_field('slider_imagen');

								?>
						 
								<li>
						 			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
								</li>
						 
							<?php endwhile; ?>
						 
							</ul>
				 		</div>
					</section>	
				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>

			<!-- Search -->

            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="form_search_big">
                <input name="s" type="text" id="s" placeholder="Buscar empresa...">
                <input type="submit" value="" class="btn_search_big">
                <input type="hidden" name="post_type" value="empresas" />
                <div class="clearfix"></div>
                <section id="content_search_home">
                    <div class="wrapper_search">
                        <a href="javascript:void(0);" class="btn_busqueda_avanzada">BÚSQUEDA AVANZADA</a>
                        <div class="clearfix"></div>
                        <div class="bubble_search">
                            <p>Buscá una empresa y enterate<br/>lo que están diciendo de ella</p>
                        </div>
                        <div id="content_busqueda_avanzada">
                            <label for="select_rubro">Empresas por rubro</label>
                            <?php 
                                $rubros = get_terms('rubros'); 
                            ?>
                            <select name="rubro" class="select_rubro">
                                <option value="">Seleccione un rubro...</option>
                                <?php foreach ($rubros as $rubro): ?> 
                                <option value="<?php echo $rubro->slug; ?>"><?php echo $rubro->name; ?></option>
                                <?php endforeach ?>
                                
                            </select>
                            <div class="clearfix" style="margin-top: 10px;"></div>
                            <a href="javascript:void(0);" class="btn_trigger_busqueda btn_round_blue">Buscar</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </section>
            </form>      
			
			<!-- EMPRESAS DESTACADAS -->
			
            <section id="content_mejores_empresas_home" class="bkg_points">
                <div class="shadow_long"></div>
                <div class="wrapper">
                    <!-- Sello anonimo -->
                    <aside class="anonimo"></aside>
                    <div class="clearfix"></div>
                        
                    <h2 class="titulo_sombreado">LAS EMPRESAS MEJOR CALIFICADAS</h2>
                    <?php $mas_votadas = getMasVotadas(3); ?>
                    <!-- Mejores empresas -->
                    
                    <?php  
                        foreach ($mas_votadas as $mas_votada) {
                            //var_dump($mas_votada->post_id);
                            $id_mas_votadas[] = (int)$mas_votada->post_id;
                            
                        }
                        
                        //var_dump($id_mas_votadas);
                        $args = array('post_type' => 'empresas', 'post__in' => $id_mas_votadas);

                        $my_query = new WP_Query($args);
                        //var_dump($my_query);
                        if( $my_query->have_posts() ):
                        ?>
                        <ul class="listado_mejores_empresas">
                        <?php
                            $nro = 1;      
                            while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                 <li>
                                    <aside class="content_posicion">
                                        <p><?php echo $nro; ?></p>
                                    </aside>
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
                                        <div class="clearfix" style="margin-top: 10px;"></div>
                                        <a href="<?php the_permalink(); ?>" class="btn_round_blue">Ver Empresa</a>
                                    </aside>
                                    <?php
                                    $datos = getDatosVotacion($post->ID);
                                    ?>
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
                                </li>
                            <?php
                            $nro++;
                            endwhile;
                        ?>
                        </ul>
                        <?php 
                        endif;
                    
                        wp_reset_query();  // Restore global post data stomped by the_post().
                    ?>
                    
                </div>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>

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
 * @package CreativeDog
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
    
			<!-- Video -->
      
      <section id="video_home">
        <?php
        if( have_rows('tagline_home') ):
          $first = true;
          while ( have_rows('tagline_home') ) : the_row();
            $titulo = get_sub_field('titulo_tagline');
            $subtitulo = get_sub_field('subtitulo_tagline');
            $text_button = get_sub_field('text_button');
            $link_button = get_sub_field('link_button');
        ?>    
            <div class="txt_video <?php echo 'hidden'; ?>">
              <?php if($titulo): ?>
              <h2><?php echo $titulo; ?></h2>
              <?php endif; ?>
              <?php if($subtitulo): ?>
              <h4><?php echo $subtitulo; ?></h4>
              <?php endif; ?>
              <?php if($link_button): ?>
              <a href="<?php echo $link_button; ?>" class="btn_large btn_white"><?php echo $text_button; ?></a>
              <?php endif; ?>
            </div>
        <?php
            $first = false;
          endwhile;
        endif;
        ?>
        
        <video src="<?php bloginfo('template_url'); ?>/video/video_home.mp4" loop autoplay preload muted></video>
      </section>

      <!-- Slider -->
	
      <section id="content_slider">
          <div class="wrapper_90">
              <!-- <h1 class="titulo_secciones black">Proyectos destacados</h1> -->
              <!-- <h5>Presentamos nuestros proyectos más recientes y destacados</h5> -->

              <?php while ( have_posts() ) : the_post(); ?>

  						<?php if( have_rows('slider_diapositiva') ): ?>
  					 	<section id="slider_home" class="slider">
  					 		<div class="flexslider">
  								<ul class="slides">
  							 
  								<?php while( have_rows('slider_diapositiva') ): the_row(); 
  							 
  									// vars
  									$image = get_sub_field('slider_imagen');
                    $related_post = get_sub_field('slider_link');
                    $link = get_permalink( $related_post->ID);
  									?>
  							 
  									<li>
  							 			<a href="<?php echo $link; ?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></a>
  									</li>
  							 
  								<?php endwhile; ?>
  							 
  								</ul>
  					 		</div>
  						</section>	
  						<?php endif; ?>

		         <?php endwhile; // end of the loop. ?>
          </div>
        </section>

			
			<!-- Ultimos Proyectos -->

            <section id="ultimos_proyectos">
                <!-- <div class="wrapper_70"> -->
                    <h1 class="titulo_secciones black">Últimos proyectos</h1>
					
          					<?php 
          					$args_proyectos = array(
          						'post_type' => 'proyecto',
          						'meta_query' => array(
          							array(
          								'key' => 'destacado',
          								'value' => true
          							)
          						),
          						'posts_per_page'   => 6
          					);

          					// the query
          					$the_query = new WP_Query( $args_proyectos ); ?>

          					<?php if ( $the_query->have_posts() ) : ?>

                      <div class="grid grid-pad">
  						
                      	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                          <div class="col-1-3">
                             <div class="proyecto_destacado">
                                 	<aside class="img_proyecto_destacado">
  	                               	<?php 
                      							if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                      							  the_post_thumbnail();
                      							} else { ?>
                      								<img src="<?php bloginfo('template_url'); ?>/img/default.jpg" alt="Proyecto">
                      							<?php }
                      							?>
                      						</aside>
                                 	<aside class="caption">
                                      <h2><?php the_title(); ?></h2>
                                      <?php  
                                        $terms = get_the_terms( get_the_ID(), 'tipos' );
                                        $i = 0;
                                        $terms_text = '';
                                        foreach ($terms as $term) {
                                          if($i!= 0){
                                            $terms_text .= ' / ';
                                          } 
                                          $terms_text .= $term->name;
                                          $i++;  
                                        }
                                      ?>
                                      <p><?php echo $terms_text; ?></p>                                    
                                      <a href="<?php echo get_permalink(get_the_ID()); ?>" class="btn_medium btn_white ajax-popup-link">ver mas</a>
                                 	</aside>
                              </div>
                          </div>

                          <?php endwhile; ?>

                      </div>

                      <?php wp_reset_postdata(); ?>

          					<?php else:  ?>
          					  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
          					<?php endif; ?>
                    <?php  
                      $page_proyecto = get_page_by_path('proyectos');
                      $proyectos_id = $page_proyecto->ID;
                    ?>
                    <a href="<?php echo get_permalink($proyectos_id); ?>" class="btn_large btn_black">ver todos</a>
                <!-- </div> -->
            </section>


            <!-- Skills -->

                <section id="skills">
                    <div class="wrapper_70">
                        <h1 class="titulo_secciones black center">Diseño y Desarrollo Web / Diseño Gráfico<br/>Diseño Editorial / Wordpress</h1>

                        <div class="grid grid-pad">
                            <div class="col-1-6">
                               <div class="skill">
                                   <img src="<?php bloginfo('template_url');?>/img/icon_web.png" alt="Desarrollo web">
                                   <h3>Desarrollo Web</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <img src="<?php bloginfo('template_url');?>/img/icon_html5.png" alt="HTML5">
                                   <h3>HTML5</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <img src="<?php bloginfo('template_url');?>/img/icon_css3.png" alt="CSS3">
                                   <h3>CSS3</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <img src="<?php bloginfo('template_url');?>/img/icon_jquery.png" alt="JQuery">
                                   <h3>JQuery</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <img src="<?php bloginfo('template_url');?>/img/icon_e-commerce.png" alt="E-Commerce">
                                   <h3>E-Commerce</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <img src="<?php bloginfo('template_url');?>/img/icon_wordpress.png" alt="Wordpress">
                                   <h3>Wordpress</h3>
                               </div>
                            </div>
                        </div>

                        <div class="grid grid-pad">
                            <div class="col-1-6">
                               <div class="skill">
                                   <img src="<?php bloginfo('template_url');?>/img/icon_grafico.png" alt="Diseño Gráfico">
                                   <h3>Diseño Gráfico</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <img src="<?php bloginfo('template_url');?>/img/icon_editorial.png" alt="Diseño Editorial">
                                   <h3>Diseño Editorial</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <img src="<?php bloginfo('template_url');?>/img/icon_ilust.png" alt="Ilustración">
                                   <h3>Ilustración</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <img src="<?php bloginfo('template_url');?>/img/icon_branding.png" alt="Branding">
                                   <h3>Branding</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <img src="<?php bloginfo('template_url');?>/img/icon_foto.png" alt="Fotografía">
                                   <h3>Fotografía</h3>
                               </div>
                            </div>
                            <div class="col-1-6">
                               <div class="skill">
                                   <img src="<?php bloginfo('template_url');?>/img/icon_pack.png" alt="Packaging">
                                   <h3>Packaging</h3>
                               </div>
                            </div>
                        </div>
                </section>
            
		</main><!-- #main -->
	</div><!-- #primary -->


            

		

<?php get_footer(); ?>

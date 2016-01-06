<?php
/**
 * @package RH Conectium
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<?php
        $datos = getDatosVotacion($post->ID);
        ?>

        <main id="main" class="site-main site-main-desplazado-empresa" role="main">

			<div class="wrapper">

                <section class="content_info_empresa one_third">
                    <div class="datos_empresa">
                        <div class="logo_empresa one_half">
                            <?php 
                            $logo_url = null; 
                            if(get_field('logo')){
                                $logo = get_field('logo');
                                $logo_url = $logo['url'];
                            }else{
                               $logo_url = get_bloginfo('template_url').'/img/logo_empresa.jpg';
                            }
                            ?>            
                            <img src="<?php echo $logo_url; ?>" alt="Logo">
                        </div>
                        <div class="nombre_datos_empresa">
                            <h3 class="nombre_empresa"><?php the_title(); ?></h3>
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
                            <a href="<?php echo get_permalink( get_page_by_path( 'contactar-empresa' ) ) ?>" class="btn_grey btn_contactar_empresa">CONTACTAR</a>
                        </div>
                        <div class="clearfix"></div>
                        <p class="descripcion_empresa">
                           <?php the_field('descripcion') ?>
                        </p>
                    </div>
                    
                    <!-- Graficos radiales -->

                    <article class="content_radial_progress">
                        
                        <p class="content_votaciones">DE <span class="votaciones"><?php echo $datos['total']; ?></span><br/>VOTACIONES</p>

                        <!-- Recomendado -->
                        <div class="one_half">
                            <div class="radial-progress" data-progress="<?php echo ceil(($datos['votos_positivos']/$datos['total'])*100); ?>">
                                <div class="circle">
                                    <div class="mask full">
                                        <div class="fill"></div>
                                    </div>
                                    <div class="mask half">
                                        <div class="fill"></div>
                                        <div class="fill fix"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                                <div class="inset">
                                    <div class="percentage">
                                        <div class="numbers"><span>-</span><span>0%</span><span>1%</span><span>2%</span><span>3%</span><span>4%</span><span>5%</span><span>6%</span><span>7%</span><span>8%</span><span>9%</span><span>10%</span><span>11%</span><span>12%</span><span>13%</span><span>14%</span><span>15%</span><span>16%</span><span>17%</span><span>18%</span><span>19%</span><span>20%</span><span>21%</span><span>22%</span><span>23%</span><span>24%</span><span>25%</span><span>26%</span><span>27%</span><span>28%</span><span>29%</span><span>30%</span><span>31%</span><span>32%</span><span>33%</span><span>34%</span><span>35%</span><span>36%</span><span>37%</span><span>38%</span><span>39%</span><span>40%</span><span>41%</span><span>42%</span><span>43%</span><span>44%</span><span>45%</span><span>46%</span><span>47%</span><span>48%</span><span>49%</span><span>50%</span><span>51%</span><span>52%</span><span>53%</span><span>54%</span><span>55%</span><span>56%</span><span>57%</span><span>58%</span><span>59%</span><span>60%</span><span>61%</span><span>62%</span><span>63%</span><span>64%</span><span>65%</span><span>66%</span><span>67%</span><span>68%</span><span>69%</span><span>70%</span><span>71%</span><span>72%</span><span>73%</span><span>74%</span><span>75%</span><span>76%</span><span>77%</span><span>78%</span><span>79%</span><span>80%</span><span>81%</span><span>82%</span><span>83%</span><span>84%</span><span>85%</span><span>86%</span><span>87%</span><span>88%</span><span>89%</span><span>90%</span><span>91%</span><span>92%</span><span>93%</span><span>94%</span><span>95%</span><span>96%</span><span>97%</span><span>98%</span><span>99%</span><span>100%</span></div>
                                    </div>
                                </div>
                            </div>

                            <aside class="content_recomendaciones">
                                <img src="<?php bloginfo('template_url'); ?>/img/icon_recomendado.png" alt="recomendada">
                                <h5>RECOMENDADO</h5>
                            </aside>
                        </div>

                        <!-- NO Recomendado -->
                        <div class="one_half last">
                            <div class="radial-progress" data-progress="<?php  echo floor(($datos['votos_negativos']/$datos['total'])*100); ?>">
                                <div class="circle">
                                    <div class="mask full">
                                        <div class="fill"></div>
                                    </div>
                                    <div class="mask half">
                                        <div class="fill"></div>
                                        <div class="fill fix"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                                <div class="inset">
                                    <div class="percentage">
                                        <div class="numbers"><span>-</span><span>0%</span><span>1%</span><span>2%</span><span>3%</span><span>4%</span><span>5%</span><span>6%</span><span>7%</span><span>8%</span><span>9%</span><span>10%</span><span>11%</span><span>12%</span><span>13%</span><span>14%</span><span>15%</span><span>16%</span><span>17%</span><span>18%</span><span>19%</span><span>20%</span><span>21%</span><span>22%</span><span>23%</span><span>24%</span><span>25%</span><span>26%</span><span>27%</span><span>28%</span><span>29%</span><span>30%</span><span>31%</span><span>32%</span><span>33%</span><span>34%</span><span>35%</span><span>36%</span><span>37%</span><span>38%</span><span>39%</span><span>40%</span><span>41%</span><span>42%</span><span>43%</span><span>44%</span><span>45%</span><span>46%</span><span>47%</span><span>48%</span><span>49%</span><span>50%</span><span>51%</span><span>52%</span><span>53%</span><span>54%</span><span>55%</span><span>56%</span><span>57%</span><span>58%</span><span>59%</span><span>60%</span><span>61%</span><span>62%</span><span>63%</span><span>64%</span><span>65%</span><span>66%</span><span>67%</span><span>68%</span><span>69%</span><span>70%</span><span>71%</span><span>72%</span><span>73%</span><span>74%</span><span>75%</span><span>76%</span><span>77%</span><span>78%</span><span>79%</span><span>80%</span><span>81%</span><span>82%</span><span>83%</span><span>84%</span><span>85%</span><span>86%</span><span>87%</span><span>88%</span><span>89%</span><span>90%</span><span>91%</span><span>92%</span><span>93%</span><span>94%</span><span>95%</span><span>96%</span><span>97%</span><span>98%</span><span>99%</span><span>100%</span></div>
                                    </div>
                                </div>
                            </div>

                            <aside class="content_recomendaciones">
                                <img src="<?php bloginfo('template_url'); ?>/img/icon_no_recomendado.png" alt="recomendada">
                                <h5>NO RECOMENDADO</h5>
                            </aside>
                        </div>
                        <div class="clearfix"></div>


                        <!-- Content porcentajes generales -->

                        <article class="content_porcentajes_generales">
                            <p class="titulo_porcentajes">Motivo</p>

                            <div class="content_porcentaje_individual">
                                <div class="one_third">
                                    <div class="content_porcentaje_blue"><span class="porcentaje_recomendado"><?php if($datos['calidad_servicio_positivo'] + $datos['calidad_servicio_negativo'] > 0 ){ echo ceil(($datos['calidad_servicio_positivo']/($datos['calidad_servicio_positivo'] + $datos['calidad_servicio_negativo']))*100);}else{ echo "0";} ?>%</span></div>
                                </div>
                                <div class="one_third item_calificado">
                                    <p>Calidad de servicio</p>
                                </div>
                                <div class="one_third last">
                                    <div class="content_porcentaje_blue"><span class="porcentaje_no_recomendado"><?php if(($datos['calidad_servicio_positivo'] + $datos['calidad_servicio_negativo']) > 0 ){ echo floor(($datos['calidad_servicio_negativo']/($datos['calidad_servicio_positivo'] + $datos['calidad_servicio_negativo']))*100);}else{ echo "0";} ?>%</span></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="content_porcentaje_individual">
                                <div class="one_third">
                                    <div class="content_porcentaje_blue"><span class="porcentaje_recomendado"><?php if(($datos['cumplimiento_plazos_positivo'] + $datos['cumplimiento_plazos_negativo']) > 0 ){ echo ceil(($datos['cumplimiento_plazos_positivo']/($datos['cumplimiento_plazos_positivo'] + $datos['cumplimiento_plazos_negativo']))*100);}else{ echo "0";} ?>%</span></div>
                                </div>
                                <div class="one_third item_calificado">
                                    <p>Cumplimiento de plazos<p>
                                </div>
                                <div class="one_third last">
                                    <div class="content_porcentaje_blue"><span class="porcentaje_no_recomendado"><?php if(($datos['cumplimiento_plazos_positivo'] + $datos['cumplimiento_plazos_negativo'])> 0 ){ echo floor(($datos['cumplimiento_plazos_negativo']/($datos['cumplimiento_plazos_positivo'] + $datos['cumplimiento_plazos_negativo']))*100);}else{ echo "0";} ?>%</span></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="content_porcentaje_individual">
                                <div class="one_third">
                                    <div class="content_porcentaje_blue"><span class="porcentaje_recomendado"><?php if(($datos['aspectos_administrativos_positivo'] + $datos['aspectos_administrativos_negativo'])> 0 ){ echo ceil(($datos['aspectos_administrativos_positivo']/($datos['aspectos_administrativos_positivo'] + $datos['aspectos_administrativos_negativo']))*100);}else{ echo "0";} ?>%</span></div>
                                </div>
                                <div class="one_third item_calificado">
                                    <p>Aspectos administrativos</p>
                                </div>
                                <div class="one_third last">
                                    <div class="content_porcentaje_blue"><span class="porcentaje_no_recomendado"><?php if(($datos['aspectos_administrativos_positivo'] + $datos['aspectos_administrativos_negativo']) > 0 ){ echo floor(($datos['aspectos_administrativos_negativo']/($datos['aspectos_administrativos_positivo'] + $datos['aspectos_administrativos_negativo']))*100);}else{ echo "0";} ?>%</span></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </article>

                    </article>




                </section>

                <section class="two_third last">
                    

                    <?php
                    get_currentuserinfo();
                    $user_id = $current_user->ID; 
                    if($user_id == 0){ ?>
                    <article class="content_ya_voto">
                        <p>Debe loguearse para poder votar.</p>
                    </article>                   
                    <?php }else{ if(userYaVoto($post->ID, $user_id)){ ?>
                    <article class="content_ya_voto">
                        <p>Usted a evaluado esta empresa.</p>
                    </article>
                    <?php }else{ ?>
                    <!-- Evaluar empresa -->
                    <article class="content_evaluar_empresa">
                        <div class="titulo_evaluar_empresa">
                            <aside class="triangle-left"></aside>
                            <h3>EVALUÁ A ESTA EMPRESA</h3>
                            <div class="clearfix"></div>
                        </div>    
                        
                        <!-- Sello anonimo -->
                        <aside class="anonimo anonimo_votacion"></aside>
                        <div class="clearfix"></div>

                        <form action="post" id="form_recomendacion_empresa">
                            <div id="content_plugin">
                            <?php GetWtiLikePost()?>
                            </div>
                            <div class="content_btns_recomiendo">
                                <div class="one_half">
                                    <a href="javascript:void(0);" class="btn_recomiendo"></a>
                                    <p>SI<br/>LA RECOMIENDO</p>
                                </div>
                                <div class="one_half last">
                                    <a href="javascript:void(0);" class="btn_no_recomiendo"></a>
                                    <p>NO<br/>LA RECOMIENDO</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="content_motivos_no_recomiendo">
                                <p><span class="bold">¿Porqué?</span> ¿Cuáles son tus motivos?</p>
                                <div class="content_separador_motivos">
                                    <img src="<?php bloginfo('template_url'); ?>/img/separador_motivos.png" alt="_">
                                </div>
                                <div class="content_check_1">
                                    <p>Calidad de servicio</p>
                                    <input type="checkbox" name="checkboxG4" id="checkboxG4" class="css-checkbox calidad_servicio" />
                                    <label for="checkboxG4" class="css-label radGroup1"></label>
                                </div>
                                <div class="content_check_2">
                                    <p>Cumplimiento de plazos</p>
                                    <input type="checkbox" name="checkboxG5" id="checkboxG5" class="css-checkbox cumplimiento_plazos"/>
                                    <label for="checkboxG5" class="css-label radGroup1"></label>
                                </div>
                                <div class="content_check_3">
                                    <p>Aspectos administrativos</p>
                                    <input type="checkbox" name="checkbdoxG6" id="checkboxG6" class="css-checkbox aspectos_administrativos" />
                                    <label for="checkboxG6" class="css-label radGroup1"></label>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <p class="bold">Comentarios:</p>
                            <textarea name="comentarios" placeholder="Escribe aquí tus comentarios"></textarea>
                            <div class="content_check_trabaje"><input type="checkbox" name="trabaje_con_empresa" checked=""><label for="trabaje_con_empresa">Trabajé con esta empresa</label></div>
                            <input type="submit" class="btn_submit_dark enviar_comentarios_empresa" value="ENVIAR">
                            <p class="status"></p>
                            <?php wp_nonce_field('ajax-votacion-nonce', 'signonsecurity'); ?>  
                        </form>
                    </article>
                    <?php } 
                        }
                    ?>
                </section>
                <div class="clearfix"></div>

                <section class="content_comentarios">
                    <h3>COMENTARIOS:</h3>
                    <ol class="commentlist">
                    <?php comments_template(); ?>
                    </ol>
                </section>

            </div>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>


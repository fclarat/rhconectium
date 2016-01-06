<?php
/**
 * Template Name: Registro Empresa
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

<main role="main" class="main bk_cuad">
    <div class="wrapper">

        <article id="content_registro_empresa" class="ajax_modal">
            <!-- <a href="javascript:void(0);" class="btn_cerrar_popup"></a> -->
            <h3>Formulario de Registro para Empresas</h3>
                    <div class="shadow_long"></div>
                    
                    <form action="post" id="form_registro_empresa">
                        <p class="titulo_registro">Datos Generales</p>
                        <input type="text" name="nombre_fantasia" class="input_rh" placeholder="Nombre de fantasía">
                        <input type="text" name="razon_social" class="input_rh" placeholder="Razón social">
                        
                        <div class="one_half">
                            <input type="text" name="email_empresa" class="input_rh" placeholder="E-Mail">
                        </div>
                        <div class="one_half last">
                            <input type="text" name="web" class="input_rh" placeholder="Web">
                        </div>
                        <div class="clearfix"></div>

                        <div class="one_half">
                            <input type="text" name="domicilio" class="input_rh" placeholder="Domicilio">
                        </div>
                        <div class="one_half last">
                            <div class="one_half">
                                <input type="text" name="numero" class="input_rh" placeholder="Número">
                            </div>
                            <div class="one_half last">
                                <input type="text" name="piso" class="input_rh" placeholder="Piso">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="one_half">
                            <input type="text" name="localidad" class="input_rh" placeholder="Localidad">
                        </div>
                        <div class="one_half last">
                            <input type="text" name="cp" class="input_rh" placeholder="Código postal">
                        </div>
                        <div class="clearfix"></div>

                        <div class="one_half">
                            <input type="text" name="provincia" class="input_rh" placeholder="Provincia">
                        </div>
                        <div class="one_half last">
                            <input type="text" name="telefono" class="input_rh" placeholder="Teléfono">
                        </div>
                        <div class="clearfix"></div>
                        <div><textarea name="descripcion" class="textarea_rh"></textarea></div>
                        <div>
                            <label for="logo_empresa">Logo de la empresa</label>
                            <input type="file" name="logo_empresa" class="custom-file-input" accept="image/*">
                            <p class="form_nota">.JPG / .PNG máximo 3mb</p>
                            <div class="clearfix"></div>
                        </div>
                
                        <?php 
                        // no default values. using these as examples
                        $taxonomy = 'rubros';
                        $terms = get_terms($taxonomy,array( 'hide_empty' => false));
                        
                        ?>
                        
                        <p class="titulo_registro">Rubros</p>
                        <?php 
                            if(is_array($terms)){
                                $cant = count($terms);
                                $cont = 1; 
                        ?>
                        <div class="content_opciones">
                            <div class="one_half">
                                <?php foreach ($terms as $term) { ?>
                                    <div><input type="checkbox" value="<?php echo $term->slug; ?>" name="rubro"><label for="rubro"><?php echo $term->name; ?></label></div> 
                                    <?php if($cont == ceil(($cant/2))) { ?>
                                    </div>
                                    <div class="one_half last">
                                    <?php } ?> 
                                    <?php if($cont == $cant) { ?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <?php } ?>      
                                <?php 
                                    $cont++;
                                }
                                ?>
                            </div>
                            <?php } ?>
                        <!-- <p class="titulo_registro">Datos de Contacto</p>
                        
                        <div class="one_half">
                            <input type="text" name="nombre" class="input_rh" placeholder="Nombre">
                        </div>
                        <div class="one_half last">
                            <input type="text" name="apellido" class="input_rh" placeholder="Apellido">
                        </div>
                        <div class="clearfix"></div>

                        <div class="one_half">
                            <input type="text" name="celular" class="input_rh" placeholder="Celular">
                        </div>
                        <div class="one_half last">
                            <input type="text" name="email_usuario" class="input_rh" placeholder="E-Mail">
                        </div>
                        <div class="clearfix"></div> -->

                        <!--<p class="titulo_registro">Áreas de Actualización</p>
                        
                        <div class="content_opciones">
                            <div class="one_half">
                                <div><input type="checkbox" name="administracion_personal"><label for="administracion_personal">Administración de personal</label></div>
                                <div><input type="checkbox" name="asesoramiento_laboral_legal"><label for="asesoramiento_laboral_legal">Asesoramiento Laboral / Legal</label></div>
                                <div><input type="checkbox" name="asignaciones_nac_int"><label for="asignaciones_nac_int">Asiganciones Nac. e Internac.</label></div>
                                <div><input type="checkbox" name="beneficios"><label for="beneficios">Beneficios</label></div>
                                <div><input type="checkbox" name="calidad_vida"><label for="calidad_vida">Calidad de vida</label></div>
                                <div><input type="checkbox" name="capacitaciones"><label for="capacitaciones">Capacitaciones y Desarrollo</label></div>
                                <div class="sub_item"><input type="checkbox" name="capacitaciones_gestion"><label for="capacitaciones_gestion">En gestión</label></div>
                                <div class="sub_item"><input type="checkbox" name="capacitaciones_idiomas"><label for="capacitaciones_idiomas">Idiomas</label></div>
                                <div class="sub_item"><input type="checkbox" name="capacitaciones_company"><label for="capacitaciones_company">In Company</label></div>
                            </div>

                            <div class="one_half last">
                                <div><input type="checkbox" name="gestion_desempeno"><label for="gestion_desempeno">Gestión de desempeño</label></div>
                                <div><input type="checkbox" name="indicadores_gestion"><label for="indicadores_gestion">Indicadores de gestión</label></div>
                                <div><input type="checkbox" name="liquidacion_haberes"><label for="liquidacion_haberes">Liquidación de haberes</label></div>
                                <div><input type="checkbox" name="outsourcing_rrhh"><label for="outsourcing_rrhh">Outsourcing de servicios de RRHH</label></div>
                                <div><input type="checkbox" name="planeamiento_capital_humano"><label for="planeamiento_capital_humano">Planeamiento de Capital Humano</label></div>
                                <div><input type="checkbox" name="reclutamiento"><label for="reclutamiento">Reclutamiento y Selección</label></div>
                                <div class="sub_item"><input type="checkbox" name="reclutamiento_busquedas"><label for="reclutamiento_busquedas">Búsquedas</label></div>
                                <div class="sub_item"><input type="checkbox" name="reclutamiento_headhunter"><label for="reclutamiento_headhunter">Headhunter</label></div>
                                <div class="sub_item"><input type="checkbox" name="reclutamiento_outplacement"><label for="reclutamiento_outplacement">Outplacement</label></div>
                            </div>
                            <div class="clearfix"></div>
                        </div> -->
                        <p class="txt_terminos">Para registarse debe leer y aceptar nuestros <a href="#">Terminos y condiciones.</a></p>
                        <div class="content_terminos">
                            <div class="one_half"><input type="checkbox" name="terminos" value="si" checked><label for="terminos">Acepto</label></div>
                        </div>
                        <div class="clearfix"></div>
                        <input type="submit" class="btn_submit_dark enviar_registro_empresa" value="Registro">
                        <p class="status"></p>
                        <?php wp_nonce_field('ajax-registro-empresa-nonce', 'signonsecurity'); ?>
                    </form>
            <img src="<?php echo get_template_directory_uri(); ?>/img/bottom_form.png" alt="s">
        </article>

    </div>
</main>



<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script> -->
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

<script defer src="js/jquery.flexslider.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<!--
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
-->

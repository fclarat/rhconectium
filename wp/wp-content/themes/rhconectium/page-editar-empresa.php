<?php
/**
 * Template Name: Editar Empresa
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
            <?php
            $empresa_ID = $_GET['id'];
            $this_empresa = get_post($empresa_ID); 
            
            global $current_user;
            get_currentuserinfo();
            $logged_in_user = $current_user->ID;

            if($this_empresa->post_author == $logged_in_user){
            ?> 
            <!-- <a href="javascript:void(0);" class="btn_cerrar_popup"></a> -->
            <h3>Formulario de Edición: <?php echo get_field('razon_social',$this_empresa->ID);  ?></h3>
                    <div class="shadow_long"></div>
                    
                    <form action="post" id="form_editar_empresa">
                        <p class="titulo_registro">Datos Generales</p>
                        <input type="text" name="nombre_fantasia" class="input_rh" placeholder="Nombre de fantasía" value="<?php echo $this_empresa->post_title; ?>">
                        <input type="hidden" name="id_empresa" class="input_rh" placeholder="id" value="<?php echo $this_empresa->ID;?>">
                        <div class="one_half">
                            <input type="text" name="email_empresa" class="input_rh" placeholder="E-Mail" value="<?php echo get_field('email',$this_empresa->ID);?>">
                        </div>
                        <div class="one_half last">
                            <input type="text" name="web" class="input_rh" placeholder="Web" value="<?php echo get_field('web',$this_empresa->ID);?>">
                        </div>
                        <div class="clearfix"></div>

                        <div class="one_half">
                            <input type="text" name="domicilio" class="input_rh" placeholder="Domicilio" value="<?php echo get_field('domicilio',$this_empresa->ID);?>">
                        </div>
                        <div class="one_half last">
                            <div class="one_half">
                                <input type="text" name="numero" class="input_rh" placeholder="Número" value="<?php echo get_field('numero',$this_empresa->ID);?>">
                            </div>
                            <div class="one_half last">
                                <input type="text" name="piso" class="input_rh" placeholder="Piso" value="<?php echo get_field('piso',$this_empresa->ID);?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="one_half">
                            <input type="text" name="localidad" class="input_rh" placeholder="Localidad" value="<?php echo get_field('localidad',$this_empresa->ID);?>">
                        </div>
                        <div class="one_half last">
                            <input type="text" name="cp" class="input_rh" placeholder="Código postal" value="<?php echo get_field('codigo_postal',$this_empresa->ID);?>">
                        </div>
                        <div class="clearfix"></div>

                        <div class="one_half">
                            <input type="text" name="provincia" class="input_rh" placeholder="Provincia" value="<?php echo get_field('provincia',$this_empresa->ID);?>">
                        </div>
                        <div class="one_half last">
                            <input type="text" name="telefono" class="input_rh" placeholder="Teléfono" value="<?php echo get_field('telefono',$this_empresa->ID);?>">
                        </div>
                        <div class="clearfix"></div>
                        <div><textarea name="descripcion" class="textarea_rh"><?php echo get_field('descripcion',$this_empresa->ID);?></textarea></div>
                        <div>
                            <label for="logo_empresa">Logo de la empresa</label>
                            <?php 
                            $logo_url = null; 
                            if(get_field('logo',$this_empresa->ID)){
                                $logo = get_field('logo',$this_empresa->ID);
                                $logo_url = $logo['url'];
                            }else{
                               $logo_url = get_bloginfo('template_url').'/img/logo_empresa.jpg';
                            }
                            ?>
                            <div><img class="logo_actual" src="<?php echo $logo_url; ?>" alt="" style="width: 234px; padding: 20px 0px;"></div>
                            <a class="btn_round_blue btn_editar_logo" href="javascript:void(0);" title="Editar Imagen">Editar Imagen</a>
                            <div class="editar_logo" style="display:none;margin-top: 20px;">
                                <input class="logo_input" type="file" name="logo_empresa" class="custom-file-input" accept="image/*">
                                <p class="form_nota">.JPG / .PNG máximo 3mb</p>
                            </div>
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
                                    <div><input type="checkbox" value="<?php echo $term->slug; ?>" name="rubro" <?php if(has_term( $term->slug, 'rubros', $this_empresa->ID )): echo 'checked'; endif;  ?>><label for="rubro"><?php echo $term->name; ?></label></div> 
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
                        <div class="clearfix"></div>
                        <input type="submit" class="btn_submit_dark enviar_editar_empresa" value="Guardar">
                        <p class="status"></p>
                        <?php wp_nonce_field('ajax-edit-empresa-nonce', 'signonsecurity'); ?>
                    </form>
            <img src="<?php echo get_template_directory_uri(); ?>/img/bottom_form.png" alt="s">
            <?php  
            }else{
            ?>
            <h3>No tiene permiso para editar esta empresa.</h3>  
            <?php  
            }
            ?>
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

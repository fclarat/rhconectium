<?php
/**
 * Template Name: Registro Usuario
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
<?php  
    $message = $_GET['id'];    
?>
<main role="main" class="main bk_cuad">
    <div class="wrapper">

        <article id="content_registro_empresa" class="ajax_modal">
            <!-- <a href="javascript:void(0);" class="btn_cerrar_popup"></a> -->
            <h3>Formulario de Registro</h3>
            <div class="shadow_long"></div>
            <?php if ($message ==1):
            ?>
            <p class="mensaje_registro">Para registrar tu empresa primero debes registrarte como usuario.</p>
            <?php  
            endif;
            ?>
            <form action="post" id="form_registro_user">
                <div class="one_half">
                    <input type="text" name="nombre" class="input_rh" placeholder="Nombre de usuario">
                    <input type="password" name="pass" class="input_rh" placeholder="Contraseña">
                    <input type="password" name="confirme_pass" class="input_rh" placeholder="Confirme contraseña">
                    <input type="text" name="email_usuario" class="input_rh" placeholder="E-Mail">
                </div>
                
                <div class="one_half last">
                    <?php do_action( 'wordpress_social_login' ); ?> 
                    <!-- <div class="content_social_connect"><a href="#" class="btn_face_connect"><img src="<?php echo get_template_directory_uri(); ?>/img/face_button_reg.png" alt="Facebook Connect"></a></div>
                    <div class="content_social_connect"><a href="#" class="btn_linkedin_connect"><img src="<?php echo get_template_directory_uri(); ?>/img/linkedin_button_reg.png" alt="linkedin Connect"></a></div> -->
                </div>
                <div class="clearfix"></div>

                <p class="txt_terminos">Para registarse debe leer y aceptar nuestros <a href="#">Terminos y condiciones.</a></p>
                <div class="content_terminos">
                    <div class="one_half"><input type="checkbox" name="acepto_terminos" checked=""><label for="acepto_terminos">Acepto los términos y condiciones.</label></div>
                    <!-- <div class="one_half last"><input type="checkbox" name="no_acepto_terminos"><label for="no_acepto_terminos">No Acepto</label></div> -->
                    <div class="clearfix"></div>
                </div>
                <input type="submit" class="btn_submit_dark enviar_registro_empresa" value="Registro">
                <p class="status"></p>
                <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
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

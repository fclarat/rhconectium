<?php
/**
 * Template Name: Login
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
            <h3>Login</h3>
            <div class="shadow_long"></div>
            
            <form action="post" id="form_login_user">
                <div class="one_half">
                    <input type="text" name="usuario" class="input_rh" placeholder="Nickname o E-Mail">
                    <input type="password" name="pass" class="input_rh" placeholder="Contraseña">
                    <div class="olvide_pass"><a href="#" class="recuperar-password">¿Olvidó su contraseña?</a></div>
                    <input type="checkbox" name="checkboxG4" id="checkboxG4" class="css-checkbox-2" /><label for="checkboxG4" class="css-label-2 radGroup1">Recordarme</label>
                    <input type="submit" class="btn_submit_dark" value="Ingresar">
                    <p class="status"></p>
                    <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                    <div class="clearfix"></div>
                </div>
                
                <div class="one_half last">
                    <?php do_action( 'wordpress_social_login' ); ?> 
                    <!-- <div class="content_social_connect"><a href="#" class="btn_face_connect"><img src="<?php echo get_template_directory_uri(); ?>/img/face_button_reg.png" alt="Facebook Connect"></a></div>
                    <div class="content_social_connect"><a href="#" class="btn_linkedin_connect"><img src="<?php echo get_template_directory_uri(); ?>/img/linkedin_button_reg.png" alt="linkedin Connect"></a></div> -->
                </div>
                <div class="clearfix"></div>
            </form>
            <form action="post" id="form_recuperar_password">
                <div class="one_half">
                    <p>Por favor ingrese su email registrado. Recibirá un correo para poder restaurar su contraseña.</p>
                    <p>
                        <label for="email">E-mail:</label>
                        <input type="text" name="email" id="email" value="" />
                    </p>
                </div>
                <input type="submit" class="btn_submit_dark" value="Recuperar contraseña">
                <div class="olvide_pass"><a href="#" class="volver-login">Volver al Log In.</a></div>
                <p class="status"></p>
                <?php wp_nonce_field('ajax-retrieve-nonce', 'signonsecurity'); ?>
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

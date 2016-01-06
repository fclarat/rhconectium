<?php
/**
 * Template Name: Contactar Empresa
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
            <h3>Contactar Empresa</h3>
            <div class="shadow_long"></div>
            
            <form action="post" id="form_contactar_empresa">
                <?php  
                if( is_user_logged_in() ){    
                    global $current_user;
                    get_currentuserinfo();
                ?>
                <div>
                    <p>Nombre de Usuario: <?php echo $current_user->display_name; ?> </p>
                    <p>Email: <?php echo $current_user->user_email; ?> </p>
                    <p>Ingrese aquí la consulta que desea hacerle a la empresa:</p>
                    <textarea name="consulta" class="textarea_rh"></textarea>
                    <input type="submit" class="btn_submit_dark" value="Enviar">
                    <p class="status"></p>
                    <?php wp_nonce_field( 'ajax-contactar_empresa-nonce', 'security' ); ?>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <?php }else{?>
                <p>Debe loguearse para poder contactarse con la empresa.</p>
                <?php }  ?>
            </form>
            <img src="<?php echo get_template_directory_uri(); ?>/img/bottom_form.png" alt="s">
        </article>

    </div>
</main>



<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script> -->
<!--
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
<script defer src="js/jquery.flexslider.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

-->
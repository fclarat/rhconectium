<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package RH Conectium
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	
	<header class="bkg_points">
        <div class="wrapper">
            <div class="one_third">
                <h1><a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo_rh.png" alt="RH Conectium"></a></h1>
            </div>
            
            <?php if ( is_user_logged_in() ) { 

            $user_ID = get_current_user_id();
            $user_info = get_userdata( $user_ID );
            $nombre = $user_info->first_name;
            ?>
            <aside class="content_login two_third last">
                <a class="nombre_user">Hola, <?php echo $nombre.''; ?></a><a class="btn_round_blue" href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout">Salir</a>
                <a href="<?php echo get_permalink( get_page_by_path( 'registro-empresa' ) ) ?>" class="ajax-popup-link btn_registro_empresa">Registrar empresa.</a>
                <?php 
                $user_empresas = count_user_posts( $user_ID, 'empresas' ); 
                if ($user_empresas >0){
                ?>
                <a href="<?php echo get_permalink( get_page_by_path( 'mis-empresas' ) ) ?>" class="btn_mis_empresas">Mis empresas.</a>
                <?php     
                }
                ?>
            </aside>
            <?php } else { ?>
            <!-- login / registro -->
            <aside class="content_login two_third last">
                <a href="<?php echo get_permalink( get_page_by_path( 'login-usuario' ) ) ?>" class="btn_login btn_round_blue">LOGIN</a>
                <a href="<?php echo get_permalink( get_page_by_path( 'registro-usuario' ) ) ?>" class="btn_registro btn_round_blue">REGISTRO</a>
                <a href="<?php echo get_permalink( get_page_by_path( 'registro-usuario' ) ) ?>?id=1" class="btn_registro btn_quieres_registrar">¿Quieres registrar tu empresa?</a>
            </aside>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </header>

	<div id="content" class="site-content">

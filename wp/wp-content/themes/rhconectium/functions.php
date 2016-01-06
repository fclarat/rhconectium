<?php
/**
 * RH Conectium functions and definitions
 *
 * @package RH Conectium
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'rhconectium_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rhconectium_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on RH Conectium, use a find and replace
	 * to change 'rhconectium' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rhconectium', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rhconectium' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rhconectium_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // rhconectium_setup
add_action( 'after_setup_theme', 'rhconectium_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function rhconectium_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'rhconectium' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'rhconectium_widgets_init' );

include 'ChromePhp.php';

/**
 * Enqueue scripts and styles.
 */
function rhconectium_scripts() {
	wp_enqueue_style( 'rhconectium-style', get_stylesheet_uri() );
	wp_enqueue_style( 'style-normalize', get_template_directory_uri() . '/css/normalize.css', array(), '20152601' );
	wp_enqueue_style( 'style-main', get_template_directory_uri() . '/css/main.css', array(), '20152601' );

	wp_enqueue_style( 'style-jquery', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), '20152601' );

	wp_enqueue_script( 'rhconectium-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'rhconectium-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	// SCRIPTS
	wp_enqueue_script( 'rhconectium-modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', array(), '20152601', true );
	wp_enqueue_script( 'rhconectium-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), '20152601', true );
	wp_enqueue_script( 'rhconectium-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array(), '20152601', true );
	wp_enqueue_script( 'rhconectium-main', get_template_directory_uri() . '/js/main.js', array(), '20152601', true );

	wp_enqueue_script( 'rhconectium-jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array(), '20150106', true );

    wp_localize_script('rhconectium-main', 'ajax_register_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Enviando información...')
    ));
    wp_localize_script( 'rhconectium-main', 'ajax_login_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Enviando información...')
    ));

    wp_localize_script( 'rhconectium-main', 'ajax_retrieve_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Enviando información...')
    ));

    wp_localize_script( 'rhconectium-main', 'ajax_register_empresa_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Enviando información...')
    ));

     wp_localize_script( 'rhconectium-main', 'ajax_edit_empresa_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Enviando información...')
    ));

      wp_localize_script( 'rhconectium-main', 'ajax_voteop_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Enviando información...')
    ));
       wp_localize_script( 'rhconectium-main', 'ajax_contactar_empresa_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'loadingmessage' => __('Enviando información...')
    ));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rhconectium_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


//MENU PAGE ESTADISTICAS

add_action( 'admin_menu', 'my_admin_menu' );
function my_admin_menu() {
    add_menu_page( 'Estadísticas', 'Estadísticas', 'manage_options', 'myplugin/estadisticas-admin-page.php', 'estadisticas_admin_page', 'dashicons-clipboard', 6 );
}

function estadisticas_admin_page(){
    include( get_template_directory() . '/tpl_estadisticas.php' );
}



//AJAX LOGIN AND REGISTER

function ajax_login_init(){
    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}


function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    if($_POST['remember'] == 'false'){
        $remember == false;
    }else{
        $remember == true;
    }
    $info['remember'] = $remember;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Usuario o contraseña incorrectos.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Redireccionando...')));
    }

    die();
}


function ajax_retrievepassword_init(){
    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxretrievepassword', 'ajax_retrievepassword' );
}


// Execute the action only if the user isn't logged in
if (is_user_logged_in()) {
    add_action('init', 'ajax_retrievepassword_init');
}

function ajax_retrievepassword(){
     if(check_ajax_referer( 'ajax-retrieve-nonce', 'signonsecurity' , false )){
        echo json_encode(array('passwordchanged'=>false, 'message'=>$error));
        exit();
    }

    $error = '';
    $success = '';
    $email = trim($_POST['email']);
    if( empty( $email ) ) {
        $error = 'Ingrese una dirección de correo electrónico registrada.';
    } else if( ! is_email( $email )) {
        $error = 'Formato de correo electrónico incorrecto.';
    } else if( ! email_exists( $email ) ) {
        $error = 'La dirección ingresada no corresponde a un usuario registrado.';
    } else {

        $random_password = wp_generate_password( 12, false );
        $user = get_user_by( 'email', $email );

        $update_user = wp_update_user( array (
                'ID' => $user->ID,
                'user_pass' => $random_password
            )
        );

        // if  update user return true then lets send user an email containing the new password
        if( $update_user ) {
            $to = $email;
            $subject = '[RH Conectium] Tu nueva contraseña';
            $sender = get_option('blogname');

            $message = 'Tu nueva contraseña es: '.$random_password;

            $headers[] = 'MIME-Version: 1.0' . "\r\n";
            $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers[] = "X-Mailer: PHP \r\n";
            $headers[] = 'From: '.$sender.' < '.$email.'>' . "\r\n";

            $mail = wp_mail( $to, $subject, $message, $headers );
            if( $mail )
                $success = 'Nueva contraseña enviada, revisa tu casilla de correo!.';

        } else {
            $error = 'Oops! Algo salió mal mientras actualizabamos tus datos :(. Inténtalo mas tarde.';
        }

    }

    if( ! empty( $error ) ){
        echo json_encode(array('passwordchanged'=>false, 'message'=>$error));
        exit();
    }

    if( ! empty( $success ) ){
        echo json_encode(array('passwordchanged'=>true, 'message'=>$success));
        exit();
    }
}


function ajax_register_init(){
    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxregister', 'ajax_register' );
}


// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_register_init');
}

function ajax_register(){
    // First check the nonce, if it fails the function will break

    if(check_ajax_referer( 'ajax-register-nonce', 'signonsecurity' , false )){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Error en la verificación nonce.')));
        exit();
    }

    // Nonce is checked, get the POST data and sign user on


    //Check empty parameters

     if($_POST['password'] == '' OR $_POST['username'] == '' OR $_POST['password_confirm'] == '' OR $_POST['email'] == ''){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Complete todos los campos.')));
        exit();
     }

     //Check terminos y servicios

     if($_POST['terminos'] == 'false'){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Deben aceptarse los términos y servicios.')));
        exit();
     }

    //Check if passwords are equals

    if($_POST['password'] != $_POST['password_confirm'] ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('La confirmación de la contraseña no coincide.')));
        exit();
    }


    $info = array();
    $info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['first_name'] = $info['user_login'] = $_POST['username'];
    $info['user_pass'] = $_POST['password'];
    $info['user_email'] = sanitize_email( $_POST['email']);
    $info['remember'] = true;
    if(strlen($info['user_nicename'])<4){
        echo json_encode(array('loggedin'=>false, 'message'=>__('El nombre de usuario debe tener mas de tres caracteres.')));
        exit();
    }
    if(!isValidEmail( $info['user_email'])){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Formato de email incorrecto.')));
        exit();
    }

    $user_register = wp_insert_user( $info );

    if ( is_wp_error($user_register) ){
        $error  = $user_register->get_error_codes();
        if(in_array('empty_user_login', $error)){
            echo json_encode(array('loggedin'=>false, 'message'=>__('Complete el campo usuario.')));
            exit();
        }
        if(in_array('existing_user_login',$error)){
            echo json_encode(array('loggedin'=>false, 'message'=>__('Usuario ya registrado.')));
            exit();
        }
        if(in_array('existing_user_email',$error)){
            echo json_encode(array('loggedin'=>false, 'message'=>__('Email ya registrado.')));
            exit();
        }
    } else {
        wp_new_user_notification( $user_register, $info['user_pass'] );
        $info_log = array();
        $info_log['user_login'] = $info['user_login'];
        $info_log['user_password'] = $info['user_pass'];
        $info_log['remember'] = true;
        $user_signon = wp_signon( $info_log, false );
        echo json_encode(array('loggedin'=>true, 'message'=>__('Registro Completo. Redireccionando...')));
        exit();
        //  ($info['nickname'], $info['user_pass'], 'Registration');
    }

}



function ajax_register_empresa_init(){
    // Enable the user with no privileges to run ajax_login() in AJAX

    add_action( 'wp_ajax_ajaxregisterempresa', 'ajax_register_empresa' );
}


// Execute the action only if the user is logged in
if (is_user_logged_in()) {
    add_action('init', 'ajax_register_empresa_init');

}

function ajax_register_empresa(){
    $nombre = $_POST['nombre_fantasia'];
    $razon_social = $_POST['razon_social'];
    $email = $_POST['email_empresa'];
    $web = $_POST['web'];
    $domicilio = $_POST['domicilio'];
    $numero = $_POST['numero'];
    $piso = $_POST['piso'];
    $localidad = $_POST['localidad'];
    $codigo_postal = $_POST['cp'];
    $provincia = $_POST['provincia'];
    $telefono = $_POST['telefono'];
    $descripcion = $_POST['descripcion'];
    $rubros = $_POST['rubros'];
    $terminos = $_POST['terminos'];
    if(isset($_FILES['logo_empresa'])){
        $icono = $_FILES['logo_empresa'];
    }

    if(check_ajax_referer( 'ajax-register-nonce', 'security' , false )){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Error en la verificación nonce.')));
        exit();
    }

    if( $nombre == ''){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Ingrese el nombre de fantasía de la empresa.')));
        exit();
    }

    if( $razon_social == ''){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Ingrese la razón social de la empresa.')));
        exit();
    }

    if( $email == ''){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Ingrese el email de la empresa.')));
        exit();
    }

    if( $domicilio == ''){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Ingrese el domicilio de la empresa.')));
        exit();
    }

    if( $localidad == ''){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Ingrese la localidad de la empresa.')));
        exit();
    }

    if( $codigo_postal == ''){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Ingrese el código postal de la empresa.')));
        exit();
    }

    if( $provincia == ''){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Ingrese la provincia de la empresa.')));
        exit();
    }

    if( $telefono == ''){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Ingrese el telefono de la empresa.')));
        exit();
    }

    if( $descripcion == ''){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Ingrese la descripción de la empresa.')));
        exit();
    }


    if( count($rubros) == 0){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Seleccione por lo menos un rubro para su empresa.')));
        exit();
    }

    if(!isValidEmail( $email )){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Formato de email incorrecto.')));
        exit();
    }

    if( $termino == 'false'){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Deben aceptarse los términos y servicios.')));
        exit();
    }

    if(strlen( $descripcion ) > 130){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('La descripción de la empresa es demasiado larga.')));
        exit();
    }

    $slug_name = sanitize_title($nombre);

    $post = array(

      'post_content'   => '', // The full text of the post.
      'post_name'      => $slug_name, // The name (slug) for your post
      'post_title'     => $nombre, // The title of your post.
      'post_status'    => 'draft',
      'post_type'      => 'empresas',
    );

    $new_empresa_id = wp_insert_post( $post, false );

    if($new_empresa_id == 0){
        echo json_encode(array('register_emepresa'=>false, 'message'=>__('Ha habido un problema al guardar la empresa. Por favor inténtelo mas tarde.')));
        exit();
    }

    // required for wp_handle_upload() to upload the file
    $upload_overrides = array( 'test_form' => FALSE );

    global $current_user;
    get_currentuserinfo();
    $logged_in_user = $current_user->ID;

    // check to see if the file name is not empty
    if ( !empty( $icono['name'] ) ) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );

        $response = media_handle_upload('logo_empresa', $new_empresa_id);
        $response_2 =  update_field('logo', $response, $new_empresa_id);

    }

    $rubros = $_POST['rubros'];

    if($razon_social){
        update_field('razon_social', $razon_social, $new_empresa_id);
    }
    if($email){
        update_field('email', $email, $new_empresa_id);
    }
    if($web){
        update_field('web', $web, $new_empresa_id);
    }
    if($domicilio){
        update_field('domicilio', $domicilio, $new_empresa_id);
    }
    if($numero){
        update_field('numero', $numero, $new_empresa_id);
    }
    if($piso){
        update_field('piso', $piso, $new_empresa_id);
    }
    if($localidad){
        update_field('localidad', $localidad, $new_empresa_id);
    }
    if($codigo_postal){
        update_field('codigo_postal', $codigo_postal, $new_empresa_id);
    }
    if($provincia){
        update_field('provincia', $provincia, $new_empresa_id);
    }
    if($telefono){
        update_field('telefono', $telefono, $new_empresa_id);
    }
    if($descripcion){
        update_field('descripcion', $descripcion, $new_empresa_id);
    }
    if($rubros){
        //wp_set_object_terms( $new_empresa_id, $rubros, 'rubros', false );
        //update_field('rubros', $rubros, $new_empresa_id);
        $rubros = explode(',', $rubros);
        foreach ($rubros as $rubro) {
            wp_set_object_terms( $new_empresa_id, $rubro, 'rubros', true);
            //update_field('rubros', $rubro, $new_empresa_id);
        }
        //update_field('rubros', $rubros, $new_empresa_id);
    }
    echo json_encode(array('register_emepresa'=>true, 'message'=>__('Empresa registrada.')));
        exit();


}



function ajax_edit_empresa_init(){
    // Enable the user with no privileges to run ajax_login() in AJAX

    add_action( 'wp_ajax_ajaxeditempresa', 'ajax_edit_empresa' );
}


// Execute the action only if the user is logged in
if (is_user_logged_in()) {
    add_action('init', 'ajax_edit_empresa_init');

}

function ajax_edit_empresa(){
    $nombre = $_POST['nombre_fantasia'];
    $empresa_id = $_POST['id_empresa'];
    $razon_social = $_POST['razon_social'];
    $email = $_POST['email_empresa'];
    $web = $_POST['web'];
    $domicilio = $_POST['domicilio'];
    $numero = $_POST['numero'];
    $piso = $_POST['piso'];
    $localidad = $_POST['localidad'];
    $codigo_postal = $_POST['cp'];
    $provincia = $_POST['provincia'];
    $telefono = $_POST['telefono'];
    $descripcion = $_POST['descripcion'];
    $rubros = $_POST['rubros'];
    $terminos = $_POST['terminos'];
    if(isset($_FILES['logo_empresa'])){
        $icono = $_FILES['logo_empresa'];
    }

    if(check_ajax_referer( 'ajax-edit-nonce', 'security' , false )){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('Error en la verificación nonce.')));
        exit();
    }

    if( $nombre == ''){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('Ingrese el nombre de fantasía de la empresa.')));
        exit();
    }

    if( $email == ''){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('Ingrese el email de la empresa.')));
        exit();
    }

    if( $domicilio == ''){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('Ingrese el domicilio de la empresa.')));
        exit();
    }

    if( $localidad == ''){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('Ingrese la localidad de la empresa.')));
        exit();
    }

    if( $codigo_postal == ''){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('Ingrese el código postal de la empresa.')));
        exit();
    }

    if( $provincia == ''){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('Ingrese la provincia de la empresa.')));
        exit();
    }

    if( $telefono == ''){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('Ingrese el telefono de la empresa.')));
        exit();
    }

    if( $descripcion == ''){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('Ingrese la descripción de la empresa.')));
        exit();
    }


    if( count($rubros) == 0){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('Seleccione por lo menos un rubro para su empresa.')));
        exit();
    }

    if(!isValidEmail( $email )){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('Formato de email incorrecto.')));
        exit();
    }

    if( $termino == 'false'){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('Deben aceptarse los términos y servicios.')));
        exit();
    }

    if(strlen( $descripcion ) > 130){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('La descripción de la empresa es demasiado larga.')));
        exit();
    }

    $this_empresa = get_post($empresa_id);
    global $current_user;
    get_currentuserinfo();
    $logged_in_user = $current_user->ID;

    if($this_empresa->post_author != $logged_in_user){
        echo json_encode(array('edit_emepresa'=>false, 'message'=>__('No tienes permiso para editar esta empresa.')));
        exit();
    }


    // check to see if the file name is not empty
    if ( !empty( $icono['name'] ) ) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );

        $response = media_handle_upload('logo_empresa', $empresa_id);
        $response_2 =  update_field('logo', $response, $empresa_id);

    }

    $rubros = $_POST['rubros'];

    if($email){
        update_field('email', $email, $empresa_id);
    }
    if($web){
        update_field('web', $web, $empresa_id);
    }
    if($domicilio){
        update_field('domicilio', $domicilio, $empresa_id);
    }
    if($numero){
        update_field('numero', $numero, $empresa_id);
    }
    if($piso){
        update_field('piso', $piso, $empresa_id);
    }
    if($localidad){
        update_field('localidad', $localidad, $empresa_id);
    }
    if($codigo_postal){
        update_field('codigo_postal', $codigo_postal, $empresa_id);
    }
    if($provincia){
        update_field('provincia', $provincia, $empresa_id);
    }
    if($telefono){
        update_field('telefono', $telefono, $empresa_id);
    }
    if($descripcion){
        update_field('descripcion', $descripcion, $empresa_id);
    }
    if($rubros){
        wp_set_object_terms( $empresa_id, NULL, 'rubros', false );
        $rubros = explode(',', $rubros);
        foreach ($rubros as $rubro) {
            wp_set_object_terms( $empresa_id, $rubro, 'rubros', true);
        }
    }
    echo json_encode(array('edit_empresa'=>true, 'message'=>__('Empresa editada.')));
    exit();
}







function auth_user_login($user_login, $password, $login){
    $info = array();
    $info['user_login'] = $user_login;
    $info['user_password'] = $password;
    $info['remember'] = true;

     $user_signon = wp_signon( $info, false );
        if ( is_wp_error($user_signon) ){
     echo json_encode(array('loggedin'=>false, 'message'=>__('Usuario o contraseña incorrectos.')));
        } else {
     wp_set_current_user($user_signon->ID);
            echo json_encode(array('loggedin'=>true, 'message'=>__('Redireccionando...')));
        }

     die();
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL)
        && preg_match('/@.+\./', $email);
}

function template_chooser($template){
  global $wp_query;
  $post_type = get_query_var('post_type');
  if( $wp_query->is_search && $post_type == 'empresas'){
    return locate_template('archive-search-empresa.php');
  }
  return $template;
}
add_filter('template_include', 'template_chooser');

function mySearchFilter($query) {
    $post_type = $_GET['post_type'];
    if (!$post_type) {
        $post_type = 'any';
    }
    if ($query->is_search) {
        $query->set('post_type', $post_type);
    };

    $custom_search = esc_html($_GET['rubro']);
    if ($custom_search && $query->is_search) {
        $tax_query =  array(
                array(
            'taxonomy' => 'rubros',
            'field'    => 'slug',
            'terms'    =>  $custom_search,
                )
            );

        $query->set('tax_query',$tax_query);
    };

    return $query;
};

add_filter('pre_get_posts','mySearchFilter');


// Hook for adding any activity to successful voting
add_action( 'wti_like_post_vote_action', 'wti_like_post_vote_action', 10, 6 );

function wti_like_post_vote_action( $post_id, $ip, $user_id, $task, $msg, $error ) {
    //wp_redirect( get_permalink($post_id).'/?vote=1'); exit;
}


function ajax_vote_init(){
    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_ajaxvoteop', 'ajax_voteop' );
}

add_action('init', 'ajax_vote_init');


function userYaVoto($post_id, $user_id){
    global $wpdb;
    $vot_query = 'SELECT * FROM f8c_wti_like_post WHERE post_id ='.$post_id.' AND user_id ='.$user_id;
    //ChromePhp::log($vot_query);

    $result_query = $wpdb->get_results( $vot_query, OBJECT );
    if($wpdb->num_rows != 0){
        return true;
    }else{
        return false;
    }
}

function ajax_voteop(){
    global $current_user;
    global $wpdb;
    get_currentuserinfo();
    $user_id = $current_user->ID;

    $url = wp_get_referer();
    $post_id = url_to_postid( $url );
    $voto = $_POST['voto'];
    $mensaje = $_POST['mensaje'];
    $calidad = $_POST['calidad'];
    $cumplimiento = $_POST['cumplimiento'];
    $administrativos = $_POST['administrativos'];
    $check_empresa = $_POST['check_empresa'];
    /*
    ChromePhp::log($user_id);
    ChromePhp::log($post_id);
    ChromePhp::log($mensaje);

    ChromePhp::log($voto);
    ChromePhp::log($calidad);
    ChromePhp::log($cumplimiento);
    ChromePhp::log($administrativos);
    */

    //validaciones

    $error_voto = false;
    $mensaje_error = '';

    if($check_empresa == 'false'){
        echo json_encode(array('vote_ok'=>false, 'message'=>__('Debe haber trabajado con esta empresa para poder calificarla.')));
        die();
    }

    if($voto == 0 OR ($calidad == 0 AND $cumplimiento == 0 AND $administrativos == 0 ) ){
        echo json_encode(array('vote_ok'=>false, 'message'=>__('Debe elegir su voto y por lo menos una razón del mismo.')));
        die();
    }



    if(is_numeric($voto) == false OR is_numeric($calidad) == false OR is_numeric($cumplimiento) == false OR is_numeric($administrativos) == false){
        $error_voto = true;
    }

    if($voto > 0){
        if($calidad < 0){
            $error_voto = true;
        }
        if($cumplimiento < 0){
            $error_voto = true;
        }
        if($administrativos < 0){
            $error_voto = true;
        }
    }else{
       if($calidad > 0){
            $error_voto = true;
        }
        if($cumplimiento > 0){
            $error_voto = true;
        }
        if($administrativos > 0){
            $error_voto = true;
        }
    }
    $mensaje_error = 'Ha habido un error con la votación, inténtelo de nuevo.';
    if($error_voto == true){
        echo json_encode(array('vote_ok'=>false, 'message'=>__($mensaje_error)));
        die();
    }

    if($mensaje ==''){
        echo json_encode(array('vote_ok'=>false, 'message'=>__('Debe dejar un comentario para votar.')));
        die();
    }

    if(userYaVoto($post_id, $user_id)){
        //ChromePhp::log('entré');
        echo json_encode(array('vote_ok'=>false, 'message'=>__('Ya has votado a esta empresa.')));
        die();
    }


    $result_insert = $wpdb->insert(
        'f8c_vote_info',
        array(
            'id_user' => $user_id,
            'id_empresa' => $post_id,
            'calidad_servicio' => $calidad,
            'cumplimiento_plazos' => $cumplimiento,
            'aspectos_administrativos' => $administrativos,
        )
    );


    $user_info = get_userdata( $user_id );

    $commentdata = array(
        'comment_post_ID' => $post_id, // to which post the comment will show up
        'comment_content' => $mensaje, //fixed value - can be dynamic
        'comment_author' => $user_info->display_name,
        'comment_type' => '', //empty for regular comments, 'pingback' for pingbacks, 'trackback' for trackbacks
        'comment_parent' => 0, //0 if it's not a reply to another comment; if it's a reply, mention the parent comment ID here
        'user_id' => $user_id, //passing current user ID or any predefined as per the demand
    );

    //Insert new comment and get the comment ID
    $comment_id = wp_new_comment( $commentdata );

    $link = get_permalink($post_id);

    if($result_insert == true){
        $mensaje_ok = 'Guardando los datos, espere por favor';
        echo json_encode(array('vote_ok'=>true, 'redirect'=> $link ,'message'=>__($mensaje_ok)));
        die();
    }else{
        $mensaje_error = 'Ha habido un error en la votación, inténtelo mas tarde.';
        echo json_encode(array('vote_ok'=>false, 'message'=>__($mensaje_error)));
        die();
    }
}

function getDatosVotacion($id_empresa){
    global $wpdb;
    $vot_query = 'SELECT * FROM f8c_wti_like_post WHERE post_id ='.$id_empresa;
    $det_query = 'SELECT * FROM f8c_vote_info WHERE id_empresa ='.$id_empresa;
    $votacion = $wpdb->get_results( $vot_query, OBJECT );
    $detalles = $wpdb->get_results( $det_query, OBJECT );
    $resultado;
    $resultado['total'] = 0;
    $resultado['votos_positivos'] = 0;
    $resultado['votos_negativos'] = 0;
    $resultado['calidad_servicio_positivo'] = 0;
    $resultado['cumplimiento_plazos_positivo'] = 0;
    $resultado['aspectos_administrativos_positivo'] = 0;
    $resultado['calidad_servicio_negativo'] = 0;
    $resultado['cumplimiento_plazos_negativo'] = 0;
    $resultado['aspectos_administrativos_negativo'] = 0;
    foreach ($votacion as $voto) {
        $resultado['total'] = $resultado['total'] +1;
        if($voto->value =='1'){
            $resultado['votos_positivos'] = $resultado['votos_positivos'] +1;
        }else{
            $resultado['votos_negativos'] = $resultado['votos_negativos'] +1;
        }
    }

    foreach ($detalles as $detalle) {
        if($detalle->calidad_servicio =='1'){
            $resultado['calidad_servicio_positivo'] = $resultado['calidad_servicio_positivo'] +1;
        }
        if($detalle->cumplimiento_plazos =='1'){
            $resultado['cumplimiento_plazos_positivo'] = $resultado['cumplimiento_plazos_positivo'] +1;
        }
        if($detalle->aspectos_administrativos =='1'){
            $resultado['aspectos_administrativos_positivo'] = $resultado['aspectos_administrativos_positivo'] +1;
        }
        if($detalle->calidad_servicio =='-1'){
            $resultado['calidad_servicio_negativo'] = $resultado['calidad_servicio_negativo'] +1;
        }
        if($detalle->cumplimiento_plazos =='-1'){
            $resultado['cumplimiento_plazos_negativo'] = $resultado['cumplimiento_plazos_negativo'] +1;
        }
        if($detalle->aspectos_administrativos =='-1'){
            $resultado['aspectos_administrativos_negativo'] = $resultado['aspectos_administrativos_negativo'] +1;
        }
    }
    return $resultado;
}

function getMasVotadas($cant){
    global $wpdb;
    $emp_query = 'SELECT post_id, SUM(value) TotalSum FROM f8c_wti_like_post GROUP BY post_id ORDER BY TotalSum DESC LIMIT '.$cant;
    $empresas_votadas = $wpdb->get_results( $emp_query, OBJECT );
    return $empresas_votadas;
}

function getInfoEmpresas(){
    global $wpdb;
    $emp_query = "SELECT ID, post_title FROM f8c_posts WHERE post_type = 'empresas'";
    $empresas = $wpdb->get_results( $emp_query, OBJECT_K );
    $info_empresas = array();

    $vot_query = "SELECT post_id, SUM( IF( value =  '1', 1, 0 ) ) AS votos_positivos, SUM( IF( value =  '-1', 1, 0 ) ) AS votos_negativos, SUM( value ) total
                FROM f8c_wti_like_post
                GROUP BY post_id
                ORDER BY total DESC";
    $votaciones = $wpdb->get_results( $vot_query, OBJECT_K );

    $comments_query = "SELECT comment_post_ID, SUM( IF( comment_parent =  '0', 1, 0 ) ) AS comentarios_usuarios, SUM( IF( comment_parent !=  '0', 1, 0 ) ) AS respuestas, COUNT( * ) total
                FROM f8c_comments
                GROUP BY comment_post_ID DESC";
    $comments = $wpdb->get_results( $comments_query, OBJECT_K );


    foreach ($empresas as $id=>$datos){

        $info_empresas[$id]['nombre'] = $datos->post_title;

        if(array_key_exists($id,$votaciones)){
            $info_empresas[$id]['votos']['votos_positivos'] = $votaciones[$id]->votos_positivos;
            $info_empresas[$id]['votos']['votos_negativos'] = $votaciones[$id]->votos_negativos;
            $info_empresas[$id]['votos']['total'] = $votaciones[$id]->total;
        }else{
            $info_empresas[$id]['votos']['votos_positivos'] = "0";
            $info_empresas[$id]['votos']['votos_negativos'] = "0";
            $info_empresas[$id]['votos']['total'] = "0";
        }
        if(array_key_exists($id,$comments)){
            $info_empresas[$id]['comentarios']['comentarios_usuarios'] = $comments[$id]->comentarios_usuarios;
            $info_empresas[$id]['comentarios']['respuestas'] = $comments[$id]->respuestas;
            $info_empresas[$id]['comentarios']['total'] = $comments[$id]->total;
        }else{
            $info_empresas[$id]['comentarios']['comentarios_usuarios'] = "0";
            $info_empresas[$id]['comentarios']['respuestas'] = "0";
            $info_empresas[$id]['comentarios']['total'] = "0";
        }
    }


    return $info_empresas;
}




function ajax_contactar_empresa_init(){
    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_ajaxcontactarempresa', 'ajax_contactar_empresa' );
}

// Execute the action only if the user isn't logged in
if (is_user_logged_in()) {
    add_action('init', 'ajax_contactar_empresa_init');
}


function ajax_contactar_empresa(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-contactar_empresa-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    if( is_user_logged_in() ){
        global $current_user;
        get_currentuserinfo();
        $info_consultante = array();
        $info_consultante['nombre'] = $current_user->display_name;
        $info_consultante['email'] = $current_user->user_email;
        $info_consultante['consulta'] = $_POST['consulta'];

        if($info_consultante['nombre'] == '' OR $info_consultante['email'] == ''){
            echo json_encode(array('consulta_enviada'=>false, 'message'=>__('Complete correctamente su nombre de usuario y su email para poder mandar la consulta.')));
            die();
        }

        if($info_consultante['consulta'] == ''){
            echo json_encode(array('consulta_enviada'=>false, 'message'=>__('La consulta no debe estar vacía para ser enviada.')));
            die();
        }

        $url = wp_get_referer();
        $post_id = url_to_postid( $url );
        $empresa = get_post($post_id);

        $info_empresa = array();
        $info_empresa['email'] = get_field('email',$post_id);
        $info_empresa['nombre'] = $empresa->post_title;
        $info_empresa['razon_social'] = get_field('razon_social',$post_id);

        $headers[] = 'From: RHConectium <hola@creativedog.com.ar>';
        $headers[] = 'Bcc: RHConectium <hola@creativedog.com.ar>';
        $headers[] = 'Content-type: text/html';
        $subject = $info_empresa['nombre'].' ('.$info_empresa['razon_social'].')'.', has recibido una consulta.';
        $message = '<br/><br/>';
        $message .= "Nombre de Usuario del consultante: ".$info_consultante['nombre'];
        $message .= "<br/><br/>";
        $message .= "Email del consultante: ".$info_consultante['email'];
        $message .= "<br/><br/>";
        $message .= "Consulta: ".$info_consultante['consulta'];
        $message .= "<br/><br/>";

        //sends email
        $mail_send = wp_mail($info_empresa['email'], $subject, $message, $headers );

        if ( $mail_send ){
            echo json_encode(array('consulta_enviada'=>true, 'message'=>__('Consulta enviada.')));
        } else {
            echo json_encode(array('consulta_enviada'=>false, 'message'=>__('Ha habido un error en el envío de su consulta, inténtelo mas tarde.')));
        }
        die();
    }else{
        echo json_encode(array('consulta_enviada'=>false, 'message'=>__('Ha habido un error obteniendo los datos del usuario. Inténtelo mas tarde.')));
        die();
    }
    die();
}


add_action('wp_ajax_descargar_informacion', 'descargar_informacion');

function descargar_informacion() {
    //ChromePhp::log('1');
    require_once 'Classes/PHPExcel.php';
    //ChromePhp::log('a');

    $info_empresas = getInfoEmpresas();
    //ChromePhp::log($info_empresas);
    $objPHPExcel = new PHPExcel();

           //Informacion del excel
           $objPHPExcel->
            getProperties()
                ->setCreator("RhConectium")
                ->setLastModifiedBy("RhConectium")
                ->setTitle("Informacion Empresas")
                ->setSubject("Informacion Empresas")
                ->setDescription("Documento generado con PHPExcel")
                ->setKeywords("RhConectium")
                ->setCategory("RhConectium");

           $i = 2;
           $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','EMPRESA')
            ->setCellValue('B1','VOTOS POSITIVOS')
            ->setCellValue('C1','VOTOS NEGATIVOS')
            ->setCellValue('D1','MENSAJES')
            ->setCellValue('E1','RESPUESTAS');

           foreach ($info_empresas as $empresa) {
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, htmlspecialchars_decode($empresa['nombre']))
                    ->setCellValue('B'.$i, $empresa['votos']['votos_positivos'])
                    ->setCellValue('C'.$i, $empresa['votos']['votos_negativos'])
                    ->setCellValue('D'.$i, $empresa['comentarios']['comentarios_usuarios'])
                    ->setCellValue('E'.$i, $empresa['comentarios']['respuestas']);

              $i++;

           }
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment; filename="info_empresas'.time().'.xlsx"');
            header('Cache-Control: max-age=0');
            $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $writer->save('php://output');
            exit();
}

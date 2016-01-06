<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package RH Conectium
 */
?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
</li><!-- #post-## -->

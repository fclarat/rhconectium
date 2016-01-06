<?php  
	global $wpdb;

	$result_users = count_users();
	$usuarios_totales = $result_users['avail_roles']['editor']+$result_users['avail_roles']['subscriber'];
	$usuarios_registrantes = $result_users['avail_roles']['editor'];
	
	$result_empresas = wp_count_posts('empresas');
	$empresas_totales = $result_empresas->publish + $result_empresas->draft;
	$empresas_revision = $result_empresas->draft;

	$vot_query = 'SELECT count(*) as votos FROM f8c_wti_like_post';
    $result_votos = $wpdb->get_row( $vot_query, OBJECT );
	$votos = $result_votos->votos;

	$result_comments = wp_count_comments();
	$comentarios_totales = $result_comments->total_comments; 

	$info_empresas = getInfoEmpresas();
	$mas_vot = getMasVotadas(10);

?>

<style>
	.one_half{ width:48%; }
	.one_third{ width:30.66%; }
	.two_third{ width:65.33%; }
	.one_fourth{ width:22%; }
	.three_fourth{ width:74%; }
	.one_fifth{ width:16.8%; }
	.two_fifth{ width:37.6%; }
	.three_fifth{ width:58.4%; }
	.four_fifth{ width:67.2%; }
	.one_sixth{ width:13.33%; }
	.five_sixth{ width:82.67%; }
	.one_half,.one_third,.two_third,.three_fourth,.one_fourth,.one_fifth,.two_fifth,.three_fifth,.four_fifth,.one_sixth,.five_sixth{ position:relative; margin-right:4% !important; float:left; }
	.last{ margin-right:0 !important; clear:right; }
	.clearboth {clear:both;display:block;font-size:0;height:0;line-height:0;width:100%;}

	/* Estadisticas */

	.estadisticas_destacadas{ text-align: center; margin: 40px 0px; }
	.estadisticas_destacadas h1{ font-size: 90px; margin: 50px 0px; color: #0ca5d5; text-shadow: 1px 1px 0 #FFFFFF; }
	.estadisticas_destacadas p{ font-size: 16px; text-transform: uppercase; margin: 0px; font-weight: bold; }
	.estadisticas_destacadas p span{ font-size: 11px; font-weight: normal; }
	.center_table{ text-align: center; }

	input[type="submit"]{ background-color: #00425b; -webkit-border-radius: 4px; border-radius: 4px; color: #FFF; text-align: center; padding: 5px 25px 3px 25px; border: 0px; outline: none; 
	font-family: 'PT Sans', sans-serif; font-weight: 400; margin-top: 20px; 
	-webkit-transition: background 300ms ease-in-out;
	-moz-transition: background 300ms ease-in-out;
	-ms-transition: background 300ms ease-in-out;
	-o-transition: background 300ms ease-in-out;
	transition: background 300ms ease-in-out;}
	input[type="submit"]:hover{ background-color: #0ea5d5; 
	-webkit-transition: background 300ms ease-in-out;
	-moz-transition: background 300ms ease-in-out;
	-ms-transition: background 300ms ease-in-out;
	-o-transition: background 300ms ease-in-out;
	transition: background 300ms ease-in-out; }

	.content_table_estadisticas{ width: 100%; }
	.content_table_estadisticas table{ width: 100%; font-size: 14px; }
	.content_table_estadisticas table tr{ height: 30px; }
	.content_table_estadisticas table tr:nth-child(2n){ background-color: #dcdcdc; }
	.tabla_empresa{ text-indent: 10px; }

	.clearfix:before,
	.clearfix:after {
	    content: " ";
	    display: table;
	}

	.clearfix:after {
	    clear: both;
	}

	.clearfix {
	    *zoom: 1;
	}

</style>


<div class="wrap">
	<h2>Estadísticas</h2>
	<div class="estadisticas_destacadas">
		<div class="one_fourth">
			<h1><?php echo $usuarios_totales; ?></h1>
			<p>Usuarios registrados</p>
			<p><span>(<?php echo $usuarios_registrantes; ?> han registrado empresas)</span></p>
		</div>
		<div class="one_fourth">
			<h1><?php echo $empresas_totales; ?></h1>
			<p>Empresas registradas</p>
			<p><span>(<?php echo $empresas_revision; ?> en revisión)</span></p>
		</div>
		<div class="one_fourth">
			<h1><?php echo $votos; ?></h1>
			<p>Votos</p>
		</div>
		<div class="one_fourth last">
			<h1><?php echo $comentarios_totales; ?></h1>
			<p>Comentarios</p>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="content_table_estadisticas">
		<h3>Las 10 Empresas mejor rankeadas</h3>
		<table>
			<tr>
				<th>Empresa</th>
				<th>Votos positivos</th>
				<th>Votos negativos</th>
				<th>Mensajes</th>
				<th>Respuestas</th>
			</tr>
			<?php 
			foreach ($mas_vot as $empresa_vot): 
				$id_empresa = $empresa_vot->post_id;
			?>
			<tr class="info_table">
				<td class="tabla_empresa"><?php echo $info_empresas[$id_empresa]['nombre'];?></td>
				<td class="center_table"><?php echo $info_empresas[$id_empresa]['votos']['votos_positivos'];?></td>
				<td class="center_table"><?php echo $info_empresas[$id_empresa]['votos']['votos_negativos'];?></td>
				<td class="center_table"><?php echo $info_empresas[$id_empresa]['comentarios']['comentarios_usuarios'];?></td>
				<td class="center_table"><?php echo $info_empresas[$id_empresa]['comentarios']['respuestas'];?></td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
	
	<div>
		<form method="post" id="form_descargar_informacion" action="<?php echo admin_url('admin-ajax.php'); ?>">
	        <input type="submit" value="DESCARGAR INFORMACION">
	        <?php wp_nonce_field('ajax-descargar-info-nonce', 'signonsecurity'); ?>
	        <input name="action" value="descargar_informacion" type="hidden">
	    </form>	
    </div>
</div>
<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

//ChromePhp::log('1');
require_once 'Classes/PHPExcel.php';
//ChromePhp::log('a');

$info_empresas = getInfoEmpresas();

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
	            ->setCellValue('A'.$i, $empresa['nombre'])
	            ->setCellValue('B'.$i, $empresa['votos']['votos_positivos'])
	            ->setCellValue('C'.$i, $empresa['votos']['votos_negativos'])
	            ->setCellValue('D'.$i, $empresa['comentarios']['comentarios_usuarios'])
	            ->setCellValue('E'.$i, $empresa['comentarios']['respuestas']);
	  
	      $i++;
	       
	   }
	   //ChromePhp::log('C');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Disposition: attachment; filename="info_empresas'.time().'.xlsx"');
		header('Cache-Control: max-age=0');   
		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$writer->save('php://output');
	//ChromePhp::log('b');
?>
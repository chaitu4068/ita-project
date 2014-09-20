<?php
    require_once('PHPExcel/Classes/PHPExcel.php');
    include 'upload_file.php';
//Usage:
convertXLStoCSV($inputfile,'output.csv');
 
function convertXLStoCSV($infile,$outfile)
{
    $fileType = PHPExcel_IOFactory::identify($infile);
    $objReader = PHPExcel_IOFactory::createReader($fileType);
 
    $objReader->setReadDataOnly(true);  
    $objPHPExcel = $objReader->load($infile);   
 
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
    $objWriter->save($outfile);
	echo "<h2>Successful<h2>";
}

?> 	
  
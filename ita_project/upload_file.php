<?php
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  
   move_uploaded_file($_FILES["file"]["tmp_name"],
      "C:/xampp/htdocs/ita_project/ " . $_FILES["file"]["name"]);
      echo "Stored in: " . "ita_project/" . $_FILES["file"]["name"];
	  $inputfile=$_FILES["file"]["name"];
	  //echo "\n" . $inputfile;
  }
    
	require_once('PHPExcel/Classes/PHPExcel.php');
    //include 'upload_file.php';
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
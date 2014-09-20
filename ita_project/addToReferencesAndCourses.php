<?php





 

   if(!$_COOKIE['CRG'])
   {
     header("Location:team_alpha_login.php");
   }
   $whoisin = $_COOKIE['CRG'];
   
   if(!($connect = mysqli_connect("localhost","root","","ita_project")))
   {
     die("Error in connecting");
   }
   
   $query = "select * from faculty where uname = '" . $whoisin . "'";
   
   if(!($result = mysqli_query($connect,$query)))
   {
     header("Location:team_alpha_login.php");
   }
 
  

$count=0;
for(reset($_POST);$element=key($_POST);next($_POST))
{
 $count++;
}

$count/=3;

 if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connecting");
  }
 
 
 for($i=0;$i<$count-1;$i++)
  {
   $str1 = 'refno' . $i;
   $str2 = 'refname' . $i;
   $str3 = "reflink" . $i;
   $rfno = $_POST[$str1] ;
   
   settype($rfno,"integer");
   $rfname = $_POST[$str2] ;
   
   $rflink = $_POST[$str3] ;
   
   print($rfno . "<br/>");
   print($rfname . "<br/>");
   print($rflink . "<br/>");   
   
   
   $query = "INSERT INTO `references` ( `course_code` , `ref_no` , `ref_name` , `ref_link` )
VALUES ('" . $_GET['course']. "'," . $rfno . ",'" . $rfname . "','" . $rflink . "')" ;
   
   print($query);

   if(!($result = mysqli_query($connect,$query)))   
    {
	 die("error in insertion - 1");
	}
	else
	{
	  print("Insertion successful - 1");
	}
  }
  
  $query = "update courses set Books = '" . $_POST['reftextarea'] . "' where course_code = '" . $_GET['course'] . "'" ;
  
  if(!($result = mysqli_query($connect,$query)))   
    {
	 die("Error in inserting component");
	}
	else
	{
	  print("Insertion successful - 2");
	}
  
  
  
  
 
 ?>

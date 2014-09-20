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
   
   $query = "select * from admin where uname = '" . $whoisin . "'";
   
   if(!($result = mysqli_query($connect,$query)))
   {
     header("Location:team_alpha_login.php");
   }
 
  
  
 $coursecode = $_POST['coursecode'];
 $coursename = $_POST['coursename'];
 $facid = $_POST['facid'];
 $credits = $_POST['credits'] ;
 
 
  for(reset($_POST);$element = key($_POST);next($_POST))
  {
    if(strlen($_POST[element])==0)
	 {
	   print("all fields must be filled");
	 }
  }
  
  /*
 $coursecode = "IT201";
 $coursename = "Fundamentals of Signal Processing";
 $facid = "IT_GRM";
 $credits = "(3-1-0)4" ;
 */
 
 
 
 
  
  if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connecting");
  }
  
   $query = "INSERT INTO `courses`(`course_code`, `course_name`, `fac_id`, `credits`) VALUES ('" . $coursecode . "','" . $coursename . "','" . $facid . "','" . $credits . "')";

     print($query);
     if(!($result = mysqli_query($connect,$query)))   
	 {
	   die("Error in inserting");
	 }
	 else
	 {
	  header("Location:team_alpha_admin_course_addcrs.php?status=success");
	 }


?>
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
 
  

  
 $facid = $_POST['facultyid'];
 $passwd = $_POST['password'];
 $uname = $_POST['uname'];
 $name = $_POST['name'] ;
 
 
  /*for(reset($_POST);$element = key($_POST);next($_POST))
  {
    if(strlen($_POST[element])==0)
	 {
	   print("all fields must be filled");
	 }
  }*/
  
 /* 
 $facid = "IT_GRM";
 $passwd = "gpgpucomputing";
 $uname = "profreddy";
 $name = "GRM Reddy" ;*/
 
 
 
 
  
  if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connecting");
  }
  
   $query = "INSERT INTO `faculty`(`fac_id`, `Name`, `uname`, `password`) VALUES ('" . $facid . "','" . $name . "','" . $uname . "','" . $passwd . "')";

     print($query);
     if(!($result = mysqli_query($connect,$query)))   
	 {
	   die("Error in inserting");
	 }
	 else
	 {
	   print("<script>alert('Insertion successful');</script>");
	   /*$t1 = time();
	  while(true)
      {	  
	   $t2 = time();
	   if($t2 - $t1 >= 2)
	    break;
	  }  */
	  header("Location:team_alpha_admin_users_addfac.php?status=success"); 
	 }


?>
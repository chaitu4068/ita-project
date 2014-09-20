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
 
  


 $username = $_POST['username'];
 $name = $_POST['name']; 
 $facid = $_POST['fac_id'];
 
  if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connection");
  }
  
  $query = "DELETE FROM `faculty` WHERE uname = '" . $username . "' or Name = '" . $name . "' or fac_id = '" .  $facid . "'" ;

  if(!($result = mysqli_query($connect,$query)))
  {
    die("Error in  deleting");
  }
  else
  header("Location:team_alpha_admin_users_delfac.php?status=success");
  
  ?>
<?php

 $retvalue = checkLogin();
 
 switch($retvalue)
 {
   case 1:
    header('Location: team_alpha_home_stu.php');
   break;

   case 2:
  	 header('Location: team_alpha_home.php');
	break;

   case 3:
    header('Location: team_alpha_admin_home.php');
   break;
   
   case 4:
    header('Location: team_alpha_login.php');
	break;
      
 }

function checkLogin() // function returns 1 - student ; 2 - faculty ; 3 - admin ; 4- unsuccessful  
{  
   print("Here");
  if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connecting to the database");
  }

  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "select * from student where uname = '" . $username . "'  and password = '" . $password . "'";

  if(!($result = mysqli_query($connect,$query))) 
   {
     die("Error in querying");     
   }

  $count = 0;

  while($row = mysqli_fetch_array($result))
  {
     $count++;
  }  

    

  if($count >= 1)
  {
    setrawcookie("CRG"  , $username , time() + 1800);	
	//setrawcookie("CRG_SES"  , time());
    return 1;
  }

  $query = "select * from faculty where uname = '" . $username . "'  and password = '" . $password . "'";

  if(!($result = mysqli_query($connect,$query))) 
   {
     die("Error in querying");     
   }

  $count = 0;

  while($row = mysqli_fetch_array($result))
  {
     $count++;
  }  

  if($count >= 1)
  {
	
    //print("Login successful for faculty");
	setrawcookie("CRG" , $username , time() + 1800);	
	//setrawcookie("CRG_SES"  , time());
    return 2;
  }


  $query = "select * from admin where uname = '" . $username . "'  and password = '" . $password . "'";

  if(!($result = mysqli_query($connect,$query))) 
   {
     die("Error in querying");     
   }

  $count = 0;

  while($row = mysqli_fetch_array($result))
  {
     $count++;
  }  

  if($count >= 1)
  {
	
    //print("Login successful for admin");
	setrawcookie("CRG"  , $username, time() + 1800);
    //setrawcookie("CRG_SES"  , time());	
    return 3;
  }

  if($count == 0)
  {    
    return 4;    
  }

}

?>



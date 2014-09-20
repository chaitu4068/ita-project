<?php




$username = $_POST['username'];
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];// new password and retyped password are verified in the JavaScript validation 

$retval  = checkLogin($username,$oldpassword); // checks for Login

 if($retval==4)  // unsuccessful Login
 {
   die("Invalid Login Details supplied");
 }

 else   // successful Login
 {
    switch($retval)
     {
       case 1:
       $tablename = "student";
       break;

       case 2:
       $tablename = "faculty";
       break;

       case 3:
       $tablename = "admin";
       break;
     }

    updater($tablename,$username,$oldpassword,$newpassword);
 }


function updater($tablename,$username,$oldpassword,$newpassword)
{
  
  if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connecting to the database");
  }

  
  $query = "update " . $tablename . " set password  = '" . $newpassword . "' where uname = '" . $username .  "' and  password = '" . $oldpassword . "'";

  if(!($result = mysqli_query($connect,$query))) 
   {
     die("Error in updating");     
   }
 else
  {
    die("Password updated");     
  }

}


function checkLogin($username,$password) // function returns 1 - student ; 2 - faculty ; 3 - admin ; 4- unsuccessful  
{  
  if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connecting to the database");
  }

  
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
    return 3;
  }

  if($count == 0)
  {
    return 4;    
  }

}

?>


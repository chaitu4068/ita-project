<?php

 checkLogin();

function checkLogin() // function returns 1 - student ; 2 - faculty ; 3 - admin ; 4- unsuccessful  
{  
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
    print("Login successful for student"); 
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
    print("Login successful for faculty");
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
    print("Login successful for admin");
    return 3;
  }

  if($count == 0)
  {
    print("Login unsuccessful!!");
    return 4;    
  }

}

?>



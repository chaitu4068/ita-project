<?php

$count=1;

 if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connecting");
  }

$username = $_COOKIE['CRG'];

if(isset($_POST['course']))
{
  if (is_array($_POST['course'])) 
  {
    foreach($_POST['course'] as $value)
    {
      $query = "insert into registration values('" . $username . "','" . $value . "')" ;

      if(!($result = mysqli_query($connect,$query)))   
      {
      die("Error in inserting component");
      }
    }
  } 
  else 
  {
    $value = $_POST['course'];
    $query = "insert into registration values('" . $username . "','" . $value . "')" ;

    if(!($result = mysqli_query($connect,$query)))   
    {
      die("Error in inserting component");
    }
  }
}

$query = "insert into cash_section values('" . $username . "'," . $_POST['feereceipt'] . ")" ;
if(!($result = mysqli_query($connect,$query)))   
    {
      die("Error in inserting component");
    }

print("insertion successful");
header('Location: success.php');
 ?>

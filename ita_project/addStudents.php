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
 
  

  
 $uname = $_POST['username'];
 $passwd = $_POST['password'];
 $rollno = $_POST['rollnumber'];
 $batch = $_POST['batch'];
 $name = $_POST['name'] ;
 $sem = $_POST['semester'];
 
  for(reset($_POST);$element = key($_POST);next($_POST))
  {
    if(strlen($_POST[element])==0)
	 {
	   print("all fields must be filled");
	 }
  }
  
  
 /*$uname = "11IT32";
 $passwd = "sony123456";
 $rollno = "11IT32";
 $batch = "2015";
 $name = "Chaitanya" ;
 $sem = "6";*/
 
 settype($batch,"integer");
 settype($sem,"integer");
  
  if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connecting");
  }
  
   $query = "INSERT INTO `student`(`roll_number`, `name`, `semster`, `batch_year`, `uname`, `password`) VALUES ('".$rollno. "','" . $name . "'," . $sem . "," . $batch . ",'". $uname . "','" . $passwd .  "')";

      print($query);
     if(!($result = mysqli_query($connect,$query)))   
	 {
	   die("Error in inserting");
	 }
	 else
	 {
	  print("Insertion sucessful");
	 }


?>
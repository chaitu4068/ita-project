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
 
  

  
		    $coursecode =  $_GET['course'];
			print("Here");
			
			if(!($connect = mysqli_connect("localhost","root","","ita_project")))
			{
			  die("Error in connecting");
			}
			
			$query = "update courses set course_objective = '" . $_POST['courseobj'] . "' where course_code = '" . $coursecode . "'";
			
			if(!($result = mysqli_query($connect,$query)))
			{
			  die("Error in querying - 1");
			}
			
			$query = "update courses set course_content = '" . $_POST['coursecont'] . "' where course_code = '" . $coursecode . "'";
			
			if(!($result = mysqli_query($connect,$query)))
			{
			  die("Error in querying - 2");
			}
			
			print("Updation sucessful");
			
		?>
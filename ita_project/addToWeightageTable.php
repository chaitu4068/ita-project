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
print($_GET['course']);
for(reset($_POST);$element=key($_POST);next($_POST))
{
 $count++;
}

$count/=3;

print("No of rows is : " . $count);


 if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connecting");
  }
 
 
 for($i=0;$i<$count;$i++)
  {
   $str1 = 'comp' . $i;
   $str2 = 'total' . $i;
   $str3 = "wtg" . $i;
   $com = $_POST[$str1] ;
   print($com);
   
   $tot = $_POST[$str2] ;
   print($tot);
   $wei = $_POST[$str3] ;
   print($wei);
   
   settype($tot,"integer");
   settype($wei,"integer");
   print("Total is : " . $tot); 
   print("Weight is : " . $wei);
   $query = "insert into w_policy values('" . $_GET['course']. "','" . $com . "'," . $tot . "," . $wei . ")" ;

   if(!($result = mysqli_query($connect,$query)))   
    {
	 die("Error in inserting component");
	}
	else
	{
	  print("Insertion successful");
	  header('Location: team_alpha_grades_gp');
	}
  }
 
 ?>
  
 
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
 
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="css/skeleton.min.css">
	<link rel="stylesheet" href="css/header.css">
    
	<!-- CSS -->
    <link href="css/simple.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <div class="page">
        <div class="container header">
            <div class="two columns logo-wrap">
                <img class="header-logo" src="images/logo.png">
            </div>
            <div class="ten columns site-title-wrap">
                <h1 class="site-title">NITK IT Department</h1>
                <h1 class="site-subtitle">Course Registration and Grading</h1>
            </div>
            <div class="home-breadcrumb">
                <div class="breadcrumb"> <a href="./National Institute of Technology Karnataka_files/National Institute of Technology Karnataka.htm">Home</a></div>
            </div>
        </div> 
		
	</div>
			
		
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#">Hi <?php 		
				$whoisin = $_COOKIE['CRG'];
				echo "$whoisin"
				?>
				</a>
                </li>
                <li><a href="team_alpha_home.php">Home</a>
                </li>
                <li><a href="team_alpha_grades.php">Courses</a>
                </li>
				<li><a href="team_alpha_acct.php">Account</a>
                </li>
				<li><a href="team_alpha_logout.php">Logout</a>
                </li>
            </ul>
        </div>
	</div>
		
	<div id="content">
		<!--Content-->
		 <script>
		
		</script>	
        <?php

         $username = $_COOKIE['CRG'];
         if(!($connect = mysqli_connect("localhost","root","","ita_project")))		 
		 {
		   die("Error in connecting");
		 }
		 
		 $query = "select fac_id from faculty where uname = '" .  $username . "'";
		 
		 if(!($result = mysqli_query($connect,$query)))
		  {
		    die("Error in querying");
		  }
		  
		  while($row = mysqli_fetch_row($result))
          {		
		   foreach($row as $key => $value)
		    {
			 $facid = $value;
			 break; 
			}
          }
		  
		  $query = "select course_code from courses where fac_id = '" .  $facid . "'";
		  
		  if(!($result = mysqli_query($connect,$query)))
		  {
		    die("Error in querying");
		  }
		  
		  while($row = mysqli_fetch_row($result))
          {		
		   foreach($row as $key => $value)
		    {
			 print("<h2 ><a href=\"team_alpha_specgrade.php?course=$value\">$value</a></h2>");
			 
			 //break; 
			}
          }	
		
		?>
	</div>
	<p id="footer">Project By Team Alpha NITK</p>
		
		</body>



</html>
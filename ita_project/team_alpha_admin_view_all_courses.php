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
				<li><a href="team_alpha_admin_home.php">Home</a>
                </li>
                <li><a href="team_alpha_admin_view_induvidual_course.php">Single Course</a>
                </li>
                <li><a href="team_alpha_admin_view_all_courses.php">All Courses</a>
                </li>							
				<li><a href="team_alpha_logout.php">Logout</a>
                </li>
            </ul>
        </div>
	</div>
		
	<div id="content">
		<?php 
            print ("<table border = \"0\" cellspacing = \"1\">");
			
			
			if(!($connect = mysqli_connect("localhost","root","","ita_project")))
			{
			  die("Error in connecting");
			}
			
			//$coursecode = $_GET['course'];
			
			$query = "select * from courses order by course_code" ;
			
			if(!($result = mysqli_query($connect,$query)))
			{
			   die("Error in querying");
			}		 
			
			//print ("<form method = \"POST\" action = \"deleteExistingPlan.php?course=".$_GET['course']."\">");
			print("<table border = \"0\" cellspacing = \"1\">"); 
			while($row = mysqli_fetch_row($result))
            {		
			  print ("<tr>");
		      foreach($row as $key => $value)
		      {
			    print ("<td><input type = \"text\" size = \"25\" value = \"$value\" readonly/></td>");
			  }
			  
			  print ("</tr>"); 
            }
			
		   
		   print("</table>");
		   //print("</form>");
			
		
			
	?>
	</div>
	<p id="footer">Project By Team Alpha NITK</p>
		
		</body>
</html>
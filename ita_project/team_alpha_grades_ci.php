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
   
   $query2 = "select course_code from courses c, faculty f where f.fac_id = c.fac_id and uname = '" . $whoisin . "' and course_code = '".$_GET['course']."'";
   
   if(!($result = mysqli_query($connect,$query2)))
   {
     header("Location:team_alpha_home.php");
   }
   if(!mysqli_num_rows($result)){
	header("Location:team_alpha_home.php");
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
                <li><a href="team_alpha_grades_ci.php?course=<?php print($_GET['course']);?>">Course Info</a>
                </li>
				<li><a href="team_alpha_grades_gp.php?course=<?php print($_GET['course']); ?>">Grading Policy</a>
                </li>
				<li><a href="team_alpha_grades_reg.php?course=<?php print($_GET['course']); ?>">Registration</a>
                </li>
				<li><a href="team_alpha_grades_mks.php?course=<?php print($_GET['course']); ?>">Marks</a>
                </li>
				<li><a href="team_alpha_grades_ref.php?course=<?php print($_GET['course']); ?>">References</a>
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
		<form method="POST" action="addCourseDetails.php?course=<?php print($_GET['course']);?>">
		<table>
		<tr>
		<td id="vertalign"><p id="bold">Instructor:   </p></td><td><p><input type="text" name="instructor" id="instructor" value= "<?php 
		   $coursecode =  $_GET['course'];
		   
		   if(!($connect = mysqli_connect("localhost","root","","ita_project")))
			{
			  die("Error in connecting");
			}
		   $query = "select fac_id from courses where course_code = '" . $coursecode . "'";
		   
		   if(!($result = mysqli_query($connect,$query)))
			{
			  die("Error in querying - 1");
			}
					
        while($row = mysqli_fetch_row($result))
        {		
		   foreach($row as $key => $value)
		    {
			 $fid = $value;
			 break; 
			}
        }		 
       	$query = "select Name from faculty where fac_id = '" . $fid . "'";
		
		if(!($result = mysqli_query($connect,$query)))
			{
			  die("Error in querying -2 ");
			}
					
        while($row = mysqli_fetch_row($result))
        {		
		   foreach($row as $key => $value)
		    {
			 print($value);
			 break; 
			}
        }	
		
		?>" readonly/></p></td>
		</tr>
		<tr>
		<td id="vertalign"><p id="bold">Credits:   </p></td><td><p><input type="text" name="credits" id="credits" value="<?php
         $coursecode =  $_GET['course'];
		   
		   if(!($connect = mysqli_connect("localhost","root","","ita_project")))
			{
			  die("Error in connecting");
			}
		   $query = "select credits from courses where course_code = '" . $coursecode . "'";
		   
		   if(!($result = mysqli_query($connect,$query)))
			{
			  die("Error in querying - 1");
			}
					
        while($row = mysqli_fetch_row($result))
        {		
		   foreach($row as $key => $value)
		    {
			  print($value);
			 break; 
			}
        }			
		?>" readonly/></p></td>
		</tr>
		<tr>
		<td id="vertalign"><p id="bold">Course Objective:   </p></td><td><textarea id="citextarea" type="textarea" name="courseobj"><?php

		$coursecode =  $_GET['course'];
		   
		   if(!($connect = mysqli_connect("localhost","root","","ita_project")))
			{
			  die("Error in connecting");
			}
		   $query = "select course_objective from courses where course_code = '" . $coursecode . "'";
		   
		   if(!($result = mysqli_query($connect,$query)))
			{
			  die("Error in querying - 1");
			}
					
        while($row = mysqli_fetch_row($result))
        {		
		   foreach($row as $key => $value)
		    {
			  print($value);
			 break; 
			}
        }

		?></textarea></td>
		</tr>
		<tr>
		<td id="vertalign"><p id="bold">Course Content:   </p></td><td><textarea id="citextarea" type="textarea" name="coursecont"><?php 
		 $coursecode =  $_GET['course'];
		   
		   if(!($connect = mysqli_connect("localhost","root","","ita_project")))
			{
			  die("Error in connecting");
			}
		   $query = "select course_content from courses where course_code = '" . $coursecode . "'";
		   
		   if(!($result = mysqli_query($connect,$query)))
			{
			  die("Error in querying - 1");
			}
					
        while($row = mysqli_fetch_row($result))
        {		
		   foreach($row as $key => $value)
		    {
			  print($value);
			 break; 
			}
        }
		 
		 
		 ?></textarea></td>
		</tr>
		<tr>
		<td id="vertalign"></td><td><input type="submit" id="submit" name="submit" value="Done"/></td>
		</tr>
		</table>
		</form>
	</div>
	<p id="footer">Project By Team Alpha NITK</p>
		
		</body>



</html>
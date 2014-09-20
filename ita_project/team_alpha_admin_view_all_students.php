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
                <li><a href="team_alpha_admin_view_induvidual_student.php">Single Student</a>
                </li>
                <li><a href="team_alpha_admin_view_all_students.php">Students by Semeter</a>
                </li>								
            </ul>
        </div>
	</div>
		
	<div id="content">
		<h2>Search Student From Database</h2> <hr />
		<form method =  "POST" action = "">
		<p>Enter Semester<input type='text' name='semester' /> </p>
		<input type='submit' value='Submit' />
		</form>
		
		<?php
		   if(!($connect = mysqli_connect("localhost","root","","ita_project")))
			{
				die("Error in connecting");
			}
			if(!empty($_POST["semester"]))
			{
			print("<table>");
			print("<tr><td>Username</td>");
			print("<td>Name</td>");
			print("<td>Roll Number</td>");
			print("<td>Semester</td>");
			print("<td>Batch</td></tr>");
			}
			if(!empty($_POST["semester"]))
			{
			$query = "select * from student where semester = '" . $_POST["semester"] . "'";
			if(!($result = mysqli_query($connect,$query)))
				{
					header("Location:team_alpha_login.php");
				}
			while($row=mysqli_fetch_array($result))
			{
			print("<tr><td>" . $row['uname'] . "</td>");
			print("<td>" . $row['name'] . "</td>");
			print("<td>" . $row['rollnumber'] . "</td>");
			print("<td>" . $row['semester'] . "</td>");
			print("<td>" . $row['batch_year'] . "</td></tr>");
			}
		}
		print("</table>");
		?>
	</div>
	<p id="footer">Project By Team Alpha NITK</p>
		
		</body>
</html>
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
                <li><a href="team_alpha_admin_users_addstd.php">Add Student</a>
                </li>
                <li><a href="team_alpha_admin_users_delstd.php">Delete Student</a>
                </li>
                <li><a href="team_alpha_admin_users_addfac.php?status=' '">Add Faculty</a>
                </li>
                <li><a href="team_alpha_admin_users_delfac.php">Delete Faculty</a>
                </li>
                <li><a href="team_alpha_admin_users_addstdgrp.php">Add Student Group</a>
                </li>
				<li><a href="team_alpha_admin_users_delstdgrp.php">Delete Student Group</a>
                </li>
				<li><a href="team_alpha_logout.php">Logout</a>
                </li>
            </ul>
        </div>
	</div>
		
	<div id="content">
		<!--Content-->
		<h2>Add Faculty To Database</h2> <hr />
		<?php
		if($_GET['status'])
		 {
		 $status = $_GET['status'];
		   if(strlen($status)!=0)
		   {
		     print("<h3>$status</h3>");
		   }
		  } 
		 ?>
			<form method = "POST" action = "addFaculty.php">
		<p>Username: <input type='text' name='uname' /> </p>
		<p>Default Password: <input type='text' name='password' /> </p>
		<p>Full Name: <input type='text' name='name' /> </p>
		<p>Faculty Id: <input type='text' name='facultyid' /> </p>
		<input type='submit' value='Submit' />
		</form>
	</div>
	<div>
	<p id="footer">Project By Team Alpha NITK</p>
	</div>
		</body>
</html>
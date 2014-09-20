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
   
   $query = "select * from student where uname = '" . $whoisin . "'";
   
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
                <li><a href="team_alpha_home.html">Home</a>
                </li>
                <li><a href="team_alpha_grades_ci.html">Course Info</a>
                </li>
				<li><a href="team_alpha_grades_gp.html">Grading Policy</a>
                </li>
				<li><a href="team_alpha_grades_reg.html">Registration</a>
                </li>
				<li><a href="team_alpha_grades_mks.html">Marks</a>
                </li>
				<li><a href="team_alpha_grades_ref.html">References</a>
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
	<form name="ReferenceW&B" onLoad="#">
	<h3 id="bold">Websites</h3>
	<p>Reference 1:  <input type="textbox" name="ref1" size="30" disabled/></p>
	<p>Reference 2:  <input type="textbox" name="ref2" size="30" disabled/></p>
	<p>Reference 3:  <input type="textbox" name="ref3" size="30" disabled/></p>
	<p>Reference 4:  <input type="textbox" name="ref4" size="30" disabled/></p>
	<br />
	<h3 id="bold">Books</h3>
	<textarea name="reftextarea" disabled></textarea>
	</form>
	</div>
	<p id="footer">Project By Team Alpha NITK</p>
		
		</body>
</html>
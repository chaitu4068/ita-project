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
                <li><a href="team_alpha_admin_users_addfac.php?status=<?php print(' ');?>">Add Faculty</a>
                </li>
                <li><a href="team_alpha_admin_users_delfac.php?status=<?php print(' ');?>">Delete Faculty</a>
                </li>
                <li><a href="team_alpha_admin_users_addstdgrp.php">Add Student Group</a>
                </li>
				<li><a href="team_alpha_admin_users_delstdgrp.php">Delete Student Group</a>
                </li>
            </ul>
        </div>
	</div>
		
	<div id="content">
		<!--Content-->
		<?php 

		//connect to the database
		$connect = mysqli_connect("localhost","root","","ita_project");

		if ($_FILES['csv']['size'] > 0) {

			//get the csv file
			$file = $_FILES['csv']['tmp_name'];
			$handle = fopen($file,"r");
    
				//loop through the csv file and insert into database
				while ($data = fgetcsv($handle,1000,",","'")){
					mysqli_query($connect,"INSERT INTO student (uname, name, rollnumber, password, semester, batch_year) VALUES
						(
							'".addslashes($data[0])."',
							'".addslashes($data[1])."',
							'".addslashes($data[0])."',
							'".addslashes($data[0])."',
							'".addslashes($data[2])."',
							'".addslashes($data[3])."'
						)
					");
			} 
			//

		print("<h2>Successful</h2>");
		}

		?>
		<h2>Add Student Groups</h2>
		<hr />
		<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
		Choose your file: <br />
		<input name="csv" type="file" id="csv" />
		<input type="submit" name="Submit" value="Submit" />
		</form>
		<p>Format should be as follows: Column 1 = Roll Number, Column 2 = Full Name, Column 3 = Semester, Column 3 = Graduation Year.<p>
	</div>
	<p id="footer">Project By Team Alpha NITK</p>
		
		</body>
</html>
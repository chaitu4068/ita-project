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
                <li><a href="team_alpha_home_stu.php">Home</a>
                </li>
                <li><a href="team_alpha_grades_ci_stu.php?course=<?php print($_GET['course']);?>">Course Info</a>
                </li>
				<li><a href="viewExistingPlan_stu.php?course=<?php print($_GET['course']);?>">Grading Policy</a>
                </li>
				<li><a href="team_alpha_grades_reg.php?course=<?php print($_GET['course']);?>">Registration</a>
                </li>
				<li><a href="team_alpha_grades_mks.php?course=<?php print($_GET['course']);?>">Marks</a>
                </li>
				<li><a href="team_alpha_grades_ref_ui_stu.php?course=<?php print($_GET['course']);?>">References</a>
                </li>
				<li><a href="team_alpha_logout.php">Logout</a>
                </li>
            </ul>
        </div>
	</div>
		
	<div id="content">
		<!--Content-->
		<script type = "text/javascript">
		</script>
		<form method = "POST" action = "team_alpha_grades_gp_ui.php?course=<?php print($_GET['course']);?>" >
		<h3>Please Enter the number of weight-ages for the course</h3>
		<select id="numReferences" name = "noofrefs">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select>
		
		<input type="submit" value = "Submit" />
		</form>
		
		<?php
//print("helo wolrd");
$noofrefs = $_POST['noofrefs'];
settype($noofrefs,"integer");

//print("No ofelements in post is : " . $count);
//print($_GET['course']);
print ("<form>");
			print ("<table>");
			print ("<tr>");
			print ("<th>Refernce Number</th>");
			print ("<th>Reference Name</th>");
			print ("<th>Reference Link</th>");			
			print ("</tr>");
		for($i = 0; $i < $noofrefs; $i++)
			{
			$nam = "refno" . $i;
            $tot = "refname" . $i;			
			$wei = "reflink" . $i;  
			print ("<tr>");
			print ("<td><input type='text' name = '" . $nam . "' readonly/></td>");
			print ("<td><input type='text' name = '" . $tot . "' readonly/></td>");
			print ("<td><input type='text' name = '" . $wei . "' readonly/></td>");			
			print ("</tr>");
			}
			print ("<table>");
			print ("<h3 id='bold'>Books</h3>");
		print ("<textarea name='reftextarea' readonly></textarea>");
		print ("</form>");
		
?>
	</div>
	<p id="footer">Project By Team Alpha NITK</p>
		
		</body>
</html>
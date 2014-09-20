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
                <li class="sidebar-brand"><a href="#">Hi Teacher</a>
                </li>
                <li><a href="team_alpha_home_stu.php">Home</a>
                </li>
                <li><a href="team_alpha_grades_ci_stu.php">Course Info</a>
                </li>
				<li><a href="viewExistingPlan_stu.php">Grading Policy</a>
                </li>
				<li><a href="team_alpha_grades_mks_stu.php">Marks</a>
                </li>
				<li><a href="team_alpha_grades_ref_stu.php">References</a>
                </li>
            </ul>
        </div>
	</div>
		
	<div id="content">
		<!--Content-->
<?php	
	
if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connecting");
  }
  	
$query = "select distinct type from marks";

if(!($result = mysqli_query($connect,$query)))   
{
	die("Error in inserting component");
}

print("<form method = 'POST' action = 'team_alpha_grades_mks.php?course=".$_GET['course']."'>");
print("<h3>Please select the component:</h3>");

print ("<select id='component' name='type'>");
while($row = mysqli_fetch_array($result))
{
	print("<option value='" . $row['type'] . "'>" . $row['type'] . "</option>");
};
	print("</select>");
	print("	<input type='submit' value = 'Submit' />");
	print("</form>");
?>		
		
<?php

if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connecting");
  }

$query = "select * from marks where course_code='" . $_GET['course'] . "'and type= '" . $_POST['type'] . "'";

if(!($result = mysqli_query($connect,$query)))   
{
	die("Error in querying component");
}

print ("<form>");
	print ("<table>");
	print ("<tr>");
	print ("<th>Roll Number</th>");
	print ("<th>" . $_POST['type'] . "</th>");
	print("</tr>");

while($row = mysqli_fetch_array($result))
{
	print("<tr>");
	print ("<td>" . $row['rollno'] . "</td>");
	print ("<td>" . $row['value'] . "</td>");
	print ("</tr>");
}
	print ("</table>");
print ("</form>");
		
?>
	</div>
	<p id="footer">Project By Team Alpha NITK</p>
		
		</body>



</html>

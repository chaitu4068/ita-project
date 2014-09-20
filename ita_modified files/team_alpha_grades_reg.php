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
                <li class="sidebar-brand"><a href="#">Hi Admin</a>
                </li>
                <li><a href="team_alpha_home.php">Home</a>
                </li>
                <li><a href="team_alpha_grades.php">Courses</a>
                </li>
            </ul>
        </div>
	</div>
		
	<div id="content">
		<!--Content-->
		 <script>
		
		</script>	
        <?php

$i = 0;
settype($i,"integer");

if(!($connect = mysqli_connect("localhost","root","","ita_project")))
  {
    die("Error in connecting");
  }

  $username = $_COOKIE['CRG'];
         
         $query = "select semester from student where uname = '" .  $username . "'";
         
         if(!($result = mysqli_query($connect,$query)))
          {
            die("Error in querying");
          }
          
          while($row = mysqli_fetch_row($result))
          {     
           foreach($row as $key => $value)
            {
             $sem = $value;
             break; 
            }
          }

$query = "select * from courses where semester=".$sem."";

if(!($result = mysqli_query($connect,$query)))   
{
	die("Error in inserting component");
}

print ("<form method = \"POST\" action =\"addToCoursesTable.php\">");
	print ("<table>");
print("<tr><td colspan='4'>Fee Receipt Number: <input type='text' name='feereceipt'/> </td></tr>");
print("<tr>");
        print ("<th>Course Code</th>");
        print ("<th>Course Name</th>");
        print ("<th>Credits</th>");
        print ("<th>Faculty ID</th>");
print("</tr>");
while($row = mysqli_fetch_array($result))
{
	print("<tr>");
    $k=$row['course_type'];
	if( $k == "core")
	{
		print ("<td><input type='checkbox' name = 'course[]' value='" . $row['course_code'] . "' readonly checked>" . $row['course_code'] . "</input></td>");
        print ("<td>". $row['course_name'] . "</td>");
        print ("<td>(". $row['credits'] . ")</td>");
        print ("<td>". $row['fac_id'] . "</td>");
	}
	else
	{
		print ("<td><input type='checkbox' name = 'course[]' value='" . $row['course_code'] . "'>" . $row['course_code'] . "</input></td>");
        print ("<td>". $row['course_name'] . "</td>");
        print ("<td>(". $row['credits'] . ")</td>");
        print ("<td>". $row['fac_id'] . "</td>");
	}	
	print ("</tr>");
	$i++;
}
	print ("<table>");
	print ("<input type='submit' value='Submit'/>");
print ("</form>");
		
?>

	</div>
	<p id="footer">Project By Team Alpha NITK</p>
		
		</body>
</html>
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
			
		
	<div id="content">
		<!--Content-->
		<p id="bold">Administrator's Note</p>
		<p>The username and password will be provided to the student and faculty member by the administrator so please note to</p>
		<p>change the password after logging in.</p>		
		<hr />
		
		<form name="LoginPage" action = "verifyCredentials.php" method="POST">
		<p id="bold">Username <input type="text" name="username" /></p>
		<p id="bold">Password <input type="password" name="password" /></p>
		<input type="submit" value="Submit"/>
		</form>
			
	</div>
	<p id="footer">Project By Team Alpha NITK</p>
		
		</body>
</html>
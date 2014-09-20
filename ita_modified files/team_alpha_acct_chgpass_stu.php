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

    <!-- JavaScript -->
    <!--<script type="text/javascript" language="javascript" src="changepassword.js"></script>-->
    <script type="text/javascript">
        function passwordcheck() 
       {
            var oldpass=document.getElementById("old-password").value;
            var pass1=document.getElementById("new-password").value;
            var pass2=document.getElementById("ret-password").value;
            if(oldpass.length<1||pass1.length<1||pass2.length<1)
                alert("No fields can be left blank");
            else if(pass1.length<8)
                alert("Password too Short");
            else if(pass1.length>20)
                alert("Password too Large");
            else if(pass1!=pass2)
                alert("Password Mismatch");
            else
                return;
        }
    </script>

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
                <li class="sidebar-brand"><a href="#">Hi Student</a>
                </li>
                <li><a href="team_alpha_home_stu.php">Home</a>
                </li>
                <li><a href="team_alpha_acct_geninf.php">General Information</a>
                </li>
				<li><a href="team_alpha_acct_chgpass_stu.php">Change Password</a>
                </li>
            </ul>
        </div>
	</div>
		
	<div id="content">
		<!--Content-->
		<form name="changePassword" action="changePassword.php" method="POST">
            <table>
			    <tr>
                    <td>Enter Username</td>
                    <td><input type="text" id="usrname" name="username"/></td>
                </tr>
                <tr>
                    <td>Enter Old Password:</td>
                    <td><input type="password" id="old-password" name="oldpassword"/></td>
                </tr>
                <tr>
                    <td>Enter New Password</td>
                    <td><input type="password" id="new-password" name="newpassword"/></td>
                </tr>
                <tr>
                    <td>Re-enter New Password</td>
                    <td><input type="password" id="ret-password" name="retpassword"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><input type="submit" id="confirm" name="confirmpassword" onClick="passwordcheck()"/></td>
                </tr>
            </table>
        </form>
	</div>
	
		
		</body>



</html>

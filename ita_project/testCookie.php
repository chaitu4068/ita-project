<html>
<body>
<h1>HELLO</h1>
<?php
 print("PHP Runs");
 ob_start();
 print( "HELLO WORLD");
 setcookie("Cookie","Kaushik",time()+86400);
 ob_end_flush();
 echo $_COOKIE['Cookie'];
 print_r($_COOKIE);
 print("Cookie saving successful");
 
 ?>
 </body>
</html>
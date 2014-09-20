<?php

 $count = 0;
 
 print($_COOKIE['CRG']);

 for(reset($_COOKIE);$element = key($_COOKIE);next($_COOKIE))
  {
    if($element[0]=='C' && $element[0]=='R'  && $element[0]=='G' )
	{
     print($_COOKIE[$element] . "<br/>");
	}
  }
  print($count);
 ?>
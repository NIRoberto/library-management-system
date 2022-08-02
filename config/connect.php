<?php

 $server = "localhost";
  $user ="root";
  $pass = "";
  $db = "library"; 
  
  $con = mysqli_connect($server, $user, $pass, $db);
  if($con){
	  // echo "connected";  
  }else{
	  // echo "Connect failed ".mysqli_error($con);
  } 
?>
<?php
  global $con ;  // scope variable connection ==> acces f function of save task . 

  $serverName="localhost";
  $userName="root";
  $password="";
  $dbName="scrumboard";
  $con=mysqli_connect($serverName,$userName,$password,$dbName);

  // if(!$con){
  //   echo "connection is failed".mysqli_connect_errno() ;
  //   die() ;
  // } 

?>
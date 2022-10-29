<?php
    
    //CONNECT TO MYSQL DATABASE USING MYSQLI
    
    // $con=new mysqli('localhost','root','','scrumboard');
    // if($con){
    //      echo" 3laaa slama";
    //    }else {
    //   die (mysqli_error($con));
    //   echo "tamat lmohima binajaa7 *_* ";
    // }

  global $con ;  // scope varieable connection ==> acces f function of save task . 

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
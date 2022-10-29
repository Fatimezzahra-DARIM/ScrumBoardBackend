<?php
require('database.php');
        //CODE HERE
        $title=$_POST['titre'];
        $type=$_POST['type'];
        $priorities=$_POST['propriete'];
        $status=$_POST['status'];
        $date=$_POS['date'];
        $description=$_POST ['description'];
       
        //SQL INSERT
        // require 'database.php';
        // $requete=;
        $req=mysqli_query($con,"INSERT INTO tasks VALUES ('','$title','$type','$proprieties','$status','$date','$description')");

        // print_r($_POST);
        if(isset($query)){
            echo"<h1>Nj7aaaat tjriba fr7ii</h1>";
        } else{
            echo"<h1>4aa 9lbii 3la chi 7el a7nintii hzk lma </h1>";
        }
        // print_r($_POST)
        // $_SESSION['message'] = "Task has been added successfully !";
		//   header('location: index.php');


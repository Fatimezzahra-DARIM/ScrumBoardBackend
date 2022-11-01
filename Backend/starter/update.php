<?php 

require "database.php";
    // ECHO "start" ;
    if(isset($_POST['update'])){
        $id=$_GET['id'];
        // echo "center" ;
        $title=$_POST['titre'];
        $priority=$_POST['propriete'];
        $type=$_POST['type'];
        $status=$_POST['status'];
        $date=$_POST['date'];
        $description=$_POST['description'];
       $req= "UPDATE tasks SET `title`='$title',`type_id`='$type',`priority_id`='$priority',`status_id`='$status',`task_datetime`='$date',`description`= '$description' WHERE id=$id";
        $res=mysqli_query($con,$req);
        if($res){
        header('location: index.php');
         echo "done";
        }else{
            echo "<br>Error updating record: " . mysqli_error($con);

        }
        //echo "end" ;

    }
    ?>
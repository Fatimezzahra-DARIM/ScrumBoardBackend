<?php
    //INCLUDE DATABASE FILE
    require('database.php');
    if (isset($_GET['delete'])){
            $id=$_GET['id'];
            $req="DELETE FROM tasks WHERE id=$id";
            $result=mysqli_query($con,$req);

            if($result){
                echo "suppression avec succes";
                header('location: index.php') ;
            }
        }
?>
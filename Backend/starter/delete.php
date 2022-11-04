<?php
    //INCLUDE DATABASE FILE
    require('database.php');
    if (isset($_GET['delete'])){
        global $con;
        //CODE HERE
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $req = "DELETE FROM tasks WHERE id=$id";

            $response = mysqli_query($con, $req);
            if ($response) {
                echo "suppression avec succes";
                
            }
        }

        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
        header('location: index.php');
    }
?>
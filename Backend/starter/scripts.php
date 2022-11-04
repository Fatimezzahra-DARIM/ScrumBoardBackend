<?php
    //INCLUDE DATABASE FILE
    require('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    getTasks();
    function getTasks()
    {   global $con ;    
        //SQL SELECT
        $bdSql= "SELECT tasks.id, tasks.title, types.name AS type, priorities.name AS priority, statuses.name AS status, tasks.task_datetime, tasks.description 
                FROM 
                    tasks
                        inner join priorities On tasks.priority_id=priorities.id
                        inner join statuses On tasks.status_id=statuses.id
                        inner join types On tasks.type_id=types.id 
                        order by title desc
                ";
        //Select Data From a MySQL Database  
      $board = mysqli_query($con,$bdSql);
      $GLOBALS['tasks'] = array();

      if(mysqli_num_rows($board) >0){
        while($row = mysqli_fetch_assoc($board)){
            $GLOBALS['tasks'][] = $row;
        }
        }
    }
       
    function saveTask()
    {
        global $con ;
        
        $title=$_POST['titre'];
        $type=$_POST['type'];
        $priorities=$_POST['propriete'];
        $status=$_POST['status'];
        $date=$_POST['date'];
        $description=$_POST['description'];
        //SQL INSERT
     
        $requete="INSERT INTO tasks( title, type_id, priority_id, status_id, task_datetime, description) 
                    VALUES ('$title','$type','$priorities','$status','$date','$description')";
        $query = mysqli_query($con,$requete);

            if($query) {
                echo "data has been added successfully" ;
            }else{
                echo "error is here" ;
            }
        // print_r($_POST);
        
        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
    }
    

    function countTasks($id){
        global $con ;
        $req = "SELECT count(id) as countTasks FROM `tasks` WHERE status_id = $id";

        $res = mysqli_query($con, $req);
        
        $data = mysqli_fetch_assoc($res);
        echo $data['countTasks'];
    }

 
    ?>

    
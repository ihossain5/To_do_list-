<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop - PH
 * Date: 4/10/2019
 * Time: 3:03 PM
 */

namespace App\classes;


class Task
{
//    add Task
    public function saveTask()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'to_do_list');
        extract($_POST);
        $user_id = $_SESSION['user'];

        $sql = "INSERT INTO task (task_name,user_id) VALUES ('$task_name', '$user_id')";

        if (mysqli_query($conn, $sql)){
           header('location:index.php');
           exit;
        }else{
            return " Not Added Successfully";
        }
        
    }

//        view task
    public function viewTask(){
        $link =mysqli_connect('localhost','root','','to_do_list');
        $user_id = $_SESSION['user'];
        $sql = "SELECT * FROM task where user_id='$user_id'";
        $view=mysqli_query($link,$sql);
        if ($view){
            return $view;
        }
        else{
            die('Query problem'.mysqli_error());
        }

    }

//    update task
    public function getTask($id){
        $link =mysqli_connect('localhost','root','','to_do_list');
        $sql= "SELECT * FROM task where task_id=$id";
        $view=mysqli_query($link,$sql);
        if ($view){
            return $view;
        }
        else{
            die('Query problem'.mysqli_error());
        }

    }
    public function updateTask($id){
        $link =mysqli_connect('localhost','root','','to_do_list');
        $sql= "UPDATE task SET task_name='$_POST[task_name]' where task_id=$id";

        if (mysqli_query($link,$sql)){
            header('location:index.php');
        }
        else{
            die('Query Problem'.mysqli_error());
        }
    }
//    delete task
    public function deleteTask($id){
        $link =mysqli_connect('localhost','root','','to_do_list');
        $sql ="DELETE FROM task where task_id='$id'";

        if (mysqli_query($link,$sql)){
            header('location:index.php');
        }
        else{
            die('Query Problem'.mysqli_error());
        }
    }
}
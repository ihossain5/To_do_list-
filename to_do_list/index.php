<?php
session_start();
if (!isset($_SESSION['user'])){
    header('location:login.php');
}

require "vendor/autoload.php";
use App\classes\Task;


if (isset($_GET['logout'])){
    unset($_SESSION['user']);
    header('location:login.php');
}

$result="";
if (isset($_POST['btn'])){
    $task = new Task();
    $result = $task->saveTask();
}


$view_task= new Task();
$view= $view_task->viewTask();

if (isset($_GET['status'])){
    $view_task->deleteTask($_GET['id']);
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>To Do List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/darkly/bootstrap.min.css" rel="stylesheet" integrity="sha384-w+8Gqjk9Cuo6XH9HKHG5t5I1VR4YBNdPt/29vwgfZR485eoEJZ8rJRbm3TR32P6k" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['name']?></a>
                    <ul class="dropdown-menu">

                        <li><a  href="?logout=yes" onclick="return confirm('Are you sure to log out?')"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
  
</nav>

 <div class="container mt-5">
     <div class="row justify-content-center">
         <div class="col-8">
             <div class="card border-warning">
                <div class="card-header">
                    <h1 class="text-center">To Do List</h1>
                </div>
                 <div class="card-body">
                     <form action="" method="post">
                         <div class="row">
                             <div class="col-10">
                                 <input type="text" name="task_name" class="form-control" placeholder="Enter a new task here" required>
                             </div>
                             <div class="col-2">
                                 <input type="submit" name="btn" value="Add Task" class="btn btn-warning">
                             </div>
                         </div>
                     </form>
                     <div class="row mt-5 mx-2">
                         <table class="table table-bordered">
                                <thead class="table-success">
                                <tr>
                                    <th>Sl No</th>
                                    <th>Task Name</th>
                                  
                                    <th>Action</th>
                                </tr>
                             </thead>
                        
                             <tbody class="table-light">
                               <?php
                               $i=1;
                               while ($view_task=mysqli_fetch_assoc($view)){
                               ?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $view_task['task_name']?></td>
                                  
                                    <td>
                                        <a href="edit_task.php?id=<?php echo $view_task['task_id']?>" class="btn btn-outline-success"><i class="fas fa-edit"></i></a>
                                        <a href="?status=delete&&id=<?php echo $view_task['task_id']?>" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                             <?php } ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

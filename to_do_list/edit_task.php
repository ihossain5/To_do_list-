<?php
session_start();
if (!isset($_SESSION['user'])){
    header('location:login.php');
}

require "vendor/autoload.php";
use App\classes\Task;

$get= new Task();
$result=$get->getTask($_GET['id']);
$data= mysqli_fetch_assoc($result);

if (isset($_POST['btn'])){
    $get->updateTask($data['task_id']);
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

    <title>Hello, world!</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/darkly/bootstrap.min.css" rel="stylesheet" integrity="sha384-w+8Gqjk9Cuo6XH9HKHG5t5I1VR4YBNdPt/29vwgfZR485eoEJZ8rJRbm3TR32P6k" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card border-warning">
                <div class="card-header">
                    <h1 class="text-center">TO Do List</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-10">

                                <input type="text" id="task_name" name="task_name" value="<?php echo $data['task_name']?>" class="form-control" placeholder="Enter your task" required>
                            </div>
                            <div class="col-2">
                                <input type="submit" name="btn" value="Update" class="btn btn-outline-info">
                            </div>
                        </div>
                    </form>
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


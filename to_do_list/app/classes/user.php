<?php


namespace App\classes;

class user
{
    //    Register
    public function register(){
        $link= mysqli_connect('localhost','root','','to_do_list');
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $pass = md5($password);
        // check email
        $sql = "SELECT * FROM register where email='$email'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0){
            return "E-mail already registered";
        }

        // new info add
        $sql = "INSERT INTO register (email,password,name) VALUES ('$email', '$pass', '$name')";
        if (mysqli_query($link, $sql)){
            return header('location:login.php');
        }else{
            return "Not Registered";
        }
    }

    public function login()
    {
        $link = mysqli_connect('localhost', 'root', '', 'to_do_list');
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass = md5($password);
        $sql = "SELECT * FROM register where email='$email' and password='$pass'";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0){
            session_start();
            $_SESSION['user'] = $data['id'];
            $_SESSION['name'] = $data['name'];
            header('location:index.php');
        }else{
            return "Invalid Username or Password";
        }
    }

}
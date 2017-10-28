<?php
session_start();
include 'config/dbconfig.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $myusername = mysqli_real_escape_string($db,$_POST['username']);

    $mypassword = mysqli_real_escape_string($db,$_POST['password']);
    $hash_pass = sha1($mypassword);

    $sql = "SELECT * FROM staff WHERE username = '$myusername' and password = '$hash_pass'";
    $result = mysqli_query($db,$sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $personalInfoID = $row["sid"];
    $count = mysqli_num_rows($result);


    if($count == 1) {

        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['sid'] = $row['sid'];
        $_SESSION['app_role'] = $row['app_role'];


        if(isset($_SESSION['app_role'])){
            if($_SESSION['app_role'] == "staff"){
                header("location:../main.php?p=home1");
            }elseif ($_SESSION['app_role'] == "hr"){
                header("location:../main.php?p=home2");
            }elseif ($_SESSION['app_role'] == "admin"){
                header("location:../main.php?p=admin");
            }
        }else
        header("location:../main.php?p=login&message=no staff categories could be found please login again");

    }else
    header("location:../main.php?p=login&message=invalid login info");
}
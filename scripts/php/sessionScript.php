<?php
session_start();
function isConnected()
{
    require __DIR__."/../config/dbconfig.php";
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $hash_pass = sha1($password);
        $sql = "SELECT sid FROM staff WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if ($count == 1) {

            return true;
        } else {

            return false;
        }
    }
    return false;

}

function isHR(){
    $app_role = $_SESSION['app_role'];
    if(isset($app_role)){
        if($app_role == "hr"){
            return true;
        }
        return false;
    }
    return false;

}

function isAdmin(){
    $app_role = $_SESSION['app_role'];
    if(isset($app_role)){
        if($app_role == "admin"){
            return true;
        }
        return false;
    }
    return false;

}
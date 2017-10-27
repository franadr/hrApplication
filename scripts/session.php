<?php
session_start();
function isConnected()
{
    require 'config/dbconfig.php';
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
    $staff_cat = $_SESSION['staff_cat'];
    if(isset($staff_cat)){
        if($staff_cat == "hr"){
            return true;
        }
        return false;
    }
    return false;

}

function isAdmin(){
    $staff_cat = $_SESSION['staff_cat'];
    if(isset($staff_cat)){
        if($staff_cat == "admin"){
            return true;
        }
        return false;
    }
    return false;

}
<?php
/*
 * this file hold the function to check wether a user is already connected and if he is an admin,hr or simple staff
 */
session_start();

/*
 * method to check wether the user still have an active session
 */
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

/*
 * method to check wether the user is a member of HR group
 */
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

/*
 * method to check if the user is a member of Admin group
 */
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
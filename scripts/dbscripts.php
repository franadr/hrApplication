<?php
session_start();

function gatherPersonalInfo($sid){
    require 'config/dbconfig.php';
    $sql = "SELECT * FROM personal_info WHERE pid = '$sid'";

    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if($row['pid']){
        $_SESSION['personalInfoPresent'] = true;
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['birthdate'] = $row['birthdate'];
        $_SESSION['birthplace'] = $row['birthplace'];
        $_SESSION['photolink'] = $row['photolink'];
        return true;

    }else{
        $_SESSION['personalInfoPresent'] = false;
        return false;
    }

}
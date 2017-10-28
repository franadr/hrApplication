<!-- File that holds all functions to gather data from DB returning json -->
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
        return json_encode($row);

    }else{
        $_SESSION['personalInfoPresent'] = false;
        return json_encode($row);
    }

}

function gatherAllUser(){
    require 'config/dbconfig.php';
    $sql = "SELECT * from staff";
    $result = mysqli_query($db,$sql);
    $userlist = array();

    while($r = mysqli_fetch_assoc($result)) {
        $userlist[] = $r;
    }

    return json_encode($userlist);

}
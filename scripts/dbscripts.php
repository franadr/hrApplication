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

function insertPersonalInfoMod($user)
{
    require 'config/dbconfig.php';
    $sid = $_SESSION['sid'];
    $userdecode=json_decode($user);
    $sql = "INSERT into personal_info_mod (pid,firstname,lastname,birthdate,birthplace,photolink) VALUES ( '$sid',
                                                                                            '$userdecode->firstname',
                                                                                            '$userdecode->lastname',
                                                                                            '$userdecode->birthdate',
                                                                                            '$userdecode->birthplace',
                                                                                            '$userdecode->photoLink'
                                                                                            )";
    if(mysqli_query($db, $sql)){
        echo 'query ok';
        return 'ok';
    }

    else{
        echo 'Database communication error , or you already ask for your personal info modifications';
        return'nok';
    }



}

function gatherPersonalInfoMod_all(){
    require 'config/dbconfig.php';
    $sql = "SELECT * FROM personal_info_mod ";

    $result = mysqli_query($db,$sql);

    $pinfoMod = array();

    while($r = mysqli_fetch_assoc($result)) {
        $pinfoMod[] = $r;
    }

    return json_encode($pinfoMod);

}

function gatherPersonalInfoMod($pid){
    require 'config/dbconfig.php';
    $sql = "SELECT * FROM personal_info_mod where pid=$pid ";

    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    return json_encode($row);

}

function savePinfo($pid){
    require 'config/dbconfig.php';
    $pInfoTosave = json_decode(gatherPersonalInfoMod($pid));

    $sql = "INSERT into personal_info (pid,firstname,lastname,birthdate,birthplace,photolink) VALUES ( '$pid',
                                                                                            '$pInfoTosave->firstname',
                                                                                            '$pInfoTosave->lastname',
                                                                                            '$pInfoTosave->birthdate',
                                                                                            '$pInfoTosave->birthplace',
                                                                                            '$pInfoTosave->photoLink'
                                                                                            ) ON DUPLICATE KEY UPDATE 
                                                                                            firstname='$pInfoTosave->firstname',
                                                                                            lastname='$pInfoTosave->lastname',
                                                                                            birthdate='$pInfoTosave->birthdate',
                                                                                            birthplace='$pInfoTosave->birthplace',
                                                                                            photolink='$pInfoTosave->photoLink'";
    if(mysqli_query($db, $sql)){
        $sql = "DELETE from personal_info_mod where pid = $pid";
        mysqli_query($db, $sql);
        echo 'query ok';
        return 'ok';
    }

    else{
        echo $db->error;
        return'nok';
    }
}

function deletePinfo($pid){
    require 'config/dbconfig.php';
    $sql = "DELETE from personal_info_mod where pid = $pid";
    mysqli_query($db, $sql);
    return 'query ok';
}

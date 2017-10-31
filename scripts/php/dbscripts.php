<?php
session_start();
require_once __DIR__."/../../model/staff.php";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $method = $_POST['method'];

    if(isset($method)){

        switch ($method){
            case 'adduser':{
                $username = $_POST['username'];
                $password = $_POST['password'];
                addUser($username,$password);
                exit();
            }
            case 'validatepinfo':{
                $pid=$_POST['pid'];
                $type=$_POST['type'];

                if($type == 'validate')
                    return savePinfo($pid);
                else if($type == 'reject')
                    return deletePinfo($pid);
                exit();
            }
            case 'pinfomod':{
                $user=new staff();
                $user->firstname = $_POST['firstname'];
                $user->lastname = $_POST['lastname'];
                $user->birthdate = $_POST['birthdate'];
                $user->birthplace = $_POST['birthplace'];
                $user->phonenumber = $_POST['phonenumber'];
                $user->photolink = $_POST['photolink'];

                insertPersonalInfoMod(json_encode($user));
                exit();
            }
            default: echo 'Not recognize method';exit;
        }
    }else echo 'Method param not present';
}

function addUser($username,$password){
    require __DIR__."/../config/dbconfig.php";
    $haspass = sha1($password);
    $sql = "Insert into staff (username,password) VALUES ('$username','$haspass')";
    if(mysqli_query($db, $sql)){

        echo 'user inserted';
    }else{

        echo $db->error;
    }
}



function gatherPersonalInfo($sid){
    require __DIR__."/../config/dbconfig.php";
    $sql = "SELECT * FROM personal_info WHERE pid = '$sid'";

    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if($row['pid']){
        $_SESSION['personalInfoPresent'] = true;
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['birthdate'] = $row['birthdate'];
        $_SESSION['birthplace'] = $row['birthplace'];
        $_SESSION['phonenumber'] = $row['phonenumber'];
        $_SESSION['photolink'] = $row['photolink'];
        return json_encode($row);

    }else{
        $_SESSION['personalInfoPresent'] = false;
        return json_encode($row);
    }

}

function gatherAllUser(){
    require __DIR__."/../config/dbconfig.php";
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
    require __DIR__."/../config/dbconfig.php";
    $sid = $_SESSION['sid'];
    $userdecode=json_decode($user);
    $sql = "INSERT into personal_info_mod (pid,firstname,lastname,birthdate,birthplace,phonenumber,photolink) VALUES ( '$sid',
                                                                                            '$userdecode->firstname',
                                                                                            '$userdecode->lastname',
                                                                                            '$userdecode->birthdate',
                                                                                            '$userdecode->birthplace',
                                                                                            '$userdecode->phonenumber',
                                                                                            '$userdecode->photoLink'
                                                                                            )";
    if(mysqli_query($db, $sql)){
        echo 'query ok';
        return 'ok';
    }

    else{
        echo 'Database communication error , or you already ask for your personal info modifications :'.$db->error;
        return'nok';
    }



}

function gatherPersonalInfoMod_all(){
    require __DIR__."/../config/dbconfig.php";
    $sql = "SELECT * FROM personal_info_mod ";

    $result = mysqli_query($db,$sql);

    $pinfoMod = array();

    while($r = mysqli_fetch_assoc($result)) {
        $pinfoMod[] = $r;
    }

    return json_encode($pinfoMod);

}

function gatherPersonalInfoMod($pid){
    require __DIR__."/../config/dbconfig.php";
    $sql = "SELECT * FROM personal_info_mod where pid=$pid ";

    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    return json_encode($row);

}

function savePinfo($pid){
    require __DIR__."/../config/dbconfig.php";
    $pInfoTosave = json_decode(gatherPersonalInfoMod($pid));

    $sql = "INSERT into personal_info (pid,firstname,lastname,birthdate,birthplace,phonenumber,photolink) VALUES ( '$pid',
                                                                                            '$pInfoTosave->firstname',
                                                                                            '$pInfoTosave->lastname',
                                                                                            '$pInfoTosave->birthdate',
                                                                                            '$pInfoTosave->birthplace',
                                                                                            '$pInfoTosave->phonenumber',
                                                                                            '$pInfoTosave->photoLink'
                                                                                            ) ON DUPLICATE KEY UPDATE 
                                                                                            firstname='$pInfoTosave->firstname',
                                                                                            lastname='$pInfoTosave->lastname',
                                                                                            birthdate='$pInfoTosave->birthdate',
                                                                                            birthplace='$pInfoTosave->birthplace',
                                                                                            phonenumber='$pInfoTosave->phonenumber',
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
    require __DIR__."/../config/dbconfig.php";
    $sql = "DELETE from personal_info_mod where pid = $pid";
    mysqli_query($db, $sql);
    return 'query ok';
}

<?php
/*
 * This file holds all script that access and modify DB (except for login scripts)
 */
session_start();
require_once __DIR__."/../../model/staff.php";
require_once __DIR__."/../../model/jobData.php";
/*
 * Condition that will trigger the correct method depending on the post argument 'method'
 */
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
                $user = new staff();
                $user->firstname = $_POST['firstname'];
                $user->lastname = $_POST['lastname'];
                $user->birthdate = $_POST['birthdate'];
                $user->birthplace = $_POST['birthplace'];
                $user->phonenumber = $_POST['phonenumber'];
                $user->photolink = $_POST['photolink'];
                $user->password = $_POST['password'];

                insertPersonalInfoMod(json_encode($user));
                exit();
            }
            case 'modpass':{
                $id = $_POST['id'];
                $oldpassword = $_POST['oldpassword'];
                $newpassword = $_POST['newpassword'];
                modpass($id,$oldpassword,$newpassword);
                exit();
            }
            case 'usernameCheck':{
                $username = $_POST['username'];
                usernameCheck($username);
                exit();
            }
            case 'saveJobData':{
                $jobData = new jobData();
                $jobData->jid = $_POST['jid'];
                $jobData->contract_start = $_POST['contract_start'];
                $jobData->contract_end = $_POST['contract_end'];
                $jobData->salary = $_POST['salary'];
                $jobData->bank_account = $_POST['bank_account'];
                $jobData->working_hours = $_POST['working_hours'];
                $jobData->staff_cat = $_POST['staff_cat'];
                saveJobData($jobData);
                exit();
            }
            case 'createStaffCat':{
                $newStaffCat = $_POST['newStaffCat'];
                createStaffCat($newStaffCat);
                exit();
            }
            case 'deleteStaffCat':{
                $scid = $_POST['scid'];
                deleteStaffCat($scid);
                exit();
            }
            default: echo 'Not recognize method';exit;
        }
    };
}

function deleteStaffCat($scid){
    require __DIR__."/../config/dbconfig.php";
    $sql = "DELETE from staff_cat where scid = $scid";
    if(mysqli_query($db,$sql))
        echo 'cat deleted';
    else
        echo $db->error;
}
function createStaffCat($newStaffCat){
    require __DIR__."/../config/dbconfig.php";
    $sql = "insert into staff_cat (category) values ('$newStaffCat')";
    if(mysqli_query($db,$sql))
        echo 'cat inserted';
    else
        echo $db->error;

}

function usernameCheck($username){
    require __DIR__."/../config/dbconfig.php";
    $sql = "select * from staff where username='$username'";
    $res = mysqli_query($db,$sql);
    if(count(mysqli_fetch_array($res))>=1){
        echo 'navailable';
    }else
        echo 'available';
}


/*
 * Password modification method
 */
function modpass($id,$oldpass,$newpass){
    require __DIR__."/../config/dbconfig.php";
    $sql = "select * from staff where sid = '$id'";
    $res = mysqli_query($db,$sql);
    $passwordResult = mysqli_fetch_array($res,MYSQLI_ASSOC);
    var_dump($passwordResult);
    if($passwordResult['password'] === sha1($oldpass)){
        $hasnewpassword = sha1($newpass);
        $sql = "update staff set password ='$hasnewpassword' where sid ='$id'";
        if(mysqli_query($db, $sql))
            echo 'password changed';

    }else
        echo 'old password is incorrect, nothing updated';
}

/*
 * user add method
 */
function addUser($username,$password){
    require __DIR__."/../config/dbconfig.php";
    $haspass = sha1($password);

    //First inserting the staff entry
    $sql = "Insert into staff (username,password) VALUES ('$username','$haspass')";
    if(mysqli_query($db, $sql)){
        //then gathering the new staff_id
        $sql = "select sid from staff where username='$username'AND password='$haspass'";

        $res= mysqli_query($db,$sql);
        $pidrow = mysqli_fetch_array($res,MYSQLI_ASSOC);
        $pid = $pidrow['sid'];

        //creating empty rows ont the other info tables
            $sql = "insert into personal_info (pid) values ('$pid')";
            mysqli_query($db, $sql);
            echo $db->error;
            $sql = "insert into job_data (jid) values ('$pid')";
            mysqli_query($db, $sql);
            echo $db->error;
        echo 'user inserted';
    }else{

        echo $db->error;
    }
}


/*
 * personal information gathering method
 */

function gatherAllInfo($sid){
    require __DIR__."/../config/dbconfig.php";
    $sql = "SELECT * FROM staff,personal_info,job_data,staff_cat  WHERE 
                                                                  staff.sid = '$sid' 
                                                                  AND personal_info.pid = '$sid'
                                                                  AND job_data.jid='$sid'
                                                                  AND staff_cat.scid=job_data.staff_cat";

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

/*
 * All username gathering method
 */

function gatherAllUser(){
    require __DIR__."/../config/dbconfig.php";
    $sql = "SELECT * from staff,personal_info,job_data,staff_cat where  staff.app_role<>'admin'
                                                                        AND personal_info.pid=staff.sid 
                                                                        AND job_data.jid=staff.sid 
                                                                        AND staff_cat.scid = job_data.staff_cat ";
    $result = mysqli_query($db,$sql);
    echo $db->error;
    $userlist = array();

    while($r = mysqli_fetch_assoc($result)) {
        $userlist[] = $r;
    }

    return json_encode($userlist);

}


/*
 * add a new entry to the personal information modification table (temporary entry so the HR member can validate or not the info)
 */
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
        echo 'personal informations modification requested, an HR member needs to validate them';
        return 'ok';
    }

    else{
        echo 'Database communication error , or you already ask for your personal info modifications : '.$db->error;
        return'nok';
    }



}

/*
 * retrieve ALL personal info modification request
 */
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

/*
 * retrive a specific personal information modification request
 */
function gatherPersonalInfoMod($pid){
    require __DIR__."/../config/dbconfig.php";
    $sql = "SELECT * FROM personal_info_mod where pid=$pid ";

    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    return json_encode($row);

}

/*
 * insert into personal info table the new information method
 */
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
        echo 'personal info saved';
        return 'ok';
    }

    else{
        echo "line 274".$db->error;
        return'nok';
    }
}

function saveJobData($jobData){
    require __DIR__."/../config/dbconfig.php";


    $sql = "INSERT into job_data (jid,contract_start,contract_end,salary,bank_account,working_hours,staff_cat) VALUES ( '$jobData->jid',
                                                                                            '$jobData->contract_start',
                                                                                            '$jobData->contract_end',
                                                                                            '$jobData->salary',
                                                                                            '$jobData->bank_account',
                                                                                            '$jobData->working_hours',
                                                                                            '$jobData->staff_cat'
                                                                                          
                                                                                            ) ON DUPLICATE KEY UPDATE 
                                                                                            
                                                                                            contract_start='$jobData->contract_start',
                                                                                            contract_end='$jobData->contract_end',
                                                                                            salary='$jobData->salary',
                                                                                            bank_account='$jobData->bank_account',
                                                                                            working_hours='$jobData->working_hours',
                                                                                            staff_cat='$jobData->staff_cat'";
    if(mysqli_query($db, $sql)){
        echo 'Job data saved';
        return 'ok';
    }

    else{
        echo $db->error;
        return'nok';
    }
}

/*
 * method to delete the personal info modification request
 */
function deletePinfo($pid){
    require __DIR__."/../config/dbconfig.php";
    $sql = "DELETE from personal_info_mod where pid = $pid";
    mysqli_query($db, $sql);
    echo 'temporary personal info deleted';
}

function getAllStaffcat(){
    require __DIR__."/../config/dbconfig.php";
    $sql = "select * from staff_cat";
    $res = mysqli_query($db,$sql);


    $staffCats = array();

    while($r = mysqli_fetch_assoc($res)) {
        $staffCats[] = $r;
    }


    return json_encode($staffCats);

}

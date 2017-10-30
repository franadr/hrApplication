<?php
session_start();
require_once 'config/dbconfig.php';
require_once 'dbscripts.php';
require_once '../model/staff.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pid=$_POST['pid'];
    $type=$_POST['type'];

    if($type == 'validate')
        return savePinfo($pid);
    else if($type == 'reject')
        return deletePinfo($pid);
        return 'nok';
}else{
    return 'no post';
}
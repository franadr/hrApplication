<?php
session_start();
require_once 'config/dbconfig.php';
require_once 'dbscripts.php';
require_once '../model/staff.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user=new staff();
    $user->firstname = $_POST['firstname'];
    $user->lastname = $_POST['lastname'];
    $user->birthdate = $_POST['birthdate'];
    $user->birthplace = $_POST['birthplace'];
    $user->photolink = $_POST['photolink'];

    return insertPersonalInfoMod(json_encode($user));
}else{
    return false;
}
<?php
session_start();
include 'config/dbconfig.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $myusername = mysqli_real_escape_string($db,$_POST['username']);

    $mypassword = mysqli_real_escape_string($db,$_POST['password']);
    $hash_pass = sha1($mypassword);

    $sql = "SELECT * FROM staff WHERE username = '$myusername' and password = '$hash_pass'";
    $result = mysqli_query($db,$sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $personalInfoID = $row["sid"];
    $count = mysqli_num_rows($result);


    if($count == 1) {

        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['sid'] = $row['sid'];
        $_SESSION['staff_cat'] = $row['staff_cat'];


        if(isset($_SESSION['staff_cat'])){
            if($_SESSION['staff_cat'] == "staff"){
                header("location:../main.php?p=home1");
            }elseif ($_SESSION['staff_cat'] == "hr"){
                header("location:../main.php?p=home2");
            }elseif ($_SESSION['staff_cat'] == "admin"){
                header("location:../main.php?p=admin");
            }
        }else
        header("location:../main.php?p=login&message=no staff categories could be found please login again");
    /*
        $sql = "SELECT * FROM personal_info WHERE pid = '$personalInfoID'";

            $result = mysqli_query($db,$sql);

                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                if($row['pid']){
                    $_SESSION['personalInfoPresent'] = true;
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['birthdate'] = $row['birthdate'];
                    $_SESSION['birthplace'] = $row['birthplace'];
                    $_SESSION['photolink'] = $row['photolink'];


                }else{
                    $_SESSION['personalInfoPresent'] = false;
                }
        header("location:../main.php?p=home1");


    }else {

        header("location:../main.php?p=login");

    }
    */
    }else
    header("location:../main.php?p=login&message=invalid login info");
}
<?php
require 'scripts/php/sessionScript.php';
    if(isConnected()){
        $page = $_GET['p'];
    }else{
        $page = 'login';
        if(isset($_GET['message']))
            $message=$_GET['message'];
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.jpg">
    <title>HR webapp</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="scripts/js/jquery.canvasjs.min.js"></script>
</head>
<body>
<script>var message = "<?php echo $_GET['message'] ?>"</script>
<?php
 switch ($page){
     case 'login':
        require 'htmlpages/MainPages/login.php';
        exit();
     case 'home1':
         require 'htmlpages/MainPages/home1.php';
         exit();
     case 'home2':
         if(isHR() || isAdmin()){
             require 'htmlpages/MainPages/home2.php';}
         else {echo '
                Unauthorized </br> 
                 <a href="index.php">Back to home</a> ';}
         exit();
     case 'admin':
         if(isAdmin()){
             require 'htmlpages/MainPages/admin.php';}
         else {echo '
                Unauthorized </br> 
                 <a href="index.php">Back to home</a> ';}//pagetodo
         exit();
     default:
         echo '
                PAGE not found NOT FOUND </br>
                <a href="index.php">Back to home</a> ';
         exit();

 }

?>


</body>
</html>
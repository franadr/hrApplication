<?php
session_destroy();
?>

<div class="container">
    <form action="/scripts/loginScript.php" method="post" >
        <label for="username">Username :</label><input type="text" name="username">
        <label for="password">Password :</label><input type="password" name="password">
        <input type="submit" value="Login">
    </form>
</div>




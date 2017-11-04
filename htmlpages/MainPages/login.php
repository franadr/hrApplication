<?php
session_destroy();
?>


<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" >HR application login</a>
            </div>
        </div>
    </nav>
    <h2>Please enter your login information </h2>
    <div class="row" >
        <div class="col-sm-4 ">
            <form action="/scripts/php/loginScript.php" method="post" >
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
    </div>
</div>
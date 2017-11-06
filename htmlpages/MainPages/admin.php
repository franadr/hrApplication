<?php session_start() ?>
<!--This is the home page for Admin group users -->
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" >HR application</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a id="userlist">User list</a></li>
                <li><a id="adduser">Add user</a></li>
                <li><a id="moduser">Modify user</a></li>
                <li><a id="deluser">Delete user</a></li>
                <li><a id="modpass">Modify Password</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a id="pinfo" type="button"><span class="glyphicon glyphicon-user" ></span> My info</a></li>
                <li><a href="../../scripts/php/logoutScript.php" type="button"><span class="glyphicon glyphicon-log-out"></span>Logout   </a></li>
            </ul>
        </div>

    </nav>
    <div id="selection"></div>
</div>
<script src="../../scripts/js/admin.js"></script>

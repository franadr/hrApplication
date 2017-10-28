<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 27/10/2017
 * Time: 11:49
 */

session_start()
    ?>

<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" >Admin home page</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a id="userlist">User list</a></li>
                <li><a id="adduser">Add user</a></li>
                <li><a id="moduser">Modify user</a></li>
                <li><a id="deluser">Delete user</a></li>
                <li> <a href="../../scripts/logout.php" type="button">Logout</a> </li>
            </ul>
        </div>
    </nav>
    <div id="selection"></div>
</div>
<script src="../../scripts/admin.js"></script>

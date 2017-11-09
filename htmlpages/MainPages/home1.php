
<?php
session_start();
?>
<!--This is the home page for HR,Admin and Staff group users -->
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container-fuild">
            <div class="navbar-header navbar-brand" >HR application</div>
            <ul class="nav navbar-nav">

                <li> <a id="jobinfo">View your job info</a></li>
                <li> <a id="search">Search for staff</a></li>
                <li><a id="modpass">Modify Password</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a id="pinfo" type="button"><span class="glyphicon glyphicon-user" ></span> My info</a></li>
                <li><a href="../../scripts/php/logoutScript.php" type="button"><span class="glyphicon glyphicon-log-out"></span>Logout   </a></li>
            </ul>
        </div>

    </nav>
    <div class="row">

        <div id="selection">
            <div class="col-xs-4">
                <p class="bg-info">Welcome to your personal page, you can review your registered personal information or search for a staff member
                </p>
            </div>
        </div>
            <script src="../../scripts/js/staff.js"></script>
        </div>
    </div>
</div>




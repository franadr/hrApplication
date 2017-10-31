
<?php
session_start();
?>
<!--This is the home page for HR,Admin and Staff group users -->
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fuild">
            <div class="navbar-header navbar-brand" >Staff home page</div>
            <ul class="nav navbar-nav">
                <li> <a type="button" id="pinfo">Modify personal info</a></li>
                <li> <a id="jobinfo">View your job info</a></li>
                <li> <a id="search">Search for staff</a></li>
                <li><a id="modpass">Modify Password</a></li>
                <li> <a href="../../scripts/php/logoutScript.php" type="button">Logout</a> </li>
            </ul>
        </div>

    </nav>
    <div class="row">

        <div id="selection">
            <div class="col-md-4">
                <p class="bg-info">Welcome to your personal page, you can review your registered personal information or search for a staff member
                </p>
            </div>
        </div>
            <script src="../../scripts/js/staff.js"></script>
        </div>
    </div>
</div>




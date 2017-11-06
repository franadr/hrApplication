
<?php
session_start();
?>

<!--This is the home page for HR AND Admin group users -->
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fuild">
            <div class="navbar-header navbar-brand" >HR application</div>
            <ul class="nav navbar-nav">

                <li> <a id="jobinfo" type="button">Staff job information</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Modification
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li> <a id="modStaff" type="button">Staff Info Modification request</a></li>
                        <li> <a id="modStaffCatFac" type="button">Staff Categories and Faculties</a></li>
                    </ul>
                </li>
                <li> <a id="search" type="button">Search for staff</a></li>
                <li><a id="modpass" type="button">Modify Password</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li><a id="pinfo" type="button"><span class="glyphicon glyphicon-user" ></span> My info</a></li>
                <li><a href="../../scripts/php/logoutScript.php" type="button"><span class="glyphicon glyphicon-log-out"></span>Logout   </a></li>
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


<div id="selection"></div>
<script src="../../scripts/js/hr.js"></script>
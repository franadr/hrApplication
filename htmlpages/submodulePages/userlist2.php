<?php
session_start();
require_once __DIR__."/../../scripts/php/dbscripts.php";

$jsonusers = gatherAllUser();
$users = json_decode($jsonusers);


?>
<div class="container">

    <div class="row">
        <div class="col-sm-6">
            <table class="table table-hover">

                <thead>
                <tr>
                    <th>Username</th>
                    <th>Role/access</th>
                    <th>First Name</th>
                    <th>Last name</th>
                    <th>Category</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
    <tr onclick="selectUser('<?php echo $user->{'sid'}; ?>')">
        <td><?php echo $user->{'username'}; ?></td>
        <td><?php echo $user->{'app_role'}; ?></td>
        <td><?php echo $user->{'firstname'}; ?></td>
        <td><?php echo $user->{'lastname'}; ?></td>
        <td><?php echo $user->{'category'}; ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<div class="col-sm-6" id="selectedUser">
    <h3>Staff list and job data modification</h3>
    <p>This page allows you to view and modify job data of a specific user</p>
    <p>To view job data of a specific user, simply click on the row corresponding to the user</p>
    <p>Then simply hit the save button to persist modified informations</p>
</div>
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
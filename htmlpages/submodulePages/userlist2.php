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
                <h3> Registered staff list :</h3>
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
        <!--<td><button class="btn btn-info" >select</button></td>-->
    </tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<div class="col-sm-6" id="selectedUser"></div>
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
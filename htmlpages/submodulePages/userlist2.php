<?php
session_start();
require_once __DIR__."/../../scripts/php/dbscripts.php";

$jsonusers = gatherAllUser();
$users = json_decode($jsonusers);
?>
<div class="container">
    <h3> Registered staff list :</h3>
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role/access</th>
                    <th>First Name</th>
                    <th>Last name</th>
                    <th>Staff category</th>
                    <th>Modify job Data</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
    <tr>
        <td id="sid"><?php echo $user->{'sid'}; ?></td>
        <td><?php echo $user->{'username'}; ?></td>
        <td><?php echo $user->{'app_role'}; ?></td>
        <td><?php echo $user->{'firstname'}; ?></td>
        <td><?php echo $user->{'lastname'}; ?></td>
        <td><?php echo $user->{'category'}; ?></td>
        <td><button onclick="selectUser('<?php echo $user->{'sid'}; ?>')">select</button></td>
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
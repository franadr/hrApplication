<?php
session_start();
require '../../scripts/dbscripts.php';

$jsonusers = gatherAllUser();
$users = json_decode($jsonusers);
?>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role/access</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user->{'sid'}; ?></td>
                        <td><?php echo $user->{'username'}; ?></td>
                        <td><?php echo $user->{'app_role'}; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
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




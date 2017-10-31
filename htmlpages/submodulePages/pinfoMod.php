<?php
session_start();
require_once __DIR__."/../../scripts/php/dbscripts.php";
$pinfoMod=null;
$json = gatherPersonalInfoMod_all();
$pinfoMod = json_decode($json);
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h2>List of user personal info modification request </h2>
            <table class="table">
                <thead>
                <tr>
                    <th>User id</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Birthdate</th>
                    <th>Birthplace</th>
                    <th>Phone number</th>
                    <th>Photo link</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pinfoMod as $pinfo): ?>
                    <tr>
                        <td><?php echo $pinfo->{'pid'}; ?></td>
                        <td><?php echo $pinfo->{'firstname'}; ?></td>
                        <td><?php echo $pinfo->{'lastname'}; ?></td>
                        <td><?php echo $pinfo->{'birthdate'}; ?></td>
                        <td><?php echo $pinfo->{'birthplace'}; ?></td>
                        <td><?php echo $pinfo->{'phonenumber'}; ?></td>
                        <td><?php echo $pinfo->{'photolink'}; ?></td>
                        <td><button onclick="validateMod('<?php echo $pinfo->{'pid'}; ?>')">Validate</button></td>
                        <td><button onclick="rejectMod('<?php echo $pinfo->{'pid'}; ?>')">Reject</button></td>
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

<?php
session_start();
require_once __DIR__."/../../scripts/php/dbscripts.php";
$staffCats = json_decode(getAllStaffcat());
?>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <table class="table">
                <thead>
                <tr>
                    <th>Staff category name</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($staffCats as $staffCat): ?>
                <tr>
                    <td id="<?php echo $staffCat->{'scid'} ?>"><?php echo $staffCat->{'category'} ?></td>
                    <td><button onclick="deleteStaff_cat('<?php echo $staffCat->{'scid'} ?>')">Delete</button></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td><label for="newStaff_cat">New staff category :</label><input type="text" id="newStaff_cat" onkeyup="categoryCheck()"></td>
                    <td id="addsc"></td>
                </tr>
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
<script src="../../scripts/js/hr.js"></script>

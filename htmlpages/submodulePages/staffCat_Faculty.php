<?php
session_start();
require_once __DIR__."/../../scripts/php/dbscripts.php";
$staffCats = json_decode(getAllStaffcat());
?>

<div class="container">
    <div class="row">
        <div class="col-sm-1">
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th class="col-md-1">Category name</th>
                    <th class="col-md-1">Option</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($staffCats as $staffCat): ?>
                <tr>
                    <td id="<?php echo $staffCat->{'scid'} ?>"><?php echo $staffCat->{'category'} ?></td>
                    <td><button class="btn btn-danger " onclick="deleteStaff_cat('<?php echo $staffCat->{'scid'} ?>')"><span class="glyphicon glyphicon-remove"></span></button></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td><label for="newStaff_cat">New staff category</label><input data-toggle="tooltip" title="Category already exists" class="form-control" type="text" id="newStaff_cat" onkeyup="categoryCheck()"></td>
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

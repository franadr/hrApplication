<?php
session_start();
require_once __DIR__."/../../scripts/php/dbscripts.php";
$staffCats = json_decode(getAllStaffcat());
?>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
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
        <div class="col-sm-4">
            <h3>Staff category modifications</h3>
            <p>
                This page allows you to add or modify the staff categories of the system
            </p>
            <p>
                Use the red cross next to the category name to delete a category.<br/>
                Enter a category name in the input field at the bottom of the table to add a new staff category.<br/>
                <em>Please not that duplicates will not be allowed</em><br/><br/>

                <em><strong>Warning</strong> : If you delete a category and if one or multiple staffs are mapped with this category,
                    their staff category attribute will be remplaced with !NONE! tag</em>
            </p>
        </div>
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

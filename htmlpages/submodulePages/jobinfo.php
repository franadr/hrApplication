<?php
session_start();
require_once __DIR__."/../../scripts/php/dbscripts.php";
$jid = $_POST['sid'];
//$user = gatherJobInfo($jid);
//$staff = json_decode($user);
$staff = json_decode(gatherAllInfo($jid));
$staffCats=json_decode(getAllStaffcat());
?>
<h3> Registered job Information for user : <?php echo $staff->{'firstname'}." ".$staff->{'lastname'} ?> </h3>
<form id="jobDataForm">
    <div class="form-group" hidden>
        <input type="text" class="form-control" id="jid" value="<?php echo $jid ?>" disabled>
    </div>

    <div class="form-group ">
        <label for="contractStart">*Contract start</label>
        <input type="date" class="form-control" id="contractStart" value="<?php echo $staff->{'contract_start'}; ?>">
    </div>
    <div class="form-group">
        <label for="contractEnd">*Contract end</label>
        <input type="date" class="form-control" id="contractEnd" value="<?php echo $staff->{'contract_end'}; ?>">
    </div>
    <div class="form-group">
        <label for="salary">*Salary</label>
        <input type="text" class="form-control" id="salary" value="<?php echo $staff->{'salary'}; ?>">
    </div>
    <div class="form-group">
        <label for="bankaccount">*Bank account</label>
        <input type="text" class="form-control" id="bankaccount" value="<?php echo $staff->{'bank_account'}; ?>">
    </div>
    <div class="form-group">
        <label for="hours">*Weekly hours</label>
        <input type="number" class="form-control" id="hours" value="<?php echo $staff->{'working_hours'}; ?>">
    </div>
    <div class="form-group">
        <label for="staff_cat">*Staff category</label>
        <select class="form-control" id="staff_cat">
            <option selected value="<?php echo $staff->{'scid'} ?>"><?php echo $staff->{'category'} ?></option>
            <?php foreach ($staffCats as $staffCat) :?>
                <option value="<?php echo $staffCat->{'scid'} ?>"><?php echo $staffCat->{'category'} ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="button" class="btn btn-default" id="saveJobData">Save Job data</button><span id="req"></span>
</form>
<script src="../../scripts/js/hr.js"></script>






<?php
session_start();
require_once __DIR__."/../../scripts/php/dbscripts.php";
    $user = gatherAllInfo($_SESSION['sid']);
    $userDecode = json_decode($user);
?>

<!--This file hold the personal info form module that permit a user to do a personal info modification request -->



<script>
    var username = "<?php echo $userDecode->{'username'} ?>";
    var sid = "<?php echo $_SESSION['sid']; ?>";
</script>

<div class="col-md-4">

    <form id="pinfo">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <img src="../../images/userPhoto/<?php echo $userDecode->{'username'} ?>" class="img-thumbnail" width="100px">
            </div>
        </div>




        <div class="form-group row">
            <div class="col-xs-6">
                <label for="firstname">*First name</label>
                <input type="text" class="form-control" id="firstname" value="<?php echo $userDecode->{'firstname'} ?>">
            </div>
            <div class="col-xs-6">
                <label for="lastname">*Last name</label>
                <input type="text" class="form-control" id="lastname" value="<?php echo $userDecode->{'lastname'} ?>">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-xs-6">
                <label for="birthdate">*Birthdate</label>
                <input type="date" class="form-control" id="birthdate" value="<?php echo $userDecode->{'birthdate'} ?>">
            </div>
            <div class="col-xs-6">
                <label for="birthplace">*Birthpalce</label>
                <input type="text" class="form-control" id="birthplace" value="<?php echo $userDecode->{'birthplace'} ?>">
            </div>
        </div>
        <div class="form-group">

        </div>
        <div class="form-group row">
            <div class="col-xs-6">
                <label for="phonenumber">*Primary phone</label>
                <input type="text" class="form-control" id="phonenumber" value="<?php echo $userDecode->{'phonenumber'} ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-6">
                <label for="address">*Primary Address</label>
                <input type="text" class="form-control" id="address" value="none...">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-8">
                <label for="photolink">Photo</label>
                <input type="file" class="btn btn-default btn-sm " accept="image/*" id="photo">
                <button type="button" class="btn btn-success btn-xs" id="uploadPhoto">Upload</button>
            </div>

        </div>


        <button type="button" class="btn btn-default" id="submit">Save</button><span id="req"></span>
    </form>
</div>
<div class="col-sm-4">
    <h3>Personal information</h3>
    <p>This page allows you to review and make a request for personal information modification.</p>
    <p> <em>Please note that when you save your request, a human ressource member need to validate the modification before registering them.</em></p>
</div>

<script src="../../scripts/js/personalInfo.js"></script>

<script src="../../scripts/js/jqueryui.js"></script>



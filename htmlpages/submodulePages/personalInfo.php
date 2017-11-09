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
<div class="col-md-4"></div>
<div class="col-md-4">

    <form id="pinfo">
        <h3>Personal information :</h3>
                <img src="../../images/userPhoto/<?php echo $userDecode->{'username'} ?>" class="img-thumbnail" width="100px">



        <div class="form-group">
            <label for="firstname">*First name</label>
            <input type="text" class="form-control" id="firstname" value="<?php echo $userDecode->{'firstname'} ?>">
        </div>
        <div class="form-group">
            <label for="lastname">*Last name</label>
            <input type="text" class="form-control" id="lastname" value="<?php echo $userDecode->{'lastname'} ?>">
        </div>
        <div class="form-group">
            <label for="birthdate">*Birthdate</label>
            <input type="date" class="form-control" id="birthdate" value="<?php echo $userDecode->{'birthdate'} ?>">
        </div>
        <div class="form-group">
            <label for="birthplace">*Birthpalce</label>
            <input type="text" class="form-control" id="birthplace" value="<?php echo $userDecode->{'birthplace'} ?>">
        </div>
        <div class="form-group">
            <label for="phonenumber">*PhoneNumber</label>
            <input type="text" class="form-control" id="phonenumber" value="<?php echo $userDecode->{'phonenumber'} ?>">
        </div>
        <div class="form-group">
            <label for="photolink">Photo</label>
            <input type="file" class="btn btn-default btn-sm " accept="image/*" id="photo">
            <button type="button" class="btn btn-success btn-xs" id="uploadPhoto">Upload</button>
        </div>

        <button type="button" class="btn btn-default" id="submit">Save</button><span id="req"></span>
    </form>
</div>

<script src="../../scripts/js/personalInfo.js"></script>

<script src="../../scripts/js/jqueryui.js"></script>



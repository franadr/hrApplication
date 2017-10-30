<?php
session_start();
require '../../scripts/dbscripts.php';


    $user = gatherPersonalInfo($_SESSION['sid']);
    $userDecode = json_decode($user);

?>





<script>
    var infoPresent = "<?php echo $_SESSION['personalInfoPresent']; ?>" === "1";
    var sid = "<?php echo $_SESSION['sid']; ?>";
</script>

<div class="col-md-4">
    <h2>Personal information :</h2>
    <form id="pinfo">

        <div class="form-group">
            <label for="firstname">First name</label>
            <input type="text" class="form-control" id="firstname" value="<?php echo $userDecode->{'firstname'} ?>">
        </div>
        <div class="form-group">
            <label for="lastname">Last name</label>
            <input type="text" class="form-control" id="lastname" value="<?php echo $userDecode->{'lastname'} ?>">
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input type="date" class="form-control" id="birthdate" value="<?php echo $userDecode->{'birthdate'} ?>">
        </div>
        <div class="form-group">
            <label for="birthplace">Birthpalce</label>
            <input type="text" class="form-control" id="birthplace" value="<?php echo $userDecode->{'birthplace'} ?>">
        </div>
        <div class="form-group">
            <label for="photolink">Photo link</label>
            <input type="text" class="form-control" id="photolink" value="<?php echo $userDecode->{'photolink'} ?>">
        </div>

        <button type="button" class="btn btn-default" id="submit">Save</button>
    </form>
</div>

<script src="../../scripts/js/personalInfo.js"></script>

<!--
<div class="col-md-4">
    <h2>Personal information with Session</h2>
    <form>
        <div class="form-group" >
            <label for="username">Username</label>
            <input disabled type="text" class="form-control" id="username" value="<?php echo $_SESSION['username'] ?>">
        </div>
        <div class="form-group">
            <label for="fname">First name</label>
            <input type="text" class="form-control" id="fname" value="<?php echo $_SESSION['firstname'] ?>">
        </div>
        <div class="form-group">
            <label for="lname">Last name</label>
            <input type="text" class="form-control" id="lname" value="<?php echo $_SESSION['lastname'] ?>">
        </div>
        <div class="form-group">
            <label for="bdate">Birthdate</label>
            <input type="date" class="form-control" id="bdate" value="<?php echo $_SESSION['birthdate'] ?>">
        </div>
        <div class="form-group">
            <label for="bplace">Birthpalce</label>
            <input type="text" class="form-control" id="bplace" value="<?php echo $_SESSION['birthplace'] ?>">
        </div>
        <div class="form-group">
            <label for="plink">Last name</label>
            <input type="text" class="form-control" id="plink" value="<?php echo $_SESSION['photolink'] ?>">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
-->

<script src="../../scripts/js/jqueryui.js"></script>



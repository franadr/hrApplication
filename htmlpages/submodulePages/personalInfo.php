<?php
session_start();
require '../../scripts/dbscripts.php';


    $user = gatherPersonalInfo($_SESSION['sid']);
    $userDecode = json_decode($user);

?>





<script>
    var infoPresent = "<?php echo $_SESSION['personalInfoPresent']; ?>" === "1";
</script>

<div class="col-md-4">
    <h2>Personal information :</h2>
    <form>

        <div class="form-group">
            <label for="fname">First name</label>
            <input type="text" class="form-control" id="fname" value="<?php echo $userDecode->{'firstname'} ?>">
        </div>
        <div class="form-group">
            <label for="lname">Last name</label>
            <input type="text" class="form-control" id="lname" value="<?php echo $userDecode->{'lastname'} ?>">
        </div>
        <div class="form-group">
            <label for="bdate">Birthdate</label>
            <input type="date" class="form-control" id="bdate" value="<?php echo $userDecode->{'birthdate'} ?>">
        </div>
        <div class="form-group">
            <label for="bplace">Birthpalce</label>
            <input type="text" class="form-control" id="bplace" value="<?php echo $userDecode->{'birthplace'} ?>">
        </div>
        <div class="form-group">
            <label for="plink">Last name</label>
            <input type="text" class="form-control" id="plink" value="<?php echo $userDecode->{'photolink'} ?>">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

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

<script src="../../scripts/jqueryui.js"></script>



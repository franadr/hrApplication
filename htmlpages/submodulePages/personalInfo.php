<?php
session_start();
require '../../scripts/dbscripts.php';

if(isset($_SESSION['sid'])){
    gatherPersonalInfo($_SESSION['sid']);
}
?>



<h1>Personal information</h1>



<div>
    <form>
        <fieldset id="p_info_filedSet">
            <label>Username :
                <input value="<?php echo $_SESSION['username'] ?>">
            </label><br/>
            <label>First Name:
                <input value="<?php echo $_SESSION['firstname'] ?>">
            </label><br/>
            <label>Last Name:
                <input value="<?php echo $_SESSION['lastname'] ?>">
            </label><br/>
            <label>Birth date:
                <input type="date" value="<?php echo $_SESSION['birthdate'] ?>">
            </label><br/>
            <label>Birth place:
                <input value="<?php echo $_SESSION['birthplace'] ?>">
            </label><br/>
            <label>Photo link:
                <input value="<?php echo $_SESSION['photolink'] ?>">
            </label><br/>

        </fieldset>
    </form>
</div>

<script>
    var infoPresent = "<?php echo $_SESSION['personalInfoPresent']; ?>" === "1";
</script>
<script src="../../scripts/jqueryui.js"></script>



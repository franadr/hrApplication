<?php
session_start()?>

<!--Module that permit a user to change his password -->
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="form">
                <div class="form-group " hidden>
                    <label for="id">internal ID</label>
                    <input type="text" class="form-control" id="id" disabled value="<?php echo $_SESSION['sid'] ?>">
                </div>
                <div class="form-group">
                    <label for="oldpassword">Old password</label>
                    <input type="password" class="form-control" id="oldpassword">
                </div>
                <div class="form-group">
                    <label for="newpassword">New password</label>
                    <input type="password" class="form-control" id="newpassword">
                </div>
                <button class="btn btn-success" id="SubmitPassword"> Change password</button>
            </div>


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
<script src="../../scripts/js/modPassword.js"></script>
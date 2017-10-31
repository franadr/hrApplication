<!-- Module that permit to an admin member to add a new user in the system-->
<div class="container">
    <div class="row">
        <div class="col-sm-4">

                <div class="form-group">
                    <label for="username">New Username:</label>
                    <input type="text" class="form-control" id="username" onkeyup="usernameCheck()"><span id="available"></span>
                </div>
                <div class="form-group">
                    <label for="password">Default password:</label>
                    <input type="text" class="form-control" id="password">
                </div>

                <button class="btn btn-default" id="SubmitUser"> Add</button>

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
<script src="../../scripts/js/admin.js"></script>


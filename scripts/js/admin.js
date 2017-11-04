$('#userlist').click(function () {

    $.ajax({
        type: "GET",
        url: "../htmlpages/submodulePages/userList.php",
        success: function(msg){
            $("#selection").html(msg);
        }
    });
});

$('#adduser').click(function () {

    $.ajax({
        type: "GET",
        url: "../htmlpages/submodulePages/addUser.php",
        success: function(msg){
            $("#selection").html(msg);
        }
    });
});

$('#SubmitUser').click(function () {

    var username = $('#username').val();
    var password = $('#password').val();


    $.ajax({
        type: "POST",
        url: "/../scripts/php/dbscripts.php",
        data: {
            "method":"adduser",
            "username":username,
            "password":password
        },
        success: function(msg){
            alert(msg);
            $('#selection').html('../htmlpages/submodulePages/addUser.php');
        }
    });
});

$('#modpass').click(function refresh() {

    $.ajax({
        type: "GET",
        url: "../htmlpages/submodulePages/modifyPassword.php",
        success: function(msg){
            $("#selection").html(msg);
        }
    });
});


//Ajax call to check if the entered username is free or not
function usernameCheck() {
    var username = $('#username').val();
    $.ajax({
        type: "POST",
        url: "/../scripts/php/dbscripts.php",
        data: {
            "method":"usernameCheck",
            "username":username
        },
        success: function(msg){
            if(msg === 'navailable'){
                $('#available').html('Username not available please try a different one');
                $('#SubmitUser').hide();
            }else{
                $('#available').html('Username available ');
                $('#SubmitUser').show();
            }
        }
    });
}
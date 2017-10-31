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
            $('#message').html("<h2>Your modification request has been registered please wait for its validation by HR department</h2>")
        }
    });
});
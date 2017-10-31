$('#SubmitPassword').click(function () {

    var newpassword = $('#newpassword').val();
    var id = $('#id').val();
    var oldpassword = $('#oldpassword').val();



    $.ajax({
        type: "POST",
        url: "/../scripts/php/dbscripts.php",
        data: {
            "method":"modpass",
            "id":id,
            "oldpassword":oldpassword,
            "newpassword":newpassword
        },
        success: function(msg){
            alert(msg);

        }
    });
});
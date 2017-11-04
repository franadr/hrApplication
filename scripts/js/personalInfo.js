$('#submit').click(function () {

    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var birthdate = $('#birthdate').val();
    var birthplace = $('#birthplace').val();
    var phonenumber = $('#phonenumber').val();


    if(firstname && lastname && birthdate && birthplace && phonenumber){
        $.ajax({
            type: "POST",
            url: "/../scripts/php/dbscripts.php",
            data: {
                "method":"pinfomod",
                "firstname":firstname,
                "lastname":lastname,
                "birthdate":birthdate,
                "birthplace":birthplace,
                "phonenumber":phonenumber
            },
            success: function(msg){
                alert(msg);
                $('#message').html("<h2>Your modification request has been registered please wait for its validation by HR department</h2>")
            }
        });
    }else
        $('#req').html(" *some fields are still required");


});
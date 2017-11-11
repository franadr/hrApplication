$('#submit').click(function () {

    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var birthdate = $('#birthdate').val();
    var birthplace = $('#birthplace').val();
    var phonenumber = $('#phonenumber').val();
    var priaddress = $('#priaddress').val();
    var secaddress = $('#secaddress').val();



    if(firstname && lastname && birthdate && birthplace && phonenumber && priaddress){
        $.ajax({
            type: "POST",
            url: "/../scripts/php/dbscripts.php",
            data: {
                "method":"pinfomod",
                "firstname":firstname,
                "lastname":lastname,
                "birthdate":birthdate,
                "birthplace":birthplace,
                "phonenumber":phonenumber,
                "priaddress":priaddress,
                "secaddress":secaddress
            },
            success: function(msg){
                alert(msg);
            }
        });
    }else
        $('#req').html(" *some fields are still required");


});

$('#uploadPhoto').click(function () {
    var file_data = $('#photo').prop('files')[0];

    var fd = new FormData();
    fd.append('method','uploadPhoto');
    fd.append('file',file_data);
    fd.append('username',username);
    $.ajax({
        type: "POST",
        url: "/../scripts/php/dbscripts.php",
        cache: false,
        contentType: false,
        processData: false,
        data: fd,
        success: function(msg){
            alert(msg);
        }
    });
});
$('#submit').click(function () {
    alert("saving p info ...");
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var birthdate = $('#birthdate').val();
    var birthplace = $('#birthplace').val();

    $.ajax({
        type: "POST",
        url: "../scripts/insertPinfo.php",
        data: {
            "firstname":firstname,
            "lastname":lastname,
            "birthdate":birthdate,
            "birthplace":birthplace
        },
        success: function(msg){
            alert(msg);
        }
    });
})
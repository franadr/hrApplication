//This file holds the method to managed the selection of the user (showing a Submodule) and function related to hr user


$('#pinfo').click(function () {

    $.ajax({
        type: "GET",
        url: "../htmlpages/submodulePages/personalInfo.php",
        success: function(msg){
            $("#selection").html(msg);
        }
    });
});

$('#search').click(function () {

    $.ajax({
        type: "GET",
        url: "../htmlpages/submodulePages/userList.php",
        success: function(msg){
            $("#selection").html(msg);
        }
    });
});

$('#modStaff').click(function refresh() {

    $.ajax({
        type: "GET",
        url: "../htmlpages/submodulePages/pinfoMod.php",
        success: function(msg){
            $("#selection").html(msg);
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

function validateMod(pid) {

    $.ajax({
        type: "POST",
        data:{"method":"validatepinfo","pid":pid,"type":"validate"},
        url: "../scripts/php/dbscripts.php",
        success: function(msg){
            $.ajax({
                type: "GET",
                url: "../htmlpages/submodulePages/pinfoMod.php",
                success: function(msg){
                    $("#selection").html(msg);
                }
            });
        }
    });

}
function rejectMod(pid) {

    $.ajax({
        type: "POST",
        data:{"method":"validatepinfo","pid":pid,"type":"reject"},
        url: "../scripts/php/dbscripts.php",
        success: function(msg){
            alert("200 ok :"+msg);
            $.ajax({
                type: "GET",
                url: "../htmlpages/submodulePages/pinfoMod.php",
                success: function(msg){
                    $("#selection").html(msg);
                }
            });
        }
    });
}



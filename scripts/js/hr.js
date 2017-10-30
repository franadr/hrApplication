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

function validateMod(pid) {

    $.ajax({
        type: "POST",
        data:{"pid":pid,"type":"validate"},
        url: "../scripts/pinfomodTrigger.php",
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
function rejectMod(pid) {

    $.ajax({
        type: "POST",
        data:{"pid":pid,"type":"reject"},
        url: "../scripts/pinfomodTrigger.php",
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



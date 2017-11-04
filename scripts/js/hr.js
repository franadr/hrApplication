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

$('#jobinfo').click(function () {

    $.ajax({
        type: "GET",
        url: "../htmlpages/submodulePages/userlist2.php",
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

$('#saveJobData').click(function () {

    jid = $('#jid').val();
    contract_start = $('#contractStart').val();
    contract_end = $('#contractEnd').val();
    salary = $('#salary').val();
    bank_account = $('#bankaccount').val();
    working_hours = $('#hours').val();

    $.ajax({
        type: "POST",
        url: "../scripts/php/dbscripts.php",
        data:{  "method":"saveJobData",
                "jid":jid,
                "contract_start":contract_start,
                "contract_end":contract_end,
                "salary":salary,
                "bank_account":bank_account,
                "working_hours":working_hours},
        success: function(msg){
            alert(msg);
            $.get("../htmlpages/submodulePages/userlist2.php",false,function (msg) {
                $("#selection").html(msg);
            })
        }
    });
})

function selectUser(sid) {


    $.ajax({
        type: "POST",
        url: "../htmlpages/submodulePages/jobinfo.php",
        data:{"sid":sid},
        success: function(msg){
            $("#selectedUser").html(msg);
        }
    });

};

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



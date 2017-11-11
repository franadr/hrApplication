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

$('#search').click(function refresh() {

    $.ajax({
        type: "GET",
        url: "../htmlpages/submodulePages/search.php",
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

$('#modStaffCatFac').click(function () {
    console.log('loading staff cat fac')
    $.ajax({
        type: "GET",
        url: "../htmlpages/submodulePages/staffCat_Faculty.php",
        success: function(msg){
            $("#selection").html(msg);
        }
    });
});

$('#saveJobData').click(function () {

    var jid = $('#jid').val();
    var contract_start = $('#contractStart').val();
    var contract_end = $('#contractEnd').val();
    var salary = $('#salary').val();
    var bank_account = $('#bankaccount').val();
    var working_hours = $('#hours').val();
    var staff_cat = $('#staff_cat').val();
    var supervisor = $('#supervisor').val();

    var faculties=[];
    $.each($('input[name="faculty"]:checked'), function(){
        faculties.push($(this).val());
    });

    if(contract_start && contract_end && salary && bank_account && working_hours && staff_cat){
        $.ajax({
            type: "POST",
            url: "../scripts/php/dbscripts.php",
            data:{  "method":"saveJobData",
                "jid":jid,
                "contract_start":contract_start,
                "contract_end":contract_end,
                "salary":salary,
                "bank_account":bank_account,
                "working_hours":working_hours,
                "staff_cat":staff_cat,
                "faculties":faculties,
                "supervisor_id":supervisor},
            success: function(msg){
                alert(msg);
                $.get("../htmlpages/submodulePages/userlist2.php",false,function (msg) {
                    $("#selection").html(msg);
                })
            }
        });
    }else{
        $('#req').html(" *Some field are still required");
    }


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

function createStaff_cat(){
    var newStaff_cat = $('#newStaff_cat').val();
    $.ajax({
        type: "POST",
        data:{"method":"createStaffCat","newStaffCat":newStaff_cat},
        url: "../scripts/php/dbscripts.php",
        success: function(msg){
            alert("200 ok :"+msg);
            $.ajax({
                type: "GET",
                url: "../htmlpages/submodulePages/staffCat_Faculty.php",
                success: function(msg){
                    $("#selection").html(msg);
                }
            });
        }
    });
}

function deleteStaff_cat(scid){

    $.ajax({
        type: "POST",
        data:{"method":"deleteStaffCat","scid":scid},
        url: "../scripts/php/dbscripts.php",
        success: function(msg){
            alert("Staff category has been deleted, staff with delete category where update with \'!NONE!\' category ");
            $.ajax({
                type: "GET",
                url: "../htmlpages/submodulePages/staffCat_Faculty.php",
                success: function(msg){

                    $("#selection").html(msg);
                }
            });
        }
    });
}

function categoryCheck(){
    var newCategory = $('#newStaff_cat').val();
    $.ajax({
        type: "POST",
        url: "/../scripts/php/dbscripts.php",
        data: {
            "method":"staffCatCheck",
            "newCategory":newCategory
        },
        success: function(msg){
            if(msg === 'available' && $('#newStaff_cat').val() !== ''){
                $('#addsc').html('<button class="btn btn-success btn-sm btn-success" onclick="createStaff_cat()"><span class="glyphicon glyphicon-floppy-saved"></span></button>');

            }else{

                $('#addsc').html('not available');

            }
        }
    });
}


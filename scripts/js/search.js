function search(){
    var keyword = $('#searchWord').val();
    $('#searchbody').empty();
    $.ajax({
        type: "POST",
        url:"../scripts/php/dbscripts.php",
        data:   {"method":"search",
                "search":keyword},
        success: function(msg){
            console.log(msg);
            var searchRes = JSON.parse(msg);

            $.each(searchRes, function (index,res) {
                $('#searchbody').append("<tr>")
                    .append("<td>"+res.firstname+"</td><td>"+res.lastname+"</td><td>"+res.category+"</td><td>"+res.phonenumber+"</td><td>"+res.supfname+" "+res.suplname+"</td>")

            })
            //$("#selectedUser").html(msg);
        }
    });
}

function searchAll(){
    $('#searchbody').empty();
    $.ajax({
        type: "POST",
        url:"../scripts/php/dbscripts.php",
        data:   {"method":"search",
            "search":"none",
            "type":"all"},
        success: function(msg){
            console.log(msg);
            var searchRes = JSON.parse(msg);

            $.each(searchRes, function (index,res) {
                $('#searchbody').append("<tr>")
                    .append("<td>"+res.firstname+"</td><td>"+res.lastname+"</td><td>"+res.category+"</td><td>"+res.phonenumber+"</td><td>"+res.supfname+" "+res.suplname+"</td>")

            })
            //$("#selectedUser").html(msg);
        }
    });
}
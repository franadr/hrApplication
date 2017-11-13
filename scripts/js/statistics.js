
$(function() {
    var facStatsCount =[];
    var catCount = [];
    var avgsal = [];
    var dps = [{label:"l1",y:10},{label:"l2",y:10}];

    var chart = new CanvasJS.Chart("facultyCount", {
        title:{
            text:"NUMBER OF STAFF PER FACULTIES"
        },
        axisY:{
            title:"# STAFF",
        },
        axisX:{
            title:"UNITS NAME",
        },

        data: [
            {
                dataPoints: facStatsCount
            }
        ]
    });
    var chart1 = new CanvasJS.Chart("catcount", {
        title:{
            text:"NUMBER PER CATEGORIES"
        },
        axisY:{
            title:"# STAFF",
        },
        axisX:{
            title:"CATEGORY NAME",
        },

        data: [
            {
                dataPoints: catCount
            }
        ]
    });
    var chart2 = new CanvasJS.Chart("salavg", {
        title:{
            text:"AVERAGE SALARY PER FACULTY"
        },
        axisY:{
            title:"SALARY €",
        },
        axisX:{
            title:"CATEGORY NAME",
        },

        data: [
            {
                dataPoints: avgsal
            }
        ]
    });


    $.ajax({
        type: "POST",
        url: "../scripts/php/dbscripts.php",
        data:{"method":"facultyCount"},
        success: function(msg){
            var arr = [];
            var facCount = JSON.parse(msg);
            for(var x in facCount){
                arr.push(facCount[x]);
            }


            for(var i = 0 ; i<arr.length;i++) {
                console.log(arr[i].faculty_name);
                facStatsCount.push({ label: arr[i].faculty_name,  y: Number(arr[i].staffcount)  });
            }
            console.log(facStatsCount);
            chart.render();
        }
    });

    $.ajax({
        type: "POST",
        url: "../scripts/php/dbscripts.php",
        data:{"method":"catcount"},
        success: function(msg){
            var arr = [];
            var catcount = JSON.parse(msg);
            for(var x in catcount){
                arr.push(catcount[x]);
            }


            for(var i = 0 ; i<arr.length;i++) {

                catCount.push({ label: arr[i].category,  y: Number(arr[i].catcount)  });
            }
            console.log(facStatsCount);
            chart1.render();
        }
    });

    $.ajax({
        type: "POST",
        url: "../scripts/php/dbscripts.php",
        data:{"method":"salaryavg"},
        success: function(msg){
            console.log(msg);
            var arr = [];
            var salcount = JSON.parse(msg);
            for(var x in salcount){
                arr.push(salcount[x]);
            }


            for(var i = 0 ; i<arr.length;i++) {

                avgsal.push({ label: arr[i].faculty_name,  y: Number(arr[i].salary)  });
            }

            chart2.render();
        }
    });




});
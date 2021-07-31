

var barColors = ["red", "green","blue","orange","brown"];



$(document).ready(function() {
    $.ajax({
        url: BASE_URL+ "kawasan_permukiman/lokasi_kumuh/get_graph",
        type: "GET",
        dataType: "json",
        success: function(data) {
            console.log(data);
            var xValues = [];
            var yValues = [];
            var barColors = [];
            for (var i in data) {
                xValues.push(data[i].name);
                yValues.push(data[i].luas);
                
            }
            // chart nya mulai darisini
            new Chart("luasKawasan", {
                type: "bar",
                
                data: {
                  labels: xValues,
                  datasets: [{
                    backgroundColor: barColors,
                    data: yValues,
                    backgroundColor: '#4e73df',
                    hoverBackgroundColor: '#2e59d9',
                    hoverBorderColor: "rgba(234, 236, 244, 1)"
                  }]
                },
                
                options: {
                  legend: {display: false},
                  responsive:true,
                  maintainAspectRatio: false  
                }
              });
              // chart nya mulai darisini
        }
    });
});


var barColors = ["red", "green","blue","orange","brown"];



$(document).ready(function() {
    $.ajax({
        url: BASE_URL+ "kawasan_permukiman/lokasi_kumuh/get_graph",
        type: "GET",
        dataType: "json",
        success: function(data) {
            console.log(data);
            var xValues = [];
            var y1Values = [];
            var y2Values = [];
            var barColors = [];
            for (var i in data) {
                xValues.push(data[i].name);
                y1Values.push(data[i].luas);
                y2Values.push(data[i].luas_tertangani);
                
            }
            // chart nya mulai darisini
            new Chart("luasKawasan", {
                type: "bar",
                
                data: {
                  labels: xValues,
                  datasets: [{
                    label: "Luas Existing",
                    backgroundColor: barColors,
                    data: y1Values,
                    backgroundColor: '#4e73df'
        
                  },
                  {
                    label: "Penanganan",
                    backgroundColor: barColors,
                    data: y2Values,
                    backgroundColor: '#1CC88A'
                   
                    
                  }
                
                ]
                },
                
                options: {
                  legend: {display: true},
                  responsive:true,
                  maintainAspectRatio: false,
                  scales: {
                    xAxes:[
                      {
                        gridLines: {
                          display: false,
                          drawBorder: false
                        },
                        maxBarThickness: 25
                      }
                    ],
                    yAxes: [{
                      ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                      
                      }}]
                    
                    
                  }
                  
                 
                }
              });
              // chart nya mulai darisini
        }
    });
});
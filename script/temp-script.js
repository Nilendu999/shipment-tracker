console.log("temp_start..123..")
window.onload = function () {

    var dps = []; // dataPoints
    var chart = new CanvasJS.Chart("chartContainer", {
        title :{
            text: "Temperature"
        },
        data: [{
            type: "line",
            dataPoints: dps
        }]
    });
    
    var xVal = 0;
    var yVal = 30; 
    var updateInterval = 1000;
    var dataLength = 5; // number of dataPoints visible at any point
    
    var updateChart = function (count) {
    
        count = count || 1;
    
        for (var j = 0; j < count; j++) {
            yVal = yVal +  (0.075*Math.round(1 + Math.random() *(-1-1)));
            dps.push({
                x: xVal,
                y: yVal
            });
            xVal++;
        }
    
        // if (dps.length > dataLength) {
        //     dps.shift();
        // }
    
        chart.render();
    };
    
    updateChart(dataLength);
    setInterval(function(){updateChart()}, updateInterval);
    
    }
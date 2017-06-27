/**
 * Created by NicolasLEROY on 27/06/2017.
 */

var ctx = document.getElementById('myChart').getContext('2d');
var data =
    {
        labels : [],
        datasets :
            [{
                label: "Nombres de vues",
                backgroundColor: 'rgba(255, 0, 0, 0.4)',
                borderColor: 'rgb(255, 99, 132)',
                data : []
            }]
    };
var options =
    {
        scales: {
            xAxes: [{
                gridLines: {
                    offsetGridLines: true
                }
            }]
        }
    };

var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
});

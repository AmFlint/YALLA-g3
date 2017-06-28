/**
 * Created by NicolasLEROY on 27/06/2017.
 */

var ctx = document.getElementById('myChart').getContext('2d');
var data =
    {
        labels : ["mai", "mars", 'février'],
        datasets :
            [{
                label: "Nombre de vues",
                backgroundColor: ['rgba(255, 0, 0, 0.4)',
                                  'rgba(0, 200, 100, 0.4)',
                                  'rgba(0, 0, 255, 0.4)',
                                  'rgba(60, 0, 255, 0.4)',
                                  'rgba(60, 120, 255, 0.4)'],
                borderColor: 'lightgrey',
                data : [0, 2, 18]
            }]
    };
var options =
    {
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Mois'
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    beginAtZero: true,
                    steps: 10,
                    stepValue: 5,
                    max: 500
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Vues'
                }
            }]
        }
    };

var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
});

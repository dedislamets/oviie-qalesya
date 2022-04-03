$(function(){

   
    function apexChartFifth() {
        let options = {
            series: [{
                name: 'Users',
                type: 'area',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'Sessions',
                type: 'line',
                data: [86, 96, 84, 62, 44, 52, 41]
            }],
            chart: {
                toolbar: {
                    show: false
                },
                height: 300,
            },
            grid: {
                padding: {
                    right: 20,
                    left: -10
                },
                xaxis: {
                    lines: {
                        show: false,
                    }
                }
            },
            colors: [Sing.colors['brand-warning'], Sing.colors['black']],
            fill: {
                colors: [ '#fff5e0' ]
            },
            stroke: {
                width: [4, 4],
                opacity: 0.5,
                colors: [Sing.colors['brand-warning'], Sing.colors['black']],
                curve: 'smooth'
            },

            labels: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'
            ],
            legend: {
                position: 'top',
                horizontalAlign: 'center',
                markers: {
                    fillColors :[Sing.colors['brand-warning'], Sing.colors['black']]
                }
            },
            yaxis: {
                labels: {
                    show: true,
                    style: {
                        colors: ['#898280','#898280','#898280','#898280','#898280'],
                        fontSize: '12px',
                    },
                    offsetX: -20,
                    offsetY: 0,
                },
                tickAmount: 4,
                padding: {
                    left: -20
                },
            },
            xaxis: {
                labels: {
                    style: {
                        colors: ['#898280','#898280','#898280','#898280','#898280','#898280','#898280'],
                        fontSize: '12px',
                    }
                }
            }
        };

        let chart = new ApexCharts(document.querySelector("#fifth-apex-chart"), options);
        chart.render();
    }

    function setDateToDropDown() {
        let button = $('#dropdownMenu');
        button.text(moment().format("Do MMM YYYY"));
        $('.dashboard-buttons .dropdown .dropdown-item').each(
            function(i, elem) {
                $(elem).text(moment().add(i + 1, 'd').format("Do MMM YYYY"))
            }
        )
    }

    function pjaxPageLoad(){
        $('.widget').widgster();
        apexChartFifth();
        setDateToDropDown();
    }

    pjaxPageLoad();
    SingApp.onPageLoad(pjaxPageLoad);

});
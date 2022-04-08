<script src="<?= base_url() ?>assets/js/visit.js"></script>
<script type="text/javascript">

	function apexChartFifth() {

        let options = {
        	// series: chartData;
            series: [{
                	name: 'Total Qty',
                	type: 'area',
                	data: <?php echo $chart_total; ?>
            	}, 
            	// {
             //    	name: 'Sessions',
             //    	type: 'line',
             //    	data: [86, 96, 84, 62, 44, 52, 41]
            	// }
            ],
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
            // colors: [Sing.colors['brand-warning'], Sing.colors['black']],
            fill: {
                colors: [ '#fff5e0' ]
            },
            stroke: {
                width: [4, 4],
                opacity: 0.5,
                // colors: [Sing.colors['brand-warning'], Sing.colors['black']],
                curve: 'smooth'
            },

            labels: <?php echo $chart_label; ?>,
            legend: {
                position: 'top',
                horizontalAlign: 'center',
                markers: {
                    // fillColors :[Sing.colors['brand-warning'], Sing.colors['black']]
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
	apexChartFifth();
</script>
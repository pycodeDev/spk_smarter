<script>
    // Create the chart
    var aa = <?php echo $graph; ?>;
    var a = [];
    for (let index = 0; index < aa.length; index++) {
        aaa = {
            name: aa[index]['name'],
            y: parseFloat(aa[index]['y'])
        }
        a.push(aaa)

    }
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data Hasil Perangkingan'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total Nilai'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.5f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.3f}%</b> of total<br/>'
        },

        series: [{
            name: "Perusahaan",
            colorByPoint: true,
            data: a
        }]
    });
</script>
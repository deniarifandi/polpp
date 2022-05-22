

<figure class="highcharts-figure">
  <div style="padding: 10px">
    <div id="grafik_lokasi_pelanggaran" style="padding: 25px; margin: 0px"></div>
  </div>
    
    
</figure>


<script>
Highcharts.chart('grafik_lokasi_pelanggaran', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Grafik Lokasi Pelanggaran Per-Kecamatan'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        data: [
            ['Blimbing', 40.0],
            ['Kedungkandang', 26.8],
            ['Klojen', 8.5],
            ['Lowokwaru', 6.2],
            ['Sukun', 4]
        ]
    }]
});
</script>
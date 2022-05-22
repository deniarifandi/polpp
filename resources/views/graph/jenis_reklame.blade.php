
<figure class="highcharts-figure">
  <div style="padding: 10px">
    <div id="grafik_jenis_reklame" style="padding: 25px; margin: 0px"></div>
  </div>
    
    
</figure>
  

<script type="text/javascript">

  Highcharts.chart('grafik_jenis_reklame', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'jenis reklame'
    },
    subtitle: {
        text: 'Source: Database SatPol PP Kota Malang'
    },
    xAxis: {
        categories: [
            'Jumlah Pelanggaran'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
    {
        name: ['Spanduk'],
        data: [17]
    },
    {
        name: ['Baliho'],
        data: [35]
    },{
        name: ['Banner'],
        data: [4]
    }

    ]
});
</script>

<figure class="highcharts-figure">
  <div style="padding: 10px">
    <div id="grafik_jenis_tindak_lanjut_reklame" style="padding: 25px; margin: 0px"></div>
  </div>
    
    
</figure>
  

<script type="text/javascript">

  Highcharts.chart('grafik_jenis_tindak_lanjut_reklame', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'jenis tindak lanjut reklame'
    },
    subtitle: {
        text: 'Source: Database SatPol PP Kota Malang'
    },
    xAxis: {
        categories: [
            'Jumlah tindak lanjut'
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
        name: ['Diamankan di kantor SatPolPP kota Malang'],
        data: [19]
    },
    {
        name: ['Diambil Oleh Pemiliknya'],
        data: [7]
    },{
        name: ['Diserahkan ke PPNS untuk di BAP'],
        data: [9]
    },{
        name: ['Pemberian surat peringatan'],
        data: [7]
    }

    ]
});
</script>
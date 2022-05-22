

<figure class="highcharts-figure">
  <div style="padding: 10px">
    <div id="grafik_total_kegiatan" style="padding: 25px; margin: 0px"></div>
  </div>
    
    
</figure>
  

<script type="text/javascript">

  Highcharts.chart('grafik_total_kegiatan', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'perbandingan tipe pelanggaran per bulan'
    },
    subtitle: {
        text: 'Source: Database SatPol PP Kota Malang'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Pelanggaran'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
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
    series: [{
        name: 'Reklame',
        data: [15, 67, 76, 24,72]

    },{
        name: 'PKL',
        data: [31, 23.5, 45, 89, 26]

    },
    {
        name: 'AnJal-GePeng',
        data: [57, 74, 64,98,68]

    },{
        name: 'PSK',
        data: [15, 67, 76, 24,72]

    },{
        name: 'Minol',
        data: [31, 23, 48, 89, 26]

    },
    {
        name: 'Pemondokan',
        data: [37, 74, 44,24,56]

    },{
        name: 'Parkir Liar',
        data: [52, 74, 44,26,68]

    },{
        name: 'Prokes',
        data: [87, 74, 64,78,58]

    }]
});
</script>
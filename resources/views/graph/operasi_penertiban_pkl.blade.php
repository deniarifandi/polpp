
<figure class="highcharts-figure">
  <div style="padding: 10px">
    <div id="grafik_operasi_penertiban_pkl" style="padding: 25px; margin: 0px"></div>
  </div>
    
    
</figure>
  

<script type="text/javascript">

  Highcharts.chart('grafik_operasi_penertiban_pkl', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Akumulasi tipe pelanggaran'
    },
    subtitle: {
        text: 'Source: Database SatPol PP Kota Malang'
    },
    xAxis: {
        categories: [
            'Reklame',
            'PKL',
            'AnJal-GePeng',
            'PSK',
            'Minol',
            'Pemondokan',
            'Parkir Liar',
            'Prokes'
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
        name: 'Reklame',
        data: [17]

    }, {
        name: 'PKL',
        data: [26]

    }, {
        name: 'AnJal-GePeng',
        data: [48]

    }, {
        name: 'PSK',
        data: [36]
    },{
        name: 'Minol',
        data: [43]
    },{
        name: 'Pemondokan',
        data: [35]
    },{
        name: 'Parkir Liar',
        data: [89]
    },{
        name: 'Prokes',
        data: [34]
    }

    ]
});
</script>
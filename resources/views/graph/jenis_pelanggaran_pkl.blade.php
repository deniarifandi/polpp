

<figure class="highcharts-figure">
  <div style="padding: 10px">
    <div id="jenis_pelanggaran_pkl" style="padding: 25px; margin: 0px"></div>
  </div>
    
    
</figure>


<script>
Highcharts.chart('jenis_pelanggaran_pkl', {
  chart: {
        type: 'column'
    },
    title: {
        text: 'jenis pelanggaran reklame'
    },
    subtitle: {
        text: 'Source: Database SatPol PP Kota Malang'
    },
    xAxis: {
        categories: [
            'Jumlah Pelanggaran Reklame'
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
        name: ['Jabong / Izin Habis'],
        data: [4]
    },
    {
        name: ['Lokasi Larangan'],
        data: [19]
    },{
        name: ['Memasang di Tiang Listrik'],
        data: [9]
    },{
        name: ['Paku Pohon'],
        data: [7]
    },{
        name: ['Rusak'],
        data: [3]
    },{
        name: ['Tidak Ada Ijin'],
        data: [24]
    }

    ]
});
</script>
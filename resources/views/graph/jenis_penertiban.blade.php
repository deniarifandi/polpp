{{-- 
<figure class="highcharts-figure">
  <div style="padding: 0px">
    <div id="grafik_jenis_penertiban" style="padding: 0px; margin: 0px"></div>
  </div>
    
    
</figure>
  

<script type="text/javascript">

  Highcharts.chart('grafik_jenis_penertiban', {
    chart: {
        type: 'column',
        padding: [0,0,0,0]
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
</script> --}}




<figure class="highcharts-figure">

  <div style="padding: 10px">
    <div id="grafik_jenis_penertiban" style="padding: 25px; margin: 0px"></div>
  </div>
    

    
</figure>
  

<script type="text/javascript">

    var tahun = @php echo date("Y"); @endphp;
        
      @php

        if (isset($_GET['tahun'])) {
            @endphp
             tahun = "@php echo $_GET['tahun']; @endphp";
            @php
        }else{
            @endphp
             tahun = 2022;
            @php
        }
      @endphp

      document.getElementById("tahun").value = tahun;

</script>


<script type="text/javascript">



    Highcharts.getJSON('{{URL::to("/")}}/laporan/api_jenis_penertiban/'+tahun, function(data) {
          var seriesData = [];

          for (var i = 0; i < data.length; i++) {
            
            try{
                seriesData[i] = data[i]["data"];
            }catch(error){
                seriesData[i] = 0;
            }

            
          }

          // Create the chart
          Highcharts.chart('grafik_jenis_penertiban', {
                    chart: {
                type: 'column'
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
            rangeSelector: {
              selected: 1
            },

            title: {
              text: 'Akumulasi Tipe Pelanggaran Tahun '+tahun
            },
             subtitle: {
                text: 'Source: Database SatPol PP Kota Malang'
            },

            series: [
                {
                    name: 'Reklame',
                    data: [seriesData[0]]

                }, {
                    name: 'PKL',
                    data: [seriesData[1]]

                }, {
                    name: 'AnJal-GePeng',
                    data: [seriesData[2]]

                }, {
                    name: 'PSK',
                    data: [seriesData[3]]
                },{
                    name: 'Minol',
                    data: [seriesData[4]]
                },{
                    name: 'Pemondokan',
                    data: [seriesData[5]]
                },{
                    name: 'Parkir Liar',
                    data: [seriesData[6]]
                },{
                    name: 'Prokes',
                    data: [seriesData[7]]
                }

                ],
            });
        });




</script>
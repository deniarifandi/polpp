


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
                    data: [parseFloat(seriesData[0])]

                }, {
                    name: 'PKL',
                    data: [parseFloat(seriesData[1])]

                }, {
                    name: 'AnJal-GePeng',
                    data: [parseFloat(seriesData[2])]

                }, {
                    name: 'PSK',
                    data: [parseFloat(seriesData[3])]
                },{
                    name: 'Minol',
                    data: [parseFloat(seriesData[4])]
                },{
                    name: 'Pemondokan',
                    data: [parseFloat(seriesData[5])]
                },{
                    name: 'Parkir Liar',
                    data: [parseFloat(seriesData[6])]
                },{
                    name: 'Prokes',
                    data: [parseFloat(seriesData[7])]
                }

                ],
            });
        });




</script>
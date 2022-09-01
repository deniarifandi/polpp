

<figure class="highcharts-figure">

  <div style="padding: 10px">
    <div id="grafik_total_kegiatan" style="padding: 25px; margin: 0px"></div>
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

      try{
        document.getElementById("tahun").value = tahun;  
      }catch(err){
        
      }

      

</script>


<script type="text/javascript">



    Highcharts.getJSON('{{URL::to("/")}}/laporan/api_total_kegiatan/'+tahun, function(data) {
          var seriesData = [];

          // Create the chart
          Highcharts.chart('grafik_total_kegiatan', {
                    chart: {
                type: 'column'
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
            rangeSelector: {
              selected: 1
            },

            title: {
              text: 'Perbandingan Tipe Pelanggaran Tahun '+tahun
            },
             subtitle: {
                text: 'Source: Database SatPol PP Kota Malang'
            },

            series: data,
            });
        });


</script>
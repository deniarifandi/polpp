


<figure class="highcharts-figure">

  <div style="padding: 10px">
    <div id="grafik_lokasi_pelanggaran_prokes" style="padding: 25px; margin: 0px"></div>
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

        var seriesData = [];



        Highcharts.getJSON('{{URL::to("/")}}/laporan/api_lokasi_pelanggaran_prokes/'+tahun, function(data) {
            
              var seriesData = [];

              for (var i = 0; i < data.length; i++) {
                
                try{
                    seriesData.push({
                        name : data[i].name,
                        y : parseFloat(data[i].y)
                    });
                }catch(error){
                    seriesData[i] = 0;
                }

                    // console.log(seriesData);
              }    

             Highcharts.chart('grafik_lokasi_pelanggaran_prokes', {
                    chart: {
                        type: 'pie',
                        options3d: {
                            enabled: true,
                            alpha: 45,
                            beta: 0
                        }
                    },
                    title: {
                        text: 'Lokasi Pelanggaran prokes Tahun '+tahun
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
                            depth: 30,
                            dataLabels: {
                                enabled: true,
                                format: '{point.name}'
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Prosentase',
                        data: seriesData
                        
                    }]
                });

            
        });


</script>
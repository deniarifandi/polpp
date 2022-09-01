
<figure class="highcharts-figure">
  <div style="padding: 10px">
    <div id="grafik_jenis_pelanggaran_reklame" style="padding: 25px; margin: 0px"></div>
  </div>
    
    
</figure>
  

<script type="text/javascript">




    Highcharts.getJSON('{{URL::to("/")}}/laporan/api_jenis_pelanggaran_reklame/'+tahun, function(data) {
        

            var seriesData = [];

            for (var i = 0; i < data.length; i++) {
                
                try{
                    seriesData.push({
                        name : data[i].name,
                        data :  [parseFloat(data[i].data)]
                    });
                }catch(error){
                    seriesData[i] = 0;
                }

                    // console.log(seriesData);
            }    

          Highcharts.chart('grafik_jenis_pelanggaran_reklame', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'jenis pelanggaran tiap reklame'
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
                    text: 'Jumlah Pelanggaran'
                }
            },
           
            
            series: seriesData
        });

    });




</script>
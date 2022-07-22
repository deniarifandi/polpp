
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <style>
table, th, td {
  border:1px solid black;
}
</style>


              
                <table class="table" >
                
                <tbody>
                    <tr>
                      <th colspan="3">DETAIL LAPORAN PELANGGARAN</th>
                    </tr>
                  <tr>
                    <th>Id Laporan</th>
                    <td>
                     {{$pelanggaran[0]->id}}
                    </td>
                    <td rowspan="10">
                      <a href="" target="_blank"><img src="{{  asset('/storage/'.$foto_laporan[0]) }}" style="max-width: 400px"></a>
                  
                    </td>
                  </tr>
                  <tr>
                    <th>Nama Pelapor</th>
                    <td>
                     {{$pelanggaran[0]->nama}}
                    </td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>
                     {{$pelanggaran[0]->email}}
                    </td>
                  </tr>
                  <tr>
                    <th>NIK</th>
                    <td>
                     {{$pelanggaran[0]->id}}
                    </td>
                  </tr>
                  <tr>
                    <th>Judul</th>
                    <td>
                     {{$pelanggaran[0]->subjek}}
                    </td>
                  </tr>
                   <tr>
                    <th>Pesan</th>
                    <td>
                     {{$pelanggaran[0]->pesan}}
                    </td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td>
                     {{$pelanggaran[0]->status}}
                    </td>
                  </tr>
                   <tr>
                    <th>Peta Lokasi :</th>
                  </tr>
                  <tr>
                    @if(isset($pelanggaran[0]->longitude))
                    <td colspan="2"> <div id="map"></div></td>
                    @else
                    <td style="color: red">Map Tidak Ditemukan</td>
                    @endif
                  </tr>
                  
     
                </tbody>
              </table>
         
    <style>

#map {height: 250px; width: 300px; }
</style>

    <script type="text/javascript">
        

      function submitFoto($this){
        
        document.getElementById("inputFoto").style.display= "none";
        document.getElementById("loadingFoto").style.display = "block";

        $this.form.submit();
        
      };

      mapboxgl.accessToken = 'pk.eyJ1IjoiYXJpZmFuZGlkZW5pIiwiYSI6ImNsMzZvNXZxejEzbHAzY3FzcmpuNzNrbm0ifQ.-XX0gvG2ooyVnJvZZHg9Hg';
          const map = new mapboxgl.Map({
          container: 'map', // container ID
          style: 'mapbox://styles/mapbox/streets-v11', // style URL
          center: [{{ $pelanggaran[0]->longitude }}, {{ $pelanggaran[0]->latitude }}], // starting position [lng, lat]
          zoom: 15 // starting zoom
        });

      (function() {
        console.log("test");
         const marker1 = new mapboxgl.Marker()
          .setLngLat([{{ $pelanggaran[0]->longitude }}, {{ $pelanggaran[0]->latitude }}])
          .addTo(map);
       
       //  map.flyTo({center:[{{ $pelanggaran[0]->longitude }}, {{ $pelanggaran[0]->latitude }}]});

      })();
  
        
    </script>

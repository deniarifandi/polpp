

  <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />
    
      <style>
table, th, td {
  border:1px solid black;
}

img{
  max-width: 400px;
}
</style>



    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    

              <h5 class="card-title">Detail Pelanggaran</h5>
                <table class="table">
                
                <tbody>
                  <tr>
                    <th>Jenis Laporan</th>
                    <td>
                      @if($pelanggaran->id_jenis_laporan == 1)
                        Laporan Hasil Kegiatan (LHK)
                      @elseif($pelanggaran->id_jenis_laporan == 2)
                        Laporan Kegiatan Harian (LKH)
                      @else
                        Cek Hasil Laporan
                      @endif
                    </td>
                   
                    
                  </tr>



                  <tr>
                    <th>Regu</th>
                    <td>{{ $pelanggaran->regu }}</td>
                  </tr>
                  <tr>
                    <th>Tanggal</th>
                    <td>{{ $pelanggaran->tgl_peristiwa }}</td>
                  </tr>
                  <tr>
                    <th>Kegiatan</th>
                    <td>{{ $pelanggaran->kegiatan }}</td>
                  </tr>

                  @if($pelanggaran->id_kegiatan == 1)
                  {{-- REKLAME --}}
                  <tr>
                    <th>Tema Reklame : </th>
                    <td>{{ $pelanggaran->tema_reklame }}</td>                   
                  </tr>
                  <tr>
                    <th>Pemilik / Vendor :</th>
                    <td>{{ $pelanggaran->pemilik }}</td>
                  </tr>
                   <tr>
                    <th>Jenis Reklame: </th>
                    <td>{{ $pelanggaran->jenis_reklame }}</td>
                  </tr>
                  <tr>
                    <th>Jumlah Reklame: </th>
                    <td>{{ $pelanggaran->jumlah_reklame }}</td>
                  </tr>
                  {{-- END REKLAME --}}
                  @elseif($pelanggaran->id_kegiatan == 2)
                  {{-- PKL --}}
                  <tr>
                    <th>Jenis PKL</th>
                    <td>{{ $pelanggaran->pkl }}</td>
                  </tr>

                  <tr>
                    <th>Nama Pelaku Usaha</th>
                    <td>{{ $pelanggaran->pkl_nama }}</td>
                  </tr>

                  <tr>
                    <th>No Identitas</th>
                    <td>{{ $pelanggaran->pkl_no_identitas }}</td>
                  </tr>

                  <tr>
                    <th>Alamat Pelaku Usaha</th>
                    <td>{{ $pelanggaran->pkl_alamat }}</td>
                  </tr>
                  {{-- END PKL --}}
                  @elseif($pelanggaran->id_kegiatan == 3)
                  {{-- ANJAL --}}
                  <tr>
                    <th>Jenis AnJal-GePeng</th>
                    <td>{{ $pelanggaran->anjalgepeng }}</td>
                  </tr>

                  <tr>
                    <th>Nama AnJal-GePeng</th>
                    <td>{{ $pelanggaran->anjal_gepeng_nama }}</td>
                  </tr>

                  <tr>
                    <th>No Identitas</th>
                    <td>{{ $pelanggaran->anjal_gepeng_no_identitas }}</td>
                  </tr>
                  {{-- END ANJAL --}}
                  @elseif($pelanggaran->id_kegiatan == 4)  
                  {{-- START PSK --}}

                      <tr>
                        <th>Nama PSK</th>
                        <td>{{ $pelanggaran->psk_nama }}</td>
                      </tr>

                      <tr>
                        <th>No Identitas</th>
                        <td>{{ $pelanggaran->psk_no_identitas }}</td>
                      </tr>
                  {{-- END PSK --}}
                  @elseif($pelanggaran->id_kegiatan == 5)  
                  {{-- START MINOL --}}

                      <tr>
                        <th>Nama Pelanggar MINOL</th>
                        <td>{{ $pelanggaran->minol_nama }}</td>
                      </tr>

                      <tr>
                        <th>No Identitas</th>
                        <td>{{ $pelanggaran->minol_no_identitas }}</td>
                      </tr>
                  {{-- END Minol --}}
                  @elseif($pelanggaran->id_kegiatan == 6)  
                  {{-- START Pemondokan --}}

                      <tr>
                        <th>Nama Pemondokan</th>
                        <td>{{ $pelanggaran->pemondokan_nama }}</td>
                      </tr>

                      <tr>
                        <th>No Identitas</th>
                        <td>{{ $pelanggaran->pemondokan_no_identitas }}</td>
                      </tr>
                  {{-- END PSK --}}
                  @elseif($pelanggaran->id_kegiatan == 7)  
                  {{-- START Parkirliar --}}

                      <tr>
                        <th>Nama Parkir Liar</th>
                        <td>{{ $pelanggaran->parkir_nama }}</td>
                      </tr>

                      <tr>
                        <th>No Identitas</th>
                        <td>{{ $pelanggaran->parkir_no_identitas }}</td>
                      </tr>
                  {{-- END Parkirliar --}}
                  @elseif($pelanggaran->id_kegiatan == 8)
                    <tr>
                      <th>Jenis Penertiban Prokes</th>
                      <td>{{ $pelanggaran->prokes }}</td>
                    </tr>
                    <tr>
                      <th>Jenis Pelaku Usaha</th>
                      @if($pelanggaran->id_jenis_pelaku_usaha)
                        <td>Perseorangan</td>
                      @elseif($pelanggaran->id_jenis_pelaku_usaha){
                        <td>Perseorangan</td>
                      }
                      @else
                        <td>Null</td>
                      @endif
                    </tr>
                    <tr>
                      <th>Nama</th>
                      <td>{{ $pelanggaran->prokes_nama }}</td>
                    </tr>
                    <tr>
                      <th>No. Identitas</th>
                      <td>{{ $pelanggaran->prokes_no_identitas }}</td>
                    </tr>
                  @endif

                  <tr>
                    <th>Jenis Pelanggaran : </th>
                    <td>
                      @foreach($jenisPelanggarans as $jenisPelanggaran)
                        {{ $jenisPelanggaran->nama }}<br>
                      @endforeach
                    </td>
                  </tr>
                  <tr>
                    <th>Tindak Lanjut : </th>
                    <td>{{ $pelanggaran->tindak_lanjut }}</td>                   
                  </tr>
                  <tr>
                    <th>Lokasi : </th>
                    <td>{{ $pelanggaran->alamat }}</td>                   
                  </tr>
                  <tr>
                    <th>Foto Lokasi :</th>
                    @if(isset($foto_lokasi[0]))
                    <td><a href="{{  asset('/storage/'.$foto_lokasi[0]) }}" target="_blank"><img src="{{  asset('/storage/'.$foto_lokasi[0]) }}" style="width: 100%; max-width: 300px"></a></td>
                    @else
                    <td style="color: red">Foto Tidak Ditemukan</td>
                    @endif
                  </tr>
                  <tr>
                    <th>Koordinat : </th>
                    <td>{{ $pelanggaran->lat }} , {{ $pelanggaran->lon }}</td>                   
                  </tr>
                  <tr>
                    <th>Peta Lokasi :</th>
                    @if(isset($pelanggaran->lat))
                    <td> <div id="map"></div></td>
                    @else
                    <td style="color: red">Map Tidak Ditemukan</td>
                    @endif
                  </tr>

                  <tr>
                    <td colspan="2">
                      <a class="btn btn-primary" style="float: right;"{{--  href="{{ url('pelanggaran') }}/create?id_kegiatan={{ $pelanggaran->id_kegiatan }}&id={{ $pelanggaran->id }}" --}} onclick="underConstruction()">Edit</a>   
                    </td>
                  </tr>

                  <tr>
                    <th>Foto Sebelum</th>
                    <td>
                       @for($i = 0; $i< 5; $i++)

                        @if(isset($foto_sebelum[$i]))
                          <img src="{{  asset('/storage/'.$foto_sebelum[$i]) }}" style="max-width: 200px">
                          <br>
                        @else
                          
                        @endif

                        @endfor
                      </td>
                  </tr>
                  <tr>
                    <th>Foto Proses</th>
                    <td>
                       @for($i = 0; $i< 5; $i++)

                        @if(isset($foto_proses[$i]))
                          <img src="{{  asset('/storage/'.$foto_proses[$i]) }}" style="max-width: 200px">
                          <br>
                        @else
                          
                        @endif

                        @endfor
                      </td>
                  </tr>
                  <tr>
                    <th>Foto Sebelum</th>
                    <td>
                       @for($i = 0; $i< 5; $i++)

                        @if(isset($foto_setelah[$i]))
                          <img src="{{  asset('/storage/'.$foto_setelah[$i]) }}" style="max-width: 200px">
                          <br>
                        @else
                          
                        @endif

                        @endfor
                      </td>
                  </tr>
                </tbody>
              </table>
        
      
    <style>

#map {height: 250px; width: 100%; }
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
          center: [106.82332708986368,-6.160440512853471 ], // starting position [lng, lat]
          zoom: 15 // starting zoom
        });

      (function() {
        console.log("test");
         const marker1 = new mapboxgl.Marker()
          .setLngLat([{{ $pelanggaran->lon }}, {{ $pelanggaran->lat }}])
          .addTo(map);
       
         map.flyTo({center:[{{ $pelanggaran->lon }}, {{ $pelanggaran->lat }}]});

      })();
  
        
    </script>


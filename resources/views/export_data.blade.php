<!DOCTYPE html>
<html>
<head>
  <title>Data Pelanggaran</title>
</head>
<body>
  <style type="text/css">
  body{
    font-family: sans-serif;
  }
  table{
    margin: 20px auto;
    border-collapse: collapse;
  }
  table th,
  table td{
    border: 1px solid #3c3c3c;
    padding: 3px 8px;
 
  }
  a{
    background: blue;
    color: #fff;
    padding: 8px 10px;
    text-decoration: none;
    border-radius: 2px;
  }
  
  </style>
 
  <?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data Pelanggaran.xls");
  ?>
 
  <center>
    <h1>Export Data Pelanggaran<br/> </h1>
  </center>
  

  <table id="list_pelanggaran" border="1">
                            <thead>
                              <tr>
                                <th>ID Laporan</th>
                                
                                <th scope="col">Tanggal</th>
                                <th>Tema Reklame</th>
                                <th>Pemilik Reklame</th>
                                <th>Jenis Reklame</th>
                                

                                {{-- REKLAME --}}
                                {{-- @if($_GET['id_kegiatan']==1) --}}
                                
                                {{-- @endif --}}
                                {{-- ENDREKLAME --}}

                                
                                {{-- PKL --}}
                                
                                <th>Media PKL</th>
                                <th>Nama Pemilik</th>
                                <th>No.Identitas(NIK/No.SIM .dll)</th>
                                <th>Lokasi Pelanggaran</th>
                                {{-- END PKL --}}
                               

                                {{-- Anjal Gepeng --}}
                               
                                <th>Jenis Anjal/Gepeng</th>
                                <th>Nama</th>
                                <th>No.ID</th>

                               
                                {{-- Anjal Gepeng --}}

                                {{-- PSK --}}
                              
                                <th>Nama PSK</th>
                                <th>No. Identitas</th>
                            
                                {{-- PSK --}}

                                {{-- MINOL --}}
                                
                                <th>Nama</th>
                                <th>No. Identitas</th>
                                <th>Golongan</th>
                                <th>No.Ijin Operasional</th>
                               
                                {{-- MINOL --}}

                                 {{-- PEMONDOKAN --}}
                                
                                <th>Nama Pemondokan</th>
                                <th>No.Identitas</th>
                               
                                {{-- PEMONDOKAN --}}

                                {{-- PARKIR LIAR --}}
                               
                                <th>Nama Parkir Liar</th>
                                <th>No. Identitas</th>
                              
                                {{-- PARKIR LIAR --}}

                                {{-- PROKES --}}
                             
                                <th>Jenis Prokes</th>
                                <th>Nama Usaha</th>
                                <th>Nomor Surat</th>
                                <th>Nama Pelaku</th>
                                <th>No.Identitas</th>
                                
                                {{-- PROKES --}}

                             

                                <th scope="col">Jenis Pelanggaran</th>
                                <th>Tindak Lanjut</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              
                              @foreach($pelanggarans as $pelanggaran)
                                
                                <form id="deleteForm[{{ $pelanggaran->id }}]" style="max-width: 19px; margin: 0px" method="POST" action="{{ route('pelanggaran.destroy', $pelanggaran->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                               
                                </form>

                                <tr>
                                  <td>{{ $pelanggaran->id }}</td>
                                  
                                  <td>{{ date( "d-M-Y H:i:s", strtotime( $pelanggaran->created_at ) + 7 * 3600 ); }}</td>

                                  <td>{{ $pelanggaran->tema_reklame}}</td>
                                  <td>{{ $pelanggaran->nama_vendor }}</td>
                                  <td>{{ $pelanggaran->jenis_reklame }}</td>  


                                  {{-- REKLAME --}}
                                  {{-- @if($_GET['id_kegiatan']==1) --}}
                                  
                                  {{-- @endif --}}
                                  {{-- ENDREKLAME --}}

                                  {{-- PKL --}}
                                 
                                  <td>{{ $pelanggaran->jenis_pkl }}</td>
                                  <td>{{ $pelanggaran->pkl_nama }}</td>
                                  <td>{{ $pelanggaran->pkl_no_identitas }}</td>
                                  <td>{{ $pelanggaran->alamat }}</td>
                                  {{-- end PKL --}}
                              
                                  {{-- Anjal Gepeng --}}
                                
                                  <td>{{$pelanggaran->jenis_anjal}}</td>
                                  <td>{{$pelanggaran->anjal_gepeng_nama}}</td>
                                  <td>{{$pelanggaran->anjal_gepeng_no_identitas}}</td>
                                  
                                  {{-- Anjal Gepeng --}}

                                  {{-- PSK --}}
                             
                                  <td>{{$pelanggaran->psk_nama}}</td>
                                  <td>{{$pelanggaran->psk_no_identitas}}</td>
                            
                                  {{-- PSK --}}

                                  {{-- MINOL --}}
                      
                                  <td>{{ $pelanggaran->minol_nama }}</td>
                                  <td>{{ $pelanggaran->minol_no_identitas }}</td>
                                  <td>{{ $pelanggaran->psk_kelamin }}</td>
                                  <td>{{ $pelanggaran->pemondokan_no_identitas }}</td>
                                 
                                  {{-- MINOL --}}

                                   {{-- PEMONDOKAN --}}
                               
                                  <td>{{ $pelanggaran->pemondokan_nama }}</td>
                                  <td>{{ $pelanggaran->pemondokan_no_identitas }}</td>
                                 
                                  {{-- PEMONDOKAN --}}

                                  {{-- PARKIR LIAR --}}
                           
                                  <td>{{ $pelanggaran->parkir_nama }}</td>
                                  <td>{{ $pelanggaran->parkir_no_identitas }}</td>
                                  
                                  {{-- PARKIR LIAR --}}

                                  {{-- PROKES --}}
                             
                                  <th></th>
                                  <th>{{ $pelanggaran->parkir_no_identitas }}</th>
                                  <th>{{ $pelanggaran->parkir_nama }}</th>
                                  <th>{{ $pelanggaran->prokes_nama }}</th>
                                  <th>{{ $pelanggaran->prokes_no_identitas }}</th>
                                 
                                  {{-- PROKES --}}

                              

                                  <td>{{ $pelanggaran->nama_pelanggaran}}</td>
                                  <td>{{ $pelanggaran->nama_tindak_lanjut }}</td>
                                  
                                </tr>

                              @endforeach
                      
                            </tbody>

                          </table>


</body>
</html>
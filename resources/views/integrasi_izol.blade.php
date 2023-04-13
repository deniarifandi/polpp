
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')

  @include('style.table_style')

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <div class="pagetitle">
      <h1>Dashboard Integrasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard Integrasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Berhasil tambah Data Pelanggaran
      
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($message = Session::get('successhapus'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Berhasil hapus data pelanggaran
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
             <div class="card" style="min-width: 800px">
              <div class="card-body" >
                

                  <div class="table-responsive">
                        <div class="table-wrapper">     
                            <div class="table-title">
                                <div class="row">
                                   
                                    <div class="col-sm-3 offset-sm-2">
                                        <h2 class="text-center">Integrasi Data <b>Reklame </b></h2> 
                                    </div>

                                    <div class="col-sm-2">
                                      <div class="input-group mb-3">
                                        <input type="date" class="form-control" id="tgl_awal" value="{{ date('Y-m-d') }}">
                                      </div>
                                    </div>

                                    <div class="col-sm-2">
                                      <div class="input-group mb-3">
                                        <input type="date" class="form-control" id="tgl_akhir" value="{{ date('Y-m-d') }}">
                                      </div>
                                    </div>

                                    <div class="col-sm-2">
                                      <div class="input-group mb-3">
                                    <select name="jenis_reklame_dropdown" id="jenis_reklame_dropdown">
                                      <option value="PERMANEN">PERMANEN</option>
                                      <option value="INSIDENTIL">INSIDENTIL</option>
                                    </select>
                                      </div>
                                    </div>

                                   {{--  <div class="col-sm-1">
                                      <button class="btn btn-primary">Filter</button>
                                    </div> --}}
                                   
                                    <div class="col-sm-1" >
                                      <div class="input-group mb-3">
                                      <input type="text" class="form-control" id="inputCari" placeholder="Cari Data" aria-label="Recipient's username" aria-describedby="basic-addon2" style="margin-right: 15px; display: none;">
                                      <div class="input-group-append">
                                        <button class="btn btn-warning" type="button" id="tombolCari" onclick="search()"  ><i class="bi bi-search"></i>
                                        </button>
                                      </div>
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                              <div class="containers">
                                 <table class="table table-striped table-bordered table-sm">
                                <thead>
                                  <tr>
                                    <th class="col-1"> ID</th>
                                    <th class="col-2">No. Register</th>
                                    {{-- <th>Status Reklame</th> --}}
                                    <th class="col-2">Tema</th>
                                    <th class="col-1">Tgl. Berlaku Awal</th>
                                    <th class="col-1">Tgl. Berlaku Akhir</th>
                                    <th class="col-2">Alamat Reklame</th>
                                    <th class="col-2">Telepon Pemilik</th>
                                    <th class="col- 1">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @php $i = 0; @endphp
                                  @foreach($responses as $response)
                                  <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $response['no_register'] }}</td>
                                    {{-- <td>{{ $response[''] }}</td> --}}
                                    <td>{{ $response['tema'] }}</td>
                                    <td>{{ $response['berlaku_awal'] }}</td>
                                    <td>{{ $response['berlaku_akhir'] }}</td>
                                    <td>{{ $response['lokasi_izin_jalan'] }}</td>
                                    <td>{{ $response['telp_pemohon'] }}</td>

                                    <td>
                                      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$i}}" onclick="changeValueDetail({{ $i }})">Detail</button>
                                      <!-- Modal -->
              <div id="myModal{{$i}}" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Detail Value</h4>
                    </div>
                    <div class="modal-body">

                        nik : <p id="nik" style="margin-left:30px; font-weight: 800;">{{$response["nik"]}}</p>
nama_pemohon : <p id="nama_pemohon" style="margin-left:30px; font-weight: 800;">{{$response["nama_pemohon"]}}</p>
alamat : <p id="alamat" style="margin-left:30px; font-weight: 800;">{{$response["alamat"]}}</p>
telp_pemohon : <p id="telp_pemohon" style="margin-left:30px; font-weight: 800;">{{$response["telp_pemohon"]}}</p>
email_pemohon : <p id="email_pemohon" style="margin-left:30px; font-weight: 800;">{{$response["email_pemohon"]}}</p>
lokasi_izin_jalan : <p id="lokasi_izin_jalan" style="margin-left:30px; font-weight: 800;">{{$response["lokasi_izin_jalan"]}}</p>
lokasi_izin_no : <p id="lokasi_izin_no" style="margin-left:30px; font-weight: 800;">{{$response["lokasi_izin_no"]}}</p>
lokasi_izin_rt : <p id="lokasi_izin_rt" style="margin-left:30px; font-weight: 800;">{{$response["lokasi_izin_rt"]}}</p>
lokasi_izin_rw : <p id="lokasi_izin_rw" style="margin-left:30px; font-weight: 800;">{{$response["lokasi_izin_rw"]}}</p>
lokasi_izin_kec : <p id="lokasi_izin_kec" style="margin-left:30px; font-weight: 800;">{{$response["lokasi_izin_kec"]}}</p>
lokasi_izin_kel : <p id="lokasi_izin_kel" style="margin-left:30px; font-weight: 800;">{{$response["lokasi_izin_kel"]}}</p>
koordinat_lintang : <p id="koordinat_lintang" style="margin-left:30px; font-weight: 800;">{{$response["koordinat_lintang"]}}</p>
koordinat_bujur : <p id="koordinat_bujur" style="margin-left:30px; font-weight: 800;">{{$response["koordinat_bujur"]}}</p>
tema : <p id="tema" style="margin-left:30px; font-weight: 800;">{{$response["tema"]}}</p>
imb_yg_berlaku : <p id="imb_yg_berlaku" style="margin-left:30px; font-weight: 800;">{{$response["imb_yg_berlaku"]}}</p>
no_imb_reklame : <p id="no_imb_reklame" style="margin-left:30px; font-weight: 800;">{{$response["no_imb_reklame"]}}</p>
tgl_imb_reklame : <p id="tgl_imb_reklame" style="margin-left:30px; font-weight: 800;">{{$response["tgl_imb_reklame"]}}</p>
no_register : <p id="no_register" style="margin-left:30px; font-weight: 800;">{{$response["no_register"]}}</p>
no_sk : <p id="no_sk" style="margin-left:30px; font-weight: 800;">{{$response["no_sk"]}}</p>
tgl_entry : <p id="tgl_entry" style="margin-left:30px; font-weight: 800;">{{$response["tgl_entry"]}}</p>
berlaku_awal : <p id="berlaku_awal" style="margin-left:30px; font-weight: 800;">{{$response["berlaku_awal"]}}</p>
berlaku_akhir : <p id="berlaku_akhir" style="margin-left:30px; font-weight: 800;">{{$response["berlaku_akhir"]}}</p>
no_skpd : <p id="no_skpd" style="margin-left:30px; font-weight: 800;">{{$response["no_skpd"]}}</p>
id_billing : <p id="id_billing" style="margin-left:30px; font-weight: 800;">{{$response["id_billing"]}}</p>
status_bayar : <p id="status_bayar" style="margin-left:30px; font-weight: 800;">{{$response["status_bayar"]}}</p>
date_bayar : <p id="date_bayar" style="margin-left:30px; font-weight: 800;">{{$response["date_bayar"]}}</p>
nomor_pks : <p id="nomor_pks" style="margin-left:30px; font-weight: 800;">{{$response["nomor_pks"]}}</p>
tanggal_pks : <p id="tanggal_pks" style="margin-left:30px; font-weight: 800;">{{$response["tanggal_pks"]}}</p>
periode_awal : <p id="periode_awal" style="margin-left:30px; font-weight: 800;">{{$response["periode_awal"]}}</p>
periode_akhir : <p id="periode_akhir" style="margin-left:30px; font-weight: 800;">{{$response["periode_akhir"]}}</p>
DETAIL
<br>
Lokasi  : <p id="lokasi" style="margin-left:30px; font-weight: 800;">{{$response["DETAIL"][0]["lokasi"]}}</p>
Jumlah  : <p id="jumlah" style="margin-left:30px; font-weight: 800;">{{$response["DETAIL"][0]["jumlah"]}}</p>
Panjang  : <p id="panjang" style="margin-left:30px; font-weight: 800;">{{$response["DETAIL"][0]["panjang"]}}</p>
Lebar : <p id="lebar" style="margin-left:30px; font-weight: 800;">{{$response["DETAIL"][0]["lebar"]}}</p>

@if(isset($response["DETAIL"][0]["tinggi"]))

Tinggi  : <p id="tinggi" style="margin-left:30px; font-weight: 800;">{{$response["DETAIL"][0]["tinggi"]}}</p>
Cara Pasang : <p id="cara_pasang" style="margin-left:30px; font-weight: 800;">{{$response["DETAIL"][0]["cara_pasang"]}}</p>
@endif



Jenis Reklame : <p id="jenis_reklame" style="margin-left:30px; font-weight: 800;">{{$response["DETAIL"][0]["jenis_reklame"]}}</p>
                
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
                    
                                    </td>
                                  </tr>
                                  @php $i++; @endphp
                                  @endforeach
                                </tbody>
                              </table>
                              </div>
                              
                               
                  </div>
                </div>
              

              </div>
          </div>

        </div><!-- End Left side columns -->

        <!-- Right side columns -->
       
      </div>
    </section>



    <script type="text/javascript">
      
      function search(){

        var tgl_awal = document.getElementById("tgl_awal").value;
        var tgl_akhir  = document.getElementById("tgl_akhir").value;
        var jenis_reklame_dropdown = document.getElementById("jenis_reklame_dropdown").value;


        location.replace('{{URL::to('/')}}/administration/get_reklame?tgl_awal='+tgl_awal+'&tgl_akhir='+tgl_akhir+'&jenis_reklame='+jenis_reklame_dropdown);

      }

      function changeValueDetail(i){
        console.log("change value");

      }
      

       $(document).ready(function () {

        console.log("ready");

        var url = new URL(window.location.href);
        var tgl_awal = url.searchParams.get("tgl_awal");
        var tgl_akhir = url.searchParams.get("tgl_akhir");

        document.getElementById("tgl_awal").value = tgl_awal;
        document.getElementById("tgl_akhir").value = tgl_akhir;

      });

    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
      

     



    </script>

    @endsection
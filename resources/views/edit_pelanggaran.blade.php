
@extends('layouts.main')

@section('title','tambah pelanggaran')

@section('content')


<div class="pagetitle">
  <h1>Edit Data Pelanggaran</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">Blank</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Tambah Data Error {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

<section class="section">
  <div class="row">

    <div class="col-lg-12">
      <div class="card">

        <div class="card-body">

          <form action="{{ route('pelanggaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <input type="text" name="id" value="{{ $pelanggaran->id }}" style="display: none;">

            <h5 class="card-title" >Detail Laporan</h5>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Laporan</label>
             <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_jenis_laporan" readonly style="pointer-events: none;" disabled>
                  {{-- <option selected value="">- Pilih Jenis Laporan -</option> --}}
                  <option value="1" selected>Laporan Hasil Kegiatan (LHK)</option>
                  {{-- <option value="2">Laporan Kegiatan Harian(LKH)</option>
                  <option value="3">Cek Hasil Laporan</option> --}}
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Regu</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_regu" id="dropdown_regu"  onchange="checkSelected(1)">
                  <option selected value="">- Pilih Regu -</option>
                  {{-- <option value="tambahvalue">+ Tambah Regu +</option> --}}
                  @foreach($regus as $regu)
                  <option value="{{$regu->id}}">{{$regu->nama}}</option>
                  @endforeach
                </select>

                <input type="text" id="input_tambah_regu" class="form-control" name="input_tambah_regu" style="display: none" placeholder="Nama Regu Baru">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Tanggal</label>
              <div class="col-sm-8">
                <input type="date" name="tgl_peristiwa" class="form-control" value="{{$pelanggaran->tgl_peristiwa}}" readonly>
              </div>
            </div>
            <div class="row mb-3" style="display: none;">
              <label for="inputText" class="col-sm-4 col-form-label">Kegiatan</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" id="id_kegiatan" name="id_kegiatan" onchange="openForm()" readonly>
                  @if(isset($id_kegiatan))
                    <option value="{{$kegiatans[$id_kegiatan-1]->id}}" selected="selected">{{$kegiatans[$id_kegiatan-1]->nama}}</option>
                  @else
                    @foreach($kegiatans as $kegiatan)
                      <option value="{{$kegiatan->id}}">{{$kegiatan->nama}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>

          </div>
        </div>
      </div>

      {{-- start reklame --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($id_kegiatan)) @if($id_kegiatan != 1) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran</h5>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama/Tema Reklame</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="tema_reklame" value="{{ $pelanggaran->tema_reklame }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Pemilik / Vendor</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" id="dropdown_pemilik" name="id_pemilik" onchange="checkSelected(2)">
                  <option selected value="">- Pilih Pemilik -</option>
                  <option value="tambahvalue">+ Tambah Pemilik +</option>
                  @foreach($vendors as $vendor)
                  <option value="{{$vendor->id}}">{{$vendor->nama}}</option>
                  @endforeach
                </select>
                <input type="text" id="input_tambah_pemilik" class="form-control" name="input_tambah_pemilik" style="display: none" placeholder="Nama Pemilik Baru">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Reklame</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_jenis_reklame" id="dropdown_jenis_reklame"  onchange="checkSelected(3)">
                  <option selected value="">- Pilih Jenis Reklame -</option>
                  <option value="tambahvalue">+ Tambah Jenis Reklame +</option>
                  @foreach($jenis_reklames as $jenis_reklame)
                  <option value="{{$jenis_reklame->id}}">{{$jenis_reklame->nama}}</option>
                  @endforeach
                </select>
                <input type="text" id="input_tambah_jenis_reklame" class="form-control" name="input_tambah_jenis_reklame" style="display: none" placeholder="Jenis Reklame Baru">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Ukuran Reklame</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_ukuran_reklame" id="dropdown_ukuran_reklame" onchange="checkSelected(4)">
                  <option selected value="">- Pilih Ukuran Reklame -</option>
                  <option value="tambahvalue">+ Tambah Ukuran Baru +</option>
                  @foreach($ukuran_reklames as $ukuran_reklame)
                  <option value="{{$ukuran_reklame->id}}">{{$ukuran_reklame->nama}}</option>
                  @endforeach
                </select>
                <input type="text" id="input_tambah_ukuran_reklame" class="form-control" name="input_tambah_ukuran_reklame" style="display: none" placeholder="Jenis Ukuran Baru">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jumlah Reklame</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" name="jumlah_reklame" min="0" value="{{$pelanggaran->jumlah_reklame}}">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end reklame --}}

      {{-- start pkl --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($id_kegiatan)) @if($id_kegiatan != 2) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran PKL</h5>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis PKL</label>
              <div class="col-sm-8">
                 <select class="form-select" aria-label="Default select example" name="id_jenis_pkl" id="dropdown_jenis_pkl" onchange="checkSelected(5)">
                  <option selected value="">- Pilih Jenis PKL -</option>
                  <option value="tambahvalue">+ Tambah Jenis PKL Baru +</option>
                  @foreach($jenis_pkls as $jenis_pkl)
                  <option value="{{$jenis_pkl->id}}">{{$jenis_pkl->nama}}</option>
                  @endforeach
                </select>
                <input type="text" id="input_tambah_jenis_pkl" class="form-control" name="input_tambah_jenis_pkl" style="display: none" placeholder="Jenis PKL Baru">
              </div>
            </div>
           
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama Pelaku Usaha</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="pkl_nama" value="{{ $pelanggaran->pkl_nama }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="pkl_no_identitas" value="{{ $pelanggaran->pkl_no_identitas }}"> 
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Alamat Pelaku Usaha</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="pkl_alamat" value="{{ $pelanggaran->pkl_alamat }}">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end pkl --}}

      {{-- start anjal --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($id_kegiatan)) @if($id_kegiatan != 3) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran AnJal & GePeng</h5>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis AnJal / GePeng</label>
              <div class="col-sm-8">
                 <select class="form-select" aria-label="Default select example" name="id_jenis_anjal_gepeng" id="dropdown_jenis_anjal_gepeng" onchange="checkSelected(8)">
                  <option selected value="">- Pilih Jenis AnJal / GePeng -</option>
                  <option value="tambahvalue">+ Tambah Jenis Anjal/Gepeng Baru +</option>
                  @foreach($jenis_anjal_gepengs as $jenis_anjal_gepeng)
                  <option value="{{$jenis_anjal_gepeng->id}}">{{$jenis_anjal_gepeng->nama}}</option>
                  @endforeach
                </select>
                <input type="text" id="input_tambah_jenis_anjal" class="form-control" name="input_tambah_jenis_anjal" style="display: none" placeholder="Jenis Anjal/Gepeng Baru">
              </div>
            </div>
           
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama AnJal / GePeng</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="anjal_gepeng_nama" value="{{ $pelanggaran->anjal_gepeng_nama }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="anjal_gepeng_no_identitas" value="{{ $pelanggaran->anjal_gepeng_no_identitas }}">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end anjal --}}

      {{-- start PSK --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($id_kegiatan)) @if($id_kegiatan != 4) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran PSK</h5>
           
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama PSK</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="psk_nama" value="{{ $pelanggaran->psk_nama }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="psk_no_identitas" value="{{ $pelanggaran->psk_no_identitas }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-8">
                 <select class="form-select" aria-label="Default select example" name="psk_kelamin" id="dropdown_psk_kelamin">
                  <option selected value="">- Pilih Jenis kelamin -</option>
                  <option value="1">Perempuan</option>
                  <option value="2">Laki-laki</option>
                </select>
              </div>
            </div>
              <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Barang Bukti</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="psk_barang_bukti" value="{{ $pelanggaran->minol_nama }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jumlah Barang Bukti</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" name="psk_jml_barang_bukti" value="{{ $pelanggaran->minol_no_identitas }}">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end PSK --}}

      {{-- start Minol --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($id_kegiatan)) @if($id_kegiatan != 5) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran Minol</h5>
           
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama Pemilik Minol</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="minol_nama" value="{{ $pelanggaran->minol_nama }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="minol_no_identitas" value="{{ $pelanggaran->minol_no_identitas }}">
              </div>
            </div>
              <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Barang Bukti</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="minol_barang_bukti" value="{{ $pelanggaran->psk_nama }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jumlah Barang Bukti</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" name="minol_jml_barang_bukti" value="{{ $pelanggaran->psk_no_identitas }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Golongan</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="minol_golongan" value="{{ $pelanggaran->psk_kelamin }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Ijin Operasional</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="minol_no_ijin" value="{{ $pelanggaran->pemondokan_no_identitas }}">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end Minol --}}

        {{-- start Pemondokan --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($id_kegiatan)) @if($id_kegiatan != 6) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran Pemondokan</h5>
           
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama Pemilik Pemondokan</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="pemondokan_nama" value="{{ $pelanggaran->pemondokan_nama }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="pemondokan_no_identitas" value="{{ $pelanggaran->pemondokan_no_identitas }}">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end pemondokan --}}

      {{-- start Parkir liar --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($id_kegiatan)) @if($id_kegiatan != 7) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran Parkir Liar</h5>
           
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama Pelaku Parkir Liar</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="parkir_nama" value="{{ $pelanggaran->parkir_nama }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="parkir_no_identitas" value="{{ $pelanggaran->parkir_no_identitas }}">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end parkir liar --}}

       {{-- start prokes --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($id_kegiatan)) @if($id_kegiatan != 8) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Prokes</h5>
            
             <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Penertiban Prokes</label>
              <div class="col-sm-8">
                 <select class="form-select" aria-label="Default select example" name="id_jenis_penertiban_prokes" id="dropdown_jenis_penertiban_prokes">
                  <option selected value="">- Pilih Jenis Penertiban Prokes -</option>
                  
                  @foreach($jenis_penertiban_prokess as $jenis_penertiban_prokes)
                  <option value="{{$jenis_penertiban_prokes->id}}">{{$jenis_penertiban_prokes->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Pelaku Usaha</label>
              <div class="col-sm-8">
                 <select class="form-select" aria-label="Default select example" id="dropdown_jenis_pelaku_usaha" name="id_jenis_pelaku_usaha" >
                  <option selected value="">- Pilih Jenis Pelaku Usaha -</option>
                  <option value="1">Perseorangan</option>
                  <option value="2">Pelaku Usaha</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama Usaha</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="prokes_nama" value="{{ $pelanggaran->prokes_nama }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nomor Surat</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nomor_surat" value="{{ $pelanggaran->parkir_nama }}">
              </div>
            </div>
                 <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama Pelaku Usaha</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="pelaku_usaha_nama" value="{{ $pelanggaran->parkir_no_identitas }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="prokes_no_identitas" value="{{ $pelanggaran->prokes_no_identitas }}">
              </div>
            </div>
           

          </div>
        </div>
      </div>
      {{-- end prokes --}}



      {{-- middle row right --}}
      <div class="col-lg-6" id="form-tindakan">

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Lokasi & tindak lanjut</h5>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Pelanggaran</label>
              <div class="col-sm-8">

                  @php
                    $id = 0;
                  @endphp

                    @foreach($jenis_pelanggarans as $jenis_pelanggaran)
                        
                        <input type="checkbox" id="{{$jenis_pelanggaran->id}}" name="jenis_pelanggaran[{{$id}}]" style="transform: scale(1.5); margin-right: 7px; margin-bottom:7px" value="{{ $jenis_pelanggaran->id }}">
                        <label for="{{$jenis_pelanggaran->id}}">{{$jenis_pelanggaran->nama}}</label><br>

                        @php
                          $id++;
                        @endphp

                    @endforeach

                 <input type="text" id="input_tambah_jenis_pelanggaran" class="form-control" name="input_tambah_jenis_pelanggaran" style="display: none" placeholder="Jenis Pelanggaran Baru">

              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Tindak Lanjut</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" id="dropdown_tindak_lanjut" name="id_tindak_lanjut"  onchange="checkSelected(7)">
                  <option selected value="">- Pilih Jenis Tindakan -</option>
                  <option value="tambahvalue">+ Tambah Jenis Tindak Lanjut +</option>

                  @foreach($tindak_lanjuts as $tindak_lanjut)
                  <option value="{{$tindak_lanjut->id}}">{{$tindak_lanjut->nama}}</option>
                  @endforeach
                </select>
                  <input type="text" id="input_tambah_tindak_lanjut" class="form-control" name="input_tambah_tindak_lanjut" style="display: none" placeholder="Jenis Tindak Lanjut Baru">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Kecamatan</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" id="select_kecamatan" name="id_kecamatan" onchange="showKelurahan()" >
                  <option selected value="">- Pilih Kecamatan -</option>


                  @foreach($kecamatans as $kecamatan)
                  <option value="{{$kecamatan->id}}">{{$kecamatan->nama}}</option>
                  @endforeach

                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Kelurahan</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" id="select_kelurahan" name="id_kelurahan" disabled="disabled">
                  <option selected value="">- Pilih Kelurahan -</option>


                  @foreach($kelurahans as $kelurahan)
                  <option value="{{$kelurahan->id}}" class="kecamatan_{{$kelurahan->id_kec}} kelurahan_all" style="display: none">{{$kelurahan->nama}}</option>
                  @endforeach

                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-8">
                <input class="form-control" type="text" name="alamat" value="{{ $pelanggaran->alamat }}">
              </div>
            </div>

             <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">GeoLocation</label>
              <div class="col-sm-8">

                <div class="row">
                  <div class="col-sm-6">
                  <input class="form-control" type="text" id="lat" name="lat" placeholder="lat" readonly="">   
                  </div>
                  
                  <div class="col-sm-6">
                    <input class="form-control" type="text" id="lon" name="lon" placeholder="lon" readonly="">   
                  </div>  
                  <br>
                </div>
                
                <br>
                  <div id="map"></div>
              </div>
            </div>

             <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Foto Lokasi</label>
              <div class="col-sm-8">
                <input class="form-control" type="file" name="foto_lokasi">
              </div>
            </div>

            <button type="submit" class="btn btn-success">Simpan & Lanjutkan</button>

          </div>
        </div>
      </div>

    </form><!-- End General Form Elements -->
    </div>
  </div>
</section>



<style>

#map {height: 250px; width: 100%; }
</style>

<script>

    marker1 = null;
    
   function showPosition(position) {
      console.log("show possition start");
    
    }

    function getLocation() {
      if (navigator.geolocation) {

        //navigator.geolocation.getCurrentPosition(showPosition);
        navigator.geolocation.getCurrentPosition(success, error);

        console.log("Geolocation supported.");
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
        console.log("Geolocation is not supported by this browser.");
      }
    }

      function success(position) {
        console.log(position);
        document.getElementById("lat").value = {{ $pelanggaran->lat }};
        document.getElementById("lon").value = {{ $pelanggaran->lon }}; 


          marker1 = new mapboxgl.Marker()
          .setLngLat([{{ $pelanggaran->lon }}, {{ $pelanggaran->lat }}])
          .addTo(map);

          map.flyTo({center:[{{ $pelanggaran->lon }}, {{ $pelanggaran->lat }}]});

      }

      function error(error) {

        console.log('Geolocation error!');
        console.log(error);

      }

    </script>

<script type="text/javascript">
    
    function showReklame(){

      document.getElementById('form-reklame').style.display = "block";
      document.getElementById('form-tindakan').style.display = "block";

    }

    function showKelurahan(){
        document.getElementById('select_kelurahan').value = "";
        var id_kec = document.getElementById("select_kecamatan").value;

        const kelurahan_all = document.getElementsByClassName("kelurahan_all");
        for (let i = 0; i < kelurahan_all.length; i++) {
          kelurahan_all[i].style.display = "none";
        }

        const kelurahan_selected = document.getElementsByClassName("kecamatan_"+id_kec);
        for (let i = 0; i < kelurahan_selected.length; i++) {
          kelurahan_selected[i].style.display = "block";
        }

        if (id_kec == "") {
          document.getElementById('select_kelurahan').disabled = "disabled";
        }else{
          document.getElementById('select_kelurahan').disabled = "";
        }

      }

      (function() {
         console.log({{ $id_kegiatan }});
         //edit
        

        // document.getElementById("id_jenis_laporan").value = "{{ $pelanggaran->id_jenis_laporan }}";

        document.getElementById("dropdown_regu").value =  "{{ $pelanggaran->id_regu }}";
        
        document.getElementById("dropdown_pemilik").value =  "{{ $pelanggaran->id_pemilik }}";
        
        document.getElementById("dropdown_jenis_reklame").value =  "{{ $pelanggaran->id_jenis_reklame }}";
        
        document.getElementById("dropdown_ukuran_reklame").value =  "{{ $pelanggaran->id_ukuran_reklame }}";
        
        document.getElementById("dropdown_jenis_pkl").value =  "{{ $pelanggaran->id_jenis_pkl }}";
        
        document.getElementById("dropdown_jenis_anjal_gepeng").value =  "{{ $pelanggaran->id_jenis_anjal_gepeng }}";
        
        document.getElementById("dropdown_psk_kelamin").value =  "{{ $pelanggaran->psk_kelamin }}";
        
        document.getElementById("dropdown_jenis_penertiban_prokes").value =  "{{ $pelanggaran->id_jenis_penertiban_prokes }}";
        
        document.getElementById("dropdown_jenis_pelaku_usaha").value =  "{{ $pelanggaran->id_jenis_pelaku_usaha }}";
        

        @php
          $pelanggaran_explode = explode("-", $pelanggaran->id_jenis_pelanggaran);

          for ($i = 0; $i < count($pelanggaran_explode); $i++) {
             
                @endphp
                  try{
                  document.getElementById({{$pelanggaran_explode[$i]}}).checked = true;
                }catch(err){

                }
                @php
              
          }
        @endphp

        console.log("{{ $pelanggaran->id_jenis_pelanggaran }}");

      
        
        document.getElementById("dropdown_tindak_lanjut").value =  "{{ $pelanggaran->id_tindak_lanjut }}";
        
        document.getElementById("select_kecamatan").value =  "{{ $pelanggaran->id_kecamatan }}";
        
        document.getElementById("select_kelurahan").value =  "{{ $pelanggaran->id_kelurahan }}";

        
        @if(isset($id_kegiatan ))
          var id_kegiatan = {{ $id_kegiatan }};  
        @else
          //window.location.replace("{{URL::to('/pelanggaran/create?id_kegiatan=1')}}");
        @endif
        
        const kegiatan_selected = document.getElementsByClassName("pelanggaran_kategori_"+{{ $id_kegiatan}});

        for (let i = 0; i < kegiatan_selected.length; i++) {
          kegiatan_selected[i].style.display = "block";
        }

        getLocation();



      })();
  
</script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYXJpZmFuZGlkZW5pIiwiYSI6ImNsMzZvNXZxejEzbHAzY3FzcmpuNzNrbm0ifQ.-XX0gvG2ooyVnJvZZHg9Hg';
          const map = new mapboxgl.Map({
          container: 'map', // container ID
          style: 'mapbox://styles/mapbox/streets-v11', // style URL
          center: [106.82332708986368,-6.160440512853471 ], // starting position [lng, lat]
          zoom: 15 // starting zoom
        });


        // map.on('click', (e) => {
        //   // console.log(e);
        //   // console.log(e.lngLat.lng);

        //   marker1.setLngLat(e.lngLat);
        //   document.getElementById("lat").value = e.lngLat.lat;
        //   document.getElementById("lon").value = e.lngLat.lng; 

     
        //   });
        
    </script>

    <script type="text/javascript">
      

      function checkSelected(id){

        if (id == 1) { // id regu
          
          var e = document.getElementById("dropdown_regu");
          
          if (e.options[e.selectedIndex].value == "tambahvalue") {
            document.getElementById("input_tambah_regu").style.display = "block";
          }else{
            document.getElementById("input_tambah_regu").style.display = "none";
          }

        }else if(id == 2){ // id pemilik
          
          var e = document.getElementById("dropdown_pemilik");
          
          if (e.options[e.selectedIndex].value == "tambahvalue") {
            document.getElementById("input_tambah_pemilik").style.display = "block";
          }else{
            document.getElementById("input_tambah_pemilik").style.display = "none";
          }

        }else if(id == 3){ // jenis reklame
          
          var e = document.getElementById("dropdown_jenis_reklame");
          
          if (e.options[e.selectedIndex].value == "tambahvalue") {
            document.getElementById("input_tambah_jenis_reklame").style.display = "block";
          }else{
            document.getElementById("input_tambah_jenis_reklame").style.display = "none";
          }
          
        }else if(id == 4){ // jenis reklame
          
          var e = document.getElementById("dropdown_ukuran_reklame");
          
          if (e.options[e.selectedIndex].value == "tambahvalue") {
            document.getElementById("input_tambah_ukuran_reklame").style.display = "block";
          }else{
            document.getElementById("input_tambah_ukuran_reklame").style.display = "none";
          }
          
        }else if(id == 5){ // jenis reklame
          
          var e = document.getElementById("dropdown_jenis_pkl");
          
          if (e.options[e.selectedIndex].value == "tambahvalue") {
            document.getElementById("input_tambah_jenis_pkl").style.display = "block";
          }else{
            document.getElementById("input_tambah_jenis_pkl").style.display = "none";
          }
          
        }else if(id == 6){
            var e = document.getElementById("select_jenis_pelanggaran");
          
          if (e.options[e.selectedIndex].value == "tambahvalue") {
            document.getElementById("input_tambah_jenis_pelanggaran").style.display = "block";
          }else{
            document.getElementById("input_tambah_jenis_pelanggaran").style.display = "none";
          }
        }else if(id == 7){
            var e = document.getElementById("dropdown_tindak_lanjut");
          
          if (e.options[e.selectedIndex].value == "tambahvalue") {
            document.getElementById("input_tambah_tindak_lanjut").style.display = "block";
          }else{
            document.getElementById("input_tambah_tindak_lanjut").style.display = "none";
          }
        }else if(id == 8){
            var e = document.getElementById("dropdown_jenis_anjal_gepeng");
          
          if (e.options[e.selectedIndex].value == "tambahvalue") {
            document.getElementById("input_tambah_jenis_anjal").style.display = "block";
          }else{
            document.getElementById("input_tambah_jenis_anjal").style.display = "none";
          }
        }
        

        
      }

    </script>


@endsection
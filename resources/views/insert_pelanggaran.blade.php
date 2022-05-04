
  @extends('layouts.main')

  @section('title','tambah pelanggaran')

  @section('content')
  

    <div class="pagetitle">
      <h1>Blank Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-header">
              <h5 class="card-title" style="font-size: 20px;">Tambah Pelanggaran</h5>
            </div>
            <div class="card-body">

              <form action="{{ route('pelanggaran.store') }}" method="POST">
                @csrf
                
              
                

              <h5 class="card-title" >Detail Tim</h5>
              <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Jenis Laporan</label>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="id_jenis_laporan" required>
                      <option selected value="">- Pilih Jenis Laporan -</option>
                      <option value="1">Laporan Hasil Kegiatan (LKH)</option>
                      <option value="2">Laporan Kegiatan Harian(LKH)</option>
                      <option value="3">Cek Hasil Laporan</option>
                    </select>
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Regu</label>
                  <div class="col-sm-8">
                     <select class="form-select" aria-label="Default select example" name="id_regu" required>
                      <option selected value="">- Pilih Regu -</option>
                      <option value="1">Tim Beruang</option>
                      <option value="2">Regu 1</option>
                      <option value="3">Regu 2</option>
                      <option value="3">Regu 3</option>
                    </select>
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Tanggal</label>
                  <div class="col-sm-8">
                     <input type="date" name="tgl_peristiwa" class="form-control" required>
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Kegiatan</label>
                  <div class="col-sm-8">
                     <select class="form-select" aria-label="Default select example" name="id_kegiatan" required>
                      <option selected value="">- Pilih Kegiatan -</option>
                      <option value="1">Penertiban Reklame</option>
                      <option value="2">Penertiban PKL</option>
                      <option value="3">Penertiban Anjal-Gepeng</option>
                      <option value="4">Penertiban PSK</option>
                      <option value="5">Penertiban Minol</option>
                      <option value="6">Penertiban Pemondokan</option>
                      <option value="7">Penertiban Parkir Liar</option>
                      <option value="8">Penertiban Prokes</option>
                    </select>
                  </div>
              </div>

            </div>
          </div>
          <div class="card">
            <div class="card-body">

              <h5 class="card-title" >Detail Pelanggaran</h5>

              <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Nama Reklame</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="tema_reklame">
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Pemilik / Vendor</label>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="id_pemilik" required>
                      <option selected value="">- Pilih Pemilik -</option>
                      <option value="1">Meteor Cell</option>
                      <option value="2">Indocakti</option>
                    </select>
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Jenis Reklame</label>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="id_jenis_reklame" required>
                      <option selected value="">- Pilih Jenis Reklame -</option>
                      <option value="1">Banner</option>
                      <option value="2">Spanduk</option>
                    </select>
                  </div>
              </div>
              
              <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Jumlah Reklame</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" name="jumlah_reklame">
                  </div>
              </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Jenis Pelanggaran</label>
                  <div class="col-sm-8">
                   <select class="form-select" aria-label="Default select example" name="id_jenis_pelanggaran" required>
                      <option selected value="">- Pilih Jenis Pelanggaran -</option>
                      <option value="1">Ijin Habis</option>
                      <option value="2">Tidak Ada Ijin</option>
                      <option value="3">Rusak</option>
                      <option value="4">Paku Pohon</option>
                      <option value="5">Memasang di tiang listrik</option>
                      <option value="6">Lokasi larangan</option>
                    </select>
                  </div>
              </div>

              </div>
          </div>
          <div class="card">
            <div class="card-body">
              
              <h5 class="card-title" >lokasi & tindak lanjut</h5>

              <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Tindak Lanjut</label>
                  <div class="col-sm-8">
                  <select class="form-select" aria-label="Default select example" name="id_tindak_lanjut" required>
                      <option selected value="">- Pilih Jenis Tindakan -</option>
                      <option value="1">Diamankan di kantor Satpol PP</option>
                      <option value="2">Tidak Ada Ijin</option>
                      
                    </select>
                  </div>
              </div>


              <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Kecamatan</label>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="id_kecamatan" required>
                      <option selected value="">- Pilih Kecamatan -</option>
                      <option value="1">Kec. Klojen</option>
                      <option value="2">Kec. Blimbing</option>
                      <option value="3">Kec. Lowokwaru</option>
                      <option value="4">Kec. Sukun</option>
                      <option value="5">Kec. Kedungkandang</option>
                    </select>
                  </div>
              </div>

               <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Kelurahan</label>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="id_kelurahan" required>
                      <option selected value="">- Pilih Kelurahan -</option>
                      <option value="1">Kec. Klojen</option>
                      <option value="2">Kec. Blimbing</option>
                      <option value="3">Kec. Lowokwaru</option>
                      <option value="4">Kec. Sukun</option>
                      <option value="5">Kec. Kedungkandang</option>
                    </select>
                  </div>
              </div>

            
            
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dokumentasi Foto Sebelum Penertiban</h5>
           
             
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="foto_sebelum_1" name="foto_sebelum_1">
                  </div>
                </div>
            
                    <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>

                    <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>

                    <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>

                    <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
           
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dokumentasi Foto Setelah Penertiban</h5>
           
             
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
            
                    <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>

                    <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>

                    <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>

                    <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
                
                <button type="submit" class="btn btn-success">tambah</button>
              </form><!-- End General Form Elements -->
     
           
            </div>
          </div>

        </div>
      </div>
    </section>

  
  @endsection
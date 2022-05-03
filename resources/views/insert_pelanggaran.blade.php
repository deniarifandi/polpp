
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
            <div class="card-body">

              <form action="{{ route('pelanggaran.store') }}" method="POST">
                @csrf
                
              <h5 class="card-title">Detail Pelanggaran</h5>
                
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
                     <input type="date" name="tgl_peristiwa" class="form-control">
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Kegiatan</label>
                  <div class="col-sm-8">
                    <input type="text" name="id_kegiatan" class="form-control">
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Tema Reklame</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control">
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Pemilik / Vendor</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control">
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Jenis Reklame</label>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Jumlah Reklame</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control">
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Jenis Pelanggaran</label>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Tindak Lanjut</label>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
              </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Lokasi</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control">
                  </div>
              </div>

            
            
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dokumentasi Foto</h5>
           
             
                
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
                
                <button type="submit">tambah</button>
              </form><!-- End General Form Elements -->
     
           
            </div>
          </div>

        </div>
      </div>
    </section>

  
  @endsection
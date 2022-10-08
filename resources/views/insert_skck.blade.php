{{-- 
@extends('layouts.main_can')

@section('title','tambah pelanggaran')

@section('content')

<section class="section">
  <div class="row">



    <div class="col-lg-12">
      <div class="card">

        <div class="card-body">

          <div class="pagetitle">
            <br>
            <h1>Tambah Data Pengantar SKCK</h1>
            <hr>
          </div><!-- End Page Title -->

                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">KTP</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="jumlah_reklame" min="0">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">KK</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="jumlah_reklame" min="0">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Surat Pernyataan Kades kondite Pemohon</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="jumlah_reklame" min="0">
                  </div>
                </div>

                  <a type="submit" href="{{ url('skck_sktm') }}" class="btn btn-success" style="float: right;">Ajukan Permohonan</a>
        </div>
      </div>
    </div>
  </div>
</section>

 


@endsection --}}


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
  
  </style>
 
  <?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data Pelanggaran.xls");
  ?>
 
  <center>
    <h1>Export Data Pelanggaran<br/> </h1>
  </center>
 
  <table border="1">
    <tr>
      <th>No</th>
      <th>Nama Pegawai</th>
      <th>Alamat</th>
      <th>No.Telp</th>
    </tr>
    <tr>
      <td>1</td>
      <td>Sulaiman</td>
      <td>Jakarta</td>
      <td>0829121223</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Diki Alfarabi Hadi</td>
      <td>Jakarta</td>
      <td>08291212211</td>
    </tr>
    <tr>
      <td>3</td>
      <td>Zakaria</td>
      <td>Medan</td>
      <td>0829121223</td>
    </tr>
    <tr>
      <td>4</td>
      <td>Alvinur</td>
      <td>Jakarta</td>
      <td>02133324344</td>
    </tr>
    <tr>
      <td>5</td>
      <td>Muhammad Rizani</td>
      <td>Jakarta</td>
      <td>08231111223</td>
    </tr>
    <tr>
      <td>6</td>
      <td>Rizaldi Waloni</td>
      <td>Jakarta</td>
      <td>027373733</td>
    </tr>
    <tr>
      <td>7</td>
      <td>Ferdian</td>
      <td>Jakarta</td>
      <td>0829121223</td>
    </tr>
    <tr>
      <td>8</td>
      <td>Fatimah</td>
      <td>Jakarta</td>
      <td>23432423423</td>
    </tr>
    <tr>
      <td>9</td>
      <td>Aminah</td>
      <td>Jakarta</td>
      <td>0829234233</td>
    </tr>
    <tr>
      <td>10</td>
      <td>Jafarudin</td>
      <td>Jakarta</td>
      <td>0829239323</td>
    </tr>
  </table>
</body>
</html>
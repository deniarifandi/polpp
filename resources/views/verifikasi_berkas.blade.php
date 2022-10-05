
  
  @extends('layouts.main_can')

  @section('title','data pelanggaran')

  @section('content')

    @include('style.table_style')

    
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
             <div class="card" style="min-width: 800px">
              <div class="card-body" >
            
              
                <div>
                    <div class="table-responsive">
                        <div class="table-wrapper">     
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="show-entries">
                                            <span>Show</span>
                                            <select>
                                                <option>5</option>
                                                <option>10</option>
                                                <option>15</option>
                                                <option>20</option>
                                            </select>
                                            <span>entries</span>
                                        </div>            
                                    </div>
                                    <div class="col-sm-4">
                                        <h2 class="text-center">Data <b>Pengajuan</b></h2> 
                                    </div>
                                   
                                    <div class="col-sm-2 offset-sm-2">
                                      <div class="input-group mb-3">
                                      <input type="text" class="form-control" placeholder="Cari Data" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled="">
                                      <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button" disabled=""><i class="bi bi-search"></i>
                                        </button>
                                      </div>
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <table class="table table-bordered" id="list_pelanggaran">
                            <thead>
                              <tr>
                                <th scope="col">Nama Pemohon<i class="fa fa-sort"></i></th>
                                <th scope="col">Jenis Permohonan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col"> Status </th>
                                <th>Tindakan</th>

                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Deni Arifandi</td>
                                <td>SKCK</td>
                                <td>25 Sept 2022</td>
                                <td>Belum Diverifikasi</td>
                                <td> 
                                  <a class="view" title="View" data-toggle="tooltip" ><i class="material-icons">&#xE417;</i></a>
                                    <a h type="submit" class="edit" title="Edit"><i class="material-icons">&#xE254;</i></a>
                                    <a  class="delete" title="Delete" data-toggle="tooltip" ><i class="material-icons">&#xE872;</i></a>
                                </td>
                              </tr>
                              <tr>
                                <td>Siti Maghfiroh</td>
                                <td>SKTM</td>
                                <td>24 Sept 2022</td>
                                <td>Belum Diverifikasi</td>
                                <td> 
                                  <a class="view" title="View" data-toggle="tooltip" ><i class="material-icons">&#xE417;</i></a>
                                    <a h type="submit" class="edit" title="Edit"><i class="material-icons">&#xE254;</i></a>
                                    <a  class="delete" title="Delete" data-toggle="tooltip" ><i class="material-icons">&#xE872;</i></a>
                                </td>
                              </tr>
                              <tr>
                                <td>Candra</td>
                                <td>SKCK</td>
                                <td>17 Sept 2022</td>
                                <td>Belum Diverifikasi</td>
                                <td> 
                                  <a class="view" title="View" data-toggle="tooltip" ><i class="material-icons">&#xE417;</i></a>
                                    <a h type="submit" class="edit" title="Edit"><i class="material-icons">&#xE254;</i></a>
                                    <a  class="delete" title="Delete" data-toggle="tooltip" ><i class="material-icons">&#xE872;</i></a>
                                </td>
                              </tr>
                               <tr>
                                <td>Candra 2</td>
                                <td>SKCK</td>
                                <td>10 Sept 2022</td>
                                <td>Sudah Diverifikasi</td>
                                <td> 
                                  <a class="view" title="View" data-toggle="tooltip" ><i class="material-icons">&#xE417;</i></a>
                                    <a h type="submit" class="edit" title="Edit"><i class="material-icons">&#xE254;</i></a>
                                    <a  class="delete" title="Delete" data-toggle="tooltip" ><i class="material-icons">&#xE872;</i></a>
                                </td>
                              </tr>
                      
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
   
    </script>

    @endsection
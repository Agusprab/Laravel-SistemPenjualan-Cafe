@extends('../layout/main')
@section('title', $title)


@section('body')


<body class="animsition">
  
 
           
    @extends('admin.include.sidebar')
    @extends('admin.include.header')
        <!-- PAGE CONTAINER-->
 
        

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                   
                        <div class="row pb-5">
                            <div class="col-lg-12">
                                <div class="user-data m-b-30">
                                   
                                   <div class="text-box">
                                        <h3 class="text-center"> <i class="fa fa-cube" aria-hidden="true"></i> Detail Barang</h3>
                                        <h5 class="text-center">" {{ $barang['nama_barang']}} "</h5>
                                   </div>

                                   <div class="add-data ml-4 mt-2 mb-3">
                                    <a href="{{ route('stokitem')}}"class="btn btn-info btn-sm"> <i class="fa fa-backward" aria-hidden="true"></i> Kembali</a>                                        
                                    <div class="btn-group">
                                        <a href="{{ url('/admin/stokitem/cetak='.$barang['id'])}}" class="btn btn-success btn-sm"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
                                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                       <form action="{{ url('/admin/stokitem/cetak='.$barang['id'])}}" method="POST">
                                        @csrf
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">
                                              <div class="form-group">
                                                <input type="date"
                                                  class="form-control" name="mulai" id="" aria-describedby="helpId" placeholder="">
                                                <small id="helpId" class="form-text text-muted">Dari tanggal</small>
                                              </div>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                              <div class="form-group">
                                                <input type="date"
                                                  class="form-control" name="batas" id="" aria-describedby="helpId" placeholder="">
                                                <small id="helpId" class="form-text text-muted">Hingga tanggal</small>
                                              </div>
                                            </a>         
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                              <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print" aria-hidden="true"></i> Cetak</button>
                                            </a>
                                          </div>
                                       </form>
                                      </div>
                                    </div>
                                   <div class=" pl-5 pr-5 pt-3 table-responsive">
                                    <table id="table_id" class="table display">
                                        <thead>
                                            <tr>
                                                <td>Waktu</td>
                                                <td>Kode Barang</td>
                                                <td>Nama Barang </td>                        
                                                <td>Stok</td>
                                                <td>Oleh</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Barang_masuk as $data )
                                            <tr>
                                                <td>
                                            
                                                        <div class="d-flex flex-row bd-highlight mb-3">
                                                        <h6>{{$data->created_at}}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-row bd-highlight mb-3">
                                                        <h6>{{ $data->barang->kode_barang}}</h6>                                                            
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-row bd-highlight mb-3">
                                                        <h6><span>{{ $data->barang->nama_barang}}</span></h6>                                                          
                                                    </div>
                                                </td>                                               
                                                <td>
                                                    <div class="d-flex flex-row bd-highlight mb-3">
                                                        <h6 class="">{{ $data->jumlah_barang}} Pcs</h6>                                                          
                                                    </div>
                                                </td>
                                           
                                                <td>                                                                                                               
                                                    <div class="d-flex flex-row bd-highlight mb-3">
                                                        <h6>{{ $data->pegawai->name}}</h6>                                                              
                                                      </div>
                                                </td> 
                                            </tr>
                                            @endforeach
                                                                             
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>                        
                        </div>                    
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2022 <a href="agusprabowo.com">Agus Prabowo</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
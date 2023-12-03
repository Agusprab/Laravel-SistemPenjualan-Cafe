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
                   
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="fa fa-cube" aria-hidden="true"></i>Data Barang Terjual</h3>
                                    <div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                            @if(session()->has('alertSuccessAdd'))
                                    <div class="p-2">                                  
                                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">Success</span>
                                            {{ session('alertSuccessAdd')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                            @endif
                            @if(session()->has('alertSuccessDelete'))
                            <div class="p-2">                                  
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <span class="badge badge-pill badge-danger">Delete</span>
                                    {{ session('alertSuccessDelete')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                           @endif
                                    <div class="add-data ml-4 mb-4">
                                        <a href="{{ url('/admin/solditems/add')}}"class="btn btn-primary btn-sm"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Barang Terjual</a>                                        
                                        <div class="btn-group">
                                            <a href="{{ url('/admin/solditems/cetakalldata')}}" class="btn btn-success btn-sm"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
                                            <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                           <form action="{{ url('/admin/solditems/customCetak')}}" method="POST">
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
                                    </div
                                    <div class="row m-t-30">
                                        <div class="col-md-12 pl-5 pr-5">
                                            <!-- DATA TABLE-->
                                            <div class="table-responsive m-b-40">
                                                <table  id="table_id" class="display table table-borderless table-data3 ">
                                                    <thead>
                                                        <tr>
                                                            <th>Waktu</th>
                                                            <th>Barang</th>
                                                            <th>Stok</th>
                                                            <th>Harga</th>
                                                            <th>Oleh</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($listbarang as $data)                                                                                                              
                                                            <tr>
                                                                <td>{{ date('d F Y H:i:s', strtotime($data->created_at));}}</td>
                                                                <td>{{ $data->barang->nama_barang}}</td>
                                                                <td>{{$data->jumlah_barang}}</td>
                                                                <td>Rp. {{  number_format($data->harga_jual,0 ,',','.'); }}</td>
                                                                <td>{{$data->pegawai->name}}</td>
                                                                <td>                 
                                                                                                                     
                                                                    <div class="d-flex flex-row bd-highlight mb-3">
                                                                        <div class="p-1 bd-highlight"><button  type="button" id="detailBarang" class="btn btn-info" data-toggle="modal" data-target="#ModalSold"
                                                                            data-namaBarang="{{ $data->barang->nama_barang}}" data-kodeBarang="{{$data->barang->kode_barang}}"
                                                                             data-jumlahBarang="{{$data->jumlah_barang}}" data-hargaBarang="{{$data->harga_jual}}" data-oleh="{{$data->pegawai->name}}" data-waktu="{{date('d F Y H:i:s', strtotime($data->created_at))}}"><i class="fa fa-eye text-white" aria-hidden="true"></i></button></div>                                                                                                                                    
                                                                        <div class="p-1 bd-highlight"><a href="#" class="btn btn-danger deleteBarangkeluar" data-id="{{ $data->id}}" data-name="{{ $data->barang->nama_barang}}"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                                                                   </div>
                                                             </td> 
                                                            </tr>   
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                            <!-- END DATA TABLE-->
                                        </div>
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


    <!--Detail Model -->
<div class="modal fade" id="ModalSold" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <!--Header-->
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Detail Sold Item</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <!--Body-->
    <div class="modal-body">

      <table class="table table-hover">
        <thead>
   
        <tbody>
          <tr>
            <th scope="row">Kode Barang</th>
            <td>:</td>
            <td><span id="kodeBarang"></span></td>
     
          </tr>
   
          <tr>
            <th scope="row">Nama Barang</th>
            <td>:</td>
            <td><span id="namaBarang"></span></td>
          </tr>
        

          <tr>
            <th scope="row">Jumlah Barang</th>
            <td>:</td>
            <td><span id="jumlahBarang"></span></td>

          </tr>
          <tr>
            <th scope="row">Harga Barang</th>
            <td>:</td>
            <td><span id="hargaBarang"></span></td>       
          </tr>
          
          <tr>
            <th scope="row">Total </th>
            <td>:</td>
            <td><span id="totalHarga"></span></td>          
          </tr> 
          <tr>
            <th scope="row">Di Input Oleh </th>
            <td>:</td>
            <td><span id="oleh"></span></td>          
          </tr>
          <tr>
            <th scope="row">Waktu </th>
            <td>:</td>
            <td><span id="waktu"></span></td>          
          </tr>
        </tbody>
      </table>

    </div>
    <!--Footer-->
    <div class="modal-footer">
      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>

@endsection
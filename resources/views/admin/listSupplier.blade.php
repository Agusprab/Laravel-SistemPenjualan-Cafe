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
                                        <i class="fa fa-cube" aria-hidden="true"></i>Data Supplier</h3>
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
                                        </div>Z
                                    </div>
                            @endif
                            @if(session()->has('alertSuccessDelete'))
                            <div class="p-2">                                  
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <span class="badge badge-pill badge-success">Delete</span>
                                    {{ session('alertSuccessDelete')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                           @endif
                           @if(session()->has('alertFailDelete'))
                           <div class="p-2">                                  
                               <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                   <span class="badge badge-pill badge-danger">Gagal</span>
                                   {{ session('alertFailDelete')}}
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                           </div>
                          @endif
                                    <div class="add-data ml-4">
                                        <a href="{{ url('/admin/listsupplier/addNew')}}"class="btn btn-primary btn-sm"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Supplier Baru</a>                                        
                                        <a href="{{ url('/admin/listsupplier/cetakalldata')}}" class="btn btn-success btn-sm"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
                                    </div>
                                    <div class=" pl-5 pr-5 pt-3 table-responsive">
                                        <table id="table_id" class="table display">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <TD>Kode Supplier</TD>                                                                
                                                    <td>Nama Supplier</td>   
                                                    <td>Telephone</td>
                                                    <td>Create At</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listBarang as $data )
                                                <tr>
                                                  
                                                    <td>
                                                        <div class="table-data__info"> {{$loop->iteration}} </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info ">
                                                            {{-- <h6><span>{{ $data->kode_supplier}}</span></h6>                                                             --}}
                                                            <div class="table-data__info"> {!! QrCode::size(100)->generate($data->kode_supplier); !!}</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info ">
                                                            <h6><span>{{ $data->nama_supplier}}</span></h6>                                                            
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-lowercase table-data__info">
                                                            <h6><span>{{ $data->no_tlp}}</span></h6>                                                          
                                                        </div>
                                                    </td>                                           
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6 class="text-center">{{ date('d F Y H:i:s', strtotime($data->created_at));}}</h6>                                                          
                                                        </div>
                                                    </td>
                                               
                                                    <td>                                                                                                               
                                                           <div class="d-flex flex-row bd-highlight mb-3">
                                                               <div class="p-1 bd-highlight"><a href="{{ url('/admin/listsupplier/editsupplierid='. $data->id)}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>                                                            
                                                               <div class="p-1 bd-highlight"><a href="#" class="btn btn-danger supplier" data-id="{{ $data->id}}" data-name="{{ $data->nama_supplier}}"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                                                          </div>
                                                    </td> 
                                                </tr>
                                                @endforeach
                                                                                 
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </div>
                                <!-- END USER DATA-->
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
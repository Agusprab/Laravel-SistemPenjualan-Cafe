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
                                <div class="user-data m-b-30 p-3">
                                    <h3 class="title-3 m-b-30"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Barang Terjual</h3>                                                             
                                    <form action="{{ url('/admin/solditems/store')}}" method="POST">
                                        
                                        @csrf
                                        @if(session()->has('alert'))
                                            <div class="p-2">                                  
                                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                    <span class="badge badge-pill badge-danger">Failed</span>
                                                    {{ session('alert')}}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                         @endif
                                            <div class="form-group">
                                              <label for="inputName">Nama Barang</label>
                                              <select id="selectrole" class="form-control" name="barang_id">
                                                @foreach ($stok as $data)                                                
                                             
                                                  @if($data->total_barang > 0)
                                                  <option value="{{$data->barang_id}}">{{ $data->barang->nama_barang}}</option>
                                                  @endif
                                                @endforeach                                      
                                              </select>
                                              @error('barang_id')
                                                  <div class="invalid-feedback">
                                                    {{ $message}}
                                                  </div>
                                              @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="inputName">Jumlah Barang</label>
                                                <input type="text" class="form-control @error('jumlah_barang') is-invalid @enderror" id="inputName" name="jumlah_barang" required autofocus value="{{ old('nama_barang')}}">
                                                @error('jumlah_barang')
                                                    <div class="invalid-feedback">
                                                      {{ $message}}
                                                    </div>
                                                @enderror
                                            </div>  
                                            <div class="form-group">
                                                <label for="inputName">Harga jual</label>
                                                <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="inputName" name="harga_jual" required autofocus value="{{ old('nama_barang')}}">
                                                @error('harga_jual')
                                                    <div class="invalid-feedback">
                                                      {{ $message}}
                                                    </div>
                                                @enderror
                                              </div> 

                                        <button type="submit" class="btn btn-success btn-lg">Masukan Data</button>
                                        <a href="{{route('solditems')}}" class="btn btn-info btn-lg ">Kembali</a>
                                      </form>
                                </div>
                                <!-- END USER DATA-->
                            </div>                        
                        </div>                    
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
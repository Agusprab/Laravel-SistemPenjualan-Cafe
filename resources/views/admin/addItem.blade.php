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
                                    <h3 class="title-3 m-b-30"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Barang Baru</h3>                                                             
                                    <form action="{{ url('/admin/listitem/storeNewItem')}}" method="POST">
                                        @csrf
                                            <div class="form-group">
                                              <label for="inputName">Kode Barang</label>
                                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="kode_barang" value="{{ $kode_barang }}">
                                              @error('tittle')
                                                  <div class="invalid-feedback">
                                                    {{ $message}}
                                                  </div>
                                              @enderror
                                            </div>
                                            <div class="form-group">
                                              <label for="inputName">Nama Barang</label>
                                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="nama_barang" required autofocus value="{{ old('nama_barang')}}">
                                              @error('tittle')
                                                  <div class="invalid-feedback">
                                                    {{ $message}}
                                                  </div>
                                              @enderror
                                            </div>                                
                                        <button type="submit" class="btn btn-success btn-lg">Masukan Data</button>
                                        <a href="{{route('listitem')}}" class="btn btn-info btn-lg ">Kembali</a>
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
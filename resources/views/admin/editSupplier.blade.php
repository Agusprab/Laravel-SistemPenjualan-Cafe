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
                                    <h3 class="title-3 m-b-30"><i class="fa fa-plus-square" aria-hidden="true"></i>Edit Supplier</h3>                                                             
                                    <form action="{{ url('/admin/listsupplier/updatesupplier=') . $data->id}}" method="POST">
                                        @csrf
                                            <div class="form-group">
                                              <label for="inputName">Kode Supplier</label>
                                              <input type="text" class="form-control @error('kode_supplier') is-invalid @enderror" id="inputName" name="kode_supplier" value="{{ $data->kode_supplier }}">
                                              @error('kode_supplier')
                                                  <div class="invalid-feedback">
                                                    {{ $message}}
                                                  </div>
                                              @enderror
                                            </div>
                                            <div class="form-group">
                                              <label for="inputName">Nama Supplier</label>
                                              <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" id="inputName" name="nama_supplier" required autofocus value="{{ $data->nama_supplier}}">
                                              @error('nama_supplier')
                                                  <div class="invalid-feedback">
                                                    {{ $message}}
                                                  </div>
                                              @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName">Alamat Supplier</label>
                                                <input type="text" class="form-control @error('alamat_supplier') is-invalid @enderror" id="inputName" name="alamat_supplier" required autofocus value="{{ $data->alamat_supplier }}">
                                                @error('alamat_supplier')
                                                    <div class="invalid-feedback">
                                                      {{ $message}}
                                                    </div>
                                                @enderror
                                              </div>
                                            <div class="form-group">
                                                <label for="inputName">No Telephone Supplier</label>
                                                <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" id="inputName" name="no_tlp" required autofocus value="{{$data->no_tlp}}">
                                                @error('no_tlp')
                                                    <div class="invalid-feedback">
                                                      {{ $message}}
                                                    </div>
                                                @enderror
                                            </div>

                                        <button type="submit" class="btn btn-success btn-lg">Ubah Data</button>
                                        <a href="{{route('listsupplier')}}" class="btn btn-info btn-lg ">Kembali</a>
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
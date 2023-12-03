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
                                    <h3 class="title-3 m-b-30"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Pegawai</h3>                                                             
                                    <form action="{{ url('/admin/manageuser/storeuser')}}" method="POST">
                                        @csrf
                                            <div class="form-group">
                                              <label for="inputName">Nama</label>
                                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" required autofocus value="{{ old('name')}}">
                                              @error('tittle')
                                                  <div class="invalid-feedback">
                                                    {{ $message}}
                                                  </div>
                                              @enderror
                                            </div>
                                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="inputEmail4">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="inputEmail4" value="{{ old('email')}}">
                                            @error('email')
                                            <div class="invalid-feedback">
                                              {{ $message}}
                                            </div>
                                            @enderror
                                         </div>
                                          <div class="form-group col-md-6">
                                            <label for="inputPassword4">Password</label>
                                            <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="inputPassword4" value="{{ old('password')}}">
                                            @error('password')
                                            <div class="invalid-feedback">
                                              {{ $message}}
                                            </div>
                                            @enderror
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="selectrole">Role</label>
                                            <select id="selectrole" class="form-control" name="role">
                                              <option value="user">User</option>
                                              <option value="admin">Admin</option>
                                            </select>
                                          </div>
                                        <button type="submit" class="btn btn-success btn-lg">Masukan Data</button>
                                        <a href="{{route('manageuser')}}" class="btn btn-info btn-lg ">Kembali</a>
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
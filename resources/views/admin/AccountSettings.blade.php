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
                        @if(session()->has('alertFail'))
                            <div class="p-2">                                  
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <span class="badge badge-pill badge-danger">Fail</span>
                                    {{ session('alertFail')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                           @endif
                           @if(session()->has('alertSuccess'))
                           <div class="p-2">                                  
                               <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                   <span class="badge badge-pill badge-success">Success</span>
                                   {{ session('alertSuccess')}}
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                           </div>
                          @endif
                        <div class="row pb-5">
                            <div class="col-lg-12">
                                <div class="user-data m-b-30">
                                   
                                   <div class="text-box">
                                        <h1 class="text-center"><i class="fa fa-user-circle" aria-hidden="true"></i></h1>
                                        <h5 class="text-center">"{{ Auth::guard('pegawai')->user()->name}}"</h5>
                                   </div>

                                   <div class="p-4 mt-3">
                                    <form action="{{url('/admin/account')}}" method="POST">
                                        @csrf 
                                        <input type="hidden" name="id" value="{{ Auth::guard('pegawai')->user()->id}}">
                                        <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-2 col-form-label">Email </label>
                                          <div class="col-sm-10">
                                            <input type="text" readonly class="form-control" id="staticEmail" value="{{ Auth::guard('pegawai')->user()->email}}" disabled>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Username </label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control" id="staticEmail" value="{{ Auth::guard('pegawai')->user()->username}}" disabled>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Role </label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control" id="staticEmail" value="{{ Auth::guard('pegawai')->user()->role}}" disabled>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Waktu Dibuat </label>
                                            <div class="col-sm-10">
                                              <input type="text" readonly class="form-control" id="staticEmail" value="{{date('d F Y H:i:s', strtotime(Auth::guard('pegawai')->user()->created_at))}}" disabled>
                                            </div>
                                          </div>
                                        <div class="form-group row">
                                          <label for="inputPassword" class="col-sm-2 col-form-label">Password Lama</label>
                                          <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="oldpassword">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Password baru</label>
                                            <div class="col-sm-10">
                                              <input type="password" class="form-control" id="inputPassword" placeholder="Password"name="password">
                                            </div>
                                          </div>

                                          <button type="submit" class="btn btn-primary ">Ubah</button>
                                      </form>
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

@endsection
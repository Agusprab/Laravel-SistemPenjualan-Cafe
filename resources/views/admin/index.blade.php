
@extends('layout.main')
@section('title', $title)


@section('body')

<body class="animsition">


    @extends('admin.include.sidebar')

   
         @extends('admin.include.header')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Dashboard Bulan Ini</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix pb-5 pt-2">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{$jmlPegawai}}</h2>
                                                <span>Pegawai</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix pb-5 pt-2">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                         <div class="d-none">
                                            @foreach ($barangTerjual as $data)
                                                  {{$jmlBarangTerjual = $jmlBarangTerjual + $data['jumlah_barang']}}
                                                  {{ $total_pendapatan = $total_pendapatan + (($data->harga_jual) * ($data->jumlah_barang))}}
                                            @endforeach
                                            @foreach ($barangMasuk as $data)
                                            {{$jmlBarangMasuk = $jmlBarangMasuk + $data['jumlah_barang']}}
                                            {{ $total_pengeluaran = $total_pengeluaran + (($data->harga_beli) * ($data->jumlah_barang))}}

                                              @endforeach
                                         </div>
                                                <h2>{{$jmlBarangTerjual }}</h2>
                                                <span>Barang terjual</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix pb-5 pt-2">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{$jmlBarangMasuk}}</h2>

                                                <span>Barang masuk</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix pb-5 pt-2">
                                   
                                            <div class="text">
                                                <h2>Rp.{{ number_format($total_pendapatan)}}</h2>
                                                <span>Total penghasilan</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Barang Terjual & Masuk</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-12 col-lg-6 table-responsive" >
                                <table class="table table-hover ">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Waktu</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                   
                                        @foreach ( $barangTerjual as $data )
                                        @if(++$i <= 5) 
                                        <tr>
                                            <th scope="row">{{ $loop->iteration}}</th>
                                            <td>{{$data->barang->nama_barang}}</td>
                                            <td>{{$data->jumlah_barang}}</td>
                                            <td>{{ date('d F Y H:i:s', strtotime($data->created_at));}}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                  
                                    </tbody>
                                  </table>
                            </div>
                            <div class="col-12 col-lg-6 table-responsive" >
                                <table class="table table-hover ">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Waktu</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                   
                                        @foreach ( $barangMasuk as $data )
                                        @if(++$a <= 5) 
                                        <tr>
                                            <th scope="row">{{ $loop->iteration}}</th>
                                            <td>{{$data->barang->nama_barang}}</td>
                                            <td>{{$data->jumlah_barang}}</td>
                                            <td>{{ date('d F Y H:i:s', strtotime($data->created_at));}}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                  
                                    </tbody>
                                  </table>
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
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

@endsection
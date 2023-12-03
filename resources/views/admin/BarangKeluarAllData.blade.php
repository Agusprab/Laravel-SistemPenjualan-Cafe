<?php 
    date_default_timezone_set('Asia/Jakarta');
?>
<!doctype html>
<html lang="en">

<head>
    <title>Laporan Total Barang </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Nunito:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Open+Sans:ital,wght@0,400;0,500;0,600;1,300;1,400;1,500;1,600&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,200;1,300;1,400;1,500;1,600&display=swap');

        * {
            font-family: 'Poppins';
        }
        p{
            font-size: 14px !important;
        }
        table {
  font-family: Arial, Helvetica, sans-serif;
  color: #666;
  text-shadow: 1px 1px 0px #fff;
  background: #eaebec;
  border: #ccc 1px solid;
  width: 100%;
}

table th {
  padding: 15px 35px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
}

table th:first-child{  
  border-left:none;  
}

table tr {
  text-align: center;

}

table td:first-child {
  text-align: left;
  padding-left: 20px;
  border-left: 0;
}

table td {


}

table tr:last-child td {
  border-bottom: 0;
}

table tr:last-child td:first-child {
  -moz-border-radius-bottomleft: 3px;
  -webkit-border-bottom-left-radius: 3px;
  border-bottom-left-radius: 3px;
}

table tr:last-child td:last-child {
  -moz-border-radius-bottomright: 3px;
  -webkit-border-bottom-right-radius: 3px;
  border-bottom-right-radius: 3px;
}

table tr:hover td {
  background: #f2f2f2;
  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
}
h3,h4{
    text-align:center;
    font-size: 25px;
    font-weight: 700;
    font-family: 'Poppins';
}
    </style>

</head>

<body>
    <div class="">
        <div class="" style="text-align: right"><p>{{ date('l, d F Y')}}</p></div>
        <div class="text-center">
            <h3 class="mt-4">Laporan Barang Terjual</h3>           
            @if($custom === 1)
            <p style="text-align: center;font-size:20;padding-bottom:20px">" {{ date('d F Y', strtotime($awal)). ' - '.date('d F Y', strtotime($akhir)) }} "</p>
            @endif
        </div>
        <div class="mt-4">
       
             <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Waktu</th>
                        <th scope="col">Barang</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total Harga</th>
                        
                    </tr>
                </thead>
                <tbody>
            
                    @foreach ($listbarang as $data) 
                                                        
                    <tr>
       
                        <td><p>{{ date('d F Y H:i:s', strtotime($data->created_at));}}</p></td>
                        <td><p>{{ $data->barang->nama_barang}}</p></td>
                        <td><p>{{$data->jumlah_barang}}</p></td>
                        <td><p>{{  number_format($data->harga_jual,0 ,',','.'); }}</p></td>                                       
                        <td><p>{{number_format(($data->harga_jual) * ($data->jumlah_barang))}}</p></td>  
                        {{ $total_harga = $total_harga + (($data->harga_jual) * ($data->jumlah_barang))}}
                        {{ $total_barang =$total_barang + $data->jumlah_barang}}
                    </tr>   

                 
                @endforeach 
            <thead class="thead-dark">
                <tr>                    
             
                    <th></th>
                    <th></th>
                    <th><p style="font-weight:bold">{{ $total_barang}} Pcs</p></th>
                    <th></th>
                    <th><p style="font-weight:bold">{{ number_format($total_harga)}}</p></th>
                </tr>
            </thead>       
                </tbody>
            </table>
             
        </div>
    </div>




</body>

</html>
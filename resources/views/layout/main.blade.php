<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet')}}" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">

    <!-- FontAwsome -->
    <script src="https://kit.fontawesome.com/5fbd2ee0b3.js" crossorigin="anonymous"></script>
    
    
    {{-- DataTables --}}
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
</head>
    
</head>

    @yield('body')

    <!-- Jquery JS-->
    <script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/select2/select2.min.js')}}">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    </script>

    {{-- SweatAlert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Main JS-->
    <script src="{{asset('js/main.js')}}"></script>

    <script>
        $('#qrcode').click(function() {
            var qrCode =  $(this).attr('data-qr');
            var qrName =  $(this).attr('data-name');
            swal({
                title: '<strong>HTML <u>example</u></strong>',
                icon: 'info',
                html:
                    'You can use <b>bold text</b>, ' +
                    '<a href="//sweetalert2.github.io">links</a> ' +
                    'and other HTML tags',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> Great!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i>',
                cancelButtonAriaLabel: 'Thumbs down'
                });
    
        });
    </script>
    <script>
        $('.deleteUser').click(function(){
            var pegawaiid = $(this).attr('data-id');
            var namapegawai = $(this).attr('data-name');
            swal({
                title: "Yakin ingin menghapus data?",
                text: namapegawai+" akan di Hapus PERMANENT!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/manageuser/deleteid="+pegawaiid;
                    swal("Data di Hapus!", {
                    icon: "success",
                    });
                } else {
                    swal("Anda membatalkan menghapus data");
                }
                });
        });
        $('.forcedelete').click(function(){
            var pegawaiid = $(this).attr('data-id');
            var namapegawai = $(this).attr('data-name');
            swal({
                title: "Yakin ingin menghapus data?",
                text: namapegawai+" akan di hapus permanent!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/forcedelete="+pegawaiid;
                    swal("Data di hapus!", {
                    icon: "success",
                    });
                } else {
                    swal("Anda membatalkan menghapus data");
                }
                });
        });
    </script>
    <script>
        $('.delete').click(function(){
            var barangid = $(this).attr('data-id');
            var namapegawai = $(this).attr('data-name');
            swal({
                title: "Yakin ingin menghapus data?",
                text: namapegawai+" akan di hapus PERMANENT!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/listitem/deleteid="+barangid;
                    swal("Data berhasil di hapus!", {
                    icon: "success",
                    });
                } else {
                    swal("Anda membatalkan menghapus data");
                }
                });
        });
        $('.delete').click(function(){
            var barangid = $(this).attr('data-id');
            var namapegawai = $(this).attr('data-name');
            swal({
                title: "Yakin ingin menghapus data?",
                text: namapegawai+" akan di hapus PERMANENT!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/listitem/deleteid="+barangid;
                    swal("Data berhasil di hapus!", {
                    icon: "success",
                    });
                } else {
                    swal("Anda membatalkan menghapus data");
                }
                });
        });
        $('.deleteBarangkeluar').click(function(){
            var barangid = $(this).attr('data-id');
            var namapegawai = $(this).attr('data-name');
            swal({
                title: "Yakin ingin menghapus data?",
                text: namapegawai+" akan di hapus PERMANENT!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/solditems/deleteid="+barangid;
                    swal("Data berhasil di hapus!", {
                    icon: "success",
                    });
                } else {
                    swal("Anda membatalkan menghapus data");
                }
                });
        });
        $('.deleteBarangMasuk').click(function(){
            var barangid = $(this).attr('data-id');
            var namapegawai = $(this).attr('data-name');
            swal({
                title: "Yakin ingin menghapus data?",
                text: namapegawai+" akan di hapus PERMANENT!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/incomeitems/deleteid="+barangid;
                    swal("Data berhasil di hapus!", {
                    icon: "success",
                    });
                } else {
                    swal("Anda membatalkan menghapus data");
                }
                });
        });
    </script>
        <script>
            $('.supplier').click(function(){
                var barangid = $(this).attr('data-id');
                var namapegawai = $(this).attr('data-name');
                swal({
                    title: "Yakin ingin menghapus data?",
                    text: namapegawai+" akan di hapus PERMANENT!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/admin/listsupplier/supplierid="+barangid;
                        swal("Data berhasil di hapus!", {
                        icon: "success",
                        });
                    } else {
                        swal("Anda membatalkan menghapus data");
                    }
                    });
            });
        </script>
        
<script>
    $(document).ready(function(){
        $(document).on('click', '#detailBarang', function(){
            var kodeBarang = $(this).attr('data-kodeBarang');
            var namaBarang = $(this).attr('data-namaBarang');
            var kodeSupplier = $(this).attr('data-kodeSupplier');
            var namaSupplier = $(this).attr('data-namaSupplier');
            var jumlahBarang = $(this).attr('data-jumlahBarang');
            var hargaBarang = $(this).attr('data-hargaBarang');
            var oleh = $(this).attr('data-oleh');
            var waktu = $(this).attr('data-waktu');

            function rubah(angka){
                var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
                ribuan = ribuan.join('.').split('').reverse().join('');
                return ribuan;
            }


            var totalHarga = hargaBarang * jumlahBarang
            var hargaBarang = 'Rp ' + rubah(hargaBarang)
            var totalHarga = 'Rp ' + rubah(totalHarga)
            var jumlahBarang = jumlahBarang + ' Pcs'
           $('#kodeBarang').text(kodeBarang);
           $('#namaBarang').text(namaBarang);
           $('#kodeSupplier').text(kodeSupplier);
           $('#namaSupplier').text(namaSupplier);
           $('#jumlahBarang').text(jumlahBarang);
           $('#hargaBarang').text(hargaBarang);
           $('#oleh').text(oleh);
           $('#totalHarga').text(totalHarga);
           $('#waktu').text(waktu);
        })

        
    });
</script>
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();

} );


</script>
</body>

</html>
<!-- end document-->
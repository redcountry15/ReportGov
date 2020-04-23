<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    
     <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
    
    <div class="wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
    
                                <h3 class="card-title">Cetak Laporan</h3>
    
                              </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="mailbox-read-info">
                                @foreach ($print as $item)
                                {{-- subject --}}
                                    <h5 name ="judul_pengaduan" id="judul_pengaduan">{{$item->judul_pengaduan}}</h5>
                                    {{-- email --}}
                                    <h6 name="email" id="email">From: {{$item->email}}
                                    </div>
                                <!-- /.mailbox-read-info -->
                               
                                <!-- /.mailbox-controls -->
                                <div class="mailbox-read-message">
                                    <p id="isi_pengaduan" name ="isi_pengaduan">{{$item->isi_pengaduan}}}</p>
                                </div>
                                <!-- /.mailbox-read-message -->
                            </div>
                            @endforeach
                            <!-- /.card-body -->
                            <div class="card-footer bg-white">
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>



<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
</body>
</html>
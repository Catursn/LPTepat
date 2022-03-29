<!doctype html>
<html lang="en">
    <head>
        <title>Form Jadwal Demo TEPAT LOGISTIC</title>
        <link rel="shortcut icon" href="img/icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/themify-icons.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/gijgo.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/slicknav.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>

    <body>
    @if(session('success'))
        <div class="alert alert-success alert-dismissable fade show text-center">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            {{session('success')}}
        </div>
    @endif


    @if(session('error'))
        <div class="alert alert-danger alert-dismissable fade show text-center">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            {{session('error')}}
        </div>
    @endif
        <br></br>
        <div class="tulisan text-center">
            <img src="img/iconpanjang.png" alt="">
            <h1>Form Pendaftaran Jadwal Demo Aplikasi Tepat</h1>
        </div>
        <div class="back">
            <div class="rec">
            </div>
        </div>
        <div class="naik">
            <div class="container">
                <form method="POST"action="/form/submit" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="nama" class=" form-control-label">Nama Lengkap <span class="text-muted">*</span></label>
                                </div>
                                <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="wa" class=" form-control-label">Telepon/WA <span class="text-muted">*</span></label>
                                </div>
                                <div class="col-12 col-md-9"><input type="text" id="wa" name="wa" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email" class=" form-control-label">Email <span class="text-muted">*</span></label>
                                </div>
                                <div class="col-12 col-md-9"><input type="email" id="email" name="email" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="perusahaan" class=" form-control-label">Perusahaan <span class="text-muted">*</span></label>
                                </div>
                                <div class="col-12 col-md-9"><input type="text" id="perusahaan" name="perusahaan" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="pesan" class=" form-control-label">Pesan <span class="text-muted">*</span></label>
                                </div>
                                <div class="col-12 col-md-9"><textarea name="pesan" id="pesan" cols="140" rows="10"></textarea></div>
                            </div>       
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
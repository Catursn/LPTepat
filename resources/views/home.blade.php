<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEPAT LOGISTIC</title>
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
</head>
<body>
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/iconpanjang.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="#">Dukungan</a></li>
                                        <li><a href="#">Masuk</a></li>
                                        <li><a href="#">Daftar Gratis</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- slider_area_start -->
    @foreach($banner as $ban)
    <div class="slider_area">
        <div class="single_slider slider_bg_1 d-flex align-items-center" style="background-image: url(..{{$ban->foto}});">
            <div class="container">
                <div class="right">
                    <div class="slider_text">
                        <h3><?php echo $ban->caption; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- slider_area_end -->
    <!-- service_area_start  -->
    <div class="service_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-3 col-md-10 ">
                    <div class="text-center">
                        <div class="box">
                            <h1>BENEFIT</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($benefit as $ben)
                <div class="col-lg-3 col-md-6">
                    <div class="single_service">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="{{$ben->foto}}" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>{{$ben->caption}}</h3>
                         </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- service_area_end -->
    <div class="contact_anipat anipat_bg_1">
        <div class="container">
            <div class="section_title">
                <h3>Feature</h3>
            </div>
            <div class="contact_btn align-items-center justify-content-center">
                <div class="row media">
                    @foreach($feature as $feat)
                    <div class="col-lg-4 text-center">
                        <div class="box">
                            <h2 class="whitetext">{{$feat->feature}}</h2>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="demo">
        <div class="container">
            <div class="text text-center">
                <h1>Kembangkan bisnis anda dengan TEPAT sekarang</h1>
            </div>
        
            <div class="client">
                <div class="row ">
                    <div class="kiri col-50">
                        <div class="content text-center">
                            <img src="img/worker.png" alt="">
                            <h2>Coba Gratis</h2>
                            <h3>Akses seluruh fitur TEPAT by Jagad Creative selama 30 hari tanpa biaya apapun</h3>
                            <a href="#">Coba Gratis</a>
                        </div>
                    </div>
                    <div class="kanan col-50">
                        <div class="content text-center">
                            <img src="img/demo.png" alt="">
                            <h2>Jadwalkan Demo</h2>
                            <h3>Jadwalkan sesi demo dan konsultasikan kebutuhan anda langsung dengan customer service kami</h3>
                            <a href="#">Coba Gratis</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="unique">
        <div class="container">
            <div class="content">
                <h1>UNIQUE</h1>
                <h2>Berbasis Web Integrasi Mobile dan
                    Mudah Dengan Fasilitas Whatsapp.
                    Mudah diakses di mana pun.</h2>
            </div>
        </div>
    </div>
    <div class="features">
        <div class="container">
            <div class="content ">
                <div class="line text-center">
                    <h1>ADDITIONAL FEATURES AND CHEAPER MAINTENANCE</h1>
                </div>
                <div class="client">
                    <h2>Client</h2>
                    <div class="row text-center">
                        @foreach($client as $cli)
                        <div class="col-20">
                            <img src="{{$cli->foto}}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testi">
        <div class="content text-center">
            @foreach($testimoni as $test)
            <h1>“{{$test->testi}}”</h1>
            <p>{{$test->nama}}, {{$test->perusahaan}}</p>
            @endforeach
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-30">
                        <img src="img/iconbw.png" alt="">
                    </div>
                    <div class="row col-70">
                        <div class="text">
                            <a href="#">Pengirim</a>
                        </div>
                        <div class="text">
                            <a href="#">Driver</a>
                        </div>
                        <div class="text">
                            <a href="#">Perusahaan</a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-30">
                        <div class="isi align-items-center">
                            <a href="#"><i class="fa fa-question-circle"></i> Bantuan</a>
                        </div>
                        <div class="isi">
                            <a href="#"><i class="fa fa-paper-plane-o"></i> Hubungi Kami</a>
                        </div>
                        <div class="isi">
                            <a href="#"><i class="fa fa-language"></i> Bahasa Indonesia</a>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="row">
                        <div class="col-3">
                            <div class="sosmed">
                                <img src="img/fb.png" alt="">
                                <img src="img/wa.png" alt="">
                                <img src="img/ig.png" alt="">
                                <img src="img/tw.png" alt="">
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <p>©2022 PT. Jagad Kreatif Nusantara. All Rights Reserved</p>
                        </div>
                        <div class="col-3 text-right">
                            <p>Syarat & Ketentuan</p>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Oviie Qalesya Shop</title>
    <meta name="description" content="Oviie Shop, Oviie Boutique">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/favicon.png"> -->

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            /*display: flex;*/
            /*align-items: center;*/
            /*justify-content: center;*/
            /*background-image: url('assets/images/hero-bg.png');*/
            background-color: #feedbd;
       
        }
        .container{
            background-color: #fff;
            margin-top: 40px;
            padding-left: 45px;
        }
        #header {
            transition: all 0.5s;
            z-index: 997;
            padding: 15px 0;
        }
        .fixed-top {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
        } 
        .align-items-center {
            align-items: center!important;
        }
        .d-flex {
            display: flex!important;
            padding: 30px 45px 11px;
            
        }
        h1 {
            margin-bottom: 5px;
            font-size: 35px;
            /*letter-spacing: 10px;*/
            font-family: 'Roboto', cursive;
            color: #a66780;
            margin: 34% auto;
            /*text-shadow: 0 2px 5px #808080;*/
            /*-webkit-text-stroke: 1px #808080;*/
        }

       #header .logo {
            font-size: 30px;
            margin: 0;
            padding: 0;
            line-height: 1;
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 73px;
        }

        .me-auto {
            margin-right: auto!important;
        }
        .navbar {
            padding: 0;
        }
        .navbar {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        .navbar ul {
            margin: 0;
            padding: 0;
            display: flex;
            list-style: none;
            align-items: center;
        }
        .navbar li {
            position: relative;
        }
        .navbar a:hover, .navbar .active, .navbar .active:focus, .navbar li:hover > a {
            color: goldenrod;
        }
        #hero {
            margin-top: 20px;
        }
        .navbar a, .navbar a:focus {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0 10px 30px;
            font-size: 15px;
            font-weight: 500;
            color: #a66780;
            white-space: nowrap;
            transition: 0.3s;
        }
        section {
            padding: 60px 0;
            overflow: hidden;
        }
        .me-auto{
            position: absolute;
            top:0;
        }
        .footer{
            padding-bottom: 30px;
            color: #a66780;
        }
        .icon-footer{
            color: #a66780;
        }
        .social-links a {
            font-size: 18px;
            display: inline-block;
            background: #a66780;
            color: #fff;
            line-height: 1;
            padding: 8px 0;
            margin-right: 4px;
            border-radius: 50%;
            text-align: center;
            width: 36px;
            height: 36px;
            transition: 0.3s;
            float: right;
        }
        .header-mobile{
            width: 250px;
            padding-top: 10px;
            padding-left: 15px;
            display: none;
        }
        .hr-mobile{
            display: none;
        }
        @media (max-width: 575px){
            .container {
                padding-left: 15px; 
                margin-top: 10px;
            }
            #header {
                display: none;
            }
            #hero {
                margin-top: 0;
                padding: 25px;
            }
            .header-mobile{
                width: 100%;
                padding-top: 10px;
                padding-left: 15px;
                display: block;
            }
            h1 {
                margin-bottom: 5px;
                font-size: 19px;
                text-align: center;
                font-family: 'Roboto', cursive;
                color: goldenrod;
                margin: 0; 
                /* text-shadow: 0 2px 5px #808080; */
                /* -webkit-text-stroke: 1px #808080; */
            }
            #btnContact {
                display: none;
            }
            .copyright{
                display: none;
            }
            .welcome-title{
                display: none;
            }
            .isi{
                margin-top: 20px;
            }
            #img-konten{
                display: none;
            }
            .nav-mobile{
                width: 100%;
                text-align: center;
            }
            .nav-mobile li a{
                color: goldenrod;
                font-size: 21px;
            }
            hr{
                border-bottom: 1px solid goldenrod;
            }
            .social-links {
                text-align: center;
                margin-top: 20px;
            }
            .social-links a {
                float: none;
                background-color: goldenrod;
            }

        }
    </style>
</head>
<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center" style="display: block !important;">
            <h1 class="logo me-auto"> 
                <img src="assets/images/logo-ovie.png" alt="" style="width: 250px;">
            </h1>
            <nav id="navbar" class="navbar" style="float: right;">
                <ul>
                    <li>
                        <a class="nav-link scrollto " href="<?= base_url() ?>daftar">Daftar Member Baru</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="<?= base_url() ?>lupa">Lupa Member ID</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="<?= base_url() ?>ubah-alamat">Ubah Alamat Pengiriman</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="#portfolio">Cara Order</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="#team">Tracking</a>
                    </li>
                </ul> 
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <img src="assets/images/logo-ovie.png" class="header-mobile" >
            </div>
            <?php
                if ($this->router->fetch_class() != 'home'){            
                    $this->load->view($main); 
                }
                else {                  
                    $this->load->view('home/index'); 
                } 
            ?>
            <hr class="hr-mobile">
            <div class="row hr-mobile">
                <ul class="nav-mobile">
                     <li>
                        <a class="nav-link scrollto " href="<?= base_url() ?>daftar">Daftar Member Baru</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="<?= base_url() ?>lupa">Lupa Member ID</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="<?= base_url() ?>ubah-alamat">Ubah Alamat Pengiriman</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="#portfolio">Cara Order</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="#team">Tracking</a>
                    </li>
                </ul>
            </div>
            <div class="row"> 
                <div class="col-md-6 col-sm-12 col-xs-12 footer copyright">
                    Copyright &copy; 2022 &sdot; oviieqalesyashopboutique.com
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 footer">
                    <div class="social-links"> 
                        <a href="#" class="twitter"><i class="fa fa-map"></i></a> 
                        <a href="#" class="facebook"><i class="icon ion-logo-facebook"></i></a> 
                        <a href="#" class="instagram"><i class="icon ion-logo-instagram"></i></a> 
                        <a href="#" class="google-plus"><i class="icon ion-logo-whatsapp"></i></a> 
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <script src="<?= base_url(); ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>

    <script src="<?= base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

    <script src="<?= base_url(); ?>assets/js/jquery.slicknav.min.js"></script>

    <script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/slick.min.js"></script>

    <script src="<?= base_url(); ?>assets/js/wow.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/animated.headline.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.magnific-popup.js"></script>

    <script src="<?= base_url(); ?>assets/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.sticky.js"></script>

    <script src="<?= base_url(); ?>assets/js/contact.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.form.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/mail-script.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/tilt.jquery.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vue"></script> -->
    
    <script type="text/javascript">
        $(document).ready(function(){
            

            onHoverthreeDmovement();

            $(".collapse.show").each(function(){
                $(this).prev(".card-header").find(".fas").addClass("fa-minus").removeClass("fa-plus");
            });
            
            $(".collapse").on('show.bs.collapse', function(){
                $(this).prev(".card-header").find(".fas").removeClass("fa-plus").addClass("fa-minus");
            }).on('hide.bs.collapse', function(){
                $(this).prev(".card-header").find(".fas").removeClass("fa-minus").addClass("fa-plus");
            });
        });

        function onHoverthreeDmovement() {
            var tiltBlock = $('.js-tilt');
            if(tiltBlock.length) {
                $('.js-tilt').tilt({
                    maxTilt: 20,
                    perspective:700, 
                    glare: true,
                    maxGlare: 0
                })
            }
        }
      
    </script>
</body>
</html>

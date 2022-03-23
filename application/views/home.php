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
    <style type="text/css">
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('assets/images/hero-bg.png');
            /*background-color:#C71585;*/
            /*background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);*/
        }
        .container {
            text-align: center;
        }   
        h1 {
            margin-bottom: 5px;
            font-size: 40px;
            letter-spacing: 10px;
            font-family: 'Caveat', cursive;
            color: #fff;
            text-shadow: 0 2px 5px #808080;
            /*-webkit-text-stroke: 1px #808080;*/
        }
        h5 {
            margin: 0 0 50px 0;
            font-size: 30px;
            /*font-family: sans-serif;*/
            font-family: 'Caveat', cursive;
            /*letter-spacing: 4px;*/
            color: #fff;
            font-weight: bold;
            text-shadow: 0 2px 5px #808080;

        }
        small {
            display: block;
            font-family: 'Pacifico', cursive;
            letter-spacing: 2px;
            color: #fff;
            font-size: 10px;
            margin-top: 50px;
        }
        .button-1 {
            background-color: #fff;
            border: 3px solid gold;
            border-radius: 50px;
            font-family: 'Caveat', cursive;
            -webkit-transition: all .15s ease-in-out;
            transition: all .15s ease-in-out;
            color: hsla(37, 95%, 67%, 1);
            box-shadow: 0 0 5px 0 #ff9700 inset, 0 0 10px 2px #ff9700;

        }
        .button-1:hover {
            box-shadow: 0 0 10px 0 #ff9700 inset, 0 0 20px 2px #ff9700;
            border: 3px solid #FFF;
            color: #fff;
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            70% {
                transform: scale(.9);
            }
            100% {
                transform: scale(1);
            }
        }

        .logo-samping {
            background-color: #ffff;
            border: solid 2px #ffad00;
            border-radius: 50%;
            padding: 29px;
            width: 460px;
            box-shadow: 0 0 10px 0 #ff9700 inset, 0 0 20px 2px #ff9700;

        }

        footer{
            position: fixed;
            bottom: 0;
            text-align: center;
            width: 100%;
            padding: 20px 0;
        }
        @media (max-width: 575px){
            .logo-samping {
                background-color: #ffff;
                border: solid 7px gold;
                border-radius: 50%;
                padding: 29px;
                width: 198px;
                margin-bottom: 20px;
            }

            .welcome-title{
                display: none;
            }
            .isi{
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.jpg" alt="">
                </div>
            </div>
        </div>
    </div> -->

    <div class="container">
        <?php
            if ($this->router->fetch_class() != 'home'){            
                $this->load->view($main); 
            }
            else {                  
                $this->load->view('home/index'); 
            } 
        ?>
    </div>
    <footer>Copyright &copy; 2022 &sdot; oviieqalesyashopboutique.com</footer>
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
    <? $this->load->view($js); ?> 
</body>
</html>

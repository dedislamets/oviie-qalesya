<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <title>Oviie Qalesya</title>
    <link href="<?= base_url() ?>assets/css/application.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="<?= base_url() ?>assets/main/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/main/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/bower_components/jstree/css/style.min.css">
    <!-- as of IE9 cannot parse css files with more that 4K classes separating in two files -->
    <!--[if IE 9]>
        <link href="css/application-ie9-part2.css" rel="stylesheet">
        <![endif]-->
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
        chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
        https://code.google.com/p/chromium/issues/detail?id=332189
        */
    </script>
    <style type="text/css">
        .select2-container{
            width: 95% !important;
        }
        .select2-container--open .select2-dropdown {
            width: 446px !important;
            z-index: 2000;
        }
        .select2.select2-container.select2-container--default .select2-selection.select2-selection--single, .select2.select2-container.select2-container--default .select2-selection.select2-selection--multiple {
            background: #fff;
            border: 1px solid #c1ccd3;
        }
        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
            color: #e0a10f;
        }
        .navbar-white {
          background-color: #d4d4d4 !important;
        }
        .sidebar-nav {
          padding: 0;
        }
        .error {
            color: red;
        }
        .bold{
            font-weight: bold;
        }
    </style>
</head>

<body class="" >
    <!-- This is the white navigation bar seen on the top. A bit enhanced BS navbar. See .page-controls in _base.scss. -->
    <nav class="page-controls navbar navbar-dashboard navbar-white">
       
        <div class="container-fluid">
            <div class="navbar-header mobile-hidden">
                <ul class="nav navbar-nav toggle-sidebar">
                    <li class="d-md-none d-flex nav-item">
                        <a id="toggleSidebar" class="nav-link">
                            <i class="la la-bars"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown nav-item">
                        <a href="#"
                           class="nav-link"
                           id="notifications-dropdown-toggle"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                           data-position="bottom-middle-aligned"
                           data-disable-interaction="false"
                        >
                            <i class="icons notifications-icon"></i>
                            <i class="fa fa-circle text-danger"></i>
                        </a>
                        <ul tabindex="-1" class="dropdown-menu dropdown-menu-messages dropdown-menu-right comments">
                            <p class="dropdown-name">Notifications</p>
                            <p class="dropdown-date">Today</p>
                            <li role="presentation">
                                <a role="menuitem" target="_self" href="#" class="dropdown-item">
                                        <span class="avatar thumb-sm mr-3">
                                            <img src="<?= base_url() ?>assets/img/avatars/tn1.png" alt="..." class="rounded-circle pt-1">
                                        </span>
                                    <div>
                                        <span> <span class="fw-bold">Jim Tomson </span> removed you to the project <span class="fw-bold"> Flatlogic One</span> </span>
                                    </div>
                                    <div>
                                        <span class="dropdown-time">9:15 AM</span>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" target="_self" href="#" class="dropdown-item">
                                        <span class="avatar thumb-sm mr-3">
                                            <img src="<?= base_url() ?>assets/img/avatars/tn2.png" alt="..." class="rounded-circle pt-1">
                                        </span>
                                    <div>
                                        <span> <span class="fw-bold">Elena Bureeva </span> invited you to the project <span class="fw-bold">Flatlogic One</span> </span>
                                    </div>
                                    <div>
                                        <span class="dropdown-time">9:15 AM</span>
                                    </div>
                                </a>
                            </li>
                            <p class="dropdown-date">Yesterday</p>
                            <li role="presentation">
                                <a role="menuitem" target="_self" href="#" class="dropdown-item">
                                        <span class="avatar thumb-sm mr-3">
                                            <img src="<?= base_url() ?>assets/img/avatars/tn1.png" alt="..." class="rounded-circle pt-1">
                                        </span>
                                    <div>
                                        <span> <span class="fw-bold">Jim Tomson </span> removed you to the project <span class="fw-bold"> Flatlogic One</span> </span>
                                    </div>
                                    <div>
                                        <span class="dropdown-time">9:15 AM</span>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" target="_self" href="#" class="dropdown-item">
                                        <span class="avatar thumb-sm mr-3">
                                            <img src="<?= base_url() ?>assets/img/avatars/tn3.png" alt="..." class="rounded-circle pt-1">
                                        </span>
                                    <div>
                                        <span> <span class="fw-bold">Elena Bureeva </span> invited you to the project <span class="fw-bold">Flatlogic One</span> </span>
                                    </div>
                                    <div>
                                        <span class="dropdown-time">9:15 AM</span>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <button role="menuitem" type="button" class="dropdown-item">
                                    <span class="ml-auto text-warning">See more
                                        <i class="fa fa-arrow-right ml-1"></i>
                                    </span>
                                </button>
                            </li>
                        </ul>
                    </li>
              
                    <li class="dropdown nav-item">
                        <a
                                href="#"
                                role="button"
                                class="dropdown-toggle dropdown-toggle-notifications nav-link profile"
                                id="notifications-dropdown-toggle"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-position="bottom-middle-aligned"
                                data-disable-interaction="false"
                        >
                            <span class="avatar float-left">
                                <img class="rounded-circle" src="<?= base_url() ?>assets/img/avatars/a7.png" alt="..." >
                            </span>
                        </a>
                        <ul tabindex="-1" class="dropdown-menu dropdown-menu-messages dropdown-menu-right comments profile">
                            <p class="dropdown-name"><?= $this->session->userdata('username') ?></p>
                            <p class="dropdown-date text-warning mt-n2"><?= $this->session->userdata('email') ?></p>
    
                            <!-- <li role="presentation">
                                <a role="menuitem" target="_self" href="#" class="dropdown-item">
                                    <span class="mr-3">
                                        <img src="<?= base_url() ?>assets/img/icons/settings_outlined.svg" alt="...">
                                    </span>
                                    <div>
                                        <span>Settings </span>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" target="_self" href="#" class="dropdown-item">
                                        <span class="mr-3">
                                            <img src="<?= base_url() ?>assets/img/icons/profile_outlined.svg" alt="...">
                                        </span>
                                    <div>
                                        <span>Account </span>
                                    </div>
                                </a>
                            </li> -->
                            <li role="presentation">
                                <a role="menuitem" target="_self" href="<?= base_url() ?>login/keluar" class="dropdown-item">
                                        <span class="mr-3">
                                            <img src="<?= base_url() ?>assets/img/icons/logout_outlined.svg" alt="...">
                                        </span>
                                    <div>
                                        <span>Log out </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav id="sidebar" class="sidebar" role="navigation">
        <!-- need this .js class to initiate slimscroll -->
        <div class="js-sidebar-content" style="overflow: hidden; width: auto; height: 100vh;">
            <header class="logo d-md-block">
                <a href="<?= base_url() ?>dashboard">
                    <img src="<?= base_url() ?>assets/img/logo.svg" alt="...">
                    <b class="fw-bold">Oviie</b> Qalesya</a>
            </header>
            <?php $this->load->view('nav'); ?>
            <!-- <h5 class="sidebar-nav-title">App</h5>
            <ul class="sidebar-nav">
                <li class=" active ">
                    <a href="<?= base_url() ?>dashboard">
                        <i class="sidebar-icon dashboard-icon"></i>
                        <span class="icon">Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?= base_url() ?>">
                        <i class="sidebar-icon dashboard-icon"></i>
                        <span class="icon">Home</span>
                    </a>
                </li>
            </ul>

            <ul class="sidebar-nav">
                <li class="">
                    <a class="" href="#sidebar-product" data-toggle="collapse" data-parent="#sidebar" aria-expanded="true">
                        <i class="sidebar-icon typography-icon"></i>
                        <span class="icon">Master</span>
                        <i class="toggle fa fa-angle-down"></i>
                    </a>
                    <ul id="sidebar-product" class="collapse" style="">
                        <li class="" style="margin:0">
                            <a href="<?= base_url() ?>barang">
                                <i class="sidebar-icon typography-icon"></i>
                                <span class="icon">Barang</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?= base_url() ?>users">
                                <i class="sidebar-icon account-icon"></i>
                                <span class="icon">User</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?= base_url() ?>members">
                                <i class="sidebar-icon ui-elements"></i>
                                <span class="icon">Members</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
            </ul>
            <ul class="sidebar-nav">
                <hr>
                <li class="">
                    <a href="<?= base_url() ?>posting">
                        <i class="sidebar-icon settings-icon"></i>
                        <span class="icon">Posting & Comment</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?= base_url() ?>order">
                        <i class="sidebar-icon fa fa-book"></i>
                        <span class="icon">Rekapan</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?= base_url() ?>order/listinv">
                        <i class="sidebar-icon tables-icon"></i>
                        <span class="icon">Invoice</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?= base_url() ?>payment">
                        <i class="sidebar-icon account-icon"></i>
                        <span class="icon">Mutasi Payment</span>
                    </a>
                </li>
                <li class="">
                  <a href="<?= base_url() ?>pesan">
                    <i class="sidebar-icon fa fa-envelope"></i>
                    <span class="icon">WA Pending</span>
                  </a>
                </li>
                <li class="">
                  <a href="<?= base_url() ?>setup">
                    <i class="sidebar-icon settings-icon"></i>
                    <span class="icon">Setting</span>
                  </a>
                </li>
                <li class="">
                    <a href="login.html" target="_blank" data-no-pjax>
                        <i class="sidebar-icon logout-icon"></i>
                        <span class="icon">Logout</span>
                    </a>
                </li>
            </ul> -->
        </div>
    </nav>
    <div class="content-wrap">
        <!-- main page content. the place to put widgets in. usually consists of .row > .col-lg-* > .widget.  -->
        <main id="content" class="content" role="main">
          <div id="app">
            <?php 
              if($this->router->fetch_class() != 'dashboard'){            
                  $this->load->view($main); 
              }
              else {                  
                  $this->load->view('dashboard/index'); 
              } 
            ?>  
            <?php
              $this->load->view($modal); 
            ?>

          </div>
        </main>
    </div>
    <!-- The Loader. Is shown when pjax happens -->
    <div class="loader-wrap hiding hide">
        <i class="fa fa-circle-o-notch fa-spin-fast"></i>
    </div>

    <!-- common libraries. required for every page-->

    <script src="<?= base_url() ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/jquery-pjax/jquery.pjax.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
    <script src="<?= base_url() ?>assets/node_modules/bootstrap/js/dist/util.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/widgster/widgster.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/hammerjs/hammer.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/jquery-hammerjs/jquery.hammer.js"></script>


    <!-- common app js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?= base_url() ?>assets/js/settings.js"></script>
    <script src="<?= base_url() ?>assets/js/app.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/apexcharts/dist/apexcharts.js"></script>

    <!-- Page scripts -->
    <script src="<?= base_url() ?>assets/node_modules/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/jquery-autosize/jquery.autosize.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/node_modules/select2/dist/js/select2.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/node_modules/switchery/dist/switchery.min.js"></script> -->
    <script src="<?= base_url() ?>assets/node_modules/moment/min/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script> -->
    <script src="<?= base_url() ?>assets/node_modules/jasny-bootstrap/js/inputmask.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/jasny-bootstrap/js/fileinput.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/holderjs/holder.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/dropzone/dist/min/dropzone.min.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/markdown/lib/markdown.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/bootstrap-markdown/js/bootstrap-markdown.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/bootstrap-slider/dist/bootstrap-slider.min.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/summernote/dist/summernote.js"></script>
    <script src="<?= base_url() ?>assets/main/lib/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>assets/main/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/moment-with-locales.min.js"></script>
    <script src="<?= base_url(); ?>assets/bower_components/jstree/js/jstree.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/js/components/ui-modal.js"></script> -->
    
    <script type="text/javascript">
        $(document).ready(function(){  
            $(document).on('show.bs.modal', '.modal', function () {
              $(this).appendTo('body');
            });
        })
        moment.locale('id');
        function alertOK(href="", text = "Berhasil disimpan..!") {
         Swal.fire({ title: text,
             text: "",
             timer: 2000,
             icon: 'success',
             showConfirmButton: false,
             willClose: () => {
               if(href != "")
                  href;
            }
          });
      }

      function alertError(textError = "'Silahkan cek kembali data anda!'") {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: textError,
            showConfirmButton: false,
            timer: 2000,
          })
      }
    </script>
    <!-- page specific js -->
    <!-- <script src="<?= base_url() ?>assets/js/form/form-elements.js"></script> -->
    
    <?php
      $this->load->view($js); 
    ?>
    
    
</body>

</html>



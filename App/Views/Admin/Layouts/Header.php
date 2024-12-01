<?php

namespace App\Views\Admin\Layouts;

use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {

?>
        <!DOCTYPE html>
        <html dir="ltr" lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Admin</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <!-- Favicon icon -->
            <!-- <link rel="icon" type="image/png" sizes="16x16" href="<?= APP_URL ?>/public/assets/admin/images/favicon.png"> -->
            <!-- CSS -->
            <!-- <link href="<?= APP_URL ?>/public/assets/admin/libs/flot/css/float-chart.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/extra-libs/multicheck/multicheck.css">
            <link href="<?= APP_URL ?>/public/assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/select2/dist/css/select2.min.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/jquery-minicolors/jquery.minicolors.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
            <link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/public/assets/admin/libs/quill/dist/quill.snow.css"> -->




            <!-- Custom CSS -->
            <!-- <link href="<?= APP_URL ?>/public/assets/admin/dist/css/style.min.css" rel="stylesheet"> -->
            <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
            <!-- Favicon icon -->
            <link rel="icon" type="image/png" sizes="16x16" href="../../../../public/assets/admin/assets/images/favicon.png">
            <!-- Custom CSS -->
            <link href="../../../../public/assets/admin/assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
            <!-- Custom CSS -->
            <link href="../../../../public/assets/admin/css/style.min.css" rel="stylesheet">

        </head>

        <body>
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Main wrapper - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
                data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
                <!-- ============================================================== -->
                <!-- Topbar header - style you can find in pages.scss -->
                <!-- ============================================================== -->
                <header class="topbar" data-navbarbg="skin6">
                    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                        <div class="navbar-header">
                            <!-- ============================================================== -->
                            <!-- Logo -->
                            <!-- ============================================================== -->
                            <a class="navbar" href="/admin">

                                <h1 class="text-white px-2 mt-2">LVK House</h1>

                            </a>
                            <!-- ============================================================== -->
                            <!-- End Logo -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- toggle and nav items -->
                            <!-- ============================================================== -->
                            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                            <!-- ============================================================== -->
                            <!-- toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav me-auto mt-md-0 ">
                                <!-- ============================================================== -->
                                <!-- Search -->
                                <!-- ============================================================== -->

                                <li class="nav-item hidden-sm-down">
                                    <form class="app-search ps-3">
                                        <input type="text" class="form-control" placeholder="Tìm kiếm..."> <a
                                            class="srh-btn"><i class="ti-search"></i></a>
                                    </form>
                                </li>
                            </ul>

                            <!-- ============================================================== -->
                            <!-- Right side toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav">
                                <!-- ============================================================== -->
                                <!-- User profile and search -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="<?= APP_URL ?>/public/assets/admin/images/users/1.jpg" alt="user" class="rounded-circle me-2" width="31">
                                        Admin
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                        <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/logout"><i class="fa fa-power-off me-1"></i> Đăng xuất</a></li>
                                    </ul>
                                </li>


                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- ============================================================== -->
                <!-- End Topbar header -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <aside class="left-sidebar" data-sidebarbg="skin6">
                    <!-- Sidebar scroll-->
                    <div class="scroll-sidebar">
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav">
                                <!-- User Profile-->
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="/admin" aria-expanded="false"><i class="me-3 far fa-clock fa-fw"
                                            aria-hidden="true"></i><span class="hide-menu">Bảng điều khiển</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="/admin/users" aria-expanded="false">
                                        <i class="me-3 fa fa-user" aria-hidden="true"></i><span
                                            class="hide-menu">Người dùng</span></a>
                                </li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="/admin/categories" aria-expanded="false"><i class="me-3 fa fa-table"
                                            aria-hidden="true"></i><span class="hide-menu">Loại sản phẩm</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="/admin/products" aria-expanded="false"><i class="me-3 fa fa-columns"
                                            aria-hidden="true"></i><span class="hide-menu">Sản phẩm</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="/admin/comments" aria-expanded="false"><i class="me-3 fa fa-font"
                                            aria-hidden="true"></i><span class="hide-menu">Bình luận</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="/admin/blogs" aria-expanded="false"><i class="me-3 fa fa-font"
                                            aria-hidden="true"></i><span class="hide-menu">Bài viết</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="/admin/productvariant" aria-expanded="false"><i class="me-3 fa fa-font"
                                            aria-hidden="true"></i><span class="hide-menu">Loại biến thể</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="/admin/productvariantoption" aria-expanded="false"><i class="me-3 fa fa-font"
                                            aria-hidden="true"></i><span class="hide-menu">Biến thể</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="/admin/skus" aria-expanded="false"><i class="me-3 fa fa-font"
                                            aria-hidden="true"></i><span class="hide-menu"> Sản phẩm biến thể</span></a></li>


                            </ul>

                        </nav>
                        <!-- End Sidebar navigation -->
                    </div>
                    <!-- End Sidebar scroll-->
                </aside>
                <!-- ============================================================== -->
                <!-- End Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Page wrapper  -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->



            </div>



        </body>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




<?php

    }
}

?>
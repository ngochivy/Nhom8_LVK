<?php

namespace App\Views\Admin\Pages\User;

use App\Views\BaseView;

class Create extends BaseView
{
    public static function render($data = null)
    {
?>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ NGƯỜI DÙNG</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm người dùng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" action="/admin/users" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm người dùng</h4>
                                    <input type="hidden" name="method" id="" value="POST">
                                    <div class="form-group">
                                        <label for="Username">Tên đang nhập*</label>
                                        <input type="text" class="form-control" id="Username" placeholder="Nhập tên tên đăng nhập..." name="Username" >
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email*</label>
                                        <input type="Email" class="form-control" id="Email" placeholder="Nhập email..." name="Email" >
                                    </div>
                                    <div class="form-group">
                                        <label for="Name">Họ và tên*</label>
                                        <input type="text" class="form-control" id="Name" placeholder="Nhập họ và tên người dùng..." name="Name" >
                                    </div>
                                    <div class="form-group">
                                        <label for="Phone_number">Số điện thoại*</label>
                                        <input type="text" class="form-control" id="Phone_number" placeholder="Nhập số điện thoại..." name="Phone_number" >
                                    </div>
                                    <div class="form-group">
                                        <label for="Address">Địa chỉ*</label>
                                        <input type="text" class="form-control" id="Address" placeholder="Nhập địa chỉ..." name="Address" >
                                    </div>

                                    <div class="form-group">
                                        <label for="Password">Mật khẩu*</label>
                                        <input type="Password" class="form-control" id="Password" placeholder="Nhập mật khẩu..." name="Password" >
                                    </div>  
                                    <div class="form-group">
                                        <label for="re_password">Nhập lại mật khẩu*</label>
                                        <input type="password" class="form-control" id="re_password" placeholder="Nhập lại mật khẩu..." name="re_password" >
                                    </div>
                                    <div class="form-group">
                                        <label for="Image">Hình đại diện</label>
                                        <input type="file" class="form-control" id="Image" placeholder="Chọn ảnh đại điện..." name="Image" >
                                    </div>
                                    <div class="form-group">
                                        <label for="Role">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="Role" name="Role">
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1">Admin</option>
                                            <option value="0">Người dùng</option>

                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="Status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="Status" name="Status">
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                        <button type="submit" class="btn btn-primary" name="">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

    <?php
    }
}

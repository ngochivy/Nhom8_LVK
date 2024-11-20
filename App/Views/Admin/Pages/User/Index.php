<?php

namespace App\Views\Admin\Pages\User;

use App\Views\BaseView;

class Index extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">QUẢN LÝ LOẠI SẢN PHẨM</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách loại sản phẩm</li>
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
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách người dùng</h5>
                                <?php
                                if (count($data)) :
                                ?>
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped ">
                                            <thead>
                                                <tr><th>ID</th>
                                                    <th>ảnh đại diện</th>
                                                    <th>Tên đăng nhập</th>
                                                    <th>Họ tên</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Quyền</th>
                                                    <th>Trạng thái</th>
                                                    <th> <a href="/admin/users/create" class="btn btn-success ">Thêm mới</a></th></tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($data as $item) :
                                                ?>
                                                    <tr>
                                                        <td><?= $item['User_ID'] ?></td>
                                                        <td>
                                                            <img src="<?= APP_URL ?>/public/uploads/users/<?= $item['Image'] ?>" alt="" width="100px">
                                                        </td>

                                                        <td><?= $item['Username'] ?></td>
                                                        <td><?= $item['Name'] ?></td>
                                                        <td><?= $item['Email'] ?></td>
                                                        <td><?= $item['Phone_number'] ?></td>
                                                        <td><?= $item['Address'] ?></td>
                                                        <td><?= ($item['Role'] == 1) ? 'Quản trị viên' : 'Khách hàng' ?></td>
                                                        <td><?= ($item['Status'] == 1) ? 'Hoạt động' : 'khóa' ?></td>


                                                        <td>
                                                            <a href="/admin/users/<?= $item['User_ID'] ?>" class="btn btn-primary ">Sửa</a>
                                                            <?php
                                                            if (isset($_SESSION['user']['id']) != $item['User_ID']) :
                                                            ?>
                                                                <form action="/admin/users/<?= $item['User_ID'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chưa?')">
                                                                    <input type="hidden" name="method" value="DELETE">
                                                                    <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                                </form>
                                                            <?php
                                                            endif;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endforeach;


                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php
                                else :

                                ?>
                                    <h4 class="text-center text-danger">Không có dữ liệu</h4>
                                <?php
                                endif;

                                ?>
                            </div>
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

<?php

namespace App\Views\Admin\Pages\Comment;

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
                        <h4 class="page-title">QUẢN LÝ BÌNH LUẬN</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách bình luận</li>
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
                                <h5 class="card-title">Danh sách bình luận</h5>
                                <?php
                                if (count($data)) :
                                ?>
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>Comment_ID</th>
                                                    <th>Content</th>
                                                    <th>User_ID</th>
                                                    <th>Proudct_ID </th>
                                                    <th>Created_at</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($data as $item) :
                                                ?>
                                                    <tr>
                                                        <td><?= $item['Comment_ID'] ?></td>
                                                        <td>
                                                            <a href="/admin/users/<?= $item['User_ID'] ?>"></a>

                                                        </td>
                                                        <td>
                                                            <a href="/admin/products/<?= $item['Product_ID'] ?>"></a>


                                                        </td>
                                                        <td><?= $item['Content'] ?></td>
                                                        <td><?= $item['Created_at'] ?></td>
                                                        <td><?= ($item['Status'] == 1) ? 'Hiển thị' : 'Ẩn' ?></td>
                                                        <td>
                                                            <a href="/admin/comments/<?= $item['Comment_ID'] ?>" class="btn btn-primary ">Sửa</a>
                                                            <form action="/admin/comments/<?= $item['Comment_ID'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Chắc chưa?')">
                                                                <input type="hidden" name="method" value="DELETE" id="">
                                                                <button type="submit" class="btn btn-danger text-white">Xoá</button>
                                                            </form>
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

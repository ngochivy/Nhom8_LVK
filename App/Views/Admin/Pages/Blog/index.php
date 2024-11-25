<?php

namespace App\Views\Admin\Pages\Blog;

use App\Views\BaseView;

class index extends BaseView
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
                        <h4 class="page-title">QUẢN LÝ BÀI VIẾT</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách bài viết</li>
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
                                <h5 class="card-title">Danh sách bài viết</h5>
                                <?php
                                if (count($data)) :
                                ?>
                                    <div class="table-responsive " style="width: 100%; border-collapse: collapse;">
                                        <table id="" class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tiêu đề</th>
                                                    <th>Nội dung</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Tác giả</th>
                                                    <th> <a href="/admin/blog/create" class="btn btn-success ">Thêm mới</a></th>
                                                </tr>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($data as $item) :
                                                ?>
                                                    <tr>
                                                        <td><?= $item['Blog_ID'] ?></td>
                                                        <td><?= $item['Title'] ?></td>
                                                        <td><?= $item['Content'] ?></td>
                                                        <td>
                                                            <img src="<?= APP_URL ?>/public/uploads/blogs/<?= $item['Image'] ?>" alt="" width="100px">
                                                        </td>
                                                        <td><?= $item['Author_ID'] ?></td>
                                                        <td>
                                                            <a href="/admin/blog/<?= $item['Blog_ID'] ?>" class="btn btn-primary ">Sửa</a>
                                                            <form action="/admin/blog/<?= $item['Blog_ID'] ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc chắn sửa!?')">
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

<?php

namespace App\Views\Admin\Pages\Blog;

use App\Views\BaseView;

class Edit extends BaseView
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
                        <h4 class="page-title">QUẢN LÝ BÀI VIẾT</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa bài viết</li>
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
                            <form class="form-horizontal" action="/admin/blogs/" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa bài viết</h4>
                                    <input type="hidden" name="method" id="" value="PUT">

                                    <div align="center">
                                        <img src="<?=APP_URL?>/public/uploads/blogs/" alt="" width="300px">
                                    </div>
                                    <div class="form-group">
                                        <label for="Blog_ID">ID</label>
                                        <input type="text" class="form-control" id="Blog_ID" name="Blog_ID" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="Title">Title</label>
                                        <input type="text" class="form-control" id="Title" name="Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="Content">Content</label>
                                        <input type="text" class="form-control" id="Content" name="Content" >
                                    </div>
                                    <div class="form-group">
                                        <label for="Image">Hình ảnh</label>
                                        <input type="text" class="form-control" id="Image" placeholder="..." name="Image">
                                    </div>
                                    <div class="form-group">
                                        <label for="Author_ID">Author_ID</label>
                                        <input type="text" class="form-control" id="Author_ID" placeholder="..." name="Author_ID">
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white" name="">Làm lại</button>
                                        <button type="submit" class="btn btn-primary" name="">Cập nhật</button>
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

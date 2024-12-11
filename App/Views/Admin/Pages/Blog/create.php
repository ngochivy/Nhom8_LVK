<?php

namespace App\Views\Admin\Pages\Blog;

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
                        <h4 class="page-title">QUẢN LÝ BÀI VIẾT</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm bài viết</li>
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
                <!-- Start Page content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal fixed-form" action="/admin/blogs" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Thêm bài viết</h4>
                                    <input type="hidden" name="method" id="" value="POST">

                                    <!-- Tên bài viết -->
                                    <div class="form-group">
                                        <label for="title">Tên</label>
                                        <input type="text" class="form-control" id="title" placeholder="Nhập tên bài viết..." name="title">
                                    </div>

                                    <!-- Nội dung bài viết -->
                                    <div class="form-group">
                                        <label for="content">Nội dung</label>
                                        <textarea type="text" class="form-control" id="content" name="content"></textarea>
                                    </div>

                                    <!-- Hình ảnh -->
                                    <div class="form-group">
                                        <label for="Image">Hình ảnh</label>
                                        <input type="file" class="form-control" id="Image" placeholder="Chọn hình ảnh..." name="image">
                                    </div>

                                    <!-- Tác giả -->
                                    <div class="form-group">
                                        <label for="author_id">Tác giả</label>
                                        <select class="form-control" id="author_id" name="author_id">
                                            <option value="">Chọn tác giả</option>
                                            <?php foreach ($data['authors'] as $author): ?>
                                                <option value="<?= $author['id'] ?>"><?= $author['username'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>



                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="reset" class="btn btn-danger text-white">Làm lại</button>
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page content -->
                <!-- ============================================================== -->
            </div>

            <!-- CKEditor -->
            <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
            <script>
                // Apply CKEditor to the content textarea
                CKEDITOR.replace('content');
            </script>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->


    <?php
    }
}

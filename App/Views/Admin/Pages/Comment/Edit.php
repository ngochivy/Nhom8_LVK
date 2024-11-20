<?php

namespace App\Views\Admin\Pages\Comment;

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
                        <h4 class="page-title">QUẢN LÝ BÌNH LUẬN</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa bình luận</li>
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
                            <form class="form-horizontal" action="/admin/comments/<?= $data['Comment_ID'] ?>" method="POST">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa bình luận</h4>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div class="form-group">
                                        <label for="Comment_ID">ID</label>
                                        <input type="text" class="form-control" id="Comment_ID"  name="Comment_ID" value="<?= $data['Comment_ID'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="Content">Content</label><input type="text" class="form-control" id="Content"  name="Content" value="<?= $data['Content'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="User_ID">User_ID</label>
                                        <input type="text" class="form-control" id="User_ID"  name="User_ID" value="<?= $data['User_ID'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="Product_ID">Product_ID</label>
                                        <textarea class="form-control" id="Product_ID"  name="Product_ID" rows="3" disabled><?= $data['Product_ID'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Created_at">Created_at</label>
                                        <input type="text" class="form-control" id="Created_at"  name="Created_at" value="<?= $data['Created_at'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="Status">Trạng thái*</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="Status" name="Status" value="<?= $data['Status'] ?>" required>
                                            <option value="" selected disabled>Vui lòng chọn...</option>
                                            <option value="1" <?= ($data['Status'] == 1 ? 'selected' : '') ?>>Hiển thị</option>
                                            <option value="0" <?= ($data['Status'] == 0 ? 'selected' : '') ?>>Ẩn</option>

                                        </select>
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
                <!-- ============================================================== --><!-- .right-sidebar -->
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
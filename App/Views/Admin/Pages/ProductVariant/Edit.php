<?php

namespace App\Views\Admin\Pages\ProductVariant;

use App\Models\Product;
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
                        <h4 class="page-title">QUẢN LÝ LOẠI BIẾN THỂ</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sửa loại biến thể</li>
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
                            <form class="form-horizontal" action="/admin/productvariant/<?= $data['dataVariant']['id'] ?>" method="POST">
                                <div class="card-body">
                                    <h4 class="card-title">Sửa loại sản phẩm</h4>
                                    <input type="hidden" name="method" id="" value="PUT">
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" id="id"  name="id" value="<?= $data['dataVariant']['id'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên*</label>
                                        <input type="text" class="form-control" id="name"  value="<?= $data['dataVariant']['name'] ?>" placeholder="Nhập tên loại sản phẩm..." name="name" >
                                    </div>
                                    <div class="form-group">
                                        <label for="product_id">Loại sản phẩm</label>
                                        <select class="select2 form-select shadow-none" style="width: 100%; height:36px;" id="product_id" name="product_id">
                                            <option value="" selected disabled>vui lòng chọn...</option>

                                            <?php
                                            foreach ($data['dataProduct'] as $item) :
                                            ?>
                                                <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['dataVariant']['product_id']) ? 'selected' : '' ?>><?= $item['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>



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

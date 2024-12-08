<?php

namespace App\Views\Admin;

use App\Views\BaseView;

class Home extends BaseView
{
    public static function render($data = null)
    {

?>

        <body>

            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="page-breadcrumb">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-8 align-self-center">
                            <h3 class="page-title mb-0 p-0"><a href="/admin">Thống kê</a></h3>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">

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
                    <!-- Sales chart -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- Column -->
                        <div class="col-md-3">
                            <div class="card card-hover">
                                <div class="box bg-cyan text-center">
                                    <h1 class="font-light text-white"><i class="fa fa-users"></i> <?= $data['total_user'] ?></h1>
                                    <h6 class="text-white">Người dùng</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-3">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white"><i class="fa fa-chart-bar"></i><?= $data['total_category'] ?></h1>
                                    <h6 class="text-white">Loại sản phẩm</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-3">
                            <div class="card card-hover">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white"><i class="fa fa-cube"></i><?= $data['total_product'] ?></h1>
                                    <h6 class="text-white">Sản phẩm</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-3">
                            <div class="card card-hover">
                                <div class="box bg-danger text-center">
                                    <h1 class="font-light text-white"><i class="fa fa-th-large"></i><?= $data['total_productvariant'] ?></h1>
                                    <h6 class="text-white">Loại biến thể</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-3">
                            <div class="card card-hover">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white"><i class="fa fa-code-branch"></i><?= $data['total_productvariantoption'] ?></h1>
                                    <h6 class="text-white">Biến thể</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-md-3">
                            <div class="card card-hover">
                                <div class="box bg-danger text-center">
                                    <h1 class="font-light text-white"><i class="fa fa-list-alt"></i><?= $data['total_sku'] ?></h1>
                                    <h6 class="text-white">Sản phẩm biến thể</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-3">
                            <div class="card card-hover">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white"><i class="fa fa-file-alt"></i></i><?= $data['total_blog'] ?></h1>
                                    <h6 class="text-white">Bài viết</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-3">
                            <div class="card card-hover">
                                <div class="box bg-cyan text-center">
                                    <h1 class="font-light text-white"><i class="fa fa-comments"></i><?= $data['total_comment'] ?></h1>
                                    <h6 class="text-white">Bình luận</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-3">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white"><i class="fa fa-shopping-cart"></i><?= $data['total_user'] ?></h1>
                                    <h6 class="text-white">Đơn hàng</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h4>Thống kê sản phẩm theo loại</h4>
                                    </div>

                                    <canvas id="product_by_category"></canvas>

                                </div>

                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h4>5 sản phẩm có lượt tương tác nhiều nhất</h4>
                                    </div>

                                    <canvas id="comment_by_product"></canvas>

                                </div>

                            </div>

                        </div>
                    </div>


                    <script>
                        function productByCategoryChart() {
                            var php_data= <?= json_encode($data['product_by_category']) ?>;
                            var labels=[];
                            var data=[];

                            for(let i of php_data){
                                labels.push(i.name);
                                data.push(i.count);
                            }
                            const ctx = document.getElementById('product_by_category');
                            
                            new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Loại sản phẩm',
                                        data: data,
                                        borderWidth: 1
                                    }]
                                },
                                // options: {
                                //     scales: {
                                //         y: {
                                //             beginAtZero: true
                                //         }
                                //     }
                                // }
                            });
                        }
                        function commentByProductChart() {
                            var php_data= <?= json_encode($data['comment_by_product']) ?>;
                            var labels=[];
                            var data=[];

                            for(let i of php_data){
                                labels.push(i.name);
                                data.push(i.count);
                            }
                            const ctx = document.getElementById('comment_by_product');
                            
                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Số lượng bình luận',
                                        data: data,
                                        borderWidth: 1
                                    }]
                                },
                       
                            });
                        }
                        commentByProductChart();
                        productByCategoryChart();
                    </script>

        </body>


<?php

    }
}

?>
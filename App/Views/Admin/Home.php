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
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Doanh thu hằng ngày</h4>
                                    <div class="text-end">
                                        <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> 3,000,000 đ</h2>
                                        <span class="text-muted">Thu nhập hôm nay</span>
                                    </div>
                                    <span class="text-success">80%</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar"
                                            style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Doanh thu tuần</h4>
                                    <div class="text-end">
                                        <h2 class="font-light mb-0"><i class="ti-arrow-up text-info"></i> 20,000,000 đ</h2>
                                        <span class="text-muted">Thu nhập hôm nay</span>
                                    </div>
                                    <span class="text-info">30%</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 30%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- Sales chart -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- column -->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Thống kê doanh thu</h4>
                                    <div class="flot-chart">
                                        <div class="flot-chart-content " id="flot-line-chart"
                                            style="padding: 0px; position: relative;">
                                            <canvas class="flot-base w-100" height="400"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- Table -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <h4 class="card-title col-md-10 mb-md-0 mb-3 align-self-center">Dự án của tháng</h4>
                                        <div class="col-md-2 ms-auto">
                                            <select class="form-select shadow-none col-md-2 ml-auto">
                                                <option selected>Tháng 1</option>
                                                <option value="1">Tháng 2</option>
                                                <option value="2">Tháng 3</option>
                                                <option value="3">Tháng 4</option>
                                                <option value="4">Tháng 5</option>
                                                <option value="5">Tháng 6</option>
                                                <option value="6">Tháng 7</option>
                                                <option value="7">Tháng 8</option>
                                                <option value="8">Tháng 9</option>
                                                <option value="9">Tháng 10</option>
                                                <option value="10">Tháng 11</option>
                                                <option value="11">Tháng 12</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5">
                                        <table class="table stylish-table no-wrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0" colspan="2">Phân công</th>
                                                    <th class="border-top-0">Tên dự án</th>
                                                    <th class="border-top-0">Ngân sách</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-family:roboto;">
                                                <tr class="active">
                                                    <td><span class=""><img class="rounded-circle" src="../../../../public/assets/admin/assets/images/users/vy.jpg"
                                                                alt="user" style="height: 50px; width:50px; "></span></td>
                                                    <td class="align-middle">
                                                        <h6>Ngô Chí Vỹ</h6><small class="text-muted">Nhà thiết kế website</small>
                                                    </td>
                                                    <td class="align-middle">Dự án thiết kế giao diện</td>
                                                    <td class="align-middle">10,000,000 đ</td>
                                                </tr>

                                                <tr class="active">
                                                    <td><span class=""><img class="rounded-circle" src="../../../../public/assets/admin/assets/images/users/linhh.jpg"
                                                                alt="user" style="height: 50px; width:50px; "></span></td>
                                                    <td class="align-middle">
                                                        <h6>Trần Nhựt Linh</h6><small class="text-muted">Quản lý dự án</small>
                                                    </td>
                                                    <td class="align-middle">Dự án cải tiến quy trình</td>
                                                    <td class="align-middle">8,000,000 đ</td>
                                                </tr>
                                                <tr class="active">
                                                    <td><span class="round"><img class="rounded-circle" src="../../../../public/assets/admin/assets/images/users/khang.jpg"
                                                                alt="user" style="height: 50px; width:50px; "></span></td>

                                                    <td class="align-middle">
                                                        <h6>Lê Hoàng Khang</h6><small class="text-muted">Lập trình viên</small>
                                                    </td>
                                                    <td class="align-middle">Dự án phát triển website</td>
                                                    <td class="align-middle">6,000,000 đ</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </body>


<?php

    }
}

?>
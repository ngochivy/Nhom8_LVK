<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="<?= APP_URL ?>/public/assets/client/css/style.css">
        </head>
        <style>
            /* General styling for the navbar */
            .navbar {
                background-color: #333;
                padding: 10px 20px;
            }

            /* Center logo styling */
            .navbar .navbar-brand {
                font-size: 1.5rem;
                font-weight: bold;
                color: #fff !important;
            }

            .navbar .navbar-brand:hover {
                color: #ff4c4c !important;
                text-decoration: none;
            }

            /* Left and right navigation links styling */
            .navbar-nav .nav-link {
                color: #fff !important;
                font-weight: 500;
                margin: 0 10px;
                transition: color 0.3s ease;
            }

            .navbar-nav .nav-link:hover {
                color: #ff4c4c !important;
            }

            /* Search form styling (if included in the future) */
            .form-inline .form-control {
                border-radius: 20px;
                padding: 5px 15px;
                border: none;
            }

            .form-inline .btn {
                border-radius: 20px;
                padding: 5px 15px;
                color: #fff;
                background-color: #ff4c4c;
                border: none;
            }

            .form-inline .btn:hover {
                background-color: #ff3333;
            }

            /* Mobile responsiveness for smaller screens */
            @media (max-width: 768px) {
                .navbar .navbar-brand {
                    margin: 0 auto;
                }

                .navbar .navbar-collapse {
                    text-align: center;
                }

                .navbar-nav {
                    flex-direction: column;
                }

                .navbar-nav .nav-link {
                    margin: 5px 0;
                }
            }

            /* Logo spacing */
            .navbar-brand {
                margin: 0 auto;
                padding: 0;
            }

            /* Cart, login, and register icons styling */
            .navbar-nav .nav-item {
                display: flex;
                align-items: center;
            }

            .navbar-nav .nav-item .nav-link {
                display: flex;
                align-items: center;
            }

            .navbar-nav .nav-item .nav-link i {
                margin-right: 5px;
                font-size: 1.2em;
            }

            /* Optional: Highlight the active link */
            .navbar-nav .nav-item.active .nav-link {
                color: #ff4c4c !important;
                font-weight: bold;
            }
        </style>

        <body>

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <!-- Left side links -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/products">Sản phẩm</a>
                        </li>
                    </ul>

                    <!-- Centered logo -->
                    <a class="navbar-brand mx-auto" href="/"><img src="/public/assets/client/images/logo.jpg" class="rounded-circle" style="width:100px; height:100px;"></a>

                    <!-- Right side links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giỏ hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Đăng ký</a>
                        </li>
                    </ul>
                </div>
            </nav>

    <?php
    }
}
    ?>
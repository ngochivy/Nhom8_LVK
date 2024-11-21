<?php

namespace App\Views\Admin\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {
?>
        <style>
            .notification-wrapper {
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                width: 300px;
            }

            .alert {
                border-radius: 8px;
                padding: 15px 20px;
                margin-bottom: 10px;
                font-size: 16px;
                font-family: "Arial", sans-serif;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                opacity: 1;
                transition: opacity 0.5s ease-in-out;
            }

            .alert i {
                margin-right: 10px;
            }

            .alert-success {
                background-color: #dff0d8;
                color: #3c763d;
                border: 1px solid #d6e9c6;
            }

            .alert-danger {
                background-color: #f2dede;
                color: #a94442;
                border: 1px solid #ebccd1;
            }
        </style>

        <div class="notification-wrapper">
            <?php if (isset($_SESSION['success'])) : ?>
                <?php foreach ($_SESSION['success'] as $value) : ?>
                    <div class="alert alert-success">
                        <i class="fa fa-check-circle"></i>
                        <strong><?= $value ?></strong>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])) : ?>
                <?php foreach ($_SESSION['error'] as $value) : ?>
                    <div class="alert alert-danger">
                        <i class="fa fa-times-circle"></i>
                        <strong><?= $value ?></strong>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    let alerts = document.querySelectorAll(".notification-wrapper .alert");
                    alerts.forEach(function(alert) {
                        alert.style.opacity = "0";
                        setTimeout(function() {
                            alert.remove();
                        }, 500);
                    });
                }, 5000);
            });
        </script>
<?php
    }
}
?>
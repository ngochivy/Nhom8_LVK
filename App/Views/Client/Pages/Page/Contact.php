<?php

namespace App\Views\Client\Pages\Page;

use App\Views\BaseView;

class Contact extends BaseView
{
    public static function render($data = null)
    {

?>
        <!-- Favicon -->
        <link rel="icon" href="/favicon.png" />

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="/public/assets/client/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="/public/assets/client/css/style.css" rel="stylesheet">
        <link href="/public/assets/client/css/style.min.css" rel="stylesheet">

        <body>
            <!-- Contact Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class=" ff-secondary text-center text-primary fw-normal fw-bold">Liên hệ với chúng tôi</h5>
                        <h1 class="mb-5 fw-bold">Liên hệ để được giải đáp mọi thắc mắc</h1>
                    </div>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="row gy-4">
                                <div class="col-md-4 fw-bold">
                                    <h5 class=" ff-secondary fw-normal text-start text-primary">Số điện thoại</h5>
                                    <p><i class="fa fa-envelope-open text-primary me-2"></i>079.79797.999</p>
                                </div>
                                <div class="col-md-4 fw-bold">
                                    <h5 class=" ff-secondary fw-normal text-start text-primary">Email</h5>
                                    <p><i class="fa fa-envelope-open text-primary me-2"></i>Lvkhouse@gmail.com</p>
                                </div>
                                <div class="col-md-4 fw-bold">
                                    <h5 class="ff-secondary fw-normal text-start text-primary">Địa chỉ</h5>
                                    <p><i class="fa fa-envelope-open text-primary me-2"></i>Thường Thạnh - Cái Răng - Cần Thơ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                            <iframe class="position-relative rounded w-100 h-100"
                               
                               
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.4204309702277!2d105.75565247450827!3d9.982086773343747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1731435017362!5m2!1svi!2s"
                                frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                        </div>
                        <div class="col-md-6">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <form class="contact-form" method="POST" action="/contact/send-email">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                                <label for="name">Tên</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="phone_number" name="phone_number" class="form-control" id="phone_number" placeholder="Your phone_number" required>
                                                <label for="phone_number">Số điện thoại</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                      
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a message here" name="message" id="message" style="height: 150px" required></textarea>
                                                <label for="message">Nhập ý kiến của bạn</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit" onclick="validateAndSubmit()">Gửi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->

            
<script>
      function validateAndSubmit() {
    // Lấy giá trị từ các trường thông tin
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();

    // Kiểm tra xem các trường đã được nhập đầy đủ hay chưa
    if (!email || !message) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Vui lòng điền đầy đủ thông tin!",
            showConfirmButton: true
        });
    } else {
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Bạn đã gửi Email thành công!",
            showConfirmButton: false,
            timer: 6000
        });

        // Sau khi thông báo thành công, có thể reset form hoặc thực hiện hành động khác
        document.getElementById("emailForm").reset();
    }
}

</script>



            </div>

            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="/public/assets/client/lib/easing/easing.min.js"></script>
            <script src="/public/assets/client/lib/owlcarousel/owl.carousel.min.js"></script>

            <!-- Contact Javascript File -->
            <script src="/public/assets/client/mail/jqBootstrapValidation.min.js"></script>
            <script src="/public/assets/client/mail/contact.js"></script>

            <!-- Template Javascript -->
            <script src="/public/assets/client/js/main.js"></script>

            <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="/App/Views/Client/Components/Notification.php"></script>

        </body>

<?php

    }
}

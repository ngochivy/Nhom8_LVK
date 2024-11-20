<?php

namespace App\Views\Client\Pages\Page;

use App\Views\BaseView;

class Blog extends BaseView
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


        <!-- BLOGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG -->

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">



        <!-- Template Stylesheet -->
        <link href="/public/css/style1.css" rel="stylesheet">
        <link href="/public/assets//client//css//blog.css" rel="stylesheet">

        <body>
            <!-- Blog Start -->
            <div class="container">
                <!-- Cột bên trái -->
                <div class="left-column">
                    <h2>Tất cả bài viết</h2>
                    <div class="post">
                        <img src="https://www.zecible.fr/wp-content/uploads/2018/02/644455-POO5SL-571-scaled.jpg" alt="Hình ảnh bài viết">
                        <p class="post-date">19, tháng 9 năm 2024</p>
                        <h5 class="card-title">Mẹo Chọn Thiết Bị Nấu Ăn Tiết Kiệm Thời Gian</h5>
                                <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    Sử dụng nồi cơm điện đa năng và máy xay sinh tố thông minh không chỉ giúp bạn tiết kiệm thời gian mà còn làm cho bữa ăn trở nên dễ dàng và ngon miệng hơn...
                                </p>
                                <a href="#" class="btn btn-primary rounded-1">Xem thêm</a>
                    </div>
                    <div class="post">
                        <img src="https://th.bing.com/th/id/R.5e64dc17c45ce6dd64a8d42ab876d5a4?rik=Q0Wh4dKR%2bAaLGg&riu=http%3a%2f%2fbookdirtbusters.com%2fwp-content%2fuploads%2f2019%2f09%2fclean-home.jpeg&ehk=RzfBQ1NQwMrSgcNfxbCMfOP%2bvLV%2bO9h4LfxZ4da%2fAik%3d&risl=&pid=ImgRaw&r=0" alt="Hình ảnh bài viết">
                        <p class="post-date">20 Th9</p>
                        <h5 class="card-title">Mẹo Dọn Dẹp Tiện Lợi Cho Nhà Bận Rộn</h5>
                        <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    Máy hút bụi thông minh và cây lau nhà tự động là những trợ thủ đắc lực giúp bạn duy trì ngôi nhà luôn sạch sẽ mà không tốn quá nhiều thời gian...
                                </p>
                                <a href="#" class="btn btn-primary rounded-1">Xem thêm</a>
                    </div>
                    <div class="post">
                        <img src="https://www.cnet.com/a/img/resize/e2cd457709207d1abf51648466b077b61f8b11d2/hub/2024/06/04/8a97de33-f6d8-46b8-8821-c52cc5897929/best-home-security-system.jpg?auto=webp&width=1200" alt="Hình ảnh bài viết">
                        <p class="post-date">20 Th9</p>
                        <h5 class="card-title">Kiến Thức Về Công Nghệ Thông Minh Trong Nhà</h5>
                                <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    Những thiết bị công nghệ như loa thông minh và bóng đèn điều khiển từ xa giúp bạn dễ dàng điều khiển ngôi nhà, tiết kiệm năng lượng và nâng cao chất lượng sống...
                                </p>
                                <a href="#" class="btn btn-primary rounded-1">Xem thêm</a>
                    </div>
                </div>

                <!-- Cột bên phải -->
                <div class="right-column">
                    <h2>Bài viết mới nhất</h2>
                    <div class="post">
                    <img src="https://www.zecible.fr/wp-content/uploads/2018/02/644455-POO5SL-571-scaled.jpg" alt="Hình ảnh bài viết">
                    <p class="post-title">Mẹo Chọn Thiết Bị Nấu Ăn Tiết Kiệm Thời Gian</p>
                    </div>
                    <div class="post">
                    <img src="https://th.bing.com/th/id/R.5e64dc17c45ce6dd64a8d42ab876d5a4?rik=Q0Wh4dKR%2bAaLGg&riu=http%3a%2f%2fbookdirtbusters.com%2fwp-content%2fuploads%2f2019%2f09%2fclean-home.jpeg&ehk=RzfBQ1NQwMrSgcNfxbCMfOP%2bvLV%2bO9h4LfxZ4da%2fAik%3d&risl=&pid=ImgRaw&r=0" alt="Hình ảnh bài viết">
                    <p class="post-title">Mẹo Dọn Dẹp Tiện Lợi Cho Nhà Bận Rộn</p>
                    </div>
                    <div class="post">
                    <img src="https://www.cnet.com/a/img/resize/e2cd457709207d1abf51648466b077b61f8b11d2/hub/2024/06/04/8a97de33-f6d8-46b8-8821-c52cc5897929/best-home-security-system.jpg?auto=webp&width=1200" alt="Hình ảnh bài viết">
                    <p class="post-title">Kiến Thức Về Công Nghệ Thông Minh Trong Nhà</p>
                    </div>
                </div>
            </div>
        </body>

<?php

    }
}

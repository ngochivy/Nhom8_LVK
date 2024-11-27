<?php

namespace App\Views\Client\Pages\Blog;

use App\Views\BaseView;
use App\Models\Blog;

class Index extends BaseView
{
    public static function render($data = null)
    {
        $blogs = new Blog();
        $data = $blogs -> getAllBlog();
        // var_dump($data);

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

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="/public/css/style1.css" rel="stylesheet">
        <link href="/public/assets/client/css/blog.css" rel="stylesheet">

        <body>
            <!-- Blog Start -->
            <div class="container mb-5">
                <h2 class="text-center mb-4">TẤT CẢ BÀI VIẾT</h2>
                    <div class="row">

                    <?php if (!empty($data)) : 
                                                ?>
                        <?php foreach ($data as $item) : ?>
                            <div class="col-lg-12 col-md-6 mb-4">
                                <div class="card">
                                    <img src="<?= APP_URL ?>/public/uploads/blogs/<?= htmlspecialchars($item['image']) ?>" class="card-img-top"
                                    height=""  alt="<?= htmlspecialchars($item['title']) ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($item['title']) ?></h5>
                                        <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                            <?= htmlspecialchars($item['content']) ?>
                                        </p>
                                        <a href="/emblog" class="btn btn-primary">Xem thêm</a>
                                    </div>
                                </div>
                                </div>

                        <?php endforeach; ?>
                <?php else : ?>
                    
                <?php endif; ?>

                </div>

            </div>
            <!-- Blog End -->

            <!-- JavaScript -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wuEBrrh90rvWB9mevrJLlCd9eQhOhHjqA4Ff6zv6UMcp8B43wRIzOfqYK9wYR3Ez" crossorigin="anonymous"></script>
        </body>
<?php
    }
}
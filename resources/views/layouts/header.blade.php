<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <div><a class="" href="#"><img style="height: 50px; width: 50px;"
                    src="{{ url('./images/logo/logo.png') }}" alt="">
                <a href="/" style="font-size: 25px; padding-left: 3px;">FPTGym Fitness</a></a></div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link smoothScroll">Trang chủ</a>
                </li>

                <li class="nav-item">
                    <a href="#about" class="nav-link smoothScroll">Về chúng tôi</a>
                </li>

                <li class="nav-item">
                    <a href="#class" class="nav-link smoothScroll">Lớp học</a>
                </li>
                <li class="nav-item">
                    <a href="#pack" class="nav-link smoothScroll">Gói tập</a>
                </li>
                <li class="nav-item">
                    <a href="#room" class="nav-link smoothScroll">Phòng tập</a>
                </li>
                <li class="nav-item">
                    <a href="#schedule" class="nav-link smoothScroll">Huấn luyện viên</a>
                </li>

                <li class="nav-item">
                    <a href="/ecommerce" class="nav-link smoothScroll">Cửa hàng</a>
                </li>

                <li class="nav-item">
                    <a href="#contact" class="nav-link smoothScroll">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a href="/news" class="nav-link smoothScroll">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a href="<?= $name != '' ? $url : '#' ?>" class="nav-link smoothScroll"
                        class="btn custom-btn bg-color mt-3"
                        <?= $name != '' ? '' : 'data-toggle="modal" data-target="#login"' ?>>
                        <?= $name != '' ? $name : 'Đăng nhập' ?>
                    </a>
                </li>
            </ul>

            {{-- <ul class="social-icon ml-lg-3">
                <li><a href="https://fb.com/" class="fa fa-facebook"></a></li>
                <li><a href="#" class="fa fa-twitter"></a></li>
                <li><a href="#" class="fa fa-instagram"></a></li>
            </ul> --}}
        </div>

    </div>
</nav>

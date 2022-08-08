<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <div><a class="" href="#"><img style="height: 50px; width: 50px;"
                    src="{{ url('./images/logo/logo.png') }}" alt="">
                <a href="/" style="font-size: 25px; padding-left: 3px; color: var(--link-color-2); font-weight: normal; text-decoration: none;">FPTGym Fitness</a></a></div>

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
                    <a href="/ecommerce" class="nav-link smoothScroll">Cửa hàng</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link smoothScroll">Liên hệ</a>
                </li>
                <li class="nav-item">
                    @if (session()->has('login'))
                    <a href="<?= session()->get('login')['name'] != '' ? session()->get('login')['url'] : '#' ?>" class="nav-link smoothScroll"
                        class="btn custom-btn bg-color mt-3"
                        <?= session()->get('login')['name'] != '' ? '' : 'data-toggle="modal" data-target="#login"' ?>>
                        <?= session()->get('login')['name'] != '' ? session()->get('login')['name'] : 'Đăng nhập' ?>
                    </a>

                    @else

                    <a href="#" class="nav-link smoothScroll"
                        class="btn custom-btn bg-color mt-3"
                        data-toggle="modal" data-target="#login">
                        Đăng nhập
                    </a>
                    @endif
                </li>
                <li class="nav-item"><a href="/ecommerce/cart" class="nav-link smoothScroll">Giỏ hàng
                    @if (session()->has('cart'))
                    <span class="cart-count"><span>
                        {{
                        session()->get('count')
                        }}</span></span>
                    @endif
                </a></li>
            </ul>

            <ul class="social-icon ml-lg-3">
                <li><a href="https://fb.com/" class="fa fa-facebook"></a></li>
                <li><a href="#" class="fa fa-twitter"></a></li>
                <li><a href="#" class="fa fa-instagram"></a></li>
            </ul>
        </div>

    </div>
</nav>

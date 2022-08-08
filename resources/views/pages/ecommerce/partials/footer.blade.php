<!-- CONTACT -->
<section class="contact section" id="contact">
    <div class="container">
        <div class="row">

            <div class="ml-auto col-lg-5 col-md-6 col-12">
                <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Hãy đặt câu hỏi cho chúng tôi
                </h2>

                <form action="#" method="post" class="contact-form webform" data-aos="fade-up" data-aos-delay="400"
                    role="form">
                    <input type="text" class="form-control" name="cf-name" placeholder="Họ và Tên">

                    <input type="email" class="form-control" name="cf-email" placeholder="Email">

                    <textarea class="form-control" rows="5" name="cf-message" placeholder="Nội Dung"></textarea>

                    <button type="submit" class="form-control" id="submit-button" name="submit">Gửi tin
                        nhắn</button>
                    <hr>
                    <h3><img style="height: 100px; width: 100px;" src="{{ url('./images/logo/logo.png') }}"
                            alt="">
                        HOTLINE: 1900
                        5798</h3>
                    <hr>
                </form>
            </div>
            <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">Bạn có thể tìm thấy chúng tôi ở
                    đâu?</h2>
                <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.319350036688!2d106.66408561458914!3d10.786834792314457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed2392c44df%3A0xd2ecb62e0d050fe9!2zRlBUIEFwdGVjaCBIQ00gLSBI4buHIFRo4buRbmcgxJDDoG8gVOG6oW8gTOG6rXAgVHLDrG5oIFZpw6puIFF14buRYyBU4bq_IChTaW5jZSAxOTk5KQ!5e0!3m2!1svi!2s!4v1641390755645!5m2!1svi!2s"
                        width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i>590 Cách Mạng
                        Tháng Tám, Phường 11, Quận 3, Thành phố Hồ Chí Minh</p>
                    <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.956358425183!2d106.69232341458947!3d10.81465179229559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528ebda22c199%3A0x599041b23a93b5cf!2zMzAyIE5ndXnhu4VuIFbEg24gxJDhuq11LCBQaMaw4budbmcgMTEsIELDrG5oIFRo4bqhbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1641391727149!5m2!1svi!2s"
                            width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i>302 Nguyễn
                            Văn Đậu, Phường 11, Bình Thạnh, Thành phố Hồ Chí Minh</p>
                    </div>
                </div>
            </div>
        </div>
</section>


<!-- FOOTER -->
<footer class="site-footer">
    <div class="container">
        <div class="row">

            <div class="ml-auto col-lg-4 col-md-5">
                <p class="copyright-text">Copyright &copy; 2022 FPTGYM Fitness Co.

                    <br>Design: <a href="FPTGYM.com">FPTGYM</a>
                </p>
            </div>

            <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                <p class="mr-4">
                    <i class="fa fa-envelope-o mr-1"></i>
                    <a href="em">FPTGYM@gmail.com</a>
                </p>

                <p><i class="fa fa-phone mr-1"></i> 010-020-0840</p>
            </div>

        </div>
    </div>
</footer>


    <!-- Modal -->
    <div class="modal fade" id="membershipForm" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="modal-title" id="membershipFormLabel">Đăng ký thành viên</h2>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="membership-form webform" name="form-register" role="form" action="registration.php"
                        method="POST">
                        <input type="text" class="form-control" name="cf-name" placeholder="Họ và Tên">
                        <select class="form-control" name="cf-gender">
                            <option selected>Chọn giới tính</option>
                            <option class="form-control" value="1">Nam</option>
                            <option class="form-control" value="2">Nữ</option>
                            <option class="form-control" value="3">Khác</option>
                        </select>

                        <input type="email" class="form-control" name="cf-email" placeholder="Email"
                            onchange="checkEmail()">
                        <small id="erMail" class="form-text text-muted" style="color: red !important;"></small>
                        <input type="tel" class="form-control" name="cf-phone" placeholder="123-456-7890"
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" onchange="checkPhone()">
                        <small id="erPhone" class="form-text text-muted" style="color: red !important;"></small>

                        <input type="date" class="form-control" name="cf-age" placeholder="Tuổi"
                            onchange="checkAge()">
                        <small id="erAge" class="form-text text-muted" style="color: red !important;"></small>


                        <input type="text" class="form-control" name="cf-username" placeholder="Tên đăng nhập"
                            onchange="checkUsername()">
                        <small id="erUN" class="form-text text-muted" style="color: red !important;"></small>
                        <input type="password" class="form-control" name="cf-password" placeholder="Mật khẩu">

                        <input type="password" class="form-control" name="cf-confirm"
                            placeholder="Nhập lại mật khẩu">

                        <button type="submit" class="form-control" id="submit-button" name="data-register"
                            onclick="check(event)">Đăng
                            ký</button>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="signup-agree">
                            <label class="custom-control-label text-small text-muted" for="signup-agree">I agree to the
                                <a href="#">Terms &amp;Conditions</a>
                            </label>
                        </div>
                    </form>
                </div>

                <div class="modal-footer"></div>

            </div>
        </div>
    </div>

    <!-- Login -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="modal-title" id="membershipFormLabel">Đăng nhập</h2>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="membership-form webform" role="form" action="/login" method="POST">
                        <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập">
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                        <div class="form-group d-md-flex">
                            <div class="w-100 text-md-right">
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                        </div>
                        <button type="submit" class="form-control" id="submit-button" name="submit-login">Đăng
                            nhập</button>
                        <div class="w-100 text-center mt-4 text">
                            <p class="mb-0">Bạn chưa có tài khoản?</p>
                            <a href="#" data-toggle="modal" data-target="#membershipForm">Đăng ký</a>
                        </div>

                    </form>
                </div>

                <div class="modal-footer"></div>

            </div>
        </div>
    </div>
    <form name="formCheck" method="POST" style="display: none;">
        <input type="text" name="phone">
        <input type="text" name="email">
    </form>

    <script>
        function check(e) {
            if (document.getElementById('erPhone').innerText != '') {
                e.preventDefault();
            }
            if (document.getElementById('erMail').innerText != '') {
                e.preventDefault();
            }
            if (document.getElementById('erUN').innerText != '') {
                e.preventDefault();
            }
        }

        function checkPhone() {
            setTimeout(() => {
                $.ajax({
                    url: 'registration.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        phone_check: document.forms['form-register']['cf-phone'].value
                    }
                }).done(function(result) {
                    document.getElementById('erPhone').innerText = result;
                });
            }, 1000);
        }

        function checkEmail() {
            setTimeout(() => {

                $.ajax({
                    url: 'registration.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        mail_check: document.forms['form-register']['cf-email'].value
                    }
                }).done(function(result) {
                    document.getElementById('erMail').innerText = result;
                });
            }, 1000);
        }

        function checkUsername() {
            setTimeout(() => {

                $.ajax({
                    url: 'registration.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        username_check: document.forms['form-register']['cf-username'].value
                    }
                }).done(function(result) {
                    console.log(result);
                    document.getElementById('erUN').innerText = result;
                });
            }, 1000);
        }
    </script>
    <!-- SCRIPTS -->
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/aos.js') }}"></script>
    <script src="{{ url('js/smoothscroll.js') }}"></script>
    <script src="{{ url('js/custom.js') }}"></script>

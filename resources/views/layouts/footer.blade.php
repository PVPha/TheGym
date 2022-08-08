<section class="contact section" id="contact">
    <div class="container">
        <div class="row">

            <div class="ml-auto col-lg-5 col-md-6 col-12">
                <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Hãy đặt câu hỏi cho chúng tôi
                </h2>

                <form action="/question" method="post" class="contact-form webform" data-aos="fade-up" data-aos-delay="400"
                    role="form">
                    @csrf
                    <input type="text" class="form-control" name="name" placeholder="Họ và Tên">

                    <input type="email" class="form-control" name="email" placeholder="Email">

                    <textarea class="form-control" rows="5" name="question" placeholder="Nội Dung"></textarea>

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
                <form class="membership-form webform" name="form-register" role="form" action="user"
                    method="POST">
                    @csrf
                    <input type="hidden" name="role" value="member">
                    <input type="text" class="form-control" name="name" placeholder="Họ và Tên">
                    <small id="erName" class="form-text text-muted" style="color: red !important;"></small>
                    <select class="form-control" name="gender">
                        <option class="form-control" value="Nam">Nam</option>
                        <option class="form-control" value="Nữ">Nữ</option>
                        <option class="form-control" value="Khác">Khác</option>
                    </select>
                    <small id="erGender" class="form-text text-muted" style="color: red !important;"></small>
                    <input type="email" class="form-control" name="email" placeholder="Email"
                        onchange="checkDupEP()">
                    <small id="erMail" class="form-text text-muted" style="color: red !important;"></small>
                    <input type="number" class="form-control" name="phone" placeholder="Số điện thoại" onchange="checkDupEP()">
                    <small id="erPhone" class="form-text text-muted" style="color: red !important;"></small>

                    <input type="date" class="form-control" name="date_of_birth" placeholder="Ngày sinh"
                        onchange="checkDate()">
                    <small id="erAge" class="form-text text-muted" style="color: red !important;"></small>


                    {{-- <input type="text" class="form-control" name="cf-username" placeholder="Tên đăng nhập"
                        onchange="checkUsername()">
                    <small id="erUN" class="form-text text-muted" style="color: red !important;"></small> --}}
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    <small id="erPass" class="form-text text-muted" style="color: red !important;"></small>
                    <input type="password" class="form-control" name="confirm"
                        placeholder="Nhập lại mật khẩu" onchange="checkPass()">
                        <small id="erCon" class="form-text text-muted" style="color: red !important;"></small>
                    <button type="submit" class="form-control" id="submit-button" name="data-register"
                        onclick="check(event)">Đăng
                        ký</button>

                    {{-- <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="signup-agree">
                        <label class="custom-control-label text-small text-muted" for="signup-agree">I agree to the
                            <a href="#">Terms &amp;Conditions</a>
                        </label>
                    </div> --}}
                </form>
            </div>

            <div class="modal-footer"></div>

        </div>
    </div>
</div>

<div class="modal fade" id="forgotPass" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h2 class="modal-title" id="membershipFormLabel">Quên mật khẩu</h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="membership-form webform" name="form-forgot" role="form" action="forgot"
                    method="POST">
                    @csrf
                    <input type="text" class="form-control" name="email" placeholder="Email khôi phục">
                    <small id="erMail" class="form-text text-muted" style="color: red !important;"></small>
                    <button type="submit" class="form-control" id="submit-button" name="submit-login" onclick="checkForgot(event)">Lấy lại mật khẩu</button>
                </form>
            </div>

            <div class="modal-footer"></div>

        </div>
    </div>
</div>

@if (isset($_GET['reset_pass']))
<div class="modal" id="resetPass" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel" style="display: block">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="membershipFormLabel">Đổi mật khẩu</h2>
                <a type="button" class="close" data-dismiss="modal" aria-label="Close" href="/">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>

            <div class="modal-body">
                <form class="membership-form webform" name="form-reset" role="form" action="resetpass"
                    method="POST">
                    @csrf
                    <input type="hidden" value="{{$_GET['reset_pass']}}" name="token">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu mới">
                    <small id="erPass" class="form-text text-muted" style="color: red !important;"></small>
                    <input type="password" class="form-control" name="confirm" placeholder="Nhập lại mật khẩu">
                    <small id="erCon" class="form-text text-muted" style="color: red !important;"></small>
                    <button type="submit" class="form-control" id="submit-button" name="submit-login" onclick="checkReset(event)">Đổi mật khẩu</button>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
        </div>
</div>
@endif


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
                <form class="membership-form webform" name="form-login" role="form" action="/login" method="POST">
                    @csrf
                    <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập">
                    <small id="erMail" class="form-text text-muted" style="color: red !important;"></small>
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    <small id="erPass" class="form-text text-muted" style="color: red !important;"></small>
                    <div class="form-group d-md-flex">
                        <div class="w-100 text-md-right">
                            <a href="#"  data-toggle="modal" data-target="#forgotPass" data-dismiss="modal">Quên mật khẩu?</a>
                        </div>
                    </div>
                    <button type="submit" class="form-control" id="submit-button" name="submit-login" onclick="checkLogin(event)">Đăng
                        nhập</button>
                    <div class="w-100 text-center mt-4 text">
                        <p class="mb-0">Bạn chưa có tài khoản?</p>
                        <a href="#" data-toggle="modal" data-target="#membershipForm" data-dismiss="modal">Đăng ký</a>
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
        e.preventDefault();
        let submit = true;
        let small = document.querySelectorAll('small');
        small.forEach(e => {
            e.innerText = ''
        });
        let name = document.forms['form-register']['name'].value
        let gender =  document.forms['form-register']['gender'].value
        let email = document.forms['form-register']['email'].value
        let phone = document.forms['form-register']['phone'].value
        let dob = document.forms['form-register']['date_of_birth'].value
        let password = document.forms['form-register']['password'].value
        let confirm = document.forms['form-register']['confirm'].value
        checkPass();
        checkDate();
        if (!name) {
            document.getElementById('erName').innerText = 'Tên không được rỗng'
        }
        if (name && name.length < 6) {
            document.getElementById('erName').innerText = 'Tên phải dài hơn 6 ký tự'
        }
        if (name && name.match(/\d+/g)) {
            document.getElementById('erName').innerText = 'Tên phải là chữ'
        }
        if (!gender) {
            document.getElementById('erGender').innerText = 'Giới tính không được rỗng'
        }
        if (!email) {
            document.getElementById('erMail').innerText = 'Email không được rỗng'
        }
        if (!email.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
            document.getElementById('erMail').innerText = 'Email không đúng'
        }
        if (!phone) {
            document.getElementById('erPhone').innerText = 'SĐT không được rỗng'
        }
        if (phone && phone.length < 10 || phone.length >10) {
            document.getElementById('erPhone').innerText = 'SĐT tối đa 10 chữ số'
        }
        if (!dob) {
            document.getElementById('erAge').innerText = 'Ngày sinh không được rỗng'
        }
        if (!password) {
            document.getElementById('erPass').innerText = 'Mật khẩu không được rỗng'
        }
        if (!confirm) {
            document.getElementById('erCon').innerText = 'Nhập lại mật khẩu không được rỗng'
        }
        small.forEach(e => {
            if (e.innerText != '') {
                submit = false;
            }else{
                submit = true;
            }
        });
        if (submit) {
            document.forms['form-register'].submit()
        }
    }
    function checkForgot(e) {
        e.preventDefault();
        let submit = true;
        let small = document.querySelectorAll('small');
        small.forEach(e => {
            e.innerText = ''
        });
        let email = document.forms['form-forgot']['email'].value
        if (!email) {
            document.forms['form-forgot'].querySelector('#erMail').innerText = 'Email không được rỗng'
        }
        if (email && !email.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
            document.forms['form-forgot'].querySelector('#erMail').innerText = 'Email không đúng'
        }
        small.forEach(e => {
            if (e.innerText != '') {
                submit = false;
            }else{
                submit = true;
            }
        });
        if (submit) {
            document.forms['form-forgot'].submit()
        }
    }
    function checkLogin(e) {
        e.preventDefault();
        let submit = true;
        let small = document.forms['form-login'].querySelectorAll('small');
        small.forEach(e => {
            e.innerText = ''
        });
        let username = document.forms['form-login']['username'].value;
        let password = document.forms['form-login']['password'].value;
        $.ajax({
            url: 'user/check?'+'email='+username+'&phone=',
            type: 'GET',
        }).done(function(result) {
            if(!result.email){
                document.forms['form-login'].querySelector('#erMail').innerText = 'Email không tồn tại';
            }
            if (!result.email&& !username) {
                document.forms['form-login'].querySelector('#erMail').innerText = 'Tên đăng nhập không được rỗng'
            }
            if (!result.email&& username && !username.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
                document.forms['form-login'].querySelector('#erMail').innerText = 'Email không đúng';
            }

            if (!password) {
                document.forms['form-login'].querySelector('#erPass').innerText = 'Mật khẩu không được rỗng'
            }

            small.forEach(e => {
                if (e.innerText != '') {
                    submit = false;
                }
            });
            if (submit) {
                document.forms['form-login'].submit()
            }
        });
    }
    function checkReset(e) {
        e.preventDefault();
        let submit = true;
        let small = document.forms['form-reset'].querySelectorAll('small');
        small.forEach(e => {
            e.innerText = ''
        });
        let password = document.forms['form-reset']['password'].value
        let confirm = document.forms['form-reset']['confirm'].value
        if (!password) {
            document.forms['form-reset'].querySelector('#erPass').innerText = 'Mật khẩu không được rỗng'
        }
        if (password && password !== confirm) {
            document.forms['form-reset'].querySelector('#erCon').innerText = 'Mật khẩu không khớp'
        }
        small.forEach(e => {
            if (e.innerText != '') {
                submit = false;
            }
        });
        if (submit) {
            document.forms['form-reset'].submit()
        }
    }
    function checkPass() {
        let password = document.forms['form-register']['password'].value
        let confirm = document.forms['form-register']['confirm'].value
        if (password && password !== confirm) {
            document.getElementById('erCon').innerText = 'Mật khẩu không khớp'
        }
    }
    function checkDate() {
        var enteredDate = document.forms['form-register']['date_of_birth'].value;
        var years = new Date(new Date() - new Date(enteredDate)).getFullYear() - 1970;
        if(years < 18){
            document.getElementById('erAge').innerText = 'Thành viên phải trên 18 tuổi';
        }else{
            document.getElementById('erAge').innerText = '';
        }
    }

    function previewImg(name,form) {
        let file = document.forms[form].querySelector('input[name="image"]').files;
        if (file) {
            document.forms[form].querySelector('#'+name).style.display = 'block';
            document.forms[form].querySelector('#'+name).src = URL.createObjectURL(file[0]);
        }
    }

    function checkDupEP() {
        let email = document.forms['form-register']['email'].value;
        let phone = document.forms['form-register']['phone'].value;
        $.ajax({
            url: 'user/check?'+'email='+email+'&phone='+phone,
            type: 'GET',
        }).done(function(result) {
            if(result.email){
                document.getElementById('erMail').innerText = result.email;
            }else{
                document.getElementById('erMail').innerText = '';
            }
            if(result.phone){
                document.getElementById('erPhone').innerText = result.phone;
            }else{
                document.getElementById('erPhone').innerText = '';
            }
        });
    }
</script>
<!-- SCRIPTS -->
<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/aos.js') }}"></script>
<script src="{{ url('js/smoothscroll.js') }}"></script>
<script src="{{ url('js/custom.js') }}"></script>

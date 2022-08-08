
<!DOCTYPE html>
<html lang="en">

<head>

    <title>FPTGYM</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/aos.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ url('css/tooplate-gymso-style.css') }}">
    <!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR -->
    {{-- <nav class="navbar navbar-expand-lg fixed-top">
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
                        <a href="#schedule" class="nav-link smoothScroll">Huấn luyện viên</a>
                    </li>

                    <li class="nav-item">
                        <a href="/ecommerce" class="nav-link smoothScroll">Cửa hàng</a>
                    </li>

                    <li class="nav-item">
                        <a href="#contact" class="nav-link smoothScroll">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a href="news" class="nav-link smoothScroll">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $name != '' ? $url : '#' ?>" class="nav-link smoothScroll"
                            class="btn custom-btn bg-color mt-3"
                            <?= $name != '' ? '' : 'data-toggle="modal" data-target="#login"' ?>>
                            <?= $name != '' ? $name : 'Đăng nhập' ?>
                        </a>
                    </li>
                </ul>

                <ul class="social-icon ml-lg-3">
                    <li><a href="https://fb.com/" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>
                </ul>
            </div>

        </div>
    </nav> --}}
    @include('layouts.header')

    <!-- HERO -->
    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

        <div class="bg-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-10 mx-auto col-12">
                    <div class="hero-text mt-5 text-center">

                        <h6 data-aos="fade-up" data-aos-delay="300">thay đổi cơ thể, thay đổi cuộc sống!</h6>

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">NÂNG CẤP CƠ THỂ CỦA BẠN TẠI
                            FPTGym Fitness</h1>

                        <a href="#feature" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Bắt
                            đầu</a>

                        <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up"
                            data-aos-delay="700">Xem
                            Thêm</a>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="feature" id="feature">
        <div class="container">
            <div class="row">

                <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-3 text-white" data-aos="fade-up">SĂN CHẮC BỀN BỈ CÙNG NHAU</h2>

                    <h6 class="mb-4 text-white" data-aos="fade-up">- Trên +80 bộ môn và lớp học để tập cùng bạn bè</h6>
                    <h6 class="mb-4 text-white" data-aos="fade-up">- Cùng xả stress, lấy dáng đẹp theo lịch tập cá nhân
                        hóa</h6>
                    <h6 class="mb-4 text-white" data-aos="fade-up">- Cùng tận hưởng trải nghiệm Gym 5 sao chỉ có tại
                        FPTGym</h6>
                    <a href="#" class="btn custom-btn bg-color mt-3" data-aos="fade-up" data-aos-delay="300"
                        data-toggle="modal" data-target="#membershipForm">Tham gia ngay hôm nay</a>
                </div>

                <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
                    <div class="about-working-hours">
                        <div>

                            <h2 class="mb-4 text-white" data-aos="fade-down" data-aos-delay="400">Giờ Hoạt Động: </h2>

                            <strong class="d-block" data-aos="fade-down" data-aos-delay="600">Thứ 2 - Thứ
                                7:</strong>
                            <p class="d-block" data-aos="fade-down" data-aos-delay="1000"
                                style="padding-left:5px">+ Buổi sáng: 6:00 - 12:00 </p>
                            <p class="d-block" data-aos="fade-down" data-aos-delay="1500"
                                style="padding-left:5px">+ Buổi sáng: 16:00 - 22:00 </p>
                            <strong class="d-block" data-aos="fade-down" data-aos-delay="2000">Chủ nhật:</strong>
                            <p class="d-block" data-aos="fade-down" data-aos-delay="2500"
                                style="padding-left:5px">- Cả ngày: 6:00 - 22:00 </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section class="about section" id="about">
        <div class="container">
            <div class="row">

                <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Xin chào, chúng tôi là FPTGYM
                    </h2>

                    <b>Chúng tôi muốn chứng minh rằng để có được cuộc sống tốt và lành mạnh hơn, bạn không
                        nhất thiết phảI tuân theo kỷ luật thép hoặc phải hy sinh, thay vào đó, chỉ cần đưa vào lối sống
                        của mình những thói quen
                        giúp nâng cao chất lượng cuộc sống, đồng thời giảm thiểu những thói quen không có lợi..</b>
                    <p>Năm 2022 FPTGYM trở phòng tập thể dục thể hình quốc tế đầu tiên và lớn nhất ra mắt tại Việt Nam.
                        Với sứ mệnh “Làm Cho Cuộc Sống Tốt Đẹp Hơn”, FPTGYM không chỉ đơn thuần giống như bao phòng tập
                        thông
                        thường khác. Đây là trung tâm của phong cách sống năng động, nhằm truyền cảm hứng, mang lại niềm
                        vui sảng khoái cũng như
                        nguồn sinh khí mới cho cộng đồng.</p>
                    <p>Các thành viên trong đội ngũ quản lý cấp cao của CFYC đều từng là những nhân vật cực kỳ quan
                        trọng đối với sự phát triển
                        của một số thương hiệu hàng đầu trong ngành thể dục thể hình, như: 24 Hour Fitness, California
                        Fitness, Jackie Chan
                        Sport, UFC Gyms, Crunch Fitness, Yoga Works và Les Mills.</p>
                    <p>Đây là nơi hội tụ của việc luyện tập, thời trang và giải trí trong một môi trường lành mạnh, tràn
                        trề sinh lực. Từ
                        âm nhạc và ánh sáng cho tới các trang thiết bị hiện đại và đội ngũ huấn luyện viên đẳng cấp quốc
                        tế, mỗi chi tiết đều
                        được chuẩn bị một cách tỉ mỉ và công phu, nhằm mang lại những trải nghiệm tích cực và tuyệt vời
                        nhất cho khách hàng.
                        Thành công vượt bậc của FPTGYM gắn liền với tầm nhìn và vai trò lãnh đạo của nhà sáng lập, đồng
                        thời cũng là CEO – ông
                        Nguyễn Trung Tuấn đã thổi bùng trong toàn công ty của ông ngọn lửa đam mê tận hưởng cuộc sống và
                        giải trí, vốn đã tạo
                        nên một cuộc cách mạng trong cách luyện tập thể dục thể hình trên khắp châu Á.
                    </p>
                    <p>Với Hội đồng quản trị kết hợp của hơn 30 năm kinh nghiệm tại hàng chục quốc gia khác nhau, FPTGYM
                        đã và đang sở hữu
                        một đội ngũ lãnh đạo chuyên nghiệp và lão luyện bậc nhất trong ngành thể dục thể hình. Đó cũng
                        là nguyên nhân chính
                        giúp CFYC luôn trung thành và nhất quán trong việc thực hiện cam kết của thương hiệu: Làm Cho
                        Cuộc Sống Tốt Đẹp Hơn.</p>
                </div>



                <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up"
                    data-aos-delay="800">
                    <div class="team-thumb">
                        <img style="height: 500px; width: 600px;" src="{{ url('./images/logo/logo.png') }}" alt="">
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>


    <!-- CLASS -->
    <section class="class section" id="class">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-5">
                    <h6 data-aos="fade-up">Có được một cơ thể hoàn hảo</h6>

                    <h2 data-aos="fade-up" data-aos-delay="200">Các lớp đào tạo của chúng tôi </h2>
                </div>

                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="{{ url('images/class/crossfit-class.jpg') }}" class="img-fluid" alt="Class">
                        <div class="class-info">
                            <h3 class="mb-1">Crossfit</h3>
                            <p class="mt-3">Hiện nay có rất nhiều môn thể thao khác nhau. Crossfit là một
                                trong những môn thể thao rất thú vị mang
                                tới nhiều lợi ích cho sức khỏe, sức mạnh, sức bền… Vậy Crossfit là gì ? Nếu bạn đang
                                muốn tìm hiểu và tập luyện
                                Crossfit thì hãy cùng FPTGYM bắt đầu ngay từ bài viết này nhé !</p><br>
                            <button type="submit" class="form-control" id="submit-button" name="submit"><a
                                    href="#"> Xem Thêm</button></a>
                        </div>


                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="{{ url('images/class/power1.jpg') }}" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Power Fitness</h3>
                            <p class="mt-3">Bạn đang dự định tập Powerlifting để nâng cao sức mạnh bản thân
                                nhưng băn khoăn bộ môn này liệu có phù
                                hợp với mình không? Hãy cùng chúng tôi tìm hiểu kỹ bài viết sau đây để hiểu rõ hơn về
                                khái niệm này nhé ! <br></p>
                            <br><br>
                            <button type="submit" class="form-control" id="submit-button" name="submit"><a
                                    href="#"> Xem Thêm</button></a>


                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="{{ url('images/class/cardio-class.jpg') }}" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Cardio</h3>
                            <p class="mt-3">Với bài tập thể dục Cardio, bạn không cần phải dành hàng giờ mỗi
                                ngày tại phòng tập thể dục để duy trì
                                sức khỏe tim mạch và giảm cân. Cardio có thể giúp bạn thực hiện bài tập tim mạch hiệu
                                quả tại nhà, ngay cả khi bạn
                                không có nhiều không gian hoặc thiết bị để tập luyện.</p>
                            <button type="submit" class="form-control" id="submit-button" name="submit"><a
                                    href="#"> Xem Thêm</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="{{ url('images/class/muscle1.jpg') }}" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Mucse Relax</h3>
                            <p class="mt-3">Với bài tập thể dục Cardio, bạn không cần phải dành hàng giờ mỗi
                                ngày tại phòng tập thể dục để duy trì
                                sức khỏe tim mạch và giảm cân. Cardio có thể giúp bạn thực hiện bài tập tim mạch hiệu
                                quả tại nhà, ngay cả khi bạn
                                không có nhiều không gian hoặc thiết bị để tập luyện.</p>

                            <button type="submit" class="form-control" id="submit-button" name="submit"><a
                                    href="#"> Xem Thêm</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-12 text-center mb-5">
                    <h6 data-aos="fade-up">lịch tập GYM hàng tuần của chúng tôi</h6>
                    <h2 data-aos="fade-up" data-aos-delay="200">Thời gian biểu tập luyện </h2>
                    <hr>
                </div>
                <div>
                    <table style="width: 1225px; border: 1px; padding: 10px;">
                        <tr>
                            <td><b>Mã Lớp</b></td>
                            <td><b>Người hướng dẫn</b></td>
                            <td><b>Tên lớp</b></td>
                            <td><b>Phòng Tập</b></td>
                            <td style="text-align: center;"><b>Ngày tập</b></td>
                            <td style="text-align: center;"><b>Giờ bắt đầu</b></td>
                            <td style="text-align: center;"><b>Giờ kết thúc</b></td>
                            <td style="text-align: center;"><b>Ngày Bắt Đầu</b></td>
                            <td style="text-align: center;"><b>Ngày Kết Thúc</b></td>
                        </tr>

                        @foreach ($class as $key => $item)
                            <tr>
                                <td>{{ $item->class_id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->class_name }}</td>
                                <td>{{ $item->room }}</td>
                                <td style="text-align: center;">{{ $item->date_of_week }}</td>
                                <td style="text-align: center;">{{ $item->start_time }}</td>
                                <td style="text-align: center;">{{ $item->end_time }}</td>
                                <td style="text-align: center;">{{ $item->start_date }}</td>
                                <td style="text-align: center;">{{ $item->end_date }}</td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="class section" id="pack">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-5">
                    <h2 data-aos="fade-up" data-aos-delay="200">Các gói tập</h2>
                    <hr>
                </div>
                <div>
                    <table style="width: 1225px; border: 1px; padding: 10px;text-align: center">
                        <tr>
                            <td><b>Mã gói</b></td>
                            <td><b>Tên gói</b></td>
                            <td><b>Thời hạn</b></td>
                            <td><b>Giá</b></td>
                        </tr>
                        @foreach ($pack as $itemP)
                            <tr>
                                <td>{{ $itemP->id }}</td>
                                <td>{{ $itemP->name }}</td>
                                <td>{{ $itemP->time }} tháng</td>
                                <td>{{ $item->price }}VNĐ</td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="schedule section" id="schedule">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">
                    <h2 class="text-white" data-aos="fade-up" data-aos-delay="200">Gặp gỡ những chuyên gia thể hình
                        hàng đầu</h2>
                    <h6 data-aos="fade-up">Dù bạn yêu thích CrossFit, đam mê bộ môn Cardio đầy sôi động, hay môn
                        Powerlifting cực mạnh mẽ. Bạn sẽ luôn được hướng dẫn bởi những chuyên gia hàng đầu. <br><br>
                    </h6>
                </div>
                <br><br><br>
                @foreach ($trainer as $key => $item)
                    <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up"
                        data-aos-delay="800">
                        <div class="team-thumb">
                            <img src="{{ url($item->image)}}" class="img-fluid"
                                alt="Trainer">
                            <div class="team-info d-flex flex-column">
                                <h4>{{ $item->name }}</h4>
                                <span>{{ $item->type }}</span>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="class section" id="room">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-5">
                    {{-- <h6 data-aos="fade-up">Có được một cơ thể hoàn hảo</h6> --}}
                    <h2 data-aos="fade-up" data-aos-delay="200">Các phòng tập</h2>
                </div>

                @foreach ($room as $itemR)
                    <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                        <div class="class-thumb">
                            <img src="/{{ $itemR->image}}" class="img-fluid" alt="Class">
                            <div class="class-info">
                                <h3 class="mb-1">{{$itemR->name}}</h3>
                                <p class="mt-3">Số điện thoại: {{$itemR->phone}}</p><br>
                                <button type="submit" class="form-control" id="submit-button" name="submit"><a
                                        href="/room/detail/{{$itemR->id}}">Chi Tiết</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-center">
        {{ $room->links('pagination::bootstrap-4') }}
    </div>
    <!-- SCHEDULE -->



    <!-- CONTACT -->
    @include('layouts.footer')
</body>

</html>


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

    @include('layouts.header')
    <!-- CLASS -->
    <section class="class section" id="class">
        <div class="container">
            @if (session()->has('login'))
                @if (session()->get('login')['role'] == 'admin')
                    <div class="d-flex justify-content-end">
                        <a href="news/create" class="btn btn-primary">Thêm bài viết</a>
                    </div>
                @endif
            @endif
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-5">
                    {{-- <h6 data-aos="fade-up">Có được một cơ thể hoàn hảo</h6> --}}
                    <h2 data-aos="fade-up" data-aos-delay="200">Tin tức</h2>
                </div>
                @foreach ($data as $item)
                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="/{{$item->image}}" class="img-fluid" alt="Class">
                        <div class="class-info">
                            <h3 class="mb-1">{{$item->name}}</h3>
                            <p class="mt-3">{{ \Illuminate\Support\Str::limit($item->introduction, 100, $end='...') }}</p><br>
                            <button type="submit" class="form-control" id="submit-button" name="submit"><a
                                    href="/news/{{$item->id}}"> Xem Thêm</button></a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
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
                </div> --}}
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-center">
        {{ $data->links('pagination::bootstrap-4') }}
    </div>

    <!-- SCHEDULE -->



    <!-- CONTACT -->
    @include('layouts.footer')
</body>

</html>


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
        <script src="https://cdn.tiny.cloud/1/g070n42f1h0won3aaevgw9ufk4jtqb0f1tixpqvg5ibpk9p1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ url('css/tooplate-gymso-style.css') }}">
    <!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">
    @include('layouts.header')

    @if (session()->has('login'))
        @if (session()->get('login')['role'] == 'admin')
        <div class="container" style="margin-top: 10% !important;">
            <form name="addNews" action="{{url('news')}}" method="POST" enctype="multipart/form-data">
                {{-- @method('put') --}}
                @csrf
                <div class="form-group">
                  <label>Tên:</label>
                  <input type="text" class="form-control" name="name" >
                </div>
                <label>Hình ảnh:</label>
                <div class="form-group d-flex">
                  <input type="file" class="form-control" name="image" onchange="previewImg('imageNew','addNews')">
                  <img id="imageNew" src="" alt="image" style="display: none; max-width: 50rem; max-height: 25rem;">
                </div>
                <div class="form-group">
                  <label>Giới thiệu</label>
                  <textarea class="form-control" name="introduction" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea class="form-control" id="basic-example" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="form-control" id="submit-button" name="data-register">Tạo bài viết</button>
            </form>
        </div>
        @endif
    @endif

    @include('layouts.footer')
    <script>
        tinymce.init({
    selector: 'textarea#basic-example',
    height: 500,
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });
    function readOnly(){
        document.querySelector('#tinymce').setAttribute('contentEditable',false)
        document.querySelector('.tox-editor-header').style.display = 'none'
        document.querySelector('.tox-statusbar').style.display = 'none'
    }
    </script>
    @if (!session()->has('login'))
    <script>
        document.querySelector('#tinymce').setAttribute('contentEditable',false)
        document.querySelector('.tox-editor-header').style.display = 'none'
        document.querySelector('.tox-statusbar').style.display = 'none'
    </script>
    @endif
</body>

</html>

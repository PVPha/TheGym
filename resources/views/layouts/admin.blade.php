<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FPTGym</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ url('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('jsPT/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('cssPT/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('imagesPT/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="/"><img
                        src="{{ url('./imagesPT/d461561c21bfd3e18aae (1).jpg') }}" class="mr-2"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="/admin"><img src="{{ url('imagesPT/logo-mini.svg') }}"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <!-- SideBar: Quan lý danh sach thanh vien -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false"
                            aria-controls="tables">
                            <i class="fas fa-user"></i>&emsp;
                            <span class="menu-title">Quản Lí Users</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{url('/user')}}">Kiểm
                                        tra danh sách</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- SideBar: Quan lý danh sách lớp -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false"
                            aria-controls="icons">
                            <i class="fas fa-list"></i>&emsp;
                            <span class="menu-title">Quản lý lớp học</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/class">Kiểm
                                        tra</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#pack" aria-expanded="false"
                            aria-controls="pack">
                            <i class="fas fa-list"></i>&emsp;
                            <span class="menu-title">Quản lý gói tập</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="pack">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/pack">Kiểm
                                        tra</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#room" aria-expanded="false"
                            aria-controls="room">
                            <i class="fas fa-list"></i>&emsp;
                            <span class="menu-title">Quản lý phòng tập</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="room">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/room">Kiểm
                                        tra</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#storage" aria-expanded="false"
                            aria-controls="storage">
                            <i class="fas fa-list"></i>&emsp;
                            <span class="menu-title">Quản lý kho</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="storage">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/storage">Kiểm
                                        tra</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#promotion" aria-expanded="false"
                            aria-controls="promotion">
                            <i class="fas fa-list"></i>&emsp;
                            <span class="menu-title">Quản lý khuyến mãi</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="promotion">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/promotion">Kiểm
                                        tra</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false"
                            aria-controls="order">
                            <i class="fas fa-list"></i>&emsp;
                            <span class="menu-title">Quản lý đơn hàng</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="order">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/order">Kiểm
                                        tra</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#question" aria-expanded="false"
                            aria-controls="question">
                            <i class="fas fa-list"></i>&emsp;
                            <span class="menu-title">Câu hỏi</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="question">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/question">Kiểm
                                        tra</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <i class="fas fa-sign-out-alt"></i> &emsp;
                            <span class="menu-title">ĐĂNG XUẤT</span>
                        </a>
                    </li>
                </ul>
            </nav>
            @yield('content')
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <script>
        function submitForm(name) {
            document.forms[`${name}`].submit();
        }
        function previewImg(name,form) {
            let file = document.forms[form].querySelector('input[name="image"]').files;
            console.log(file);
            if (file) {
                document.forms[form].querySelector('#'+name).style.display = 'block';
                document.forms[form].querySelector('#'+name).src = URL.createObjectURL(file[0]);
            }
        }

        function show(url,form) {
            let ele =  document.forms[form].querySelectorAll('.form-control')
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data) {
                    let value = JSON.parse(data)[0];
                    console.log(value);
                    ele.forEach(e=>{
                        name = e.name
                        console.log(name);
                        if (name != 'image') {
                            document.forms[`${form}`][`${name}`].value = `${value[name]}`;
                        }
                        if (name == 'image') {
                            let img = document.forms[`${form}`].querySelector('img');
                            if (img && value[name]) {
                                img.style.display = 'block';
                                img.src = value[name]
                            }
                        }
                        if (name == 'trainer_id') {
                            getTrainerType(form);
                        }
                        if(name == 'date_of_week'){
                            let date = value['date_of_week'].split('/');
                            date.forEach(d => {
                                let checkbox = document.forms[form].querySelectorAll('input[type="checkbox"]');
                                checkbox.forEach(che=>{
                                    if (che.value == d) {
                                        che.checked = true;
                                    }
                                })
                            });
                        }
                    })
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }
        function update(form) {
            document.forms[form].submit();
            // let ele =  Object.keys(document.forms[form].elements).filter(key => isNaN(key))
            // let dataQuery = {};
            // ele.forEach(e => {
            //     dataQuery[e] = document.forms[form][e].value
            //         });
            // $.ajax({
            //     type: 'PUT',
            //     url: url,
            //     data: dataQuery,
            //     success: function(data) {
            //         console.log(data);
            //     },
            //     error: function(data) {
            //         console.log(data);
            //     }
            // })
        }
        function getDOW(form) {
            let checkbox = document.forms[form].querySelectorAll('input[type="checkbox"]:checked');
            let value = []
            checkbox.forEach(c=>{
                if (!value.includes(c.value)) {
                    value.push(c.value);
                }
                console.log(value.toString());
                document.forms[form].querySelector('input[name="date_of_week"]').value = value.toString();
            })
        }
        function getTrainerType(form) {
            let type = document.forms[form].querySelector('select[name="type"]').value
            let option = ''
            $.ajax({
                type: 'GET',
                url: 'user/type/'+type,
                success: function(data) {
                    data.forEach(e => {
                        option += `<option value="${e.id}">${e.name}</option>`
                    });
                    document.forms[form].querySelector('select[name="trainer_id"]').innerHTML = option;
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }
        function getClassType(form) {
            let type = document.forms[form].querySelector('select[name="type"]').value
            let option = ''
            $.ajax({
                type: 'GET',
                url: 'class/type/'+type,
                success: function(data) {
                    data.forEach(e => {
                        option += `<option value="${e.class_id}">${e.class_name}</option>`
                    });
                    document.forms[form].querySelector('select[name="class_id"]').innerHTML = option;
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }
        function getClassInfor(form) {
            let type = document.forms[form].querySelector('select[name="class_name"]').value
            let option = ''
            $.ajax({
                type: 'GET',
                url: 'class/infor/'+type,
                success: function(data) {
                    console.log(data);
                    data.forEach(e => {
                        let date = e.date_of_week.split(',');
                        date.forEach(d => {
                            let checkbox = document.forms[form].querySelectorAll('input[type="checkbox"]');
                            checkbox.forEach(che=>{
                                if (che.value == d) {
                                    che.checked = true;
                                }else{
                                    che.checked = false;
                                }
                            })
                        });
                    });
                    // document.forms[form].querySelector('select[name="class_name"]').innerHTML = option;
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }
        function getClassRegister(url) {
            let table = document.querySelector('#table_class_register')
            let body = ''
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    console.log(data);
                    data.forEach((e,index) => {
                        body += `<tr class='table-info'>
                                    <td>${index + 1}</td>
                                    <td>${ e.class_name }</td>
                                    <td>${ e.name }</td>
                                    <td>${ e.room }</td>
                                    <td>${ e.date_of_week+' / '+e.start_time + ' - ' + e.end_time }</td>
                                    <td>${ e.start_date+' - '+e.end_date}</td>
                                    <td>
                                        <a type='button' class='btn btn-danger'
                                            href='register/delete/${ e.id }'><i
                                                class='fas fa-user-times'></i></a></td>
                                </tr>`
                    });
                    table.innerHTML = body
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }
        function calculatePack(form) {
            const date = 30;
            let time = document.forms[form].querySelector('select[name="time"]');
            let start_date = document.forms[form].querySelector('input[name="start_date"]');
            let expiry_date = document.forms[form].querySelector('input[name="expiry_date"]');
            let date_of_month = time.value * date;
            if (start_date) {
                let d = new Date(start_date.value);
                d.setDate(d.getDate()+date_of_month);
                expiry_date.value = d.toLocaleDateString("en-CA");
            }
        }
        function currency(number) {
            return new Intl.NumberFormat('vn-VN', { maximumSignificantDigits: 3 }).format(number);
        }
    </script>
    <!-- plugins:js -->
    <script src="{{ url('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ url('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ url('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ url('jsPT/dataTables.select.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('jsPT/off-canvas.js') }}"></script>
    <script src="{{ url('jsPT/hoverable-collapse.js') }}"></script>
    <script src="{{ url('jsPT/template.js') }}"></script>
    <script src="{{ url('jsPT/settings.js') }}"></script>
    <script src="{{ url('jsPT/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ url('jsPT/dashboard.js') }}"></script>
    <script src="{{ url('jsPT/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>

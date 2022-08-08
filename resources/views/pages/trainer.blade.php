@extends('layouts.user')
@section('content')
<div class="container">
    <div class="main-body">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chính</a></li>

                <li class="breadcrumb-item active" aria-current="page">Trang thông tin HLV</li>
                <li style="margin-left:40rem;"><a name="" id="logout" href="/logout" >Đăng xuất</a>
                </li>
            </ol>

        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            @foreach ($trainer as $item)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <!--<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                class="rounded-circle" width="150" /> -->
                            <img src="{{$item->image}}" alt="trainer" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>{{$item->name}}</h4>
                                <p class="text-secondary mb-1">HLV của FPTGym Fitness</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="
                list-group-item
                d-flex
                justify-content-between
                align-items-center
                flex-wrap
              ">
                            <h6 class="mb-0">Họ và tên:</h6>
                            <span class="text-secondary">{{$item->name}}</span>
                        </li>
                        <li class="
                list-group-item
                d-flex
                justify-content-between
                align-items-center
                flex-wrap
              ">
                            <h6 class="mb-0">Giới tính:</h6>
                            <span class="text-secondary">{{$item->gender}}</span>
                        </li>
                        <li class="
                list-group-item
                d-flex
                justify-content-between
                align-items-center
                flex-wrap
              ">
                            <h6 class="mb-0">Số điện thoại:</h6>
                            <span class="text-secondary">{{$item->phone}}</span>
                        </li>
                        <li class="
                list-group-item
                d-flex
                justify-content-between
                align-items-center
                flex-wrap
              ">
                            <h6 class="mb-0">Ngày sinh:</h6>
                            <span class="text-secondary">{{$item->date_of_birth}}</span>
                        </li>
                        <li class="
                list-group-item
                d-flex
                justify-content-between
                align-items-center
                flex-wrap
              ">
                            <h6 class="mb-0">Chuyên môn:</h6>
                            <span class="text-secondary">{{$item->type}}</span>
                        </li>
                        <li class="
                list-group-item
                d-flex
                justify-content-between
                align-items-center
                flex-wrap
              ">
                            <h6 class="mb-0">Mô tả:</h6>
                            <span class="text-secondary">{{$item->description}}</span>
                        </li>
                        <li class="
                list-group-item
                d-flex
                justify-content-between
                align-items-center
                flex-wrap
              ">
                            <h6 class="mb-0">
                                <a class="btn btn-light" target="__blank" href="#" data-toggle="modal" data-target="#edit" style="color: black; background-color:cyan; font-weight:bold" onclick="show('user/{{$item->id}}','updatePT')">Thay đổi thông tin</a>
                                <a class="btn btn-light" target="__blank" href="#" data-toggle="modal" data-target="#changePass" style="color: black; background-color:cyan; font-weight:bold" onclick="show('user/{{$item->id}}','changePass')">Đổi mật khẩu</a>

                            </h6>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8" table>
                @if ($item->type =='Yoga')
                <div>
                    <table style="width:100%" border="0.1">
                        <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                            Danh sách các lớp đang dạy </h4>
                        <thead>
                            <tr>
                                <th>Tên lớp</th>
                                <th>Phòng</th>
                                <th>Ngày - giờ học</th>
                                <th>Bắt đầu - Kết thúc</th>
                                <th>Lựa chọn</th>
                            </tr>
                        </thead>
                            <tbody style="vertical-align: middle;">
                                @foreach ($class as $itemCL)
                                <tr>
                                    <td>{{$itemCL->class_name }} </td>
                                    <td>{{$itemCL->room }} </td>
                                    <td>{{$itemCL->date_of_week.'/'.$itemCL->start_time.' - '.$itemCL->end_time }}</td>
                                    <td>{{$itemCL->start_date.' - '.$itemCL->end_date }}</td>
                                    <td>
                                        <a class="btn" onclick="detail('trainer/{{$itemCL->class_id}}', 'trainer')">Chi tiết</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
                <br>
                <div>
                    <table style="width:100%" border="0.1">
                        <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                            Danh sách các lớp đã dạy </h4>
                        <thead>
                            <tr>
                                <th>Tên lớp</th>
                                <th>Phòng</th>
                                <th>Ngày - giờ học</th>
                                <th>Bắt đầu - Kết thúc</th>
                                <th>Lựa chọn</th>
                            </tr>
                        </thead>
                            <tbody style="vertical-align: middle;">
                                @foreach ($old_class as $itemOCL)
                                <tr>
                                    <td>{{$itemOCL->class_name }} </td>
                                    <td>{{$itemOCL->room }} </td>
                                    <td>{{$itemOCL->date_of_week.'/'.$itemOCL->start_time.' - '.$itemOCL->end_time }}</td>
                                    <td>{{$itemOCL->start_date.' - '.$itemOCL->end_date }}</td>
                                    <td>
                                        <a class="btn" onclick="detail('trainer/{{$itemOCL->class_id}}','trainer')">Chi tiết</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
                <br>
                <div>
                    <table class="table table-borderless">
                        <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                            Danh sách lớp học </h4>
                        <thead>
                            <tr>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Giới tính</th>
                                <th scope="col">Điện thoại</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody id="detail_table">

                        </tbody>
                    </table>
                </div>
                @endif
                @if ($item->type == 'Gym')
                <div>
                    <table style="width:100%" border="0.1">
                        <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                            Lịch huấn luyện </h4>
                        <thead>
                            <tr>
                                <th>Tên học viên</th>
                                <th>Ngày trong tuần</th>
                                <th>Giờ học</th>
                                <th>Số điện thoại</th>
                                <th>Lựa chọn</th>
                            </tr>
                        </thead>
                            <tbody style="vertical-align: middle;">
                                @foreach ($schedule as $itemSC)
                                <tr>
                                    <td>{{$itemSC->name }} </td>
                                    <td>{{$itemSC->date_of_week}} </td>
                                    <td>{{$itemSC->start_time.' - '.$itemSC->end_time }}</td>
                                    <td>{{$itemSC->phone}}</td>
                                    <td>
                                        <a class="btn" href="schedule/{{$itemSC->id}}/edit" style="{{$itemSC->status == true ? 'display:none':''}}">Duyệt</a>
                                        <a class="btn" data-toggle="modal" onclick="getID('{{$itemSC->member_id}}')" data-target="#index" style="{{$itemSC->status == false ? 'display:none':'display:block'}}">Chỉ số</a>
                                        <a class="btn" href="schedule/delete/{{$itemSC->id}}" style="{{$itemSC->status == false ? 'display:none':''}}">Huỷ</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
                <br>
                {{-- <div>
                    <table style="width:100%" border="0.1">
                        <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                            Danh sách các lớp đã dạy </h4>
                        <thead>
                            <tr>
                                <th>Tên lớp</th>
                                <th>Phòng</th>
                                <th>Ngày - giờ học</th>
                                <th>Bắt đầu - Kết thúc</th>
                                <th>Lựa chọn</th>
                            </tr>
                        </thead>
                            <tbody style="vertical-align: middle;">
                                @foreach ($old_class as $itemOCL)
                                <tr>
                                    <td>{{$itemOCL->class_name }} </td>
                                    <td>{{$itemOCL->room }} </td>
                                    <td>{{$itemOCL->date_of_week.'/'.$itemOCL->start_time.' - '.$itemOCL->end_time }}</td>
                                    <td>{{$itemOCL->start_date.' - '.$itemOCL->end_date }}</td>
                                    <td>
                                        <a class="btn" onclick="detail('trainer/{{$itemOCL->class_id}}','trainer')">Chi tiết</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div> --}}
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="index" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="membershipFormLabel" style="text-align:center;">Chỉ số</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table style = "width:100%" border="0.1">
                    <button class="btn" data-toggle="modal"  data-target="#addID">
                        Thêm chỉ số
                    </button>
                    <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                    Chỉ số</h4>
                    <thead>
                        <tr>
                            <th>Chiều cao</th>
                            <th>Cân nặng</th>
                            <th>Ngực</th>
                            <th>Eo</th>
                            <th>Mông</th>
                            <th>Bắp tay trái</th>
                            <th>Bắp tay phải</th>
                            <th>Bắp chân trái</th>
                            <th>Bắp chân phải</th>
                            <th>Ngày đo</th>
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody class="index-body" style="vertical-align: middle;">

                    </tbody>
                </table>
            </div>
                <div class="modal-footer"></div>
            </div>
    </div>
</div>

<div class="modal fade" id="addID" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h2 class="modal-title" id="membershipFormLabel" style="text-align:center;">Thêm chỉ số</h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form name="addID" class="membership-form webform" role="form" action="index" method="POST" >
                    @csrf
                    <input type="hidden" class="form-control" name="member_id">
                    <label>Chiều cao:</label>
                    <input type="text" class="form-control mt-1" name="height" >
                    <label>Cân nặng:</label>
                    <input type="text" class="form-control mt-1" name="weight" >
                    <label>Ngực:</label>
                    <input type="text" class="form-control mt-1" name="chest" >
                    <label>Eo:</label>
                    <input type="text" class="form-control mt-1" name="waist" >
                    <label>Mông:</label>
                    <input type="text" class="form-control mt-1" name="butt" >
                    <label>Bắp tay trái:</label>
                    <input type="text" class="form-control mt-1" name="left_hand" >
                    <label>Bắp tay phải:</label>
                    <input type="text" class="form-control mt-1" name="right_hand" >
                    <label>Bắp chân trái:</label>
                    <input type="text" class="form-control mt-1" name="left_leg" >
                    <label>Bắp chân phải:</label>
                    <input type="text" class="form-control mt-1" name="right_leg" >
                    <button type="submit" class=" form-control mt-1" id="submit-button" name="data-edit" style="font-weight: bold; background-color:cyan">Cập nhật</button>
                </form>
            </div>
                <div class="modal-footer"></div>
            </div>
    </div>
</div>
<div class="modal fade" id="updateID" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h2 class="modal-title" id="membershipFormLabel" style="text-align:center;">Cập nhật chỉ số</h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form name="updateID" class="membership-form webform" role="form" action="index/update" method="POST" >
                    @method('put')
                    @csrf
                    <input type="hidden" class="form-control" name="id">
                    <label>Chiều cao:</label>
                    <input type="text" class="form-control mt-1" name="height" >
                    <label>Cân nặng:</label>
                    <input type="text" class="form-control mt-1" name="weight" >
                    <label>Ngực:</label>
                    <input type="text" class="form-control mt-1" name="chest" >
                    <label>Eo:</label>
                    <input type="text" class="form-control mt-1" name="waist" >
                    <label>Mông:</label>
                    <input type="text" class="form-control mt-1" name="butt" >
                    <label>Bắp tay trái:</label>
                    <input type="text" class="form-control mt-1" name="left_hand" >
                    <label>Bắp tay phải:</label>
                    <input type="text" class="form-control mt-1" name="right_hand" >
                    <label>Bắp chân trái:</label>
                    <input type="text" class="form-control mt-1" name="left_leg" >
                    <label>Bắp chân phải:</label>
                    <input type="text" class="form-control mt-1" name="right_leg" >
                    <label>Ngày đo:</label>
                    <input type="date" class="form-control mt-1" name="date_measure" >
                    <button type="submit" class=" form-control mt-1" id="submit-button" name="data-edit" style="font-weight: bold; background-color:cyan">Cập nhật</button>
                </form>
            </div>
                <div class="modal-footer"></div>
            </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h2 class="modal-title" id="membershipFormLabel" style="text-align:center;">Cập nhật thông tin cá nhân</h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form name="updatePT" class="membership-form webform" role="form" action="user/update" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="for_user" value="trainer">
                    <input type="hidden" class="form-control" name="id">
                    <input type="text" class="form-control mt-1" name="name"
                           placeholder="Họ và Tên"  >
                    <select class="form-control mt-1" name="gender">
                        <option placeholder="Chọn giới tính">Chọn giới tính</option>
                        <option   value="Nam">Nam</option>
                        <option  value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>

                    <input type="email" class="form-control mt-1" name="email" placeholder="Nhập email"
                        >

                    <input type="number" class="form-control mt-1" name="phone" placeholder="Nhập số điện thoại">

                    <input type="text" class="form-control mt-1" name="date_of_birth" placeholder="Nhập tuổi">

                    <label>Hình ảnh:</label>
                    <div class="form-group d-flex">
                        <input type="file" class="form-control" name="image" onchange="previewImg('imageMB','updateMB')">
                        <img id="imageMB" src="" alt="image" style="display: none; width: 13rem; height: 13rem;">
                    </div>
                    <button type="submit" class=" form-control mt-1" id="submit-button" name="data-edit"
                            style="font-weight: bold; background-color:cyan">Cập nhật</button>

                </form>
            </div>
                <div class="modal-footer"></div>
            </div>
    </div>
</div>

<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="membershipFormLabel" style="text-align: center;">Đổi mật khẩu</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>

            <div class="modal-body">
                <form class="membership-form webform" name="changePass" role="form" action="/change" onsubmit="validatePass(event)"
                    method="POST">
                    @csrf
                    <input type="hidden" class="form-control" name="id" >
                    <div class="form-group">
                        <label for="">Mật khẩu mới</label>
                        <input type="password" class="form-control" name="new_password" placeholder="Mật khẩu mới"
                            required>
                        <small id="helpId" class="form-text text-muted ernp"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="re_password"
                            placeholder="Nhập lại mật khẩu" required>
                    </div>
                        <small id="helpId" class="form-text text-muted error" style="color: red;"></small>
                        <button type="submit" class="form-control mt-1" id="submit-button" name="submit-change"
                        style="font-weight: bold; background-color:cyan">Đổi mật khẩu</button>
                </form>
            </div>

            <div class="modal-footer"></div>

        </div>
    </div>
</div>
@endsection


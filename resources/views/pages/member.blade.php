@extends('layouts.user')
@section('content')
<div class="container-fluid">
    <div class="main-body">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chính</a></li>

                <li class="breadcrumb-item active" aria-current="page">Trang thông tin thành viên</li>
                <li style="margin-left:40rem;"><a name="" id="logout" href="/logout">Đăng xuất</a>
                </li>
            </ol>

        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            @foreach ($member as $itemMB)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if ($itemMB->image == '')
                            <img src="https://bootdey.com/img/Content/avatar/{{$itemMB->gender == 'Nữ' ? 'avatar8.png': 'avatar7.png'}}" alt="Admin"
                            class="rounded-circle" width="150" />
                            @endif
                            @if ($itemMB->image)
                            <img src="{{$itemMB->image}}" alt="member" class="rounded-circle" width="150">
                            @endif
                            <div class="mt-3">
                                <h4>{{$itemMB->name}}</h4>
                                <p class="text-secondary mb-1">Thành viên của FPTGym Fitness</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class=" list-group-item d-flex justify-content-between align-items-center flex-wrap ">
                            <h6 class="mb-0">Họ và tên:</h6>
                            <span class="text-secondary">{{ $itemMB->name}}</span>
                        </li>
                        <li class=" list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Giới tính:</h6>
                            <span class="text-secondary">{{ $itemMB->gender}}</span>
                        </li>
                        <li class=" list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Email:</h6>
                            <span class="text-secondary">{{ $itemMB->email}}</span>
                        </li>
                        <li class=" list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Số điện thoại:</h6>
                            <span class="text-secondary">{{ $itemMB->phone}}</span>
                        </li>
                        <li class=" list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Ngày sinh:</h6>
                            {{-- date('Y-m-d')->diff($itemMB->date_of_birth)->y --}}
                            <span class="text-secondary">{{ $itemMB->date_of_birth }}</span>
                        </li>
                        <li class=" list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <a class="btn btn-light" target="__blank" href="#" data-toggle="modal"
                                    data-target="#edit" style="color: black; background-color:cyan; font-weight:bold" onclick="show('user/get/{{$itemMB->id}}','updateMB')">Thay đổi thông tin</a>
                                <a class="btn btn-light" target="__blank" href="#" data-toggle="modal"
                                    data-target="#changePass" style="color: black; background-color:cyan; font-weight:bold" onclick="show('user/get/{{$itemMB->id}}','changePass')" >Đổi mật khẩu</a>
                            </h6>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach

            <div class="col-md-8" table>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lớp</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Gói tập</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Đơn hàng</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div>
                            <table style = "width:100%" border="0.1">
                                <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                                Danh sách các lớp đang học </h4>
                                <thead>
                                    <tr>
                                        <th >Tên lớp</th>
                                        <th >Ngày học</th>
                                        <th >Bắt đầu</th>
                                        <th >Kết thúc</th>
                                        <th >Huấn luyện viên</th>
                                        <th >Lựa chọn</th>
                                    </tr>
                                </thead>
                                <tbody style="vertical-align: middle;">
                                    @foreach ($class as $itemCL)
                                    <tr>
                                        <td>{{$itemCL->class_name}} </td>
                                        <td>{{$itemCL->date_of_week}} </td>
                                        <td>{{$itemCL->start_time}}</td>
                                        <td>{{$itemCL->end_time}}</td>
                                        <td>{{$itemCL->name}}</td>
                                        <td >
                                            <a class="btn" onclick="detail('member/{{$itemCL->class_id}}', 'member')">Chi tiết</a>
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
                                    Chi tiết lớp học </h4>
                                <thead>
                                    <tr>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Phòng</th>
                                        <th scope="col">Thời gian</th>
                                        <th scope="col">Tên huấn luyện viên</th>
                                        <th scope="col">Điện thoại</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody id="detail_table">
                                    @foreach ($class as $itemDT)
                                    <tr>
                                        <td>{{$itemDT->class_name}} </td>
                                        <td>{{$itemDT->room}}</td>
                                        <td>{{$itemDT->start_date. ' '.$itemDT->end_date}}</td>
                                        <td>{{$itemDT->name}}</td>
                                        <td>{{$itemDT->phone}}</td>
                                        <td>{{$itemDT->email}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <a class="btn btn-light my-3" target="__blank" href="#" data-toggle="modal"
                                    data-target="#register" style="color: black; background-color:cyan; font-weight:bold" >Đăng kí gói tập</a>
                        <div>
                            <table style = "width:100%" border="0.1">
                                <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                                Danh sách các gói đã đăng ký </h4>
                                <thead>
                                    <tr>
                                        <th >Tên gói</th>
                                        <th >Thời hạn</th>
                                        <th >Bắt đầu</th>
                                        <th >Kết thúc</th>
                                        <th >Giá</th>
                                        <th >Lựa chọn</th>
                                    </tr>
                                </thead>
                                <tbody style="vertical-align: middle;">
                                    @foreach ($pack as $itemPA)
                                    <tr>
                                        <td>{{$itemPA->name}} </td>
                                        <td>{{$itemPA->time.' tháng'}} </td>
                                        <td>{{$itemPA->start_date}}</td>
                                        <td>{{$itemPA->expiry_date}}</td>
                                        <td>{{$itemPA->total_money}}</td>
                                        <td >
                                            {{$itemPA->status == false ? 'Chờ duyệt': ''}}
                                            @if (count($schedule)<2)
                                            <a class="btn" data-toggle="modal"
                                            data-target="#trainer" style="{{$itemPA->status == true?'display: inline':'display: none'}}">Thuê PT</a>
                                            @endif
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
                                    Lịch tập </h4>
                                <thead>
                                    <tr>
                                        <th scope="col">Tên PT</th>
                                        <th scope="col">Thời gian</th>
                                        <th scope="col">Ngày trong tuần</th>
                                        <th scope="col">Điện thoại</th>
                                        <th >Lựa chọn</th>
                                    </tr>
                                </thead>
                                <tbody id="detail_table">
                                    @foreach ($schedule as $itemSC)
                                    <tr>
                                        <td>{{$itemSC->name}} </td>
                                        <td>{{$itemSC->start_time.' '.$itemSC->end_time}}</td>
                                        <td>{{$itemSC->date_of_week}}</td>
                                        <td>{{$itemSC->phone}}</td>
                                        <td>
                                            {{-- {{$itemSC->status == false ? 'Chờ': ''}} --}}
                                            <a class="btn" style="{{$itemSC->status == true?'display: none':''}}">Chờ</a>
                                            <a class="btn" data-toggle="modal"
                                                data-target="#updateSchedule" onclick="show('{{'member/'.$itemSC->id}}/edit','updateSchedule')" style="{{$itemSC->status == true?'display: inline':'display: none'}}">Cập nhật</a>
                                            <a class="btn"  href="schedule/delete/{{$itemSC->id}}">Hủy</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div>
                            <table style = "width:100%" border="0.1">
                                <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                                Danh sách đơn hàng </h4>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th >Tổng tiền</th>
                                        <th >Địa chỉ</th>
                                        <th >Số điện thoại</th>
                                        <th >Trạng thái</th>
                                        <th >Lựa chọn</th>
                                    </tr>
                                </thead>
                                <tbody style="vertical-align: middle;">
                                    @foreach ($order as $itemOR)
                                    <tr>
                                        <td>
                                            @foreach (json_decode($itemOR->products) as $itemPROD)
                                                {{$itemPROD->name.'-'.$itemPROD->quantity }} <br>
                                            @endforeach
                                        </td>
                                        <td>{{$itemOR->total}} </td>
                                        <td>{{$itemOR->address}}</td>
                                        <td>{{$itemOR->phone}}</td>
                                        <td>{{$itemOR->status}}</td>
                                        <td >
                                            <a class="btn" href="order/delete/{{$itemOR->id}}" style="{{$itemOR->status == 'Chờ duyệt'?'display: inline':'display: none'}}">Hủy đơn</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="updateSchedule">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Chọn lịch tập</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form name="updateSchedule" action="{{url('schedule/update')}}" method="POST" >
                @method('put')
                @csrf
                <input type="hidden" class="form-control" name="id">
                <label>Ngày trong tuần:</label>
                <div class="d-flex">
                    <input type="hidden" class="form-control" name="date_of_week">
                    <input type="hidden" name="dow">
                <div class="form-check form-check-inline d-flex">
                    <input class="form-check-input" type="checkbox" id="T2" value="T2/T4/T6" onchange="getDOW('schedule')">
                    <label class="form-check-label m-0" for="T2">T2, T4, T6</label>
                  </div>
                  <div class="form-check form-check-inline d-flex">
                    <input class="form-check-input" type="checkbox" id="T3"  value="T3/T5/T7" onchange="getDOW('schedule')">
                    <label class="form-check-label m-0" for="T3">T3, T5, T7</label>
                  </div>
                </div>
                <label>Thời gian tập:</label>
                <div class="form-group d-flex">
                    <input type="time" class="form-control" name="start_time">
                    <p>   </p>
                    <input type="time" class="form-control" name="end_time">
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="submitForm('updateSchedule')">Thuê PT</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="trainer" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="membershipFormLabel" style="text-align:center;">Thuê huấn luyện viên</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table style = "width:100%" border="0.1">
                    <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                    Danh sách các huấn luyện viên</h4>
                    <thead>
                        <tr>
                            <th >Tên huấn luyện viên</th>
                            <th >Giới tính</th>
                            <th >Giá thuê</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th >Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                        @foreach ($trainer as $itemPT)
                        <tr>
                            <td>{{$itemPT->name}} </td>
                            <td>{{$itemPT->gender}} </td>
                            <td>{{$itemPT->price}}</td>
                            <td>{{$itemPT->phone}}</td>
                            <td>{{$itemPT->email}}</td>
                            <td >
                                <a class="btn" data-toggle="modal"
                                data-target="#hire" onclick="hire('{{'schedule/'.$itemPT->id}}','schedule')">Thuê</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                <div class="modal-footer"></div>
            </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="hire">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Chọn lịch tập</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form name="schedule" action="{{url('schedule')}}" method="POST" >
                @csrf
                <input type="hidden" class="form-control" name="id">

                <label>Ngày trong tuần:</label>
                <div class="d-flex">
                    <input type="hidden" class="form-control" name="date_of_week">
                    <input type="hidden" name="dow">
                <div class="form-check form-check-inline d-flex">
                    <input class="form-check-input" type="checkbox" id="T2" value="T2/T4/T6" onchange="getDOW('schedule')">
                    <label class="form-check-label m-0" for="T2">T2, T4, T6</label>
                  </div>
                  <div class="form-check form-check-inline d-flex">
                    <input class="form-check-input" type="checkbox" id="T3"  value="T3/T5/T7" onchange="getDOW('schedule')">
                    <label class="form-check-label m-0" for="T3">T3, T5, T7</label>
                  </div>
                </div>
                <label>Thời gian tập:</label>
                <div class="form-group d-flex">
                    <input type="time" class="form-control" name="start_time">
                    <p>   </p>
                    <input type="time" class="form-control" name="end_time">
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="submitForm('schedule')">Thuê PT</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="register" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="membershipFormLabel" style="text-align:center;">Các gói tập</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table style = "width:100%" border="0.1">
                    <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                    Danh sách các gói tập</h4>
                    <thead>
                        <tr>
                            <th >Tên gói</th>
                            <th >Thời hạn</th>
                            <th >Giá</th>
                            <th >Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                        @foreach ($packList as $itemPL)
                        <tr>
                            <td>{{$itemPL->name}} </td>
                            <td>{{$itemPL->time}} </td>
                            <td>{{$itemPL->price}}</td>
                            <td >
                                <a class="btn" href="{{'pack_register/'.$itemPL->id}}">Đăng kí</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
                <form name="updateMB" class="membership-form webform" role="form" action="user/update" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input type="hidden" name="for_user" value="member">
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

@extends('layouts.admin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh sách Huấn luyện viên</h4>
                        <div class="row">
                            <div class="col-7">
                                <!-- <a type="button" id="btn-pt" class="btn btn-success " data-toggle="modal"
                                    data-target="#modelAddPT"><i class="fas fa-user-plus"></i></a> -->
                                <a type="button" id="btn-pt" class="btn btn-success " data-toggle="modal" data-target="#addPT"><i class="fas fa-user-plus"></i></a>
                            </div>
                            <div class="col-5 justify-content-end " style="transform: translateX(8rem);">
                                <form class="form-inline" name="form-SMB" action="/user/search">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="text" name="query" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ request()->input('query') }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead style="background-color: black; color:white; text-align:center">
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã HLV</th>
                                        <th>Họ Tên</th>
                                        <th>Giới Tính</th>
                                        <th>Chuyên môn</th>
                                        <th>SDT</th>
                                        <th>Lựa chọn</th>
                                    </tr>
                                </thead>
                                <tbody id="t_pt">
                                    @foreach ($trainer as $keyPT => $itemPT)
                                    <tr class='table-info' style="font-weight: bold;">
                                        <td>{{$keyPT +1}}</td>
                                        <td>{{$itemPT->id}}</td>
                                        <td>{{$itemPT->name}}</td>
                                        <td>{{$itemPT->gender}}</td>
                                        <td>{{$itemPT->type}}</td>
                                        <td>{{$itemPT->phone}}</td>
                                        <td>
                                            <a type='button' class='btn btn-info' onclick="show('{{url('user').'/'.$itemPT->id}}','updatePT')" data-toggle="modal" data-target="#updatePT"><i class='fas fa-user-edit'></i></a> <a type='button' class='btn btn-danger' href='{{url('user/delete/'.$itemPT->id)}}'><i class='fas fa-user-times'></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh sách thành viên</h4>
                        <div class="row">
                            <div class="col-7">
                                <!-- <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal"
                                    data-target="#modelAddMB"><i class="fas fa-user-plus"></i></a> -->
                                <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal" data-target="#addMB"><i class="fas fa-user-plus"></i></a>
                            </div>
                            <div class="col-5 justify-content-end " style="transform: translateX(8rem);">
                                <form class="form-inline" name="form-SMB" action="/user/search">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="text" name="query" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ request()->input('query') }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead style="background-color: black; color:white; text-align:center">
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ Tên</th>
                                        <th>Giới Tính</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Ngày đăng ký</th>
                                        <th>Lựa chọn</th>
                                    </tr>
                                </thead>
                                <tbody id="t_mb">
                                    @foreach ($member as $keyMB => $itemMB)
                                        <tr class='table-info' style="font-weight: bold;">
                                            <td>{{$keyMB +1}}</td>
                                            <td>{{$itemMB->name}}</td>
                                            <td>{{$itemMB->gender}}</td>
                                            <td>{{$itemMB->phone}}</td>
                                            <td>{{$itemMB->register_date}}</td>
                                            <td>
                                                <a type='button' class='btn btn-secondary' onclick="getClassRegister('{{url('register').'/'.$itemMB->id}}')" data-toggle="modal" data-target="#classList"><i class="fas fa-list-alt"></i></a>
                                                <a type='button' class='btn btn-secondary' onclick="show('{{url('user').'/'.$itemMB->id}}','packRegister')" data-toggle="modal" data-target="#packAD"><i class="fas fa-edit"></i></a>
                                                <a type='button' class='btn btn-secondary' onclick="show('{{url('user').'/'.$itemMB->id}}','classRegister')" data-toggle="modal" data-target="#classRegister"><i class="fas fa-user-check"></i></a>
                                                <a type='button' class='btn btn-info' onclick="show('{{url('user').'/'.$itemMB->id}}','updateMB')" data-toggle="modal" data-target="#updateMB"><i class='fas fa-user-edit'></i></a>
                                                <a type='button' class='btn btn-danger' href='{{url('user/delete').'/'.$itemMB->id}}'><i class='fas fa-user-times'></i></a>
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
    <div>
        <div class="modal" tabindex="-1" role="dialog" id="packAD">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Đăng ký gói tập</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="packRegister" action="/pack_register" method="POST" >
                        @csrf
                        <input type="hidden" class="form-control" name="id">
                        <label>Gói tập:</label>
                        <div class="form-group">
                          <select class="form-control" name="pack_id">
                            @foreach ($pack as $itemPA)
                            <option value="{{$itemPA->id}}">{{$itemPA->name}}</option>
                            @endforeach
                          </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('packRegister')">Đăng ký gói</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="addPT">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Thêm huấn luyện viên</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="addPT" action="{{url('user')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="for_trainer" value="trainer">
                        <input type="hidden" name="role" value="trainer">
                        <div class="form-group">
                          <label>Họ tên:</label>
                          <input type="text" class="form-control" name="name" required>
                        </div>
                        <label>Hình ảnh:</label>
                        <div class="form-group d-flex">
                          <input type="file" class="form-control" name="image" onchange="previewImg('imagePT','addPT')">
                          <img id="imagePT" src="" alt="image" style="display: none; width: 13rem; height: 13rem;">
                        </div>
                        <div class="form-group">
                          <label>Giới tính:</label>
                          <select class="form-control" name="gender">
                            <option>Nam</option>
                            <option>Nữ</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            <input type="number" class="form-control" name="phone" onchange="checkDupEP('addPT')" required>
                            <small id="erPhone" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" onchange="checkDupEP('addPT')" required>
                            <small id="erMail" class="form-text text-muted" style="color: red !important;"></small>
                            <input type="hidden" name="password" value="12345678">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh:</label>
                            <input type="date" class="form-control" name="date_of_birth" onchange="checkDate('addPT')">
                            <small id="erAge" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                        <div class="form-group">
                          <label>Loại huấn luyện Viên:</label>
                          <select class="form-control" name="type">
                            <option>Gym</option>
                            <option>Yoga</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Giá thuê:</label>
                            <div class="input-group">
                                <input type="int" class="form-control" name="price">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">VNĐ</div>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label>Mô tả:</label>
                          <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('addPT')">Thêm huấn luyện viên</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="updatePT">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Cập nhật thông tin huấn luyện viên</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="form-update" name="updatePT"  action="{{url('user/update')}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" name="for_trainer" value="trainer">
                        <input type="hidden" class="form-control" name="id">
                        <div class="form-group">
                          <label>Họ tên:</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                        <label>Hình ảnh:</label>
                        <div class="form-group d-flex">
                          <input type="file" class="form-control" name="image" onchange="previewImg('imagePT','updatePT')">
                          <img id="imagePT" src="" alt="image" style="display: none; width: 13rem; height: 13rem;">
                        </div>
                        <div class="form-group">
                          <label>Giới tính:</label>
                          <select class="form-control" name="gender">
                            <option>Nam</option>
                            <option>Nữ</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            <input type="number" class="form-control" name="phone" onchange="checkDupEP('updatePT')">
                            <small id="erPhone" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" onchange="checkDupEP('updatePT')">
                            <small id="erMail" class="form-text text-muted" style="color: red !important;"></small>
                            <input type="hidden" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh:</label>
                            <input type="date" class="form-control" name="date_of_birth" onchange="checkDate('updatePT')">
                            <small id="erAge" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                        <div class="form-group">
                          <label>Loại huấn luyện Viên:</label>
                          <select class="form-control" name="type">
                            <option>Gym</option>
                            <option>Yoga</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Giá:</label>
                            <div class="input-group">
                                <input type="int" class="form-control" name="price">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">VNĐ</div>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label>Mô tả:</label>
                          <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="update('updatePT')">Cập nhật huấn luyện viên</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal" tabindex="-1" role="dialog" id="addMB">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Thêm thành viên</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="addMB" action="{{url('user')}}" method="POST">
                        @csrf
                        <input type="hidden" name="for_member" value="member">
                        <input type="hidden" name="role" value="member">
                        <div class="form-group">
                          <label>Họ tên:</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                          <label>Giới tính:</label>
                          <select class="form-control" name="gender">
                            <option>Nam</option>
                            <option>Nữ</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            <input type="number" class="form-control" name="phone" onchange="checkDupEP('addMB')">
                            <small id="erPhone" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" onchange="checkDupEP('addMB')">
                            <small id="erMail" class="form-text text-muted" style="color: red !important;"></small>
                            <input type="hidden" name="password" class="form-control" value="12345678">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh:</label>
                            <input type="date" class="form-control" name="date_of_birth" onchange="checkDate('addMB')">
                            <small id="erAge" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('addMB')">Thêm thành viên</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="updateMB">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Cập nhật thành viên</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="updateMB" action="{{url('user/update')}}" method="POST">
                        @method('put')
                        @csrf
                        <input type="hidden" name="for_member" value="member">
                        <input type="hidden" name="role" value="member">
                        <input type="hidden" class="form-control" name="id">
                        <div class="form-group">
                          <label>Họ tên:</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                          <label>Giới tính:</label>
                          <select class="form-control" name="gender">
                            <option>Nam</option>
                            <option>Nữ</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            <input type="number" class="form-control" name="phone" onchange="checkDupEP('updateMB')">
                            <small id="erPhone" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" onchange="checkDupEP('updateMB')">
                            <small id="erMail" class="form-text text-muted" style="color: red !important;"></small>
                            <input type="hidden" name="password" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh:</label>
                            <input type="date" class="form-control" name="date_of_birth" onchange="checkDate('updateMB')">
                            <small id="erAge" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="update('updateMB')">Cập nhật thành viên</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="classRegister">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Đăng ký lớp</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="classRegister" action="register" method="POST" >
                        @csrf
                        <input type="hidden" class="form-control" name="id">
                        <label>Loại lớp:</label>
                        <div class="form-group d-flex">
                          <select class="form-control" name="type" onchange="getClassType('classRegister')">
                            <option></option>
                            <option>Gym</option>
                            <option>Yoga</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Tên lớp:</label>
                            <select class="form-control" name="class_id" >
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('classRegister')">Đăng ký lớp</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="classList">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="width: 65rem;transform: translateX(-25%);">
                <div class="modal-header">
                  <h5 class="modal-title">Danh sách lớp đã đăng ký</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive pt-3" >
                        <table class="table table-bordered">
                            <thead style="background-color: black; color:white; text-align:center">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên lớp</th>
                                    <th>Tên Huấn luyện viên</th>
                                    <th>Phòng tập</th>
                                    <th>Ngày - giờ tập</th>
                                    <th>Ngày bắt đầu - kết thúc lớp</th>
                                    <th>Lựa chọn</th>
                                </tr>
                            </thead>
                            <tbody id="table_class_register">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
              </div>
        </div>
    </div>
</div>
<script>
    function checkDupEP(form) {
        let email = document.forms[form]['email'].value;
        let phone = document.forms[form]['phone'].value;
        $.ajax({
            url: 'user/check?'+'email='+email+'&phone='+phone,
            type: 'GET',
        }).done(function(result) {
            if(result.email){
                document.forms[form].querySelector('#erMail').innerText = result.email;
            }else{
                document.forms[form].querySelector('#erMail').innerText = '';
            }
            if(result.phone){
                document.forms[form].querySelector('#erPhone').innerText = result.phone;
            }else{
                document.forms[form].querySelector('#erPhone').innerText = '';
            }
        });
    }
    function checkDate(form) {
        var enteredDate = document.forms[form]['date_of_birth'].value;
        var years = new Date(new Date() - new Date(enteredDate)).getFullYear() - 1970;
        if(years < 18){
            document.forms[form].querySelector('#erAge').innerText = 'Thành viên phải trên 18 tuổi';
        }else{
            document.forms[form].querySelector('#erAge').innerText = '';
        }
    }
</script>
@endsection

@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách các lớp học</h4>
                            <div class="row">
                                <div class="col-7">
                                    <!-- <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal"
                                            data-target="#modelAddMB"><i class="fas fa-user-plus"></i></a> -->
                                    <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal" data-target="#addCL"><i
                                            class="fas fa-user-plus"></i></a>
                                </div>
                                <div class="col-5 justify-content-end " style="transform: translateX(8rem);">
                                    <form class="form-inline" name="form-SMB" action="/class/search">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="text" name="query" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ request()->input('query') }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                    </form>
                                </div>
                            </div>
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
                                            <th>Học phí</th>
                                            <th>Lựa chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_mb">
                                        @foreach ($data as $key => $item)
                                        <tr class='table-info'>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->class_name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->room }}</td>
                                            <td>{{ $item->date_of_week.' / '.$item->start_time . ' - ' . $item->end_time }}</td>
                                            <td>{{ $item->start_date.' - '.$item->end_date}}</td>
                                            <td>{{ $item->price}}</td>
                                            <td>
                                                <a type='button' class='btn btn-info' onclick="show('{{url('class').'/'.$item->class_id}}','updateCL')" data-toggle="modal" data-target="#updateCL"><i
                                                        class='fas fa-user-edit'></i></a>
                                                <a type='button' class='btn btn-danger'
                                                onclick="checkClass('{{ $item->class_id }}')"><i
                                                        class='fas fa-user-times'></i></a></td>
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
        <div class="modal" tabindex="-1" role="dialog" id="addCL">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Thêm lớp</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="addCL" action="{{url('class')}}" method="POST" >
                        @csrf
                        <div class="form-group">
                          <label>Tên lớp:</label>
                          <input type="text" class="form-control" name="class_name">
                          <small id="erCL" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                        {{-- <label>Loại lớp:</label>
                        <div class="form-group d-flex">
                          <select class="form-control" name="type" onchange="getTrainerType('addCL')">
                            <option></option>
                            <option>Gym</option>
                            <option>Yoga</option>
                          </select>
                        </div> --}}
                        <div class="form-group">
                          <label>Huấn luyện viên:</label>
                          <select class="form-control" name="trainer_id">
                            @foreach ($trainer as $itemTR)
                            <option value="{{$itemTR->id}}">{{$itemTR->name}}</option>
                            @endforeach
                          </select>
                          <small id="erPT" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                        <div class="form-group">
                            <label>Phòng:</label>
                            <input type="text" class="form-control" name="room">
                            <small id="erRoom" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                            <label>Ngày trong tuần:</label>
                        <div class="d-flex">
                                <input type="hidden" name="date_of_week">
                            <div class="form-check form-check-inline d-flex">
                                <input class="form-check-input" type="checkbox" id="T2" value="T2,T4,T6" onchange="getDOW('addCL')">
                                <label class="form-check-label m-0" for="T2">T2, T4, T6</label>
                            </div>
                            <div class="form-check form-check-inline d-flex">
                                <input class="form-check-input" type="checkbox" id="T3"  value="T3,T5,T7" onchange="getDOW('addCL')">
                                <label class="form-check-label m-0" for="T3">T3, T5, T7</label>
                            </div>
                        </div>
                        <small id="erDow" class="form-text text-muted" style="color: red !important;"></small>
                        <label>Thời gian tập:</label>
                        <div class="form-group d-flex">
                            <input type="time" class="form-control" name="start_time">
                            <p>   </p>
                            <input type="time" class="form-control" name="end_time">
                        </div>
                        <small id="erTime" class="form-text text-muted" style="color: red !important;"></small>
                        <div class="form-group">
                            <label>Ngày bắt đầu:</label>
                            <input type="date" class="form-control" name="start_date">
                            <small id="erSdate" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                        <div class="form-group">
                            <label>Ngày kết thúc:</label>
                            <input type="date" class="form-control" name="end_date">
                            <small id="erEdate" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                        <div class="form-group">
                            <label>Học phí:</label>
                            <input type="number" class="form-control" name="price">
                            <small id="erPrice" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="checkPT('addCL',event)">Thêm lớp</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                      </form>
                </div>

              </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="updateCL">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Cập nhật lớp</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="updateCL" action="{{url('class/update')}}" method="POST" >
                        @method('put')
                        @csrf
                        <input type="hidden" class="form-control" name="class_id">
                        <div class="form-group">
                          <label>Tên lớp:</label>
                          <input type="text" class="form-control" name="class_name">
                        </div>
                        {{-- <label>Loại lớp:</label>
                        <div class="form-group d-flex">
                          <select class="form-control" name="type" onchange="getTrainerType('updateCL')">
                            <option></option>
                            <option>Gym</option>
                            <option>Yoga</option>
                          </select>
                        </div> --}}
                        <div class="form-group">
                          <label>Huấn luyện viên:</label>
                          <select class="form-control" name="trainer_id">
                            @foreach ($trainer as $itemTR)
                            <option value="{{$itemTR->id}}">{{$itemTR->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Phòng:</label>
                            <input type="text" class="form-control" name="room">
                        </div>
                        <label>Ngày trong tuần:</label>
                        <div class="d-flex">
                            <input type="hidden" class="form-control" name="date_of_week">
                            <div class="form-check form-check-inline d-flex">
                                <input class="form-check-input" type="checkbox" id="T2" value="T2,T4,T6" onchange="getDOW('updateCL')">
                                <label class="form-check-label m-0" for="T2">T2, T4, T6</label>
                            </div>
                            <div class="form-check form-check-inline d-flex">
                                <input class="form-check-input" type="checkbox" id="T3"  value="T3,T5,T7" onchange="getDOW('updateCL')">
                                <label class="form-check-label m-0" for="T3">T3, T5, T7</label>
                            </div>
                        </div>
                        <label>Thời gian tập:</label>
                        <div class="form-group d-flex">
                            <input type="time" class="form-control" name="start_time">
                            <p>   </p>
                            <input type="time" class="form-control" name="end_time">
                        </div>
                        <div class="form-group">
                            <label>Ngày bắt đầu:</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="form-group">
                            <label>Ngày kết thúc:</label>
                            <input type="date" class="form-control" name="end_date">
                        </div>
                        <div class="form-group">
                            <label>Học phí:</label>
                            <input type="number" class="form-control" name="price">
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('updateCL')">Cập nhật lớp</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-noti" data-toggle="modal" data-target="#notify" style="display: none">
          </button>
        <div class="modal" tabindex="-1" role="dialog" id="notify" >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Thông báo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Lớp đang dạy.</p>
                </div>
                <div class="modal-footer">
                  {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>
    </div>

    <script>
        function checkPT(form,e) {
            let submit = true;
            let small = document.forms[form].querySelectorAll('small');
            small.forEach(e => {
                e.innerText = ''
            });
            let class_name = document.forms[form]['class_name'].value;
            let trainer_id = document.forms[form]['trainer_id'].value;
            let room = document.forms[form]['room'].value;
            let date_of_week = document.forms[form]['date_of_week'].value;
            let start_time = document.forms[form]['start_time'].value;
            let end_time = document.forms[form]['end_time'].value;
            let start_date = document.forms[form]['start_date'].value;
            let end_date = document.forms[form]['end_date'].value;
            $.ajax({
                url: 'class/checkpt?'+'trainer_id='+trainer_id+'&class_name='+class_name+'&room='+room+'&date_of_week='+date_of_week+'&start_time='+start_time+'&end_time='+end_time+'&start_date='+start_date+'&end_date='+end_date,
                type: 'GET',
            }).done(function(result) {
                if (result.class_name) {
                    document.forms[form].querySelector('#erCL').innerText = result.class_name;
                }
                if(result.trainer){
                    document.forms[form].querySelector('#erPT').innerText = result.trainer;
                }
                if(result.room){
                    document.forms[form].querySelector('#erRoom').innerText = result.room;
                }
                // if (!result.email&& !username) {
                //     document.forms['form-login'].querySelector('#erMail').innerText = 'Tên đăng nhập không được rỗng'
                // }
                // if (!result.email&& username && !username.toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
                //     document.forms['form-login'].querySelector('#erMail').innerText = 'Email không đúng';
                // }

                // if (!password) {
                //     document.forms['form-login'].querySelector('#erPass').innerText = 'Mật khẩu không được rỗng'
                // }

                small.forEach(e => {
                    if (e.innerText != '') {
                        submit = false;
                    }
                });
                if (submit) {
                    document.forms[form].submit()
                }
            });
        }
        function checkClass(id) {
            $.ajax({
                url: 'class/checkclass/'+id,
                type: 'GET',
            }).done(function(result) {
                console.log(result);
                if (result) {
                    document.querySelector('.btn-noti').click();
                }else{
                    window.location.href = 'class/delete/'+id
                }
            }
            )
        }
    </script>
@endsection

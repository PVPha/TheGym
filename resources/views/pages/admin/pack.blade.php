@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách các gói tập</h4>
                            <div class="row">
                                <div class="col-7">
                                    <!-- <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal"
                                            data-target="#modelAddMB"><i class="fas fa-user-plus"></i></a> -->
                                    <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal" data-target="#addPA"><i
                                            class="fas fa-user-plus"></i></a>
                                </div>
                                <div class="col-5 justify-content-end " style="transform: translateX(8rem);">
                                    <form class="form-inline" name="form-SMB" action="/pack/search">
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
                                            <th>Tên gói</th>
                                            <th>Thời hạn</th>
                                            <th>Giá</th>
                                            <th>Lựa chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_mb">
                                        @foreach ($data as $key => $item)
                                        <tr class='table-info'>
                                            <td>{{ $key +1}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->time.' tháng'}}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <a type='button' class='btn btn-info' onclick="show('{{url('pack').'/'.$item->id}}','updatePA')" data-toggle="modal" data-target="#updatePA"><i
                                                        class='fas fa-user-edit'></i></a>
                                                <a type='button' class='btn btn-danger'
                                                    href='pack/delete/{{ $item->id }}'><i
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
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách đăng kí tập</h4>
                            <div class="row">
                                <div class="col-7">
                                    <!-- <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal"
                                            data-target="#modelAddMB"><i class="fas fa-user-plus"></i></a> -->
                                    <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal" data-target="#addRP"><i
                                            class="fas fa-user-plus"></i></a>
                                </div>
                                <div class="col-5 justify-content-end " style="transform: translateX(8rem);">
                                    <form class="form-inline" name="form-SMB" action="/pack/search">
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
                                            <th>Tên gói</th>
                                            <th>Tên thành viên</th>
                                            <th>Thời hạn</th>
                                            <th>Ngày bắt đầu - kết thúc gói</th>
                                            <th>Lựa chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_mb">
                                        @foreach ($register as $keyRP => $itemRP)
                                        <tr class='table-info'>
                                            <td>{{ $keyRP + 1 }}</td>
                                            <td>{{ $itemRP->name_pack }}</td>
                                            <td>{{ $itemRP->name }}</td>
                                            <td>{{ $itemRP->time.' tháng'}}</td>
                                            <td>{{ $itemRP->start_date.' - '.$itemRP->expiry_date}}</td>
                                            <td>
                                                <a type='button' class='btn btn-info' href="pack_register/{{$itemRP->id}}/edit" style="{{$itemRP->status == true?'display: none':''}}"><i class="fas fa-check"></i></a>
                                                <a type='button' class='btn btn-info' onclick="show('{{url('user').'/'.$itemRP->member_id}}','packRegister')" data-toggle="modal" data-target="#packAD" style="{{$itemRP->status == false?'display: none':'display: inline'}}"><i class="fas fa-pen"></i></a>
                                                <a type='button' class='btn btn-danger' href='pack_register/delete/{{ $itemRP->id }}'><i class="fas fa-times"></i></a>
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
        <div class="modal" tabindex="-1" role="dialog" id="addPA">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Thêm gói tập</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="addPA" action="{{url('pack')}}" method="POST" >
                        @csrf
                        <div class="form-group">
                          <label>Tên gói tập:</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                        <label>Thời hạn:</label>
                        <div class="form-group d-flex">
                          <select class="form-control" name="time" onchange="calculatePack('addPA')" >
                            <option value="1">1 tháng</option>
                            <option value="3">3 tháng</option>
                            <option value="6">6 tháng</option>
                            <option value="12">12 tháng</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Giá gói:</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                        {{-- <div class="form-group">
                            <label>Ngày bắt đầu:</label>
                            <input type="date" class="form-control" name="start_date" onchange="calculatePack('addPA')">
                        </div>
                        <div class="form-group">
                            <label>Ngày kết thúc:</label>
                            <input type="date" class="form-control" name="expiry_date">
                        </div> --}}
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('addPA')">Thêm gói tập</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="updatePA">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Cập nhật gói tập</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="updatePA" action="{{url('pack/update')}}" method="POST" >
                        @method('put')
                        @csrf
                        <input type="hidden" class="form-control" name="id">
                        <div class="form-group">
                            <label>Tên gói tập:</label>
                            <input type="text" class="form-control" name="name">
                          </div>
                          <label>Thời hạn:</label>
                          <div class="form-group d-flex">
                            <select class="form-control" name="time" onchange="calculatePack('updatePA')" >
                                <option value="1">1 tháng</option>
                                <option value="3">3 tháng</option>
                                <option value="6">6 tháng</option>
                                <option value="12">12 tháng</option>
                            </select>
                          </div>
                          <div class="form-group">
                              <label>Giá gói:</label>
                              <input type="text" class="form-control" name="price">
                          </div>
                          {{-- <div class="form-group">
                              <label>Ngày bắt đầu:</label>
                              <input type="date" class="form-control" name="start_date" onchange="calculatePack('updatePA')">
                          </div>
                          <div class="form-group">
                              <label>Ngày kết thúc:</label>
                              <input type="date" class="form-control" name="expiry_date">
                          </div> --}}
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('updatePA')">Cập nhật gói tập</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
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
                            @foreach ($data as $itemPA)
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
    </div>
@endsection

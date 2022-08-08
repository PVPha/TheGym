@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách các phòng tập</h4>
                            <div class="row">
                                <div class="col-7">
                                    <!-- <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal"
                                            data-target="#modelAddMB"><i class="fas fa-user-plus"></i></a> -->
                                    <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal" data-target="#addRoom"><i
                                            class="fas fa-user-plus"></i></a>
                                </div>
                                <div class="col-5 justify-content-end " style="transform: translateX(8rem);">
                                    <form class="form-inline" name="form-SMB" action="/room/search">
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
                                            <th>Tên phòng</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Lựa chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_mb">
                                        @foreach ($data as $key => $item)
                                        <tr class='table-info'>
                                            <td>{{ $key + 1}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>
                                                <a type='button' class='btn btn-info' onclick="show('{{url('room').'/'.$item->id}}','updateRoom')" data-toggle="modal" data-target="#updateRoom"><i
                                                        class='fas fa-user-edit'></i></a>
                                                <a type='button' class='btn btn-danger'
                                                    href='room/delete/{{ $item->id }}'><i
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
        <div class="modal" tabindex="-1" role="dialog" id="addRoom">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Thêm phòng tập</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="addRoom" action="{{url('room')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Tên:</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                        <label>Hình ảnh:</label>
                        <div class="form-group d-flex">
                          <input type="file" class="form-control" name="image" onchange="previewImg('imageRoom','addRoom')">
                          <img id="imageRoom" src="" alt="image" style="display: none; width: 13rem; height: 13rem;">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại:</label>
                            <input type="number" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label>Map:</label>
                            <input type="text" class="form-control" name="map">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('addRoom')">Thêm phòng tập</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="updateRoom">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Cập nhật thông tin phòng tập</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="updateRoom" action="{{url('room/update')}}" method="POST" >
                        @method('put')
                        @csrf
                        <input type="hidden" class="form-control" name="id">
                        <div class="form-group">
                            <label>Tên:</label>
                            <input type="text" class="form-control" name="name">
                          </div>
                          <label>Hình ảnh:</label>
                          <div class="form-group d-flex">
                            <input type="file" class="form-control" name="image" onchange="previewImg('imageRoom','addRoom')">
                            <img id="imageRoom" src="" alt="image" style="display: none; width: 13rem; height: 13rem;">
                          </div>
                          <div class="form-group">
                              <label>Số điện thoại:</label>
                              <input type="number" class="form-control" name="phone">
                          </div>
                          <div class="form-group">
                              <label>Địa chỉ:</label>
                              <input type="text" class="form-control" name="address">
                          </div>
                          <div class="form-group">
                            <label>Map:</label>
                            <input type="text" class="form-control" name="map">
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('updateRoom')">Cập nhật phòng tập</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

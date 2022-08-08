@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách các mốc khuyến mãi</h4>
                            <div class="row">
                                <div class="col-7">
                                    <!-- <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal"
                                            data-target="#modelAddMB"><i class="fas fa-user-plus"></i></a> -->
                                    <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal" data-target="#addPRO"><i
                                            class="fas fa-plus"></i></a>
                                </div>
                                <div class="col-5 justify-content-end " style="transform: translateX(8rem);">
                                    <form class="form-inline" name="form-SMB" action="/promotion/search">
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
                                            <th>Mốc bắt đầu</th>
                                            <th>Mốc kết thúc</th>
                                            <th>Khuyến mãi</th>
                                            <th>Lựa chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_mb">
                                        @foreach ($data as $key => $item)
                                        <tr class='table-info'>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->start }}VNĐ</td>
                                            <td>{{ $item->end}}VNĐ</td>
                                            <td>{{ $item->discount }}%</td>
                                            <td>
                                                <a type='button' class='btn btn-info' onclick="show('{{url('promotion').'/'.$item->id}}','updatePRO')" data-toggle="modal" data-target="#updatePRO"><i
                                                        class='fas fa-edit'></i></a>
                                                <a type='button' class='btn btn-danger'
                                                    href='promotion/delete/{{ $item->id }}'><i
                                                        class='fas fa-times'></i></a></td>
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
        <div class="modal" tabindex="-1" role="dialog" id="addPRO">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Thêm mốc khuyến mãi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="addPRO" action="{{url('promotion')}}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label>Mốc bắt đầu:</label>
                            <div class="input-group">
                                <input type="int" class="form-control" name="start">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">VNĐ</div>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mốc Kết thúc:</label>
                            <div class="input-group">
                                <input type="int" class="form-control" name="end">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">VNĐ</div>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Khuyến mãi:</label>
                            <div class="input-group">
                                <input type="int" class="form-control" name="discount">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                  </div>
                            </div>
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('addPRO')">Thêm khuyến mãi</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="updatePRO">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Cập nhật mốc khuyến mãi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="updatePRO" action="{{url('promotion/update')}}" method="POST" >
                        @method('put')
                        @csrf
                        <input type="hidden" class="form-control" name="id">
                        <div class="form-group">
                            <label>Mốc bắt đầu:</label>
                            <div class="input-group">
                                <input type="int" class="form-control" name="start">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">VNĐ</div>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mốc Kết thúc:</label>
                            <div class="input-group">
                                <input type="int" class="form-control" name="end">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">VNĐ</div>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Khuyến mãi:</label>
                            <div class="input-group">
                                <input type="int" class="form-control" name="discount">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                  </div>
                            </div>
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('updatePRO')">Cập nhật khuyến mãi</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách đơn hàng</h4>
                            <div class="row">
                                <div class="col-7">
                                    <!-- <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal"
                                            data-target="#modelAddMB"><i class="fas fa-user-plus"></i></a> -->
                                    {{-- <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal" data-target="#addOR"><i
                                            class="fas fa-user-plus"></i></a> --}}
                                </div>
                                <div class="col-5 justify-content-end " style="transform: translateX(8rem);">
                                    <form class="form-inline" name="form-SMB" action="/order/search">
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
                                            <th>Sản phẩm</th>
                                            <th >Tổng tiền</th>
                                            <th >Địa chỉ</th>
                                            <th >Số điện thoại</th>
                                            <th >Trạng thái</th>
                                            <th >Lựa chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_mb">
                                        @foreach ($data as $key => $item)
                                        <tr class='table-info'>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                @foreach (json_decode($item->products) as $itemPROD)
                                                    {{$itemPROD->name.'-'.$itemPROD->quantity }} <br>
                                                @endforeach
                                            </td>
                                            <td>{{$item->total}} </td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>
                                                <a type='button' class='btn btn-info' href="order/{{$item->id}}" style="{{$item->status != 'Chờ duyệt'? 'display: none':''}}"><i
                                                        class='fas fa-edit'></i></a>
                                                <a type='button' class='btn btn-danger' href="order/delete/{{$item->id}}" style="{{$item->status != 'Chờ duyệt'? 'display: none':''}}"><i
                                                    class='fas fa-times'></i></a>
                                                <a type='button' class='btn btn-success'
                                                href="order/delivered/{{$item->id}}" style="{{$item->status != 'Đang giao' ? 'display: none':''}}"><i
                                                class='fas fa-check'></i></a>
                                                <a type='button' class='btn btn-warning'
                                                href="order/{{$item->id}}/edit" style="{{$item->status != 'Đang giao' ? 'display: none':''}}"><i
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
        <div class="modal" tabindex="-1" role="dialog" id="addST">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Thêm hàng</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="addST" action="{{url('storage')}}" method="POST" >
                        @csrf
                        <div class="form-group">
                          <label>Tên hàng:</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                        <label>Loại hàng:</label>
                        <div class="form-group d-flex">
                          <select class="form-control" name="type">
                            <option value="TPCN">Thực phẩm chức năng</option>
                            <option value="DCTL">Dụng cụ tập luyện</option>
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
                            <label>Khuyến mãi:</label>
                            <div class="input-group">
                                <input type="int" class="form-control" name="discount">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                  </div>
                            </div>
                        </div>

                        <label>Thời gian khuyến mãi:</label>
                        <div class="form-group d-flex">
                            <input type="date" class="form-control" name="start_sale">
                            <p>   </p>
                            <input type="date" class="form-control" name="end_sale">
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('addST')">Thêm lớp</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="updateST">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Cập nhật hàng:</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="updateST" action="{{url('storage/update')}}" method="POST" >
                        @method('put')
                        @csrf
                        <input type="hidden" class="form-control" name="id">
                        <div class="form-group">
                            <label>Tên hàng:</label>
                            <input type="text" class="form-control" name="name">
                          </div>
                          <label>Loại hàng:</label>
                        <div class="form-group d-flex">
                          <select class="form-control" name="type" >
                            <option></option>
                            <option value="TPCN">Thực phẩm chức năng</option>
                            <option value="DCTL">Dụng cụ tập Luyện</option>
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
                            <label>Khuyến mãi:</label>
                            <div class="input-group">
                                <input type="int" class="form-control" name="discount">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                  </div>
                            </div>
                        </div>

                          <label>Thời gian khuyến mãi:</label>
                          <div class="form-group d-flex">
                              <input type="date" class="form-control" name="start_sale">
                              <p>   </p>
                              <input type="date" class="form-control" name="end_sale">
                          </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="submitForm('updateST')">Cập nhật hàng</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

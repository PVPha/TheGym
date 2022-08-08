@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách kho</h4>
                            <div class="row">
                                <div class="col-7">
                                    <!-- <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal"
                                            data-target="#modelAddMB"><i class="fas fa-user-plus"></i></a> -->
                                    <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal" data-target="#addST"><i
                                            class="fas fa-user-plus"></i></a>
                                </div>
                                <div class="col-5 justify-content-end " style="transform: translateX(8rem);">
                                    <form class="form-inline" name="form-SMB" action="/storage/search">
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
                                            <th>Tên hàng</th>
                                            <th>Loại</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Lựa chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_mb">
                                        @foreach ($data as $key => $item)
                                        <tr class='table-info'>
                                            <td>{{ $key +1  }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->quantity}}</td>
                                            <td>
                                                <a type='button' class='btn btn-info' onclick="show('{{url('storage').'/'.$item->id}}','updateST')" data-toggle="modal" data-target="#updateST"><i
                                                        class='fas fa-user-edit'></i></a>
                                                <a type='button' class='btn btn-danger'
                                                    href='storage/delete/{{ $item->id }}'><i
                                                        class='fas fa-user-times'></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $data->links('pagination::bootstrap-4') }}
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
                    <form name="addST" action="{{url('storage')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Mã hàng:</label>
                            <input type="text" class="form-control" name="id">
                            <small id="erID" class="form-text text-muted" style="color: red !important;"></small>
                        </div>
                        <div class="form-group">
                          <label>Tên hàng:</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                        <label>Hình ảnh:</label>
                        <div class="form-group d-flex">
                          <input type="file" class="form-control" name="image" onchange="previewImg('imagePT','addST')">
                          <img id="imagePT" src="" alt="image" style="display: none; width: 13rem; height: 13rem;">
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
                            <label>Số lượng:</label>
                            <div class="input-group">
                                <input type="int" class="form-control" name="quantity">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"></div>
                                  </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="checkID('addST',event)">Thêm sản phẩm</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                      </form>
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
                    <form name="updateST" action="{{url('storage/update')}}" method="POST" enctype="multipart/form-data" >
                        @method('put')
                        @csrf
                        <input type="hidden" class="form-control" name="id">
                        <div class="form-group">
                            <label>Tên hàng:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <label>Hình ảnh:</label>
                        <div class="form-group d-flex">
                          <input type="file" class="form-control" name="image" onchange="previewImg('imagePT','updateST')">
                          <img id="imagePT" src="" alt="image" style="display: none; width: 13rem; height: 13rem;">
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
                            <label>Số lượng:</label>
                            <div class="input-group">
                                <input type="int" class="form-control" name="quantity">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"></div>
                                  </div>
                            </div>
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
    <script>
        function checkID(form,e) {
            e.preventDefault()
            let submit = true;
            let small = document.forms[form].querySelectorAll('small');
            small.forEach(e => {
                e.innerText = ''
            });
            let id = document.forms[form]['id'].value;
            $.ajax({
                url: 'storage/'+id+'/edit',
                type: 'GET',
            }).done(function(result) {
                console.log(result);
                if (result) {
                    document.forms[form].querySelector('#erID').innerText = result;
                }
                if(!id){
                    document.forms[form].querySelector('#erID').innerText = 'Mã hàng không được rỗng';
                }
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
    </script>
@endsection

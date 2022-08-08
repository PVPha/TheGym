@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách các câu hỏi</h4>
                            <div class="row">
                                <div class="col-7">
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
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Nội dung</th>
                                            <th>Lựa chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody id="t_mb">
                                        @foreach ($data as $key => $item)
                                        <tr class='table-info'>
                                            <td>{{ $key +1}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email}}</td>
                                            <td>{{ $item->question }}</td>
                                            <td>
                                                {{-- <a type='button' class='btn btn-info' onclick="show('{{url('pack').'/'.$item->id}}','updatePA')" data-toggle="modal" data-target="#updatePA"><i
                                                        class='fas fa-user-edit'></i></a> --}}
                                                <a type='button' class='btn btn-danger'
                                                    href='question/delete/{{ $item->id }}'><i
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
    </div>
@endsection

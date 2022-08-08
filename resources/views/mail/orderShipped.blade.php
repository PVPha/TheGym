{{-- <div>
    <h1>tesst</h1>
</div> --}}

<h1>Chào, {{ $data['name'] }}</h1>
<p>Thông tin đơn hàng:</p>

<table>
    <tr>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th></th>
    </tr>
    <tr>
        @foreach (json_decode($data['products']) as $item)
            <td>{{$item->name}}</td>
            <td>{{$item->quantity}}</td>
            <td></td>
        @endforeach
    </tr>
    <tr>
        <td></td>
        <td>Tổng tiền: </td>
        <td>{{$data['total']}}</td>
    </tr>
</table>

Đơn hàng của bạn sẽ được gửi đến: {{$data['address']}}


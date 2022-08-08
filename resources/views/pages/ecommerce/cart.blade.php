@extends('pages.ecommerce.layout')

@section('title', 'Shopping Cart')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

    <div class="cart-section container" style="margin-top: 7rem !important">
        <div>

            @if ($count > 0)

            <h2>{{$count}} sản phẩm trong giỏ hàng</h2>

            @foreach (session()->get('cart') as $itemCart)
                @foreach ($product as $key => $item)
                @if ($item->slug == $itemCart['id'])
            <div class="cart-table">
                {{-- {{session()->get('cart')[0]['id']}} --}}

                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ $item->slug }}"><img src="/{{$item->image }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item mt-2"><a href="{{ $item->slug }}">{{ $item->name }}</a></div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <a class="btn btn-light deleteCart" href="/ecommerce/cart/delete/{{$item->slug}}">Xóa</a>
                            <a class="btn btn-light update2Cart" href="/ecommerce/cart/{{$item->slug}}_{{$itemCart['quantity']}}" style="display: none">Cập nhật</a>
                        </div>
                        <div>
                            <div class="counter mb-3">
                                <button class="btn btn-light" onclick="counter('-',{{$item->quantity}},event)">-</button>
                                <span class="ml-3 mr-3">{{$itemCart['quantity']}}</span>
                                <button class="btn btn-light" onclick="counter('+',{{$item->quantity}},event)">+</button>
                            </div>
                        </div>
                        <div class="total_price">{{ $item->price * $itemCart['quantity'] }} VNĐ</div>
                    </div>
                </div> <!-- end cart-table-row -->

            </div> <!-- end cart-table -->
            @endif
            @endforeach
            @endforeach
            <div class="cart-totals">
                <div class="cart-totals-left">
                    <p>Phí vận chuyển 30000VNĐ</p>
                    <p class="notify-promo"></p>
                </div>
                <div class="cart-totals-right">

                    <div>
                        <span class="cart-totals-total">Tổng tiền: <span></span></span>
                    </div>
                    <div class="cart-totals-subtotal">
                    </div>
                </div>
            </div> <!-- end cart-totals -->
            <div class="cart-buttons">
                {{-- {{ route('shop.index') }} --}}
                <a href="/ecommerce" class="button">Tiếp tục mua hàng</a>
                {{-- {{ route('checkout.index') }} --}}
                <a class="button-primary" data-toggle="modal"
                data-target="#checkout">Thanh toán</a>
            </div>

            @else

                <h3>Không có sản phẩm nào trong giỏ hàng</h3>
                <div class="spacer"></div>
                {{-- {{ route('shop.index') }} --}}
                <a href="/ecommerce" class="button">Tiếp tục mua hàng</a>
                <div class="spacer"></div>

            @endif
        </div>
        <div>
            <table class="table promotion">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Từ</th>
                        <th scope="col">Đến</th>
                        <th scope="col">Khuyến mãi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promotion as $promo)
                    <tr>
                            <td>{{$promo->start}}VNĐ</td>
                            <td>{{$promo->end}}VNĐ</td>
                            <td>{{$promo->discount}}%</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div> <!-- end cart-section -->

    {{-- @include('partials.might-like') --}}
    <div class="modal fade" id="checkout" tabindex="-1" role="dialog"
    aria-hidden="true">
        <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h2 class="modal-title" id="membershipFormLabel" style="text-align:center;">Thông tin thanh toán:</h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form name="checkout" class="membership-form webform" role="form" action="/ecommerce/cart" method="POST" >
                    @csrf
                    @if (session()->has('login'))
                    <input type="hidden" class="form-control" name="member_id" value="{{session()->get('login')['id']}}">
                    <input type="text" class="form-control mt-1" name="name"
                           placeholder="Họ và Tên"  value="{{session()->get('login')['name']}}">
                    @else
                    <input type="text" class="form-control mt-1" name="name"
                           placeholder="Họ và Tên"  >
                    @endif
                    @if (session()->has('cart'))
                    <input type="hidden" class="form-control" name="products" value="{{json_encode(session()->get('cart'))}}">
                    @endif
                    <input type="mail" class="form-control mt-1" name="email" placeholder="Nhập mail">
                    <input type="number" class="form-control mt-1" name="phone" placeholder="Nhập số điện thoại">
                    <input type="text" class="form-control mt-1" name="address" placeholder="Địa chỉ">
                    <input type="hidden" class="form-control mt-1" name="total">
                    <button type="submit" class=" form-control mt-1" id="submit-button"
                            style="font-weight: bold; background-color:cyan">Cập nhật</button>
                </form>
            </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
        (
            function(){
                let totals = document.querySelectorAll('.total_price');
                let start = document.querySelectorAll('.promotion tbody tr td:nth-child(1)');
                let end = document.querySelectorAll('.promotion tbody tr td:nth-child(2)');
                let promo = document.querySelectorAll('.promotion tbody tr td:nth-child(3)');
                let total_price = 0;
                totals.forEach(t=>{
                    total_price += parseInt(t.innerText);
                })
                for (let i = 0; i < promo.length; i++) {
                    console.log(total_price <= parseInt(end[i].innerText));
                    if ( total_price >= parseInt(start[i].innerText) && total_price <= parseInt(end[i].innerText) ) {
                        total_price -= total_price * (parseInt(promo[i].innerText) / 100);
                        document.querySelector('.notify-promo').innerText = 'Khuyến mãi '+promo[i].innerText
                        break;
                    }
                }
                total_price += 30000;
                document.querySelector('.cart-totals-total span').innerText = total_price + 'VNĐ';
                document.forms['checkout']['total'].value = total_price + 'VNĐ';
            }
        )()
        function counter(method,max,pos){
            // console.log(pos.path);
            // pos.path[3].querySelector('.deleteCart').style.display = 'none'
            // pos.path[3].querySelector('.update2Cart').style.display = 'inline'
            let quantity = 1;
            let value =  pos.path[1].querySelector('.counter span').innerText;
            let url =  pos.path[3].querySelector('.update2Cart').href.split('_');
            value = parseInt(value);
            if (method == '+') {
                if (value < max) {
                value+=1;
                }
            }else{
                if (value > 1) {
                value-=1;
                }
            }
            pos.path[1].querySelector('.counter span').innerText = value;
            window.location.href = url[0]+'_'+value+"/edit"
            // console.log(url[0]+'_'+value+"/edit");
            // pos.path[3].querySelector('.update2Cart').href = url[0]+'_'+value;
        }
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection

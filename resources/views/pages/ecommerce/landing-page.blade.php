<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Ecommerce Example</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->

        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/aos.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="{{ url('css/tooplate-gymso-style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    </head>
    <body>
        @include('pages.ecommerce.partials.header')
        <div id="app">
            <div class="featured-section">
                <div class="container mt-5">
                    <h1 class="text-center">CỬA HÀNG FPTGYM </h1>

                    <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.</p>

                    <div class="text-center py-4">
                        <a href="/ecommerce/category/TPCN" class="button">Thực phẩm chức năng</a>
                        <a href="/ecommerce/category/DCTL" class="button">Dụng cụ tập luyện</a>
                    </div>
                    <div class="d-flex justify-content-end pb-3">
                        @include('pages.ecommerce.partials.search')
                    </div>

                    {{-- <div class="tabs">
                        <div class="tab">
                            Featured
                        </div>
                        <div class="tab">
                            On Sale
                        </div>
                    </div> --}}

                    <div class="products text-center">
                        <div class="sidebar">
                            <h3>Lọc theo đơn giá: </h3>
                            <ul>
                                <li><a href="?price=100-500">Từ 100k đến 500k</a></li>
                                <li><a href="?price=500-1000">Từ 500k đến 1000k</a></li>
                                <li><a href="?price=1000-5000">Từ 1000k đến 5000k</a></li>
                            </ul>
                        </div>
                        @foreach ($products as $product)
                            @if (isset($_GET['price']))
                                @if ($product->price >= (explode('-',$_GET['price'])[0]*1000) && $product->price <= (explode('-',$_GET['price'])[1]*1000))
                                    <div class="product">
                                        <a href="/ecommerce/{{ $product->slug }}"><img src="/{{ $product->image }}" alt="product"></a>
                                        <a href="/ecommerce/{{ $product->slug }}"><div class="product-name">{{ $product->name }}</div></a>
                                        <div class="product-price">{{ $product->price }}</div>
                                    </div>
                                @endif
                            @else
                                <div class="product">
                                    <a href="/ecommerce/{{ $product->slug }}"><img src="/{{ $product->image }}" alt="product"></a>
                                    <a href="/ecommerce/{{ $product->slug }}"><div class="product-name">{{ $product->name }}</div></a>
                                    <div class="product-price">{{ $product->price }}</div>
                                </div>
                            @endif
                        @endforeach

                    </div> <!-- end products -->

                    <div class="text-center button-container">
                        {{-- <a href="{{ route('shop.index') }}" class="button">View more products</a> --}}
                    </div>
                    <div class="spacer"></div>
                    {{ $products->links('pagination::bootstrap-4') }}

                </div> <!-- end container -->

            </div> <!-- end featured-section -->

            {{-- @include('partials.footer') --}}

        </div> <!-- end #app -->
        @include('pages.ecommerce.partials.footer')
        <script src="js/app.js"></script>
    </body>
</html>

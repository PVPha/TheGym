@extends('pages.ecommerce.layout')

@section('title', $product->name)

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

    {{-- @component('components.breadcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span><a href="{{ route('shop.index') }}">Shop</a></span>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>{{ $product->name }}</span>
    @endcomponent --}}

    {{-- <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div> --}}

    <div class="product-section container">
        <div>
            <div class="product-section-image">
                <img src="{{url($product->image)  }}" alt="product" class="active" id="currentImage">
            </div>
            <div class="product-section-images">
                {{-- <div class="product-section-thumbnail selected">
                    <img src="{{ $product->image }}" alt="product">
                </div> --}}

                {{-- @if ($product->images)
                    @foreach (json_decode($product->images, true) as $image)
                    <div class="product-section-thumbnail">
                        <img src="{{ productImage($image) }}" alt="product">
                    </div>
                    @endforeach
                @endif --}}
            </div>
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title">{{ $product->name }}</h1>
            {{-- <div class="product-section-subtitle">{{ $product->details }}</div> --}}
            {{-- <div>{!! $stockLevel !!}</div> --}}
            <div class="product-section-price">{{ $product->price }}</div>

            <p>
                {!! $product->description !!}
            </p>

            <p>&nbsp;</p>

            <div class="counter mb-3">
                <button class="button button-plain" onclick="counter('-',{{$product->quantity}})">-</button>
                <span class="ml-3 mr-3">1</span>
                <button class="button button-plain" onclick="counter('+',{{$product->quantity}})">+</button>
            </div>

            @if ($product->quantity > 0)
            {{-- {{ route('cart.store', $product) }} --}}
                    <a type="submit" class="button button-plain add2Cart" href="cart/{{$product->slug}}_1">Thêm vào giỏ hàng</a>
            @endif
        </div>
    </div> <!-- end product-section -->

    {{-- @include('partials.might-like') --}}

@endsection

@section('extra-js')
    <script>
        (function(){
            const currentImage = document.querySelector('#currentImage');
            const images = document.querySelectorAll('.product-section-thumbnail');

            images.forEach((element) => element.addEventListener('click', thumbnailClick));

            function thumbnailClick(e) {
                currentImage.classList.remove('active');

                currentImage.addEventListener('transitionend', () => {
                    currentImage.src = this.querySelector('img').src;
                    currentImage.classList.add('active');
                })

                images.forEach((element) => element.classList.remove('selected'));
                this.classList.add('selected');
            }

        })();
        function counter(method,max){
            let quantity = 1;
            let value =  document.querySelector('.counter span').innerText;
            let url =  document.querySelector('.add2Cart').href.split('_');
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
            document.querySelector('.counter span').innerText = value;
            document.querySelector('.add2Cart').href = url[0]+'_'+value;
        }
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>

@endsection

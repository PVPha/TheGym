@extends('pages.ecommerce.layout')

@section('title', 'Search Results')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')


    <div class="search-results-container container">
        <h1>Kết quả tìm kiếm</h1>
        <p class="search-results-count">{{ $products->total() }} kết quả cho '{{ request()->input('query') }}'</p>

        @if ($products->total() > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th><a href="ecommerce/{{ $product->slug }}">{{ $product->name }}</a></th>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links('pagination::bootstrap-4') }}
        @endif
    </div> <!-- end search-results-container -->

@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection

@section('stylesheet')
<style>
    .product {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        margin: auto;
    }

    .main-heading h2 {
        font-weight: 700;
        text-transform: uppercase;
        padding: 15px;
        border-bottom: 2px solid;

    }

    .product-image>img {
        width: 100px;
        height: 100px;
    }

    .product-specification {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        width: 100%;
    }

    .product-image {
        width: 30%;
        text-align: center;
    }

    .product-content {
        width: 70%;
    }
</style>

@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @section('content')
                <div class="container my-4 mx-auto">
                    <div class="main-heading my-4">
                        <h2 class="text-center">
                            Products list
                        </h2>
                    </div>

                @if (is_countable($products) && count($products) > 0)
                    @foreach($products as $product)

                    <div class="product my-3 p-3 border">
                        <div class="product-image">
                            <img src="./images/{{$product->image}}" alt="...">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title py-2">{{$product->pname}}</h3>
                            @if ($product->desc)
                            <p class="product-text pt-1">{{$product->desc}}</p>
                            @endif
                            <div class="product-specification">
                                <h5 class="product-price">Products Keeping Unit - {{$product->psku}}</h5>
                                <h5 class="product-qty">Available Products - {{$product->qty}}</h5>
                            </div>

                        </div>
                    </div>
                    @endforeach
                    <div class="products-btn">
                        <a href="addproducts" class="btn btn-info my-3">Add More Products</a>
                    </div>
                    @else
                    <div class="main-heading">
                        <h2>
                            No Data found.....
                        </h2>
                    </div>
                    <div class="products-btn">
                        <a href="{{route('addproducts')}}" class="btn btn-info my-3">Add Products</a>
                    </div>
                @endif

                </div>
                @endsection
            </div>
        </div>
    </div>
</x-app-layout>

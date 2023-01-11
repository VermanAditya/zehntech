@section('stylesheet')
<style>
    .append,
    .close {
        font-size: 25px;
        height: 45px;
        width: 45px;
    }

    .main-heading h2 {
        font-weight: 700;
        text-transform: uppercase;
        padding: 15px;
        border-bottom: 2px solid;

    }

    .container-fluid {
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    }

    .products-btn {
        text-align: right;
    }
</style>
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @section('content')
<section class="form-sec m-3 py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="main-heading my-4">
                    <h2 class="text-center">
                        Add Products From here
                    </h2>
                </div>
            </div>
        </div>
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
        <div class="rows">
            <div class="cols">
                <form action="save" method="post" enctype="multipart/form-data" class="form-group">
                    @csrf
                    <input type="text" name="pname" class="form-control my-3" placeholder="Enter Product Name here" required />
                    <input type="file" name="image" class="form-control my-3" required />
                    <input type="number" name="psku" class="form-control my-3" placeholder="SKU" required />
                    <input type="number" name="qty" class="form-control my-3" placeholder="Product quantity" required />
                    <textarea name="desc" class="form-control my-3" placeholder="Write Something About Your Product..." required ></textarea>

                    <div class="submit-btn">
                        <input type="submit" class="btn btn-success my-2 text-dark hover"  value="Save">
                    </div>
                </form>
            </div>
        </div>
        <div class="products-btn">
            <a href="{{route('dashboard')}}" class="btn btn-info my-3">View Products</a>
        </div>

    </div>
</section>
@endsection
            </div>
        </div>
    </div>
</x-app-layout>
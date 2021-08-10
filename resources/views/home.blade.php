@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>


</div>
<div class="row mt-5">


    <div class="col-md-8  mx-auto">
        <h1 class="text-center mb-3">Create Product</h1>

        @if(Session::has('Product_Added'))


        <div class="alert alert-success" role="alert">
            {{ Session::get('Product_Added'); }}
        </div>
        @endif

        <form method="POST" action="{{ route('product.added') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="product_name">Product Name</label>
              <input type="text" class="form-control" id="product_name"  placeholder="Enter Product Name" name="product_name">
            </div>
            <div class="form-group">
              <label for="product_image">Product Image</label>
              <input type="file" class="form-control" id="product_image" placeholder="Password" name="file" onchange="previewFile(this)">
              <img src="" id="previewImg" alt="Product Image" class="mt-5" style="max-width: 150px">
            </div>
            <button type="submit" class="btn btn-primary d-grid">Submit</button>
          </form>
    </div>
</div>

<div class="row mt-5">

 <div class="col-md-8 mx-auto">
    <h1 class="text-center mb-3"> Product details</h1>
    <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">Number</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($products as $product )
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->product_name }}</td>
                <td><a href="{{ asset('/images') }}/{{ $product->product_image }}" download><img src="{{ asset('/images') }}/{{ $product->product_image }}" alt="" style="max-width:150px" ></a></td>
                <td><a href="{{ asset('/images') }}/{{ $product->product_image }}" class="btn btn-success">View</a></td>
              </tr>
            @endforeach

        </tbody>
      </table>
 </div>
</div>


<script>
    function previewFile (input){
        var file= $('input[type=file]').get(0).files[0];
        if (file){
            var reader= new FileReader();
            reader.onload= function () {
                $('#previewImg').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection

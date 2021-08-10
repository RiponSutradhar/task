@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

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

    <div class="col-md-8 mx-auto">
        @if(Session::has('Product_deleted'))


        <div class="alert alert-success" role="alert">
            {{ Session::get('Product_deleted'); }}
        </div>
        @endif
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
                   <td><a href="{{ route('delete_img',['img_id'=>$product->id]) }}" class="btn btn-danger">delete</a></td>
                 </tr>
               @endforeach

           </tbody>
         </table>
    </div>
   </div>
@endsection

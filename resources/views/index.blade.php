
@extends('muster')
@extends('layouts.app')


@section('content')

@section('content2')
    <div class="row mt-2">
        <div class="col-lg-12 margin-tb ">
            <div class="pull-left">
                <h2>Laravel 8 insert and delete</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success my-2" href="{{ route('products.create') }}"> <i class="fa fa-add" ></i>Create New Product</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Title</th>
            <th class="text-center">Description</th>
            <th class="text-center">Price(TK.)</th>
            <th class="text-center">Thambnail</th>
            <th class="text-center" width="280px">Action</th>
        </tr>
        @foreach ($product as $key=> $products)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $products->title }}</td>
            <td>{{ $products->description }}</td>
            <td>{{ $products->price }}</td>


      
            <td><img src="{{asset('images/'.$products->thumbnail)}}" alt="{{$products->thumbnail}}" width="70px" height="70px"></td>

            <td>

                  <a class="btn btn-outline-info" href="{{url('/display-product', $products->id)}}">
                  <i class="fa  fa-eye" style="font-size:35px;" ></i>
                  </a>
                  <a class="btn btn-outline-success" href="{{url('/edit-product',$products->id)}}">
                  <i class="fa fa-edit" style="font-size:35px;"></i>
                  </a>
                  <a class="btn btn-outline-danger" placeholder="delete" href="{{ route('products.destroy',$products->id) }}">
                  <i class="fa fa-trash" style="font-size:35px;"></i>
                  </a>

         
            </td>
  
        </tr>
        @endforeach
    </table>
    
    {!! $product->links() !!}
        
@endsection
@endsection


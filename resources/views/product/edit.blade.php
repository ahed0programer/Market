@extends('product.layout')

@section('content')

    
    <div  class="container" style="padding-top: 12%">
        <div class="card" >
            <div class="card-body">
                <p class="card-text"> Do you relly need to change the product's name</p>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 2%">
        
        <form action="{{route("products.update",$product->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">New Product's name</label>
                <input type="text" class="form-control" id="name" name="name"  value="{{$product->name}}">
            </div>
            <div>
                <label for="price">New Product's price</label>
                <input type="text" class="form-control" id="price" name="price"  value="{{$product->price}}">
            </div>
        
            <div class="form-group">
                <label for="details">Details</label><!--!! sign to allow css-->
                <textarea class="form-control" id="details" rows="3" name="details">{!!$product->details!!}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">save</button>
            </div>
        </form>

    </div>


@endsection

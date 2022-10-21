@extends('product.layout')
@section("content")

    <div  class="container" style="padding-top: 12%">
        <div class="card" >
            <div class="card-body">
                
                <p class="card-text">this is all information !! <span><a class="btn btn-primary" href="{{route("products.edit",$product->id)}}">edit</a></span></p>
                 
            </div>
        </div>
    </div>
    <div 
        class="container" 
        style="color: rgb(134, 6, 6)"
        style="animation-delay: 2s"
    >
    <label >product's name : {{$product->name}}</label>
    </div>
    <div 
        class="container" 
        style="color: rgb(27, 12, 236)"
        style="animation-name: inherit"
        style="animation-delay: 5s"
    >
        <label >product's price : {{$product->price}}</label>
        

        <div class="form-group">
            <label for="details">Details :</label><!--!! sign to allow css-->
            <textarea  class="form-control" id="details" rows="3" name="details">{!!$product->details!!}</textarea>
        </div>
    </div>

@endsection
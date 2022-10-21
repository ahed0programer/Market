@extends('product.layout')

@section('content')

    
    <div  class="container" style="padding-top: 1%">
        <div class="card" >
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 2%">
        
        <form action="{{route("products.store")}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Product's name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div>
                <label for="price">Product's price</label>
                <input type="text" class="form-control" id="price" name="price" >
            </div>
        
            <div class="form-group">
                <label for="discrib">Details</label>
                <textarea class="form-control" id="discrib" rows="3" name="details"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">save</button>
            </div>
        </form>

    </div>


@endsection

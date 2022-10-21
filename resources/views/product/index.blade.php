    @extends('product.layout')
    @section('content')

    <div class="jumbotron container">
        <!-- <h1 class="display-4">Hello, world!</h1>-->
            <p class="lead">here yo can enter new product,,n to featured content or information.</p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="{{route("products.create")}}" role="button">create</a>
            <a class="btn btn-primary btn-lg" href="{{route("trashed")}}" role="button">trashed products</a>
    </div>
    <div class="container">
        <table class="table ">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th></th>
                <th></th>
                <th scope="col">Actions</th>
                <th></th>
                </tr>
            </thead>

            <tbody style="background-color: rgba(109, 228, 144, 0.541)">
                
                @if ($message= Session::get('success'))
                    
                    <script>alert($message)</script>
                    <div class="container">
                        <div class="alert alert-primary" role="alert">
                            {{$message}}
                        </div>
                    </div>
                @endif
                @php
                    $i=0;
                @endphp
                @foreach ( $products as $item)
                    <tr>
                        <th scope="row">{{++ $i}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}} s.p</td>
                        <td>
                            <a class="btn btn-success" href="{{route("products.edit",$item->id)}}">edit</a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{route('products.show',$item->id)}}">show</a>
                        </td>
                         <td>
                            <form action="{{route('products.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route("softdelete",$item->id)}}">soft delete</a>
                        </td>
                        
                    </tr>
                @endforeach

            </tbody>
        </table>
        {!!$products->links()!!}

    </div>

    @endsection

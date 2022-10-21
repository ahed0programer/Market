    @extends('product.layout')
    @section('content')

    <div class="jumbotron container">
        <!-- <h1 class="display-4">Hello, world!</h1>-->
            <p class="lead">here yo can enter new product,,n to featured content or information.</p>
            <hr class="my-4">
    </div>
    <div class="container">
        <table class="table ">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                
                <th scope="col" colspan="2">Actions </th>
                </tr>
            </thead>

            <tbody>
                
                @php
                    $i=0;
                @endphp
                @foreach ( $products as $item)
                    <tr>
                        <th scope="row">{{++ $i}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}} s.p</td>
                        
                        <td>
                            <a class="btn btn-warning" href="{{route('restore.product',$item->id)}}">restore</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{route('deletforever.product',$item->id)}}">delet</a>
                        </td>
                        
                    </tr>
                @endforeach

            </tbody>
        </table>
        {!!$products->links()!!}

    </div>

    @endsection

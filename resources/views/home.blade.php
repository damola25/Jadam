@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Check Cart</div>
                <div class="panel-body">
                    <table class="table">
                        <head>
                            <tr>
                                <td>Item Image</td>
                                <td>Item Name</td>
                                <td>Item Price</td>
                                <td>Quantity</td>
                                <td></td>
                            </tr>
                        </head>
                        @if(!\Session::get('cart'))
                        <p>Cart is Empty!</p>
                        @else
                            @foreach(\Session::get('cart') as $cart)
                            <tr>
                                <td><img class="img responsive" style="width: 50px; height: 50px;" src="{{ $cart['image'] }}" alt="{{ $cart['name'] }} Image"></td>
                                <td>{{ $cart['name'] }}</td>
                                <td>{{ $cart['price'] }}</td>
                                <td>{{ $cart['quantity'] }}</td>
                                <td><a href="#"><button type="button" name="button" class="btn btn-small btn-success">Remove item</button></a></td>
                            </tr>
                            @endforeach
                        @endif
                        <a href="{{ url('/clear') }}"><button type="button" name="button" class="btn btn-small btn-success">Clear cart</button>
                        </a>
                    </table>
                </div>
            </div
        </div>
    </div>
</div>
@endsection

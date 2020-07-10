@extends('layouts.front.app')

@section('content')
    <!-- Main content -->
    <section id="hero" class="hero-section top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="hero-content" style="text-align: center;">
                        <h2 class="hero-title" style="color: #ffffff">My Account</h2>
                        <h3 style="color: #ffffff"> </h3>
                        <br>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </section>
    <br>
    <section class="container content">
        <div class="row">
            <div class="box-body">
                @include('layouts.errors-and-messages')
            </div>
            <div class="col-md-12">
                <h2> <i class="fa fa-home"></i> My Account</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" @if(request()->input('tab') == 'orders') class="active" @endif><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab">Orders</a></li>
                        <li role="presentation" @if(request()->input('tab') == 'address') class="active" @endif><a href="#address" aria-controls="address" role="tab" data-toggle="tab">Addresses</a></li>
                        <li role="presentation" @if(request()->input('tab') == 'pack') class="active" @endif><a href="#pack" aria-controls="pack_incomplet" role="tab" data-toggle="tab">Pack incomplet</a></li>
                        <li role="presentation" @if(request()->input('tab') == 'profile') class="active" @endif><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content customer-order-list">
                        <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'pack')active @endif" id="pack">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Pack</td>
                                    <td>Date creation</td>
                                    <td>Date expiration</td>
                                    <td>Action</td>
                                </tr>
                                </tbody>
                                <tbody>
                                @foreach($packorders as $packorder)
                                    <tr>
                                        <td>{{$packorder->pack->name}}</td>
                                        <td>{{ date('M d, Y h:i a', strtotime($packorder['created_at'])) }}</td>
                                        <td>{{ date('M d, Y h:i a', strtotime($packorder['date_expiration'])) }}</td>
                                        <td><a href="{{ route('completerPack', $packorder->id) }}" class="btn btn-primary">Completer pack</a></td>
                                   {{--     <td><span class="label @if($order['total'] != $order['total_paid']) label-danger @else label-success @endif">{{ config('cart.currency') }} {{ $order['total'] }}</span></td>
                                        <td><p class="text-center" style="color: #ffffff; background-color: {{ $order['status']->color }}">{{ $order['status']->name }}</p></td>
                                    --}}</tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'profile')active @endif" id="profile">
                            {{--{{$customer->name}} <br /><small>{{$customer->email}}</small>--}}

                            <br>
                            <section class="content">
                                <div class="box">
                                    <form action="{{ route('customer.modify') }}" method="post" class="form">
                                        <div class="box-body">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="put">
                                            <div class="form-group">
                                                <label for="name">Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{!! $customer->name ?: old('name')  !!}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">@</span>
                                                    <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{!! $customer->email ?: old('email')  !!}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control">
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->

                            </section>
                           {{-- <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>--}}
                        </div>
                        <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'orders')active @endif" id="orders">
                            @if(!$orders->isEmpty())
                                <table class="table">
                                <tbody>
                                <tr>
                                    <td>N°</td>
                                    <td>Date</td>
                                    <td>Total</td>
                                    <td>Status</td>
                                    <td></td>
                                </tr>
                                </tbody>
                                <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td><p class="text-center" style="">{{ $order['id'] }}</p></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#order_modal_{{$order['id']}}" title="Show order" href="javascript: void(0)">{{ date('M d, Y h:i a', strtotime($order['created_at'])) }}</a>
                                            <!-- Button trigger modal -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="order_modal_{{$order['id']}}" tabindex="-1" role="dialog" aria-labelledby="MyOrders">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Reference #{{$order['reference']}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table">
                                                                <thead>
                                                                    <th>Address</th>
                                                                    <th>Payment Method</th>
                                                                    <th>Total</th>
                                                                    <th>Status</th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <address>
                                                                                <strong>{{$order['address']->alias}}</strong><br />
                                                                                {{$order['address']->address_1}} {{$order['address']->address_2}}<br>
                                                                            </address>
                                                                        </td>
                                                                        <td>{{$order['payment']}}</td>
                                                                        <td>{{ config('cart.currency_symbol') }} {{$order['total']}}</td>
                                                                        <td><p class="text-center" style="color: #ffffff; background-color: {{ $order['status']->color }}">{{ $order['status']->name }}</p></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr>
                                                            <p>Order details:</p>
                                                            <table class="table">
                                                              <thead>
                                                                  <th>Name</th>
                                                                  <th>Quantity</th>
                                                                  <th>Price</th>
                                                                  <th>Cover</th>
                                                              </thead>
                                                              <tbody>
                                                              @foreach ($order['products'] as $product)
                                                                  <tr>
                                                                      <td>{{$product['name']}}</td>
                                                                      <td>{{$product['pivot']['quantity']}}</td>
                                                                      <td>{{$product['price']}}</td>
                                                                      <td><img src="{{ asset("storage/".$product['cover']) }}" width=50px height=50px alt="{{ $product['name'] }}" class="img-orderDetail"></td>
                                                                  </tr>

                                                              @endforeach
                                                              <tr>
                                                                  <span class="hidden">  $pack = {{$pack= \App\Shop\Packs\Pack::find($order['pack_id'])}}</span>
                                                                  <td>{{$pack->name}}</td>
                                                                  <td>1</td>
                                                                  <td>{{$pack->price}}</td>
                                                              </tr>
                                                              </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="label @if($order['total'] != $order['total_paid']) label-danger @else label-success @endif">{{ config('cart.currency') }} {{ $order['total'] }}</span></td>
                                        <td><p class="text-center" style="color: #ffffff; background-color: {{ $order['status']->color }}">{{ $order['status']->name }}</p></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#order_modal_{{$order['id']}}" title="Show order" href="javascript: void(0)" class="btn btn-primary">Details</a>
                                            <!-- Button trigger modal -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="order_modal_{{$order['id']}}" tabindex="-1" role="dialog" aria-labelledby="MyOrders">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Reference #{{$order['reference']}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table">
                                                                <thead>
                                                                <th>Address</th>
                                                                <th>Payment Method</th>
                                                                <th>Total</th>
                                                                <th>Status</th>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <address>
                                                                            <strong>{{$order['address']->alias}}</strong><br />
                                                                            {{$order['address']->address_1}} {{$order['address']->address_2}}<br>
                                                                        </address>
                                                                    </td>
                                                                    <td>{{$order['payment']}}</td>
                                                                    <td>{{ config('cart.currency_symbol') }} {{$order['total']}}</td>
                                                                    <td><p class="text-center" style="color: #ffffff; background-color: {{ $order['status']->color }}">{{ $order['status']->name }}</p></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr>
                                                            <p>Order details:</p>
                                                            <table class="table">
                                                                <thead>
                                                                <th>Name</th>
                                                                <th>Quantity</th>
                                                                <th>Price</th>
                                                                <th>Cover</th>
                                                                </thead>
                                                                <tbody>
                                                                @foreach ($order['products'] as $product)
                                                                    <tr>
                                                                        <td>{{$product['name']}}</td>
                                                                        <td>{{$product['pivot']['quantity']}}</td>
                                                                        <td>{{$product['price']}}</td>
                                                                        <td><img src="{{ asset("storage/".$product['cover']) }}" width=50px height=50px alt="{{ $product['name'] }}" class="img-orderDetail"></td>
                                                                    </tr>

                                                                @endforeach
                                                                <tr>
                                                                    <span class="hidden">  $pack = {{$pack= \App\Shop\Packs\Pack::find($order['pack_id'])}}</span>
                                                                    <td>{{$pack->name}}</td>
                                                                    <td>1</td>
                                                                    <td>{{$pack->price}}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                                {{ $orders->links() }}
                            @else
                                <p class="alert alert-warning">No orders yet. <a href="{{ route('home') }}">Shop now!</a></p>
                            @endif
                        </div>
                        <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'address')active @endif" id="address">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('customer.address.create', auth()->user()->id) }}" class="btn btn-primary">Create your address</a>
                                </div>
                            </div>
                            @if(!$addresses->isEmpty())
                                <table class="table">
                                <thead>
                                    <th>Alias</th>
                                    <th>Address 1</th>
                                    <th>Address 2</th>
                                    <th>City</th>
                                    @if(isset($address->province))
                                    <th>Province</th>
                                    @endif
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Zip</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach($addresses as $address)
                                        <tr>
                                            <td>{{$address->alias}}</td>
                                            <td>{{$address->address_1}}</td>
                                            <td>{{$address->address_2}}</td>
                                            <td>{{$address->city}}</td>
                                            @if(isset($address->province))
                                            <td>{{$address->province->name}}</td>
                                            @endif
                                            <td>{{$address->state_code}}</td>
                                            <td>{{$address->country->name}}</td>
                                            <td>{{$address->zip}}</td>
                                            <td>{{$address->phone}}</td>
                                            <td>
                                                <form method="post" action="{{ route('customer.address.destroy', [auth()->user()->id, $address->id]) }}" class="form-horizontal">
                                                    <div class="btn-group">
                                                        <input type="hidden" name="_method" value="delete">
                                                        {{ csrf_field() }}
                                                        <a href="{{ route('customer.address.edit', [auth()->user()->id, $address->id]) }}" class="btn btn-primary"> <i class="fa fa-pencil"></i> Edit</a>
                                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <br /> <p class="alert alert-warning">No address created yet.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="et_pb_bottom_inside_divider">

    </section>
@endsection
@section('css')
    <style type="text/css">
        .et_pb_bottom_inside_divider {
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgdmlld0JveD0iMCAwIDEyODAgODYiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIHNsaWNlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIGZpbGw9IiMwMTcwYmYiPjxwYXRoIGQ9Ik0xMjgwIDY2LjFjLTMuOCAwLTcuNi4zLTExLjQuOC0xOC4zLTMyLjYtNTkuNi00NC4yLTkyLjItMjUuOS0zLjUgMi02LjkgNC4zLTEwIDYuOS0yMi43LTQxLjctNzQuOS01Ny4yLTExNi42LTM0LjUtMTQuMiA3LjctMjUuOSAxOS4zLTMzLjggMzMuMy0uMi4zLS4zLjYtLjUuOC0xMi4yLTEuNC0yMy43IDUuOS0yNy43IDE3LjUtMTEuOS02LjEtMjUuOS02LjMtMzcuOS0uNi0yMS43LTMwLjQtNjQtMzcuNS05NC40LTE1LjctMTIuMSA4LjYtMjEgMjEtMjUuNCAzNS4yLTEwLjgtOS4zLTI0LjMtMTUtMzguNS0xNi4yLTguMS0yNC42LTM0LjYtMzgtNTkuMi0yOS45LTE0LjMgNC43LTI1LjUgMTYtMzAgMzAuMy00LjMtMS45LTguOS0zLjItMTMuNi0zLjgtMTMuNi00NS41LTYxLjUtNzEuNC0xMDctNTcuOGE4Ni4zOCA4Ni4zOCAwIDAgMC00My4yIDI5LjRjLTguNy0zLjYtMTguNy0xLjgtMjUuNCA0LjgtMjMuMS0yNC44LTYxLjktMjYuMi04Ni43LTMuMS03LjEgNi42LTEyLjUgMTQuOC0xNS45IDI0LTI2LjctMTAuMS01Ni45LS40LTcyLjggMjMuMy0yLjYtMi43LTUuNi01LjEtOC45LTYuOS0uNC0uMi0uOC0uNC0xLjItLjctLjYtMjUuOS0yMi00Ni40LTQ3LjktNDUuOC0xMS41LjMtMjIuNSA0LjctMzAuOSAxMi41LTE2LjUtMzMuNS01Ny4xLTQ3LjMtOTAuNi0zMC44LTIxLjkgMTEtMzYuMyAzMi43LTM3LjYgNTcuMS03LTIuMy0xNC41LTIuOC0yMS44LTEuNkM4NC44IDQ3IDU1LjcgNDAuNyAzNCA1NC44Yy01LjYgMy42LTEwLjMgOC40LTEzLjkgMTQtNi42LTEuNy0xMy4zLTIuNi0yMC4xLTIuNi0uMSAwIDAgMTkuOCAwIDE5LjhoMTI4MFY2Ni4xeiIgZmlsbC1vcGFjaXR5PSIuNSIvPjxwYXRoIGQ9Ik0xNS42IDg2SDEyODBWNDguNWMtMy42IDEuMS03LjEgMi41LTEwLjQgNC40LTYuMyAzLjYtMTEuOCA4LjUtMTYgMTQuNS04LjEtMS41LTE2LjQtLjktMjQuMiAxLjctMy4yLTM5LTM3LjMtNjguMS03Ni40LTY0LjktMjQuOCAyLTQ2LjggMTYuOS01Ny45IDM5LjMtMTkuOS0xOC41LTUxLTE3LjMtNjkuNCAyLjYtOC4yIDguOC0xMi44IDIwLjMtMTMuMSAzMi4zLS40LjItLjkuNC0xLjMuNy0zLjUgMS45LTYuNiA0LjQtOS40IDcuMi0xNi42LTI0LjktNDguMi0zNS03Ni4yLTI0LjQtMTIuMi0zMy40LTQ5LjEtNTAuNi04Mi41LTM4LjQtOS41IDMuNS0xOC4xIDkuMS0yNSAxNi41LTcuMS02LjktMTcuNS04LjgtMjYuNi01LTMwLjQtMzkuMy04Ny00Ni4zLTEyNi4yLTE1LjgtMTQuOCAxMS41LTI1LjYgMjcuNC0zMSA0NS40LTQuOS42LTkuNyAxLjktMTQuMiAzLjktOC4yLTI1LjktMzUuOC00MC4yLTYxLjctMzItMTUgNC44LTI2LjkgMTYuNS0zMS44IDMxLjUtMTQuOSAxLjMtMjkgNy4yLTQwLjMgMTctMTEuNS0zNy40LTUxLjItNTguNC04OC43LTQ2LjgtMTQuOCA0LjYtMjcuNyAxMy45LTM2LjcgMjYuNS0xMi42LTYtMjcuMy01LjctMzkuNy42LTQuMS0xMi4yLTE2LjItMTkuOC0yOS0xOC40LS4yLS4zLS4zLS42LS41LS45LTI0LjQtNDMuMy03OS40LTU4LjYtMTIyLjctMzQuMi0xMy4zIDcuNS0yNC40IDE4LjItMzIuNCAzMS4yQzk5LjggMTguNSA1MCAyOC41IDI1LjQgNjUuNGMtNC4zIDYuNC03LjUgMTMuMy05LjggMjAuNnoiLz48L2c+PC9zdmc+);
            background-size: cover;
            background-position: center top;
            bottom: 0;
            height: 10vw;
            z-index: 10;
        }
    </style>
    @endsection

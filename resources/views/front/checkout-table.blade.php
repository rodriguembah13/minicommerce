@extends('layouts.front.app')

@section('content')
    {{-- {{ dump($cookies) }}--}}

    <div class="container product-in-cart-list">
        @if(!$products->isEmpty())
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ol>
                </div>

                <div class="col-md-12 content">
                    <div class="box-body">
                        @include('layouts.errors-and-messages')
                    </div>
                    @if(count($addresses) > 0)
                        <div class="row">
                            <div class="col-md-12">
                                @include('front.products.product-list-table2', compact('products'))
                            </div>
                        </div>
                        @if(isset($addresses))
                            <div class="row">
                                <div class="col-md-12">
                                    <legend><i class="fa fa-home"></i> Addresses</legend>
                                    <table class="table table-striped">
                                        <thead>
                                        <th>Alias</th>
                                        <th>Address</th>
                                        <th>Billing Address</th>
                                        <th>Delivery Address</th>
                                        </thead>
                                        <tbody>
                                        @foreach($addresses as $key => $address)
                                            <tr>
                                                <td>{{ $address->alias }}</td>
                                                <td>
                                                    {{ $address->address_1 }} {{ $address->address_2 }} <br/>
                                                    @if(!is_null($address->province))
                                                        {{ $address->city }} {{ $address->province->name }} <br/>
                                                    @endif
                                                    {{ $address->city }} {{ $address->state_code }} <br>
                                                    {{ $address->country->name }} {{ $address->zip }}
                                                </td>
                                                <td>
                                                    <label class="col-md-6 col-md-offset-3">
                                                        <input
                                                                type="radio"
                                                                value="{{ $address->id }}"
                                                                name="billing_address"
                                                                @if($billingAddress->id == $address->id) checked="checked" @endif>
                                                    </label>
                                                </td>
                                                <td>
                                                    @if($billingAddress->id == $address->id)
                                                        <label for="sameDeliveryAddress">
                                                            <input type="checkbox" id="sameDeliveryAddress"
                                                                   checked="checked"> Same as billing
                                                        </label>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tbody style="display: none" id="sameDeliveryAddressRow">
                                        @foreach($addresses as $key => $address)
                                            <tr>
                                                <td>{{ $address->alias }}</td>
                                                <td>
                                                    {{ $address->address_1 }} {{ $address->address_2 }} <br/>
                                                    @if(!is_null($address->province))
                                                        {{ $address->city }} {{ $address->province->name }} <br/>
                                                    @endif
                                                    {{ $address->city }} {{ $address->state_code }} <br>
                                                    {{ $address->country->name }} {{ $address->zip }}
                                                </td>
                                                <td></td>
                                                <td>
                                                    <label class="col-md-6 col-md-offset-3">
                                                        <input
                                                                type="radio"
                                                                value="{{ $address->id }}"
                                                                name="delivery_address"
                                                                @if(old('') == $address->id) checked="checked" @endif>
                                                    </label>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                        @if(!is_null($rates))
                            <div class="row">
                                <div class="col-md-12">
                                    <legend><i class="fa fa-truck"></i> Courier</legend>
                                    <ul class="list-unstyled">
                                        @foreach($rates as $rate)
                                            <li class="col-md-4">
                                                <label class="radio">
                                                    <input type="radio" name="rate" data-fee="{{ $rate->amount }}"
                                                           value="{{ $rate->object_id }}">
                                                </label>
                                                <img src="{{ $rate->provider_image_75 }}" alt="courier"
                                                     class="img-thumbnail"/> {{ $rate->currency }} {{ $rate->amount }}
                                                <br/>
                                                {{ $rate->servicelevel->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div> <br>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <legend><i class="fa fa-clock-o"></i> Retrait/Livraison</legend>
                                <div class="row">
                                    <div class='col-sm-6'>
                                        <div class="form-group">
                                            <div class='input-group date' id='dateRetrait'>
                                                <input type='text' class="form-control" name="date_retrait_"/>
                                                <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="dateLivraison" class="input-group date">
                                        <input id="dateLivraison1" name="date_livraison_" type="text"
                                               class="form-control"><span class="input-group-addon"><i
                                                    class="fa fa-th-list"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <legend><i class="fa fa-credit-card"></i> Payment</legend>
                                @if(isset($payments) && !empty($payments))
                                    <table class="table table-striped">
                                        <thead>
                                        <th class="col-md-4">Name</th>
                                        <th class="col-md-4">Description</th>
                                        <th class="col-md-4 text-right">Choose payment</th>
                                        </thead>
                                        <tbody>
                                        @foreach($payments as $payment)
                                            @include('layouts.front.payment-options', compact('payment', 'total', 'shipment_object_id'))
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="alert alert-danger">No payment method set</p>
                                @endif
                            </div>
                        </div>
                    @else
                        <p class="alert alert-danger"><a href="{{ route('customer.address.create', [$customer->id]) }}">No
                                address found. You need to create an address first here.</a></p>
                    @endif
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <p class="alert alert-warning">No products in cart yet. <a href="{{ route('home') }}">Show now!</a>
                    </p>
                </div>
            </div>
        @endif
    </div>
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
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            let courierRadioBtn = $('input[name="rate"]');
            courierRadioBtn.click(function () {
                $('#shippingFee').text($(this).data('fee'));
                let totalElement = $('span#grandTotal');
                let shippingFee = $(this).data('fee');
                let total = totalElement.data('total');
                let grandTotal = parseFloat(shippingFee) + parseFloat(total);
                totalElement.html(grandTotal.toFixed(2));
            });
        });
        $('#dateLivraison').datepicker({
            todayBtn: true,
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true,
            beforeShowMonth: function (date) {
                if (date.getMonth() == 8) {
                    return false;
                }
            },
            defaultViewDate: {year: 2020, month: 4, day: 25}
        });
        $('#dateRetrait').datepicker({
            todayBtn: true,
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-m-d',
            beforeShowMonth: function (date) {
                if (date.getMonth() == 8) {
                    return false;
                }
            },
            defaultViewDate: {year: 2020, month: 4, day: 25}
        });

        //$('#datetimepicker1').datetimepicker();
        function setTotal(total, shippingCost) {
            let computed = +shippingCost + parseFloat(total);
            $('#total').html(computed.toFixed(2));
        }

        function setShippingFee(cost) {
            el = '#shippingFee';
            $(el).html(cost);
            $('#shippingFeeC').val(cost);
        }

        function setCourierDetails(courierId) {
            $('.courier_id').val(courierId);
        }

        $(document).ready(function () {

            let clicked = false;

            $('#sameDeliveryAddress').on('change', function () {
                clicked = !clicked;
                if (clicked) {
                    $('#sameDeliveryAddressRow').show();
                } else {
                    $('#sameDeliveryAddressRow').hide();
                }
            });

            let billingAddress = 'input[name="billing_address"]';
            $(billingAddress).on('change', function () {
                let chosenAddressId = $(this).val();
                $('.address_id').val(chosenAddressId);
                $('.delivery_address_id').val(chosenAddressId);
            });

            let deliveryAddress = 'input[name="delivery_address"]';
            $(deliveryAddress).on('change', function () {
                let chosenDeliveryAddressId = $(this).val();
                $('.delivery_address_id').val(chosenDeliveryAddressId);
            });

            let courier = 'input[name="courier"]';
            $(courier).on('change', function () {
                let shippingCost = $(this).data('cost');
                let total = $('#total').data('total');

                setCourierDetails($(this).val());
                setShippingFee(shippingCost);
                setTotal(total, shippingCost);
            });

            if ($(courier).is(':checked')) {
                let shippingCost = $(courier + ':checked').data('cost');
                let courierId = $(courier + ':checked').val();
                let total = $('#total').data('total');

                setShippingFee(shippingCost);
                setCourierDetails(courierId);
                setTotal(total, shippingCost);
            }
        });
        var payementCash = function () {

            $(document).ready(function () {
                let billingAddressId = $('input[name="billing_address"]:checked').val();
                $('.billing_address').val(billingAddressId);
                $('#dateRetrait').change(function () {
                    var dateRetrait = new Date($(this).val());
                    // alert($('input[name="date_retrait_"]').val())
                    $('#date_retrait').val($('input[name="date_retrait_"]').val());
                })
                $('#dateLivraison').change(function () {
                    $('#date_livraison').val($('input[name="date_livraison_"]').val());
                })


                $('input[name="billing_address"]').on('change', function () {
                    billingAddressId = $('input[name="billing_address"]:checked').val();
                    $('.billing_address').val(billingAddressId);
                });

                let courierRadioBtn = $('input[name="rate"]');
                courierRadioBtn.click(function () {
                    $('.rate').val($(this).val())
                });
            });


        };
        payementCash();
        var payementTransfert = function () {

        }
        payementTransfert();
        var payementTripe = function () {
            $(document).ready(function () {
                let handler = StripeCheckout.configure({
                    key: "{{ config('stripe.key') }}",
                    locale: 'auto',
                    token: function (token) {
                        // You can access the token ID with `token.id`.
                        // Get the token ID to your server-side code for use.
                        console.log(token.id);
                        $('input[name="stripeToken"]').val(token.id);
                        $('#stripeForm').submit();
                    }
                });

                document.getElementById('paywithstripe').addEventListener('click', function (e) {
                    let total = parseFloat("{{ $total }}");
                    let shipping = parseFloat($('#shippingFeeC').val());
                    let amount = total + shipping;
                    // Open Checkout with further options:
                    handler.open({
                        name: "{{ config('stripe.name') }}",
                        description: "{{ config('stripe.description') }}",
                        currency: "{{ config('cart.currency') }}",
                        amount: amount * 100,
                        email: "{{ $customer->email }}"
                    });
                    e.preventDefault();
                });

                // Close Checkout on page navigation:
                window.addEventListener('popstate', function () {
                    handler.close();
                });
            });
        }

        payementTripe();
        var payementPaypal = function () {

        }
        payementPaypal();
    </script>
@endsection
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
            format:'yyyy-m-d',
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
        var payementCash = function() {

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
        var payementTransfert = function() {

        }
        payementTransfert();
        var payementTripe = function() {
            $(document).ready(function () {
                let handler = StripeCheckout.configure({
                    key: "{{ config('stripe.key') }}",
                    locale: 'auto',
                    token: function(token) {
                        // You can access the token ID with `token.id`.
                        // Get the token ID to your server-side code for use.
                        console.log(token.id);
                        $('input[name="stripeToken"]').val(token.id);
                        $('#stripeForm').submit();
                    }
                });

                document.getElementById('paywithstripe').addEventListener('click', function(e) {
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
                window.addEventListener('popstate', function() {
                    handler.close();
                });
            });
        }

        payementTripe();
        var payementPaypal = function() {

        }
        payementPaypal();
    </script>
@endsection
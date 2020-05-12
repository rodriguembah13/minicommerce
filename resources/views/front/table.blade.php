@extends('layouts.front.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <div class="container">
        <div class="row">
        <h2>Packs:{{$pack->name}}</h2>
        <div class="card">
            <div class="card-body">
        @foreach($pack->linePacks as $line)
                    <span class="label label-info">Product: {{$line->product->name}}</span><span class="label label-success">Quantity:{{$line->quantity}}</span>

        @endforeach
            </div>
        </div>
            <div class="col-md-4">

            </div>
        </div>
        <hr>
        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantite</th>
                <th scope="col">Action</th>
                <th scope="col">Etat</th>
                <th scope="col">Inclus dans le pack</th>
                <th scope="col">Hors pack</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
            <tr id="product-{{$product->id}}">
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{--{{ config('cart.currency') }} --}}{{$product->price}}</td>

                <td><input  id="quantity-{{$product->id}}" name="name-{{$product->id}}" type="number" class="form-control" value="0" step="1" min="0">
                    {{--<div class="input-group spinner">
                        <input type="text" class="form-control" value="0">
                        <div class="input-group-btn-vertical">
                            <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                            <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                        </div></div>--}}
                </td>
                <td><div class="btn-group-xs" role="group" aria-label="Basic example" style="display: ruby">
                        <button type="button" class="btn btn-success btn-sm" id="add-to-cart-table" onclick="getItem({{$product->id}})">add</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteItem({{$product->id}})">Del</button>
                    </div></td>
                <td><span id="etat-ok-{{$product->id}}" class="bg-success hidden"><i class="fa fa-check-square bg-success"></i></span>
                    <span id="etat-nok-{{$product->id}}" class="bg-danger hidden"><i class="fa fa-times-circle"></i></span>
                    <span id="etat-m-{{$product->id}}" class="bg-warning "><i class="fa fa-minus-square"></i></span>
                </td>
                <td><span id="in-pack-{{$product->id}}"></span></td>
                <td><span id="hors-pack-{{$product->id}}"></span></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <span class="hidden" id="itemValue">{{$pack->id}}</span>
    </div>
@endsection
@section('css')
    <style type="text/css">
        .spinner {
            width: 100px;
        }
        .spinner input {
            text-align: right;
        }
        .input-group-btn-vertical {
            position: relative;
            white-space: nowrap;
            width: 1%;
            vertical-align: middle;
            display: table-cell;
        }
        .input-group-btn-vertical > .btn {
            display: block;
            float: none;
            width: 100%;
            max-width: 100%;
            padding: 8px;
            margin-left: -1px;
            position: relative;
            border-radius: 0;
        }
        .input-group-btn-vertical > .btn:first-child {
            border-top-right-radius: 4px;
        }
        .input-group-btn-vertical > .btn:last-child {
            margin-top: -2px;
            border-bottom-right-radius: 4px;
        }
        .input-group-btn-vertical i{
            position: absolute;
            top: 0;
            left: 4px;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        $('.spinner .btn:first-of-type').on('click', function() {

            $('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
        });
        $('.spinner .btn:last-of-type').on('click', function() {
            if ($('.spinner input').val()>0) {
                $('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
            }
        });
       /* $('#add-to-cart-table').click(function () {
            alert($('#itemValue').text())
        });*/
        function getItem(id) {
            $('#itemValue').text();
            var qte="#quantity-"+id;
            var statusok="#etat-ok-"+id;
            var statusm="#etat-m-"+id;
            var statusnok="#etat-nok-"+id;
            var inpack="#in-pack-"+id;
            var _token   = $('meta[name="csrf-token"]').attr('content');
           // alert($(qte).val());
            $.ajax({
                type:'POST',
                url:'/ajaxRequestTable',

                data:{quantity:$(qte).val(), product_id:id,pack_id:$('#itemValue').text(),_token: _token},

                success:function(data){

                    alert(data[0].message);
                    $('#hors-pack-'+id).text(data[0].horsPack);
                    $('#in-pack-'+id).text(data[0].inPack);
                    $(statusok).removeClass('hidden');
                    $(statusm).addClass('hidden');
                }
                ,error: function(xhr, status, error) {
                   $(statusnok).removeClass('hidden');
                    $(statusm).addClass('hidden');
                    //var err = eval("(" + xhr.responseJSON.error + ")");
                    alert(error);
                    console.log("Error: ", xhr.responseJSON.error);
                    console.log("Errors->", error);
                }
            });
        }
        function deleteItem(id) {
            var qte="#quantity-"+id;
            var statusok="#etat-ok-"+id;
            var statusm="#etat-m-"+id;
            var statusnok="#etat-nok-"+id;
            var _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:'POST',
                url:'/ajaxRequestDeleteTable',

                data:{product_id:id,pack_id:$('#itemValue').text(),_token: _token},

                success:function(data){

                    alert(data.success);
                    $(statusok).removeClass('hidden');
                    $(statusm).addClass('hidden');
                    window.location.reload(true);
                }
                ,error: function(xhr, status, error) {
                    $(statusnok).removeClass('hidden');
                    $(statusm).addClass('hidden');
                    //var err = eval("(" + xhr.responseJSON.error + ")");
                    alert(error);
                    console.log("Error: ", xhr.responseJSON.error);
                    console.log("Errors->", error);
                }
            });
        }
    </script>
@endsection

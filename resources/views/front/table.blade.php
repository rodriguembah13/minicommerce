@extends('layouts.front.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <section id="hero" class="hero-section top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="hero-content" style="text-align: center;">
                        <h2 class="hero-title" style="color: #ffffff">{{$pack->name}}</h2>
                        <h3 style="color: #ffffff"> </h3>

                        {{-- <p class="hero-text">Download this amazing e-commerce web app for <strong class="text-success">FREE!</strong></p>
                         <a class="btn btn-success" href="https://github.com/jsdecena/laracom" target="_blank" role="button">DOWNLOAD <i class="fa fa-cloud-download"></i></a>
                         --}}
                        <br>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </section>
    <section class="et_pb_top_inside_divider">

    </section>
    <br>

{{--    @if(session()->has('pack'))
        {{ $pack }}
    @endif--}}
    <div class="container" id="articles">
        <div class="row">
        <h2>Packs:{{$pack->name}}<span style="color: #0a0c0d">({{$pack->price}} F)</span></h2>
        <div class="panel">
            <div class="panel-body">
        @foreach($pack->linePacks as $line)
                    <span class="label label-info">Product: {{$line->product->name}}</span><span class="label label-success">Quantity:{{$line->quantity}}</span>

        @endforeach
            </div>
        </div>
            <div class="col-md-4">

            </div>
        </div>
        <hr>
        <div id="cart"></div>
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
                <td id="product-name-{{$product->id}}">{{$product->name}}</td>
                <td id="product-price-{{$product->id}}">{{--{{ config('cart.currency') }} --}}{{$product->price}}</td>

                <td><input  id="quantity-{{$product->id}}" name="name-{{$product->id}}" type="number" class="form-control" value="0" step="1" min="0">
                    {{--<div class="input-group spinner">
                        <input type="text" class="form-control" value="0">
                        <div class="input-group-btn-vertical">
                            <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                            <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                        </div></div>--}}
                </td>
                <td><div class="btn-group-xs" role="group" aria-label="Basic example" style="display: ruby">
                        <button type="button" class="btn btn-success btn-sm" id="add-to-cart-table" onclick="addArticle({{$product->id}})">add</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeArticle({{$product->id}})">Del</button>
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
    <div class="cartfixed" id="cart1">
        <p>Produit</p>
    </div>
    <section class="et_pb_bottom_inside_divider">
    </section>
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
        .cartfixed{
            position: fixed;
            bottom: 0;
            right: 0;
            width: 300px;
            border: 3px solid #73ad21;
        }
        .et_pb_top_inside_divider {
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDBweCIgdmlld0JveD0iMCAwIDEyODAgODYiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIHNsaWNlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIGZpbGw9IiMwMTcwYmYiPjxwYXRoIGQ9Ik04MzMuOSAyNy41Yy01LjggMy4yLTExIDcuMy0xNS41IDEyLjItNy4xLTYuOS0xNy41LTguOC0yNi42LTUtMzAuNi0zOS4yLTg3LjMtNDYuMS0xMjYuNS0xNS41LTEuNCAxLjEtMi44IDIuMi00LjEgMy40QzY3NC40IDMzLjQgNjg0IDQ4IDY4OC44IDY0LjNjNC43LjYgOS4zIDEuOCAxMy42IDMuOCA3LjgtMjQuNyAzNC4yLTM4LjMgNTguOS0zMC41IDE0LjQgNC42IDI1LjYgMTUuNyAzMC4zIDMwIDE0LjIgMS4yIDI3LjcgNi45IDM4LjUgMTYuMkM4NDAuNiA0OS42IDg3NiAyOS41IDkxMC44IDM4Yy0yMC40LTIwLjMtNTEuOC0yNC42LTc2LjktMTAuNXpNMzg0IDQzLjljLTkgNS0xNi43IDExLjktMjIuNyAyMC4zIDE1LjQtNy44IDMzLjMtOC43IDQ5LjQtMi42IDMuNy0xMC4xIDkuOS0xOS4xIDE4LjEtMjYtMTUuNC0yLjMtMzEuMi42LTQ0LjggOC4zem01NjAuMiAxMy42YzIgMi4yIDMuOSA0LjUgNS43IDYuOSA1LjYtMi42IDExLjYtNCAxNy44LTQuMS03LjYtMi40LTE1LjYtMy4zLTIzLjUtMi44ek0xNzguNyA3YzI5LTQuMiA1Ny4zIDEwLjggNzAuMyAzNyA4LjktOC4zIDIwLjctMTIuOCAzMi45LTEyLjVDMjU2LjQgMS44IDIxNC43LTguMSAxNzguNyA3em0xNDYuNSA1Ni4zYzEuNSA0LjUgMi40IDkuMiAyLjUgMTQgLjQuMi44LjQgMS4yLjcgMy4zIDEuOSA2LjMgNC4yIDguOSA2LjkgNS44LTguNyAxMy43LTE1LjcgMjIuOS0yMC41LTExLjEtNS4yLTIzLjktNS42LTM1LjUtMS4xek0zMy41IDU0LjljMjEuNi0xNC40IDUwLjctOC41IDY1IDEzIC4xLjIuMi4zLjMuNSA3LjMtMS4yIDE0LjgtLjYgMjEuOCAxLjYuNi0xMC4zIDMuNS0yMC40IDguNi0yOS40LjMtLjYuNy0xLjIgMS4xLTEuOC0zMi4xLTE3LjItNzEuOS0xMC42LTk2LjggMTYuMXptMTIyOC45IDIuN2MyLjMgMi45IDQuNCA1LjkgNi4yIDkuMSAzLjgtLjUgNy42LS44IDExLjQtLjhWNDguM2MtNi40IDEuOC0xMi40IDUtMTcuNiA5LjN6TTExMjcuMyAxMWMxLjkuOSAzLjcgMS44IDUuNiAyLjggMTQuMiA3LjkgMjUuOCAxOS43IDMzLjUgMzQgMTMuOS0xMS40IDMxLjctMTYuOSA0OS42LTE1LjMtMjAuNS0yNy43LTU3LjgtMzYuOC04OC43LTIxLjV6IiBmaWxsLW9wYWNpdHk9Ii41Ii8+PHBhdGggZD0iTTAgMHY2NmM2LjggMCAxMy41LjkgMjAuMSAyLjYgMy41LTUuNCA4LjEtMTAuMSAxMy40LTEzLjYgMjQuOS0yNi44IDY0LjctMzMuNCA5Ni44LTE2IDEwLjUtMTcuNCAyOC4yLTI5LjEgNDguMy0zMiAzNi4xLTE1LjEgNzcuNy01LjIgMTAzLjIgMjQuNSAxOS43LjQgMzcuMSAxMy4xIDQzLjQgMzEuOCAxMS41LTQuNSAyNC40LTQuMiAzNS42IDEuMWwuNC0uMmMxNS40LTIxLjQgNDEuNS0zMi40IDY3LjYtMjguNiAyNS0yMSA2Mi4xLTE4LjggODQuNCA1LjEgNi43LTYuNiAxNi43LTguNCAyNS40LTQuOCAyOS4yLTM3LjQgODMuMy00NC4xIDEyMC43LTE0LjhsMS44IDEuNWMzNy4zLTMyLjkgOTQuMy0yOS4zIDEyNy4yIDggMS4yIDEuMyAyLjMgMi43IDMuNCA0LjEgOS4xLTMuOCAxOS41LTEuOSAyNi42IDUgMjQuMy0yNiA2NS0yNy4zIDkxLTMuMS41LjUgMSAuOSAxLjUgMS40IDEyLjggMy4xIDI0LjQgOS45IDMzLjQgMTkuNSA3LjktLjUgMTUuOS40IDIzLjUgMi44IDctLjEgMTMuOSAxLjUgMjAuMSA0LjcgMy45LTExLjYgMTUuNS0xOC45IDI3LjctMTcuNS4yLS4zLjMtLjYuNS0uOSAyMi4xLTM5LjIgNzAuNy01NC43IDExMS40LTM1LjYgMzAuOC0xNS4zIDY4LjItNi4yIDg4LjYgMjEuNSAxOC4zIDEuNyAzNSAxMC44IDQ2LjUgMjUuMSA1LjItNC4zIDExLjEtNy40IDE3LjYtOS4zVjBIMHoiLz48L2c+PC9zdmc+);
            background-size: cover;
            background-position: center top;
            top: 0;
            height: 100px;
            z-index: 1;
        }
        .et_pb_bottom_inside_divider {
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgdmlld0JveD0iMCAwIDEyODAgODYiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIHNsaWNlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIGZpbGw9IiMwMTcwYmYiPjxwYXRoIGQ9Ik0xMjgwIDY2LjFjLTMuOCAwLTcuNi4zLTExLjQuOC0xOC4zLTMyLjYtNTkuNi00NC4yLTkyLjItMjUuOS0zLjUgMi02LjkgNC4zLTEwIDYuOS0yMi43LTQxLjctNzQuOS01Ny4yLTExNi42LTM0LjUtMTQuMiA3LjctMjUuOSAxOS4zLTMzLjggMzMuMy0uMi4zLS4zLjYtLjUuOC0xMi4yLTEuNC0yMy43IDUuOS0yNy43IDE3LjUtMTEuOS02LjEtMjUuOS02LjMtMzcuOS0uNi0yMS43LTMwLjQtNjQtMzcuNS05NC40LTE1LjctMTIuMSA4LjYtMjEgMjEtMjUuNCAzNS4yLTEwLjgtOS4zLTI0LjMtMTUtMzguNS0xNi4yLTguMS0yNC42LTM0LjYtMzgtNTkuMi0yOS45LTE0LjMgNC43LTI1LjUgMTYtMzAgMzAuMy00LjMtMS45LTguOS0zLjItMTMuNi0zLjgtMTMuNi00NS41LTYxLjUtNzEuNC0xMDctNTcuOGE4Ni4zOCA4Ni4zOCAwIDAgMC00My4yIDI5LjRjLTguNy0zLjYtMTguNy0xLjgtMjUuNCA0LjgtMjMuMS0yNC44LTYxLjktMjYuMi04Ni43LTMuMS03LjEgNi42LTEyLjUgMTQuOC0xNS45IDI0LTI2LjctMTAuMS01Ni45LS40LTcyLjggMjMuMy0yLjYtMi43LTUuNi01LjEtOC45LTYuOS0uNC0uMi0uOC0uNC0xLjItLjctLjYtMjUuOS0yMi00Ni40LTQ3LjktNDUuOC0xMS41LjMtMjIuNSA0LjctMzAuOSAxMi41LTE2LjUtMzMuNS01Ny4xLTQ3LjMtOTAuNi0zMC44LTIxLjkgMTEtMzYuMyAzMi43LTM3LjYgNTcuMS03LTIuMy0xNC41LTIuOC0yMS44LTEuNkM4NC44IDQ3IDU1LjcgNDAuNyAzNCA1NC44Yy01LjYgMy42LTEwLjMgOC40LTEzLjkgMTQtNi42LTEuNy0xMy4zLTIuNi0yMC4xLTIuNi0uMSAwIDAgMTkuOCAwIDE5LjhoMTI4MFY2Ni4xeiIgZmlsbC1vcGFjaXR5PSIuNSIvPjxwYXRoIGQ9Ik0xNS42IDg2SDEyODBWNDguNWMtMy42IDEuMS03LjEgMi41LTEwLjQgNC40LTYuMyAzLjYtMTEuOCA4LjUtMTYgMTQuNS04LjEtMS41LTE2LjQtLjktMjQuMiAxLjctMy4yLTM5LTM3LjMtNjguMS03Ni40LTY0LjktMjQuOCAyLTQ2LjggMTYuOS01Ny45IDM5LjMtMTkuOS0xOC41LTUxLTE3LjMtNjkuNCAyLjYtOC4yIDguOC0xMi44IDIwLjMtMTMuMSAzMi4zLS40LjItLjkuNC0xLjMuNy0zLjUgMS45LTYuNiA0LjQtOS40IDcuMi0xNi42LTI0LjktNDguMi0zNS03Ni4yLTI0LjQtMTIuMi0zMy40LTQ5LjEtNTAuNi04Mi41LTM4LjQtOS41IDMuNS0xOC4xIDkuMS0yNSAxNi41LTcuMS02LjktMTcuNS04LjgtMjYuNi01LTMwLjQtMzkuMy04Ny00Ni4zLTEyNi4yLTE1LjgtMTQuOCAxMS41LTI1LjYgMjcuNC0zMSA0NS40LTQuOS42LTkuNyAxLjktMTQuMiAzLjktOC4yLTI1LjktMzUuOC00MC4yLTYxLjctMzItMTUgNC44LTI2LjkgMTYuNS0zMS44IDMxLjUtMTQuOSAxLjMtMjkgNy4yLTQwLjMgMTctMTEuNS0zNy40LTUxLjItNTguNC04OC43LTQ2LjgtMTQuOCA0LjYtMjcuNyAxMy45LTM2LjcgMjYuNS0xMi42LTYtMjcuMy01LjctMzkuNy42LTQuMS0xMi4yLTE2LjItMTkuOC0yOS0xOC40LS4yLS4zLS4zLS42LS41LS45LTI0LjQtNDMuMy03OS40LTU4LjYtMTIyLjctMzQuMi0xMy4zIDcuNS0yNC40IDE4LjItMzIuNCAzMS4yQzk5LjggMTguNSA1MCAyOC41IDI1LjQgNjUuNGMtNC4zIDYuNC03LjUgMTMuMy05LjggMjAuNnoiLz48L2c+PC9zdmc+);
            background-size: cover;
            background-position: center top;
            bottom: 0;
            height: 10vw;
            z-index: 10;
        }
        #logo {
            max-height: 100%;
        }

        #logo {
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
            margin-bottom: 0;
            max-height: 54%;
            display: inline-block;
            float: none;
            vertical-align: middle;
            -webkit-transform: translateZ(0);
        }

        .navbar-brand {
            height: 100px !important;
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
       function sendAjaxPost(product_id, quantity) {
           var _token   = $('meta[name="csrf-token"]').attr('content');
           var statusok="#etat-ok-"+product_id;
           var statusm="#etat-m-"+product_id;
           var statusnok="#etat-nok-"+product_id;
           var inpack="#in-pack-"+product_id;
           $.ajax({
               type:'POST',
               url:'/ajaxRequestTable',
               async: "false",
               data:{quantity:quantity, product_id:product_id,pack_id:$('#itemValue').text(),_token: _token},

               success:function(data){

                   //alert(data[0].message);
                   $('#hors-pack-'+product_id).text(data[0].horsPack);
                   $('#in-pack-'+product_id).text(data[0].inPack);
                   $(statusok).removeClass('hidden');
                   $(statusm).addClass('hidden');
               }
               ,error: function(xhr, status, error) {
                   $(statusnok).removeClass('hidden');
                   $(statusm).addClass('hidden');
                   //var err = eval("(" + xhr.responseJSON.error + ")");
                 /*  alert(error);
                   console.log("Error: ", xhr.responseJSON.error);
                   console.log("Errors->", error);*/
               }
           });
       }
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
                url:'/ajaxRequestGetTable',
                data:{quantity:$(qte).val(), product_id:id,pack_id:$('#itemValue').text(),_token: _token},
                success:function(data){

                    //alert(data[0].message);
                    $('#hors-pack-'+id).text(data[0].horsPack);
                    $('#in-pack-'+id).text(data[0].inPack);
                    $(statusok).removeClass('hidden');
                    $(statusm).addClass('hidden');
                }
                ,error: function(xhr, status, error) {
                   $(statusnok).removeClass('hidden');
                    $(statusm).addClass('hidden');
                    $('#hors-pack-'+id).text($(qte).val());
                    $('#in-pack-'+id).text(0);
                    //var err = eval("(" + xhr.responseJSON.error + ")");
                    /*alert(error);
                    console.log("Error: ", xhr.responseJSON.error);
                    console.log("Errors->", error);*/
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
      /*cart js*/
        function checkCart() {
            cart = new Array();
            itemsMonitorStr = '';
            totalPrice = 0;
            totalArticles = 0;
            //id;name;desc;price;quantity
            for (var i = 0; i < articlesInCart.length; i++) {
                if (typeof articlesInCart[i] !== 'undefined') {
                    if (articlesInCart[i][4] > 0) {
                        totalArticlePrice = articlesInCart[i][3]*articlesInCart[i][4];
                        totalPrice = totalPrice + totalArticlePrice;
                        totalArticles = totalArticles + articlesInCart[i][4];
                        itemsMonitorStr = itemsMonitorStr + '<p>' + ' ' + articlesInCart[i][4] + ' x ' + articlesInCart[i][1] + ' : ' + totalArticlePrice.toFixed(2) + 'f</p>';
                        cart.push(articlesInCart[i][0] + ',' + articlesInCart[i][4]);
                    }
                }
            }
            cartMonitorObj.innerHTML = itemsMonitorStr + '<p id="total-commande">Total: ' + totalArticles + ' articles ' + totalPrice.toFixed(2) + 'f</p><p><div id="cart-icone"></div> <a href="#" onclick="sendCookieToServer()">Valider la commande</a></p>';
            /*if (totalArticles === 0) {
                cartMonitorObj.style.display = 'none';
            }
            else cartMonitorObj.style.display = 'inline-block';*/
            var now = new Date();
            now.setTime(now.getTime() + 30 * 24 * 3600 * 1000);
            document.cookie = 'cart=' + cart.join('-') + '; expires=' + now.toUTCString() + '; path=/';
        }
        function addArticle(articleId) {
            setInCart(articleId,$('#quantity-'+articleId).val());
           getItem(articleId);
            checkCart();
        }
        function removeArticle(articleId) {
            setInCart(articleId,0);
            $('#quantity-'+articleId).val(0)
            checkCart();
        }
        function setInCart(articleId,setQuantity) {

            //	0=id ; 1=name ; 2=desc ; 3=price ; 4=quantity
            var article = new Array();
            article[0] = parseInt(articleId);
            article[1] = document.getElementById('product-name-'+articleId).innerHTML;
            article[2] = document.getElementById('product-name-'+articleId).innerHTML;
            article[3] = parseFloat(document.getElementById('product-price-'+articleId).innerHTML);
            article[4] = parseInt(setQuantity);
            /*if (setQuantity === +1) {
                article[4] += 1;
            }
            else if (setQuantity === -1) {
                if (article[4] > 0) article[4] -= 1;
            }
            else {
                article[4] = parseInt(setQuantity);
            }*/
            articlesInCart[articleId] = article;
            articleQuantityObj = document.getElementById('quantity-'+articleId);
            if (article[4] === 0) articleQuantityObj.className = '';
            else articleQuantityObj.className = 'added';
            articleQuantityObj.innerHTML = article[4];
           // alert('testqua'+article[4])
        }
        function loadCartFromCookie() {
            var cartCookie = getCookieValueByRegEx('cart');
            var cookieItems = cartCookie.split('-');
            for (var i = 0; i < cookieItems.length; i++) {
                var cookieItem = cookieItems[i].split(',');
                // 0 = id; 1 = quantity
                setInCart(cookieItem[0],cookieItem[1]);
            }
            checkCart();
        }
        function sendCookieToServer() {
            var cartCookie = getCookieValueByRegEx('cart');
            var cookieItems = cartCookie.split('-');
            var now = new Date();
            now.setTime(now.getTime() + 30 * 24 * 3600 * 1000);
            document.cookie = 'pack_id=' + $('#itemValue').text() + '; expires=' + now.toUTCString() + '; path=/';
            for (var i = 0; i < cookieItems.length; i++) {
                var cookieItem = cookieItems[i].split(',');
                // 0 = id; 1 = quantity
               // setInCart(cookieItem[0],cookieItem[1]);
               // sendAjaxPost(cookieItem[0],cookieItem[1]);
            }
            //delete cookie on computer
           // document.cookie = "cart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            window.location.replace("/checkout_table");
        }
        function getCookieValueByRegEx(a, b) {
            b = document.cookie.match('(^|;)\\s*' + a + '\\s*=\\s*([^;]+)');
            return b ? b.pop() : '';
        }
        function initCart() {
            articlesInCart = [];
            cartMonitorObj = document.getElementById('cart1');
            //if (location.hash == '#articles') {
                //$('#articles').show();
                //$('#commander-button').hide();
           // }
            if (getCookieValueByRegEx('cart')) {
                loadCartFromCookie();
            }

        }
        initCart();
    </script>
@endsection

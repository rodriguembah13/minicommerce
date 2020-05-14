@extends('layouts.front.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <div class="container" id="articles">
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
                    $('#hors-pack-'+id).text("0");
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
                        itemsMonitorStr = itemsMonitorStr + '<p>' + ' ' + articlesInCart[i][4] + ' x ' + articlesInCart[i][1] + ' : ' + totalArticlePrice.toFixed(2) + '$</p>';
                        cart.push(articlesInCart[i][0] + ',' + articlesInCart[i][4]);
                    }
                }
            }
            cartMonitorObj.innerHTML = itemsMonitorStr + '<p id="total-commande">Total: ' + totalArticles + ' articles ' + totalPrice.toFixed(2) + '$</p><p><div id="cart-icone"></div> <a href="#" onclick="sendCookieToServer()">Valider la commande</a></p>';
            /*if (totalArticles === 0) {
                cartMonitorObj.style.display = 'none';
            }
            else cartMonitorObj.style.display = 'inline-block';*/
            var now = new Date();
            now.setTime(now.getTime() + 30 * 24 * 3600 * 1000);
            document.cookie = 'cart=' + cart.join('-') + '; expires=' + now.toUTCString() + '; path=/'
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
            for (var i = 0; i < cookieItems.length; i++) {
                var cookieItem = cookieItems[i].split(',');
                // 0 = id; 1 = quantity
               // setInCart(cookieItem[0],cookieItem[1]);
                sendAjaxPost(cookieItem[0],cookieItem[1]);
            }
            //delete cookie on computer
            document.cookie = "cart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            //window.location.replace("/cart");
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

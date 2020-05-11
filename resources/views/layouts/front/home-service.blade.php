<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center  mb-5">
            <div class="col-md-12 text-center">
                <h3 class="scissors text-center">Services &amp; Pricing</h3>
                <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>

                <p class="text-center">
                    <a href="#" class="btn btn-primary custom-prev">Prev</a>
                    <a href="#" class="btn btn-primary custom-next">Next</a>
                </p>
            </div>

        </div>
        <div class="row">
            <div class="col-12">

                <div class="nonloop-block-13 owl-carousel d-flex">
                    @include('front.packs.pack-list', ['packs' => $pack->where('status', 1)])
                </div>

            </div>
        </div>
    </div>
</div>
{{--more service--}}
<div class="site-section section-3" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_2.jpg');">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-7 text-center mb-5">
                <h2 class="text-white scissors primary-color-icon text-center">More Services</h2>
                <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam quo doloribus, suscipit libero, voluptate aliquam.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-bald"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Hair Cut</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-beard"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Facial &amp; Body Care</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-scissors"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Massages</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-hair-spray"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Hair Cut</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-hair"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Facial &amp; Body Care</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-barber-shop"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Massages</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@section('css')
    <style type="text/css">

        .item-1 .item-1-contents {
            padding: 30px;
            border: 1px solid #ccc;
            border-top-color: rgb(204, 204, 204);
            border-top-style: solid;
            border-top-width: 1px;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            border-top: none;
            position: relative;
        }
        .item-1 .item-1-contents h3::after {
            left: 0;
            bottom: 0;
            content: "";
            width: 40px;
            height: 2px;
            background: #dc3545;
            position: absolute;
        }
        .item-1 .item-1-contents h3 {
            position: relative;
            color: #dc3545;
            padding-bottom: 30px;
            margin-bottom: 30px;
        }
        .item-1 .item-1-contents ul {
            list-style: none;
            display: block;
            margin: 0;
            padding: 0;
        }
        .item-1 .item-1-contents ul li {
            list-style: none;
            margin: 0 0 10px 0;
            padding: 0;
            position: relative;
        }
        .item-1 .item-1-contents ul li .price {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 90px;
            flex: 0 0 90px;
            text-align: right;
        }
        .d-flex {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
        }
        .item-1 .item-1-contents ul li .quantity {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 90px;
            flex: 0 0 40px;
            text-align: left;
        }
        .section-3::before {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: "";
            background-color: rgba(0, 0, 0, 0.5);
        }
        .scissors.text-center::after {
            left: 50%;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
        }
        .scissors.primary-color-icon::after {
            color: #dc3545;
        }
        .scissors::after {
            bottom: 0;
            left: 0;
            font-size: 22px;
            content: "\f0c4";
            font-family: 'icomoon';
            position: absolute;
            color: #ccc;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">

    </script>
@endsection

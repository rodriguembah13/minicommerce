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
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="serviceBox">
                <div class="service-icon">
                    <span><i class="fa fa-globe"></i></span>
                </div>
                <h3 class="title">Web Design</h3>
                <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui quaerat fugit quas veniam perferendis repudiandae sequi, dolore quisquam illum.</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="serv purple">
                <div class="service-icon">
                    <span><i class="fa fa-rocket"></i></span>
                </div>
                <h3 class="title">Web Development</h3>
                <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui quaerat fugit quas veniam perferendis repudiandae sequi, dolore quisquam illum.</p>
            </div>
        </div>
    </div>
</div>
{{--more service--}}
{{--<div class="site-section section-3" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_2.jpg');">
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
</div>--}}
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

        .serviceBox{
            background: #fff;
            font-family: 'Montserrat', sans-serif;
            text-align: center;
            padding: 0px 25px 40px;
            margin: 20px 0 0;
            border-radius: 20px;
            position: relative;
            transition: all 0.3s ease;
        }
        .serviceBox:hover{ box-shadow: 0 10px 10px rgba(0,0,0,0.2); }
        .serviceBox:before,
        .serviceBox:after{
            content: "";
            background: linear-gradient(to top,#008d86,#01a2a6);
            width: 10px;
            border-radius: 0 100px 100px 0;
            position: absolute;
            top: 110px;
            bottom: 35px;
            left: 0;
        }
        .serviceBox:after{
            border-radius: 100px 0 0 100px;
            left: auto;
            right: 0;
        }
        .serviceBox .service-icon{
            color: #fff;
            background: linear-gradient(-45deg,#008d86 49%,#01a2a6 50%);
            font-size: 45px;
            line-height: 92px;
            width: 120px;
            height: 120px;
            margin: 0 auto;
            border-radius: 100px;
            border: 15px solid #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            transform: translateY(-20px);
            transition: all 0.3s ease;
        }
        .serviceBox:hover .service-icon i{
            transform: rotateX(360deg);
            transition: all 0.3s;
        }
        .serviceBox .title{
            color: #008d86;
            font-size: 17px;
            font-weight: 600;
            text-transform: uppercase;
            margin: 0 0 10px;
        }
        .serviceBox .description{
            color: #444;
            font-size: 14px;
            line-height: 24px;
            margin: 0;
        }
        .serviceBox.pink:before,
        .serviceBox.pink:after{ background: linear-gradient(to top,#f53985 49%,#fd47a4); }
        .serviceBox.pink .service-icon{ background:linear-gradient(-45deg,#f53985 49%,#fd47a4 50%); }
        .serviceBox.pink .title{ color: #f53985; }
        .serviceBox.purple:before,
        .serviceBox.purple:after{ background: linear-gradient(to top,#8b33cc 49%,#a23adc); }
        .serviceBox.purple .service-icon{ background:linear-gradient(-45deg,#8b33cc 49%,#a23adc 50%); }
        .serviceBox.purple .title{ color: #8b33cc; }
        .serviceBox.blue:before,
        .serviceBox.blue:after{ background: linear-gradient(to top,#038bec 49%,#01aeee); }
        .serviceBox.blue .service-icon{ background:linear-gradient(-45deg,#038bec 49%,#01aeee 50%); }
        .serviceBox.blue .title{ color: #038bec; }
        @media only screen and (max-width:990px){
            .serviceBox{ margin: 20px 0 50px; }
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">

    </script>
@endsection

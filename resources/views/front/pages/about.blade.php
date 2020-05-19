@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="about"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('css')
    <style type="text/css">
       .site-section {
    padding: 7rem 0;
}
.img-years {
    position: relative;
    display: block;
}
.img-years .year {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: #dc3545;
    position: absolute;
    right: 0;
    bottom: 0;
    -webkit-transform: translate(50%, 50%);
    -ms-transform: translate(50%, 50%);
    transform: translate(50%, 50%);
}
.img-years .year > span {
    width: 100%;
    color: #fff;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 3rem;
    display: block;
    line-height: 1;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.img-years .year > span > span {
    line-height: 1.2;
    display: block;
    font-size: .8rem;
}

.scissors {
    position: relative;
    padding-bottom: 30px;
    margin-bottom: 30px;
    font-size: 3rem;
    color: #dc3545;
}
.scissors.text-center::after {
    left: 50%;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
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
h1, h2, h3, h4, h5, .h1, .h2, .h3, .h4, .h5 {
    font-weight: 300;
    color: #364d59;
}
.btn {
    border-radius: 30px;
    font-size: .8rem;
    text-transform: uppercase;
    letter-spacing: .2rem;
    padding: 10px 20px;
    text-decoration: none;
}
.bg-light {
    background-color: #f6f5f5 !important;
}
.site-section {
    padding: 7rem 0;
}
.scissors {
    position: relative;
    padding-bottom: 30px;
    margin-bottom: 30px;
    font-size: 3rem;
    color: #dc3545;
}
.scissors.text-center::after {
    left: 50%;
    transform: translateX(-50%);
}
.post-entry-1.person-1 {
    text-align: center;
}
.post-entry-1.person-1 img {
    width: 90px;
    border-radius: 50%;
    margin: 0 auto -45px auto;
}
.post-entry-1.person-1 .post-entry-1-contents {
    padding-top: 4rem;
}
.post-entry-1 .post-entry-1-contents {
    background: #fff;
    padding: 20px;
        padding-top: 20px;
}
    </style>
@endsection


@section('content')
  @include('front.pages.about-slider')
            <div class="site-section">
                <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="img-years">
                            <img src="{{ url('images/img_1.jpg') }}" alt="Image" class="img-fluid">
                            <div class="year">
                            <span>3 <span>years in <br>excellent service</span></span>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-5 ml-auto pl-lg-5 text-center">
                    <h3 class="scissors text-center">High Quality Hair Styles</h3>
                    <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>
                    <p><a href="#" class="btn btn-primary">Learn More</a></p>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="site-section bg-light">
                <div class="container">
                <div class="row justify-content-center text-center mb-5 section-2-title">
                    <div class="col-md-6">
                    <h3 class="scissors text-center">Meet Our Team</h3>
                    <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>
                    </div>
                </div>
                <div class="row align-items-stretch">

                    <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">
                        
                        <img src="{{ url('images/person_1.jpg') }}" alt="Image"
                        class="img-fluid">
                    
                        <div class="post-entry-1-contents">
                        <span class="meta">Founder</span>
                        <h2>James Doe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">
                        
                        <img src="{{ url('images/person_2.jpg') }}" alt="Image"
                        class="img-fluid">
                    
                        <div class="post-entry-1-contents">
                        <span class="meta">Founder</span>
                        <h2>James Doe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">
                        
                        <img src="{{ url('images/person_3.jpg') }}" alt="Image"
                        class="img-fluid">
                    
                        <div class="post-entry-1-contents">
                        <span class="meta">Founder</span>
                        <h2>James Doe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">
                        
                        <img src="{{ url('images/person_4.jpg') }}" alt="Image"
                        class="img-fluid">
                    
                        <div class="post-entry-1-contents">
                        <span class="meta">Founder</span>
                        <h2>James Doe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">
                        
                        <img src="{{ url('images/person_5.jpg') }}" alt="Image"
                        class="img-fluid">
                    
                        <div class="post-entry-1-contents">
                        <span class="meta">Founder</span>
                        <h2>James Doe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">
                        
                        <img src="{{ url('images/person_6.jpg') }}" alt="Image"
                        class="img-fluid">
                    
                        <div class="post-entry-1-contents">
                        <span class="meta">Founder</span>
                        <h2>James Doe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
                        </div>
                    </div>
                    </div>


                </div>
                </div>
            </div>
@endsection
@section('js')
    <script type="text/javascript">
        $('#apropos').addClass('active');
    </script>
@endsection
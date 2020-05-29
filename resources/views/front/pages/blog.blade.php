@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="blog"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('css')
    <style type="text/css">
      .img-fluid {
        max-width: 100%;
        height: auto;
      }
      .post-entry-1 .post-entry-1-contents {
    background: #fff;
    padding: 20px;
}
      img {
    vertical-align: middle;
    border-style: none;
    }
     ::selection {
    background: #000;
    color: #fff;
    }
    body {
    line-height: 1.7;
    color: #364d59 !important;
    font-weight: 300;
    font-size: 1rem;
}
div {
    display: block;
}
    </style>
@endsection

@section('content')
@include('front.pages.blog-slider')

<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="post-entry-1 h-100">
          <a href="single.html">
            <img src="{{ url('images/img_blog_1.jpg') }}" alt="Image"
             class="img-fluid">
          </a>
          <div class="post-entry-1-contents">
            
            <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
            <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="post-entry-1 h-100">
          <a href="single.html">
            <img src="{{ url('images/img_blog_2.jpg') }}" alt="Image"
             class="img-fluid">
          </a>
          <div class="post-entry-1-contents">
            
            <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
            <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="post-entry-1 h-100">
          <a href="single.html">
            <img src="{{ url('images/img_blog_3.jpg') }}" alt="Image"
             class="img-fluid">
          </a>
          <div class="post-entry-1-contents">
            
            <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
            <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="post-entry-1 h-100">
          <a href="single.html">
            <img src="{{ url('images/img_blog_1.jpg') }}" alt="Image"
             class="img-fluid">
          </a>
          <div class="post-entry-1-contents">
            
            <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
            <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="post-entry-1 h-100">
          <a href="single.html">
            <img src="{{ url('images/img_blog_2.jpg') }}" alt="Image"
             class="img-fluid">
          </a>
          <div class="post-entry-1-contents">
            
            <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
            <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="post-entry-1 h-100">
          <a href="single.html">
            <img src="{{ url('images/img_blog_3.jpg') }}" alt="Image"
             class="img-fluid">
          </a>
          <div class="post-entry-1-contents">
            
            <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
            <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
          </div>
        </div>
      </div>
    

      <div class="col-12 mt-5 text-center">
        <span class="p-3">1</span>
        <a href="#" class="p-3">2</a>
        <a href="#" class="p-3">3</a>
        <a href="#" class="p-3">4</a>
      </div>
    </div>
  </div>
</div>

@endsection
@section('js')
  <script type="text/javascript">
    $('#blog').addClass('active');
    </script>
@endsection
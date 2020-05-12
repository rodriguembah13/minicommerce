@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="blog"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('css')
    <style type="text/css">
      
    </style>
@endsection

@section('content')
<div class="ftco-blocks-cover-1">
  <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_1.jpg')">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-7">
          <h1 class="mb-3">Blog Posts</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta veritatis in tenetur doloremque, maiores doloribus officia iste. Dolores.</p>
          <p><a href="#" class="btn btn-primary">Learn More</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="post-entry-1 h-100">
          <a href="single.html">
            <img src="images/img_1.jpg" alt="Image"
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
            <img src="images/img_2.jpg" alt="Image"
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
            <img src="images/img_3.jpg" alt="Image"
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
            <img src="images/img_1.jpg" alt="Image"
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
            <img src="images/img_2.jpg" alt="Image"
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
            <img src="images/img_3.jpg" alt="Image"
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
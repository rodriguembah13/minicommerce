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
        .img-fluid {
            max-width: 100%;
            height: 150px;
        }
    </style>
@endsection

@section('content')
    @include('front.pages.blog-slider')

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                {{--      @isset ($posts[0])
                        <div class="row">
                          <div class="col-lg-2"></div>
                          <div class="col-lg-8">
                            <article class="hentry post post-standard has-post-thumbnail sticky">
                              <div class="post-thumb">
                                <img src="{{ $posts[0]->featured }}" alt="{{ $posts[0]->title }}">
                                <div class="overlay"></div>
                                <a href="{{ $posts[0]->featured }}" class="link-image js-zoom-image">
                                  <i class="seoicon-zoom"></i>
                                </a>
                                <a href="#" class="link-post">
                                  <i class="seoicon-link-bold"></i>
                                </a>
                              </div>

                              <div class="post__content">

                                <div class="post__content-info">

                                  <h2 class="post__title entry-title text-center">
                                    <a href="{{ route('post.single', ['slug' => $posts[0]->slug ]) }}">{{ $posts[0]->title }}</a>
                                  </h2>

                                  <div class="post-additional-info">

                                                        <span class="post__date">

                                                            <i class="seoicon-clock"></i>

                                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                                {{ $posts[0]->created_at->toFormattedDateString() }}
                                                            </time>

                                                        </span>

                                    <span class="category">
                                                            <i class="seoicon-tags"></i>
                                                            <a href="{{ route('category.single', ['id' => $posts[0]->category->id ]) }}">{{ $posts[0]->category->name }}</a>
                                                        </span>

                                  </div>
                                </div>
                              </div>

                            </article>
                          </div>
                          <div class="col-lg-2"></div>
                        </div>
                      @endisset--}}

                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="post-entry-1 h-100">
                            <a href="{{ route('post.single', ['slug' => $post->slug ]) }}">
                                <img src="{{ $post->featured }}" alt="Image"
                                     class="img-fluid">
                            </a>
                            <div class="post-entry-1-contents">

                                <h2><a href="{{ route('post.single', ['slug' => $post->slug ]) }}">{{$post->title}}</a>
                                </h2>
                                <span class="meta d-inline-block mb-3">{{$post->created_at->toFormattedDateString()}} <span
                                            class="mx-2">by</span> <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore
                                    harum molestias consectetur.</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--    <div class="col-lg-4 col-md-6 mb-4">
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
                    </div>--}}

            </div>
        </div>
    </div>

@endsection

@section('css')
    <script type="text/css">
        .img-fluid {
            max-width: 100%;
            height: 150px;
        }

        .img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 150px;
        }
    </script>
@endsection

@section('js')
    <script type="text/javascript">
        $('#blog').addClass('active');
    </script>
@endsection
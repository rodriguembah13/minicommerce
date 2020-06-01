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
        .et_pb_bottom_inside_divider {
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgdmlld0JveD0iMCAwIDEyODAgODYiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIHNsaWNlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIGZpbGw9IiMwMTcwYmYiPjxwYXRoIGQ9Ik0xMjgwIDY2LjFjLTMuOCAwLTcuNi4zLTExLjQuOC0xOC4zLTMyLjYtNTkuNi00NC4yLTkyLjItMjUuOS0zLjUgMi02LjkgNC4zLTEwIDYuOS0yMi43LTQxLjctNzQuOS01Ny4yLTExNi42LTM0LjUtMTQuMiA3LjctMjUuOSAxOS4zLTMzLjggMzMuMy0uMi4zLS4zLjYtLjUuOC0xMi4yLTEuNC0yMy43IDUuOS0yNy43IDE3LjUtMTEuOS02LjEtMjUuOS02LjMtMzcuOS0uNi0yMS43LTMwLjQtNjQtMzcuNS05NC40LTE1LjctMTIuMSA4LjYtMjEgMjEtMjUuNCAzNS4yLTEwLjgtOS4zLTI0LjMtMTUtMzguNS0xNi4yLTguMS0yNC42LTM0LjYtMzgtNTkuMi0yOS45LTE0LjMgNC43LTI1LjUgMTYtMzAgMzAuMy00LjMtMS45LTguOS0zLjItMTMuNi0zLjgtMTMuNi00NS41LTYxLjUtNzEuNC0xMDctNTcuOGE4Ni4zOCA4Ni4zOCAwIDAgMC00My4yIDI5LjRjLTguNy0zLjYtMTguNy0xLjgtMjUuNCA0LjgtMjMuMS0yNC44LTYxLjktMjYuMi04Ni43LTMuMS03LjEgNi42LTEyLjUgMTQuOC0xNS45IDI0LTI2LjctMTAuMS01Ni45LS40LTcyLjggMjMuMy0yLjYtMi43LTUuNi01LjEtOC45LTYuOS0uNC0uMi0uOC0uNC0xLjItLjctLjYtMjUuOS0yMi00Ni40LTQ3LjktNDUuOC0xMS41LjMtMjIuNSA0LjctMzAuOSAxMi41LTE2LjUtMzMuNS01Ny4xLTQ3LjMtOTAuNi0zMC44LTIxLjkgMTEtMzYuMyAzMi43LTM3LjYgNTcuMS03LTIuMy0xNC41LTIuOC0yMS44LTEuNkM4NC44IDQ3IDU1LjcgNDAuNyAzNCA1NC44Yy01LjYgMy42LTEwLjMgOC40LTEzLjkgMTQtNi42LTEuNy0xMy4zLTIuNi0yMC4xLTIuNi0uMSAwIDAgMTkuOCAwIDE5LjhoMTI4MFY2Ni4xeiIgZmlsbC1vcGFjaXR5PSIuNSIvPjxwYXRoIGQ9Ik0xNS42IDg2SDEyODBWNDguNWMtMy42IDEuMS03LjEgMi41LTEwLjQgNC40LTYuMyAzLjYtMTEuOCA4LjUtMTYgMTQuNS04LjEtMS41LTE2LjQtLjktMjQuMiAxLjctMy4yLTM5LTM3LjMtNjguMS03Ni40LTY0LjktMjQuOCAyLTQ2LjggMTYuOS01Ny45IDM5LjMtMTkuOS0xOC41LTUxLTE3LjMtNjkuNCAyLjYtOC4yIDguOC0xMi44IDIwLjMtMTMuMSAzMi4zLS40LjItLjkuNC0xLjMuNy0zLjUgMS45LTYuNiA0LjQtOS40IDcuMi0xNi42LTI0LjktNDguMi0zNS03Ni4yLTI0LjQtMTIuMi0zMy40LTQ5LjEtNTAuNi04Mi41LTM4LjQtOS41IDMuNS0xOC4xIDkuMS0yNSAxNi41LTcuMS02LjktMTcuNS04LjgtMjYuNi01LTMwLjQtMzkuMy04Ny00Ni4zLTEyNi4yLTE1LjgtMTQuOCAxMS41LTI1LjYgMjcuNC0zMSA0NS40LTQuOS42LTkuNyAxLjktMTQuMiAzLjktOC4yLTI1LjktMzUuOC00MC4yLTYxLjctMzItMTUgNC44LTI2LjkgMTYuNS0zMS44IDMxLjUtMTQuOSAxLjMtMjkgNy4yLTQwLjMgMTctMTEuNS0zNy40LTUxLjItNTguNC04OC43LTQ2LjgtMTQuOCA0LjYtMjcuNyAxMy45LTM2LjcgMjYuNS0xMi42LTYtMjcuMy01LjctMzkuNy42LTQuMS0xMi4yLTE2LjItMTkuOC0yOS0xOC40LS4yLS4zLS4zLS42LS41LS45LTI0LjQtNDMuMy03OS40LTU4LjYtMTIyLjctMzQuMi0xMy4zIDcuNS0yNC40IDE4LjItMzIuNCAzMS4yQzk5LjggMTguNSA1MCAyOC41IDI1LjQgNjUuNGMtNC4zIDYuNC03LjUgMTMuMy05LjggMjAuNnoiLz48L2c+PC9zdmc+);
            background-size: cover;
            background-position: center top;
            bottom: 0;
            height: 10vw;
            z-index: 10;
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
    <section class="et_pb_bottom_inside_divider">

    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $('#blog').addClass('active');
    </script>
@endsection
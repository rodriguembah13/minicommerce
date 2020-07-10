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
        .medium-padding120 {
            padding: 120px 0; }
        @media (max-width: 800px) {
            .medium-padding120 {
                padding: 35px 0; } }
        .case-item {
            padding: 30px;
            background-color: #f7f9f9;
            transition: all .3s ease; }
        @media (max-width: 800px) {
            .case-item {
                margin-bottom: 30px; } }
        .case-item .case-item__thumb {
            margin-bottom: 34px;
            box-shadow: 0 16px 16px -8px rgba(0, 0, 0, 0.3); }
        .case-item .case-item__title {
            text-transform: uppercase;
            color: #2f2c2c;
            margin-bottom: 5px; }
        .case-item .case-item__cat a {
            display: inline-block;
            color: #acacac;
            font-size: 14px;
            transition: all .3s ease; }
        .case-item:hover {
            background-color: #4cc2c0; }
        .case-item:hover .case-item__title {
            color: #fff; }
        .case-item:hover .case-item__cat a {
            color: rgba(255, 255, 255, 0.5); }
        .case-item:hover .case-item__cat a:hover {
            color: #fff; }
        .case-item.big {
            padding-bottom: 60px; }
        .case-item.big .case-item__thumb {
            margin-bottom: 60px; }
        .case-item.big .case-item__cat a {
            font-size: 16px; }
        img {
            max-width: 100%;
            height: auto;
            display: inline-block;
            vertical-align: middle; }
        /*------------- #STUNNING-HEADER --------------*/
        .stunning-header {
            padding: 125px 0;
            background-position: center center; }
        @media (max-width: 768px) {
            .stunning-header {
                padding: 60px 0; } }
        .stunning-header .stunning-header-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 5;
            padding: 0 15px; }
        .stunning-header .stunning-header-content .stunning-header-title {
            color: #fff; }
        @media (max-width: 800px) {
            .stunning-header .stunning-header-content .stunning-header-title {
                font-size: 40px; } }
        @media (max-width: 640px) {
            .stunning-header .stunning-header-content .stunning-header-title {
                font-size: 36px; } }
        @media (max-width: 480px) {
            .stunning-header .stunning-header-content .stunning-header-title {
                font-size: 30px; } }
        @media (max-width: 360px) {
            .stunning-header .stunning-header-content .stunning-header-title {
                font-size: 24px; } }
        .stunning-header .stunning-header-content .breadcrumbs {
            margin-top: 40px;
            padding: 0; }
        @media (max-width: 570px) {
            .stunning-header .stunning-header-content .breadcrumbs {
                font-size: 12px; } }
        .stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item {
            display: inline-block; }
        .stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item a {
            text-transform: uppercase;
            color: white;
            opacity: .5;
            margin-right: 20px; }
        .stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item a:hover {
            opacity: 1; }
        .stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item a.c-gray + i {
            color: #acacac; }
        .stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item.active span {
            color: white;
            opacity: 1;
            text-decoration: underline; }
        .stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item.active span.c-primary {
            color: #4cc2c0; }
        .stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item i {
            margin-right: 20px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px; }
        .stunning-header .stunning-header-content .breadcrumbs .breadcrumbs-item:last-child i {
            display: none; }
        .stunning-header.with-photo {
            position: relative;
            padding: 280px 0 120px;
            background-size: cover; }

        .stunning-header-custom {
            color: #fff; }

        .stunning-header-custom .stunning-header-title,
        .stunning-header-custom span,
        .stunning-header-custom i,
        .stunning-header-custom a {
            color: inherit !important; }
    </style>
@endsection

@section('content')
    @include('front.pages.blog-slider')
    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Category: {{ $category->name }}</h1>
        </div>
    </div>

    <div class="container">
        <div class="row medium-padding120">
            <main class="main">

                <div class="row">
                    <div class="case-item-wrap">
                        @foreach($category->posts as $post)

                            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                        <img src="{{ $post->featured }}" alt="our case">
                                    </div>
                                    <a href="{{ route('blog_path', ['slug' => $post->slug ]) }}"><h6 class="case-item__title">{{ $post->title }}</h6></a>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>

            </main>
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
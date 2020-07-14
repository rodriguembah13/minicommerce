
@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
    @include('layouts.front.home-slider')
    @include('layouts.front.home-service')

    <hr />
    @include('mailchimp::mailchimp')
    <section class="et_pb_bottom_inside_divider">

    </section>
    <a id="button_top"></a>
@endsection
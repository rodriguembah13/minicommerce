@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="about"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('css')
    <style type="text/css">
        ::selection {
            background: #000;
            color: #fff;
        }
        h1, h2, h3, h4, h5, .h1, .h2, .h3, .h4, .h5 {
            font-weight: 300;
            color: #364d59;
        }   
        .conte {
            line-height: 1.7;
            color: #364d59 !important;
            font-weight: 300;
            font-size: 14px;
        }
    </style>
@endsection

@section('content')
   
    @include('front.pages.contact-slider')

    <div class="site-section bg-light conte" id="contact-section">
        <div class="container">
          <div class="row justify-content-center text-center">
          <div class="col-7 text-center mb-5">
            <h2>Contact Us Or Use This Form To Rent A Car</h2>
            <p style="padding-bottom: 30px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
          </div>
        </div>
          <div class="row">
            <div class="col-lg-8 mb-5" >
              <form action="{{route('post_contact_path')}}" method="post">

                    {{ csrf_field() }}

                <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                  <div class="col-md-6 mb-4 mb-lg-0">
                    <input type="text" class="form-control" name="prenom" required="required" placeholder="Nom" value="{{ old('prenom') }}">
                    {!! $errors->first('prenom', '<span class="help-block">:message</span>') !!}
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="name" placeholder="Nom" value="{{ old('name') }}">
                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                  </div>
                </div>
  
                <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                  <div class="col-md-12">
                    <input type="text" class="form-control" required="required" name="email" placeholder="Addresse E-mail" value="{{ old('email') }}">
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                  </div>
                </div>
  
                <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                  <div class="col-md-12">
                    <textarea name="message" id="" class="form-control" placeholder="Message." cols="30" rows="10">{{ old('message') }}</textarea>
                    {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
                  </div>
                </div>
                <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                  <div class="col-md-6 mr-auto">
                    <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5 btn-block" value="ENVOYER">
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-4 ml-auto">
              <div class="bg-white p-3 p-md-5">
                <h3 class="text-black mb-4">Contact Info</h3>
                <ul class="list-unstyled footer-link">
                  <li class="d-block mb-3">
                    <span class="d-block text-black">Addresse:</span>
                    <span>8180 Fin goudron bangue, Kotto - Douala, Cameroun</span></li>
                  <li class="d-block mb-3"><span class="d-block text-black">Phone: </span><span>{{ config('mpropre.phone_contact') }}</span></li>
                  <li class="d-block mb-3"><span class="d-block text-black">Email: </span><span>{{config('mpropre.admin_support_mail')}}</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        $('#contact').addClass('active');
    </script>
@endsection
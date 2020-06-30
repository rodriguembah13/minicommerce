@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="about"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('css')
    <style type="text/css">
        .et_pb_bottom_inside_divider {
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgdmlld0JveD0iMCAwIDEyODAgODYiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIHNsaWNlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIGZpbGw9IiMwMTcwYmYiPjxwYXRoIGQ9Ik0xMjgwIDY2LjFjLTMuOCAwLTcuNi4zLTExLjQuOC0xOC4zLTMyLjYtNTkuNi00NC4yLTkyLjItMjUuOS0zLjUgMi02LjkgNC4zLTEwIDYuOS0yMi43LTQxLjctNzQuOS01Ny4yLTExNi42LTM0LjUtMTQuMiA3LjctMjUuOSAxOS4zLTMzLjggMzMuMy0uMi4zLS4zLjYtLjUuOC0xMi4yLTEuNC0yMy43IDUuOS0yNy43IDE3LjUtMTEuOS02LjEtMjUuOS02LjMtMzcuOS0uNi0yMS43LTMwLjQtNjQtMzcuNS05NC40LTE1LjctMTIuMSA4LjYtMjEgMjEtMjUuNCAzNS4yLTEwLjgtOS4zLTI0LjMtMTUtMzguNS0xNi4yLTguMS0yNC42LTM0LjYtMzgtNTkuMi0yOS45LTE0LjMgNC43LTI1LjUgMTYtMzAgMzAuMy00LjMtMS45LTguOS0zLjItMTMuNi0zLjgtMTMuNi00NS41LTYxLjUtNzEuNC0xMDctNTcuOGE4Ni4zOCA4Ni4zOCAwIDAgMC00My4yIDI5LjRjLTguNy0zLjYtMTguNy0xLjgtMjUuNCA0LjgtMjMuMS0yNC44LTYxLjktMjYuMi04Ni43LTMuMS03LjEgNi42LTEyLjUgMTQuOC0xNS45IDI0LTI2LjctMTAuMS01Ni45LS40LTcyLjggMjMuMy0yLjYtMi43LTUuNi01LjEtOC45LTYuOS0uNC0uMi0uOC0uNC0xLjItLjctLjYtMjUuOS0yMi00Ni40LTQ3LjktNDUuOC0xMS41LjMtMjIuNSA0LjctMzAuOSAxMi41LTE2LjUtMzMuNS01Ny4xLTQ3LjMtOTAuNi0zMC44LTIxLjkgMTEtMzYuMyAzMi43LTM3LjYgNTcuMS03LTIuMy0xNC41LTIuOC0yMS44LTEuNkM4NC44IDQ3IDU1LjcgNDAuNyAzNCA1NC44Yy01LjYgMy42LTEwLjMgOC40LTEzLjkgMTQtNi42LTEuNy0xMy4zLTIuNi0yMC4xLTIuNi0uMSAwIDAgMTkuOCAwIDE5LjhoMTI4MFY2Ni4xeiIgZmlsbC1vcGFjaXR5PSIuNSIvPjxwYXRoIGQ9Ik0xNS42IDg2SDEyODBWNDguNWMtMy42IDEuMS03LjEgMi41LTEwLjQgNC40LTYuMyAzLjYtMTEuOCA4LjUtMTYgMTQuNS04LjEtMS41LTE2LjQtLjktMjQuMiAxLjctMy4yLTM5LTM3LjMtNjguMS03Ni40LTY0LjktMjQuOCAyLTQ2LjggMTYuOS01Ny45IDM5LjMtMTkuOS0xOC41LTUxLTE3LjMtNjkuNCAyLjYtOC4yIDguOC0xMi44IDIwLjMtMTMuMSAzMi4zLS40LjItLjkuNC0xLjMuNy0zLjUgMS45LTYuNiA0LjQtOS40IDcuMi0xNi42LTI0LjktNDguMi0zNS03Ni4yLTI0LjQtMTIuMi0zMy40LTQ5LjEtNTAuNi04Mi41LTM4LjQtOS41IDMuNS0xOC4xIDkuMS0yNSAxNi41LTcuMS02LjktMTcuNS04LjgtMjYuNi01LTMwLjQtMzkuMy04Ny00Ni4zLTEyNi4yLTE1LjgtMTQuOCAxMS41LTI1LjYgMjcuNC0zMSA0NS40LTQuOS42LTkuNyAxLjktMTQuMiAzLjktOC4yLTI1LjktMzUuOC00MC4yLTYxLjctMzItMTUgNC44LTI2LjkgMTYuNS0zMS44IDMxLjUtMTQuOSAxLjMtMjkgNy4yLTQwLjMgMTctMTEuNS0zNy40LTUxLjItNTguNC04OC43LTQ2LjgtMTQuOCA0LjYtMjcuNyAxMy45LTM2LjcgMjYuNS0xMi42LTYtMjcuMy01LjctMzkuNy42LTQuMS0xMi4yLTE2LjItMTkuOC0yOS0xOC40LS4yLS4zLS4zLS42LS41LS45LTI0LjQtNDMuMy03OS40LTU4LjYtMTIyLjctMzQuMi0xMy4zIDcuNS0yNC40IDE4LjItMzIuNCAzMS4yQzk5LjggMTguNSA1MCAyOC41IDI1LjQgNjUuNGMtNC4zIDYuNC03LjUgMTMuMy05LjggMjAuNnoiLz48L2c+PC9zdmc+);
            background-size: cover;
            background-position: center top;
            bottom: 0;
            height: 10vw;
            z-index: 10;
        }
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
          <div class="col-md-7 text-center mb-5">
            <h2>Contact Us Or Use This Form To Rent A Car</h2>
            <p style="padding-bottom: 30px;"></p>
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
    <section class="et_pb_bottom_inside_divider">

    </section>

@endsection
@section('js')
    <script type="text/javascript">
        $('#contact').addClass('active');
    </script>
@endsection
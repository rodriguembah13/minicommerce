@section('css')
    <style type="text/css">
    .section-3 {
    background: #fff url('../images/img_blog_3.jpg') no-repeat;
    background-size: cover;
    background-position: center;
    height: 560px;
    position: relative;
}
    </style>
@endsection

<div class="site-section section-3 " data-stellar-background-ratio="0.5" style="background-image: url('{{asset('images/img_blog_3.jpg')}}');">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-7 text-center mb-5">
        <h2 class="text-white scissors primary-color-icon text-center">Quality Haircut</h2>
        <p class="lead text-white mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam quo doloribus, suscipit libero, voluptate aliquam.</p>
        <p><a href="#" class="btn btn-primary">Contact Us Now</a></p>
      </div>
    </div>
  </div>
</div>
<footer class="footer-section footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <ul class="footer-menu">
                    <li> <a href="{{ route('accounts', ['tab' => 'profile']) }}">Your account</a>  </li>
                    <li> <a href="">Contact us</a>  </li>
                    <li> <a href="">Terms of service</a>  </li>
                </ul>

                <ul class="footer-social">
                    <li> <a href=""> <i class="fa fa-facebook" aria-hidden="true"></i>  </a> </li>
                    <li> <a href=""> <i class="fa fa-twitter" aria-hidden="true"></i>   </a> </li>
                    <li> <a href=""> <i class="fa fa-instagram" aria-hidden="true"></i>  </a> </li>
                    <li> <a href=""> <i class="fa fa-pinterest-p" aria-hidden="true"></i>  </a> </li>
                </ul>

                <p>&copy; <a href="{{ config('app.url') }}">{{ config('app.name') }}</a> | All Rights Reserved</p>

            </div>
        </div>
    </div>
</footer>
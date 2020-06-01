
<div class="row">
<div class="footer-distributed">

    <div class="footer-left">
        <img src="{{ asset('images/logo-m-propre.jpg')}}">
        <h3>About<span>mpropre</span></h3>

        <p class="footer-links">
            <a href="{{ route('home') }}">Home</a>
            |
            <a href="{{ route('blog_path') }}">Blog</a>
            |
            <a href="{{ route('about_path') }}">About</a>
            |
            <a href="{{ route('contact_path') }}">Contact</a>
        </p>

        <p class="footer-company-name">© 2019 Mpropre Pressing - Blanchisserie.</p>
    </div>

    <div class="footer-center">
        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Bedi, à 50 m de la pharmacie Santa Rosa, </span>Douala
            </p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>(+237) 698 00 77 51 </p>
        </div>
        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:contact@mpropre.net">contact@mpropre.net</a></p>
        </div>
    </div>
    <div class="footer-right">
        <p class="footer-company-about">
            <span>About the company</span>
            Chez Mr Propre, nous prenons le plus grand soin de vos vêtements. Nous avons à cœur d'offrir un service de qualité à chacune de nos prestations afin de satisfaire à chacun de vos besoins..</p>
        <div class="footer-icons">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
        </div>
    </div>
</div></div>
{{--<footer class="footer-section">
    <div class="container">
        <div class="row mb-10">
           
            <div class="col-md-6">
                <span class="et_pb_image_wrap1 ">
                <img src="{{ url('images/mr-propre.jpg') }}" alt="" style="width: 500px; height: 400px;">
                </span>
            </div>

                <div class="col-md-6">
                    <h3 class="text-center">CONTACTEZ-NOUS</h3>
                    <form action="{{route('post_contact_path')}}" method="POST">

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" required="required" value="{{ old('name') }}">
                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Votre e-mail" required="required" value="{{old('email')}}">
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group{{ $errors->has('message') ? 'has-error' : '' }}">
                            <textarea class="form-control" rows="10" cols="10" required="required" placeholder="Message" id="message" name="message">{{old('message')}}</textarea>
                            {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">ENVOYER &raquo;</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    <div class="row text-center">
        <strong>Copyright &copy; {{ date('Y') }} - {{ date('Y') + 1 }} <a href="{{ route('home') }}">{{config('app.name')}}</a>.</strong> All rights
        reserved.
    </div>
</footer>--}}
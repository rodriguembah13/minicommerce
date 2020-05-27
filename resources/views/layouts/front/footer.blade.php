

<footer class="footer-section">
    <div class="container">
        <div class="row mb-10">
           
            <div class="col-md-6">
                <span class="et_pb_image_wrap ">
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
        
</footer>
<div class="row text-center">
            <strong>Copyright &copy; {{ date('Y') }} - {{ date('Y') + 1 }} <a href="{{ route('home') }}">{{config('app.name')}}</a>.</strong> All rights
    reserved.
</div>

@section('css')
    <style type="text/css">
    .et_pb_image_wrap {
        display: inline-block;
        position: relative;
        max-width: 50%;
    }
    .img{
        max-width: 50%;
    }
    </style>
@endsection
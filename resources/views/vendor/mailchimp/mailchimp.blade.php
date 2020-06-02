<section class="subscribe-section t100">
    @if(session()->has('message'))
        <div class="box no-border">
            <div class="box-tools">
                <p class="alert alert-success alert-dismissible">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </p>
            </div>
        </div>
    @elseif(session()->has('error'))
        <div class="box no-border">
            <div class="box-tools">
                <p class="alert alert-danger alert-dismissible">
                    {{ session()->get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </p>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Rejoignez 100 000 personnes qui utilisent déjà </h3>
                <p>Nous effectuons des ramassages et des livraisons gratuits à domicile ou sur votre lieu de travail. <i class="fa fa-heart text-danger"></i></p>
                <form action="{{route('mailchimp.store')}}" class="form-inline form-field-section" method="post">
                    {{csrf_field()}}
                    <input type="email" name="email" class="newsletter-input subscribe-form-control" placeholder="Votre adresse email" value="">
                    <button type="submit" class="btn btn-subscribe">Souscrire</button>
                </form>
            </div>
        </div>
    </div>
</section>
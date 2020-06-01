@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="about"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('css')
    <style type="text/css">
    .et_pb_text_1 h2 {
            font-family: 'Aclonica',Helvetica,Arial,Lucida,sans-serif;
            font-weight: 700;
            font-size: 50px;
            color: #0170bf !important;
            line-height: 1.5em;
        }
    .scissors.text-center::after {
    left: 50%;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
}
.scissors::after {
    bottom: 0;
    left: 0;
    font-size: 22px;
    content: "\f0c4";
    font-family: 'icomoon';
    position: absolute;
    color: #ccc;
}
.serviceBox {
            background: #fff;
            font-family: 'Montserrat', sans-serif;
            text-align: center;
            padding: 0px 25px 40px;
            margin: 20px 0 0;
            border-radius: 20px;
            position: relative;
            transition: all 0.3s ease;
        }

        .serviceBox:hover {
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
        }

        .serviceBox:before,
        .serviceBox:after {
            content: "";
            background: linear-gradient(to top, #008d86, #01a2a6);
            width: 10px;
            border-radius: 0 100px 100px 0;
            position: absolute;
            top: 110px;
            bottom: 35px;
            left: 0;
        }

        .serviceBox:after {
            border-radius: 100px 0 0 100px;
            left: auto;
            right: 0;
        }

        .serviceBox .service-icon {
            color: #fff;
            background: linear-gradient(-45deg, #008d86 49%, #01a2a6 50%);
            font-size: 45px;
            line-height: 92px;
            width: 120px;
            height: 120px;
            margin: 0 auto;
            border-radius: 100px;
            border: 15px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transform: translateY(-20px);
            transition: all 0.3s ease;
        }

        .serviceBox:hover .service-icon i {
            transform: rotateX(360deg);
            transition: all 0.3s;
        }

        .serviceBox .title {
            color: #008d86;
            font-size: 17px;
            font-weight: 600;
            text-transform: uppercase;
            margin: 0 0 10px;
        }

        .serviceBox .description {
            color: #444;
            font-size: 14px;
            line-height: 24px;
            margin: 0;
        }

        .serviceBox.pink:before,
        .serviceBox.pink:after {
            background: linear-gradient(to top, #f53985 49%, #fd47a4);
        }

        .serviceBox.pink .service-icon {
            background: linear-gradient(-45deg, #f53985 49%, #fd47a4 50%);
        }

        .serviceBox.pink .title {
            color: #f53985;
        }

        .serviceBox.purple:before,
        .serviceBox.purple:after {
            background: linear-gradient(to top, #8b33cc 49%, #a23adc);
        }

        .serviceBox.purple .service-icon {
            background: linear-gradient(-45deg, #8b33cc 49%, #a23adc 50%);
        }

        .serviceBox.purple .title {
            color: #8b33cc;
        }

        .serviceBox.blue:before,
        .serviceBox.blue:after {
            background: linear-gradient(to top, #038bec 49%, #01aeee);
        }

        .serviceBox.blue .service-icon {
            background: linear-gradient(-45deg, #038bec 49%, #01aeee 50%);
        }

        .serviceBox.blue .title {
            color: #038bec;
        }

        @media only screen and (max-width: 990px) {
            .serviceBox {
                margin: 20px 0 50px;
            }
        }
        .service-box{
            position: relative;
            overflow: hidden;
            margin-bottom:10px;
            perspective:1000px;
            -webkit-perspective:1000px;
        }
        .service-icon{
            width: 100%;
            height: 220px;
            padding: 20px;
            text-align: center;
            transition: all .5s ease;
        }

        .service-content{
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            opacity: 0;
            width: 100%;
            height: 220px;
            padding: 20px;
            text-align: center;
            transition: all .5s ease;
            background-color: #474747;
            backface-visibility:hidden;
            transform-style: preserve-3d;
            -webkit-transform: translateY(110px) rotateX(-90deg);
            -moz-transform: translateY(110px) rotateX(-90deg);
            -ms-transform: translateY(110px) rotateX(-90deg);
            -o-transform: translateY(110px) rotateX(-90deg);
            transform: translateY(110px) rotateX(-90deg);
        }
        .service-box .service-icon .front-content{
            position: relative;
            top:80px;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .service-box .service-icon .front-content i {
            font-size: 28px;
            color: #fff;
            font-weight: normal;
        }

        .service-box .service-icon .front-content h3 {
            font-size: 15px;
            color: #fff;
            text-align: center;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        .service-box .service-content h3 {
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            margin-bottom:10px;
            text-transform: uppercase;
        }
        .service-box .service-content p {
            font-size: 13px;
            color: #b1b1b1;
            margin:0;
        }
        .yellow{background-color: #ffc000;}
        .orange{background-color: #fc7f0c;}
        .red{background-color: #e84b3a;}
        .grey{background-color: #474747;}
        .service-box:hover .service-icon{
            opacity: 0;
            -webkit-transform: translateY(-110px) rotateX(90deg);
            -moz-transform: translateY(-110px) rotateX(90deg);
            -ms-transform: translateY(-110px) rotateX(90deg);
            -o-transform: translateY(-110px) rotateX(90deg);
            transform: translateY(-110px) rotateX(90deg);
        }
        .service-box:hover .service-content {
            opacity: 1;
            -webkit-transform: rotateX(0);
            -moz-transform: rotateX(0);
            -ms-transform: rotateX(0);
            -o-transform: rotateX(0);
            transform: rotateX(0);
        }
    </style>
@endsection


@section('content')

  @include('front.pages.about-slider') 
  
  <div class="row justify-content-center  mb-5">
        <div class="col-md-12 text-center et_pb_text_1">
            <h2 class="scissors text-center">Notre savoir-faire</h2>
            <p class="mb-5 lea">Fondé sur une expérience forte de 7 ans, notre savoir-faire fait notre réussite mais il
                vous atteste également d’un gage de qualité <br>et vous garantit un soin optimal pour vos vêtements et vos
                textiles de la maison.
                Notre démarche se base sur une expertise en 5 étapes :</p>
        </div>

    </div>

    <div class="container">

    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="serviceBox">
                <div class="service-icon">
                    <span><i class="fa fa-globe"></i></span>
                </div>
                <h3 class="title">Le diagnostic minutieux</h3>
                <p class="description">Chaque article que vous nous confiez fait l’objet d’un diagnostic minutieux à sa
                    réception. Vos vêtements ou votre linge de maison sont analysés avec attention, nous évaluons la
                    nature des tâches ainsi que les éventuelles retouches à effectuer.
                    Nos experts vous conseillent ensuite sur les traitements adéquats.</p>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="serviceBox purple">
                <div class="service-icon">
                    <span><i class="fa fa-rocket"></i></span>
                </div>
                <h3 class="title">Le pré détachage</h3>
                <p class="description">Le nettoyage offre une action globale sur l’ensemble du vêtement. En amont, la
                    phase de détachage permet une action localisée et ciblée. Mr PROPRE a élaboré des produits adaptés
                    aux diverses substances de taches, à la couleur, et à la nature spécifique du tissu traité. Ainsi le
                    pré détachage permettra au lavage ou au nettoyage d’être le plus efficace possible
                    afin de vous garantir un résultat impeccable.</p>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="serviceBox blue">
                <div class="service-icon">
                    <span><i class="fa fa-clone"></i></span>
                </div>
                <h3 class="title">Le nettoyage ou le lavage</h3>
                <p class="description">Notre département recherche& développement a allié innovation et tradition dans
                    l’élaboration de ses différentes techniques et produits de nettoyage afin de convenir au mieux à la
                    nature du textile.</p>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="serviceBox purple">
                <div class="service-icon">
                    <span><i class="fa fa-flash"></i></span>
                </div>
                <h3 class="title">Le repassage</h3>
                <p class="description">Nous avons à cœur de vous rendre un article impeccablement repassé, selon une
                    technique qui respecte les fibres et le textile. Nos techniques font l’objet d’améliorations
                    continues sur la qualité de repassage de vos articles comme l’ergonomie de travail de nos
                    équipes.</p>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="serviceBox pink">
                <div class="service-icon">
                    <span><i class="fa fa-eye-slash"></i></span>
                </div>
                <h3 class="title">Le contrôle qualité</h3>
                <p class="description">Après l’ensemble des prestations réalisées, nous évaluons la qualité de nettoyage
                    et de repassage selon les standards les plus élevés afin de vous restituer des articles
                    impeccables.</p>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center  mb-5">
    <div class="col-md-12 text-center et_pb_text_1">
        <h2 class="scissors text-center">Nos engagements</h2>
        <p class="mb-5 lea">Chez Mr Propre, nous prenons le plus grand soin de vos vêtements.<br>
            Nous avons à cœur d\'offrir un service de qualité à chacune de nos prestations afin
            de satisfaire à chacun de vos besoins.</p>
        <p>Ne vous déplacez plus ! Profitez de notre système de ramassage et livraison de votre linge pour le réceptionner propre à domicile ou au bureau.</p>
    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6 ">
            <div class="service-box">
                <div class="service-icon yellow">
                    <div class="front-content">
                        <i class="fa fa-trophy"></i>
                        <h3>Des prix bas et transparents</h3>
                    </div>
                </div>
                <div class="service-content">
                    <h3>Des prix bas et transparents</h3>
                    <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 ">
            <div class="service-box">
                <div class="service-icon orange">
                    <div class="front-content">
                        <i class="fa fa-anchor"></i>
                        <h3>Des délais respectés</h3>
                    </div>
                </div>
                <div class="service-content">
                    <h3>Des délais respectés</h3>
                    <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="service-box ">
                <div class="service-icon red">
                    <div class="front-content">
                        <i class="fa fa-trophy"></i>
                        <h3>Une qualité garantie</h3>
                    </div>
                </div>
                <div class="service-content">
                    <h3>Une qualité garantie</h3>
                    <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="service-box">
                <div class="service-icon grey">
                    <div class="front-content">
                        <i class="fa fa-paper-plane-o"></i>
                        <h3>Un diagnostique adapté</h3>
                    </div>
                </div>
                <div class="service-content">
                    <h3>Un diagnostique adapté</h3>
                    <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure</p>
                </div>
            </div>
<<<<<<< HEAD
        </div>
    </div>
</div>

=======
@endsection
@section('js')
    <script type="text/javascript">
        $('#apropos').addClass('active');
    </script>
>>>>>>> 328e5e547b67d96ed0066a811796139b732ddef6
@endsection
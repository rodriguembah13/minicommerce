<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center  mb-5">
            <div class="col-md-12 text-center et_pb_text_1">
                <h2 class="scissors text-center">Services &amp; Pricing</h2>
                <p class="mb-5 lea">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel
                    earum maxime neque!</p>

                <p class="text-center">
                    <a href="#" class="btn btn-primary custom-prev">Prev</a>
                    <a href="#" class="btn btn-primary custom-next">Next</a>
                </p>
            </div>

        </div>
        <div class="row">
            <div class="col-12">

                <div class="nonloop-block-13 owl-carousel d-flex">
                    @include('front.packs.pack-list', ['packs' => $pack->where('status', 1)])
                </div>

            </div>
        </div>
    </div>
</div>
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
            Nous avons à cœur d'offrir un service de qualité à chacune de nos prestations afin
            de satisfaire à chacun de vos besoins.</p>
        <p>Ne vous déplacez plus ! Profitez de notre système de ramassage et livraison de votre linge pour le réceptionner propre à domicile ou au bureau.</p>
    </div>

</div>
{{--
<div class="container-fluid">

    <div class="col-md-3">
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <h3>
                        <a href="#" target="_blank">
                            Des délais respectés
                        </a>
                    </h3>
                    <p>.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-twitter-square" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <h3>
                        <a href="#" target="_blank">Des prix bas et transparents</a>
                    </h3>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <h3>
                        <a href="#" target="_blank">Une qualité garantie</a>
                    </h3>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <h4>Un diagnostique adapté</h4>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <h3>
                        <a href="#" target="_blank">Un diagnostique adapté</a>
                    </h3>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</div>--}}
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
        </div>
    </div>
</div>
{{--more service--}}
{{--<div class="site-section section-3" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_2.jpg');">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-7 text-center mb-5">
                <h2 class="text-white scissors primary-color-icon text-center">More Services</h2>
                <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam quo doloribus, suscipit libero, voluptate aliquam.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-bald"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Hair Cut</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-beard"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Facial &amp; Body Care</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-scissors"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Massages</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-hair-spray"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Hair Cut</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-hair"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Facial &amp; Body Care</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-barber-shop"></span>
              </span>
                    <div class="service-1-contents">
                        <h3>Massages</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>--}}
@section('css')
    <style type="text/css">
   .hero-section{
       background-color: #0170bf;
   }
        .item-1 .item-1-contents {
            padding: 30px;
            border: 1px solid #ccc;
            border-top-color: rgb(204, 204, 204);
            border-top-style: solid;
            border-top-width: 1px;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            border-top: none;
            position: relative;
        }

        .item-1 .item-1-contents h3::after {
            left: 0;
            bottom: 0;
            content: "";
            width: 40px;
            height: 2px;
            background: #dc3545;
            position: absolute;
        }

        .item-1 .item-1-contents h3 {
            position: relative;
            color: #dc3545;
            padding-bottom: 30px;
            margin-bottom: 30px;
        }

        .item-1 .item-1-contents ul {
            list-style: none;
            display: block;
            margin: 0;
            padding: 0;
        }

        .item-1 .item-1-contents ul li {
            list-style: none;
            margin: 0 0 10px 0;
            padding: 0;
            position: relative;
        }

        .item-1 .item-1-contents ul li .price {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 90px;
            flex: 0 0 90px;
            text-align: right;
        }

        .d-flex {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
        }

        .item-1 .item-1-contents ul li .quantity {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 90px;
            flex: 0 0 40px;
            text-align: left;
        }

        .section-3::before {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: "";
            background-color: rgba(0, 0, 0, 0.5);
        }

        .scissors.text-center::after {
            left: 50%;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
        }

        .scissors.primary-color-icon::after {
            color: #dc3545;
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

        .et_pb_top_inside_divider {
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDBweCIgdmlld0JveD0iMCAwIDEyODAgODYiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIHNsaWNlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnIGZpbGw9IiMwMTcwYmYiPjxwYXRoIGQ9Ik04MzMuOSAyNy41Yy01LjggMy4yLTExIDcuMy0xNS41IDEyLjItNy4xLTYuOS0xNy41LTguOC0yNi42LTUtMzAuNi0zOS4yLTg3LjMtNDYuMS0xMjYuNS0xNS41LTEuNCAxLjEtMi44IDIuMi00LjEgMy40QzY3NC40IDMzLjQgNjg0IDQ4IDY4OC44IDY0LjNjNC43LjYgOS4zIDEuOCAxMy42IDMuOCA3LjgtMjQuNyAzNC4yLTM4LjMgNTguOS0zMC41IDE0LjQgNC42IDI1LjYgMTUuNyAzMC4zIDMwIDE0LjIgMS4yIDI3LjcgNi45IDM4LjUgMTYuMkM4NDAuNiA0OS42IDg3NiAyOS41IDkxMC44IDM4Yy0yMC40LTIwLjMtNTEuOC0yNC42LTc2LjktMTAuNXpNMzg0IDQzLjljLTkgNS0xNi43IDExLjktMjIuNyAyMC4zIDE1LjQtNy44IDMzLjMtOC43IDQ5LjQtMi42IDMuNy0xMC4xIDkuOS0xOS4xIDE4LjEtMjYtMTUuNC0yLjMtMzEuMi42LTQ0LjggOC4zem01NjAuMiAxMy42YzIgMi4yIDMuOSA0LjUgNS43IDYuOSA1LjYtMi42IDExLjYtNCAxNy44LTQuMS03LjYtMi40LTE1LjYtMy4zLTIzLjUtMi44ek0xNzguNyA3YzI5LTQuMiA1Ny4zIDEwLjggNzAuMyAzNyA4LjktOC4zIDIwLjctMTIuOCAzMi45LTEyLjVDMjU2LjQgMS44IDIxNC43LTguMSAxNzguNyA3em0xNDYuNSA1Ni4zYzEuNSA0LjUgMi40IDkuMiAyLjUgMTQgLjQuMi44LjQgMS4yLjcgMy4zIDEuOSA2LjMgNC4yIDguOSA2LjkgNS44LTguNyAxMy43LTE1LjcgMjIuOS0yMC41LTExLjEtNS4yLTIzLjktNS42LTM1LjUtMS4xek0zMy41IDU0LjljMjEuNi0xNC40IDUwLjctOC41IDY1IDEzIC4xLjIuMi4zLjMuNSA3LjMtMS4yIDE0LjgtLjYgMjEuOCAxLjYuNi0xMC4zIDMuNS0yMC40IDguNi0yOS40LjMtLjYuNy0xLjIgMS4xLTEuOC0zMi4xLTE3LjItNzEuOS0xMC42LTk2LjggMTYuMXptMTIyOC45IDIuN2MyLjMgMi45IDQuNCA1LjkgNi4yIDkuMSAzLjgtLjUgNy42LS44IDExLjQtLjhWNDguM2MtNi40IDEuOC0xMi40IDUtMTcuNiA5LjN6TTExMjcuMyAxMWMxLjkuOSAzLjcgMS44IDUuNiAyLjggMTQuMiA3LjkgMjUuOCAxOS43IDMzLjUgMzQgMTMuOS0xMS40IDMxLjctMTYuOSA0OS42LTE1LjMtMjAuNS0yNy43LTU3LjgtMzYuOC04OC43LTIxLjV6IiBmaWxsLW9wYWNpdHk9Ii41Ii8+PHBhdGggZD0iTTAgMHY2NmM2LjggMCAxMy41LjkgMjAuMSAyLjYgMy41LTUuNCA4LjEtMTAuMSAxMy40LTEzLjYgMjQuOS0yNi44IDY0LjctMzMuNCA5Ni44LTE2IDEwLjUtMTcuNCAyOC4yLTI5LjEgNDguMy0zMiAzNi4xLTE1LjEgNzcuNy01LjIgMTAzLjIgMjQuNSAxOS43LjQgMzcuMSAxMy4xIDQzLjQgMzEuOCAxMS41LTQuNSAyNC40LTQuMiAzNS42IDEuMWwuNC0uMmMxNS40LTIxLjQgNDEuNS0zMi40IDY3LjYtMjguNiAyNS0yMSA2Mi4xLTE4LjggODQuNCA1LjEgNi43LTYuNiAxNi43LTguNCAyNS40LTQuOCAyOS4yLTM3LjQgODMuMy00NC4xIDEyMC43LTE0LjhsMS44IDEuNWMzNy4zLTMyLjkgOTQuMy0yOS4zIDEyNy4yIDggMS4yIDEuMyAyLjMgMi43IDMuNCA0LjEgOS4xLTMuOCAxOS41LTEuOSAyNi42IDUgMjQuMy0yNiA2NS0yNy4zIDkxLTMuMS41LjUgMSAuOSAxLjUgMS40IDEyLjggMy4xIDI0LjQgOS45IDMzLjQgMTkuNSA3LjktLjUgMTUuOS40IDIzLjUgMi44IDctLjEgMTMuOSAxLjUgMjAuMSA0LjcgMy45LTExLjYgMTUuNS0xOC45IDI3LjctMTcuNS4yLS4zLjMtLjYuNS0uOSAyMi4xLTM5LjIgNzAuNy01NC43IDExMS40LTM1LjYgMzAuOC0xNS4zIDY4LjItNi4yIDg4LjYgMjEuNSAxOC4zIDEuNyAzNSAxMC44IDQ2LjUgMjUuMSA1LjItNC4zIDExLjEtNy40IDE3LjYtOS4zVjBIMHoiLz48L2c+PC9zdmc+);
            background-size: cover;
            background-position: center top;
            top: 0;
            height: 100px;
            z-index: 1;
        }

        #logo {
            max-height: 100%;
        }

        #logo {
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
            margin-bottom: 0;
            max-height: 54%;
            display: inline-block;
            float: none;
            vertical-align: middle;
            -webkit-transform: translateZ(0);
        }

        .navbar-brand {
            height: 100px !important;
        }

        .card {
            position: relative;
            border-radius: 10px;
        }

       /* .card .icon {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #0170bf;
            transition: 0.7s;
            z-index: 1;
        }

        .card:nth-child(1) .icon {
            background: #0170bf;
        }

       .card:nth-child(2) .icon {
            background: #6eadd4;
        }

      .card:nth-child(3) .icon {
            background: #4aada9;
        }


      .card .icon .fa {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 80px;
            transition: 0.7s;
            color: #fff;
        }

        i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 80px;
            transition: 0.7s;
            color: #fff;
        }

        .card .face {
            width: 300px;
            height: 200px;
            transition: 0.5s;
        }

       .card .face.face1 {
            position: relative;
            background: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
            transform: translateY(100px);
        }

     .card:hover .face.face1 {
            background: #0170bf;
            transform: translateY(0px);
        }

      .card .face.face1 .content {
            opacity: 1;
            transition: 0.5s;
        }

       .card:hover .face.face1 .content {
            opacity: 1;
        }

    .card .face.face1 .content i {
            max-width: 100px;
        }

      .card .face.face2 {
            position: relative;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
            transform: translateY(-100px);
        }

.card:hover .face.face2 {
            transform: translateY(0);
        }

         .card .face.face2 .content p {
            margin: 0;
            padding: 0;
            text-align: center;
            color: #414141;
        }

         .card .face.face2 .content h3 {
            margin: 0 0 10px 0;
            padding: 0;
            color: #fff;
            font-size: 24px;
            text-align: center;
            color: #414141;
        }

      a {
            text-decoration: none;
            color: #414141;
        }*/
        /*service box 2*/
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
        .et_pb_text_1 h2 {
            font-family: 'Aclonica',Helvetica,Arial,Lucida,sans-serif;
            font-weight: 700;
            font-size: 50px;
            color: #0170bf !important;
            line-height: 1.5em;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">

    </script>
@endsection

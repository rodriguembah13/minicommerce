@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="about"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('css')
    <style type="text/css">
        /* Base */
        .site-section {
  padding: 2.5em 0; }
  @media (min-width: 768px) {
    .site-section {
      padding: 5em 0; } }
  .site-section.site-section-sm {
    padding: 4em 0; }
    .site-section {
  padding: 7rem 0; }
  @media (max-width: 991.98px) {
    .site-section {
      padding: 3rem 0; } }
      .site-section {
  padding: 2.5em 0; }
  @media (min-width: 768px) {
    .site-section {
      padding: 5em 0; } }
  .site-section.site-section-sm {
    padding: 4em 0; }
    .site-section {
  padding: 7rem 0; }
  @media (max-width: 991.98px) {
    .site-section {
      padding: 3rem 0; } }
    </style>
@endsection


@section('content')
            <div class="site-section">
                <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="img-years">
                            <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                            <div class="year">
                            <span>3 <span>years in <br>excellent service</span></span>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-5 ml-auto pl-lg-5 text-center">
                    <h3 class="scissors text-center">High Quality Hair Styles</h3>
                    <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>
                    <p><a href="#" class="btn btn-primary">Learn More</a></p>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="site-section bg-light">
                <div class="container">
                <div class="row justify-content-center text-center mb-5 section-2-title">
                    <div class="col-md-6">
                    <h3 class="scissors text-center">Meet Our Team</h3>
                    <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>
                    </div>
                </div>
                <div class="row align-items-stretch">

                    <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">
                        
                        <img src="images/person_1.jpg" alt="Image"
                        class="img-fluid">
                    
                        <div class="post-entry-1-contents">
                        <span class="meta">Founder</span>
                        <h2>James Doe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">
                        
                        <img src="images/person_2.jpg" alt="Image"
                        class="img-fluid">
                    
                        <div class="post-entry-1-contents">
                        <span class="meta">Founder</span>
                        <h2>James Doe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">
                        
                        <img src="images/person_3.jpg" alt="Image"
                        class="img-fluid">
                    
                        <div class="post-entry-1-contents">
                        <span class="meta">Founder</span>
                        <h2>James Doe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">
                        
                        <img src="images/person_4.jpg" alt="Image"
                        class="img-fluid">
                    
                        <div class="post-entry-1-contents">
                        <span class="meta">Founder</span>
                        <h2>James Doe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">
                        
                        <img src="images/person_5.jpg" alt="Image"
                        class="img-fluid">
                    
                        <div class="post-entry-1-contents">
                        <span class="meta">Founder</span>
                        <h2>James Doe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1">
                        
                        <img src="images/person_1.jpg" alt="Image"
                        class="img-fluid">
                    
                        <div class="post-entry-1-contents">
                        <span class="meta">Founder</span>
                        <h2>James Doe</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, sapiente.</p>
                        </div>
                    </div>
                    </div>


                </div>
                </div>
            </div>
@endsection
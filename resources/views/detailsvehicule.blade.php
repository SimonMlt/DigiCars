@extends('layouts.app')

@section('content')
<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url({{asset('assets/images/banner-image-1-1920x500.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2><em>{{ $vehicules->prix }} €</em></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->

<!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <br>
        <br>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('assets/images/car-image-1-1200x600.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('assets/images/car-image-1-1200x600.jpg')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('assets/images/car-image-1-1200x600.jpg')}}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <br>
        <br>

        <div class="row" id="tabs">
            <div class="col-lg-4">
                <ul>
                    <li><a href='#tabs-1'><i class="fa fa-cog"></i> Points clés</a></li>
                    <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Description</a></li>
                    <li><a href='#tabs-3'><i class="fa fa-plus-circle"></i> Options</a></li>
                    <li><a href='#tabs-4'><i class="fa fa-phone"></i> Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <section class='tabs-content' style="width: 100%;">
                    <article id='tabs-1'>
                        <h4>Points clés</h4>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Marque</label>

                                <p>{{ $vehicules->marque }}</p>
                            </div>

                            <div class="col-sm-6">
                                <label> Modèle</label>

                                <p>{{ $vehicules->modele }}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Année</label>

                                <p>{{ $vehicules->annee }}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Energie</label>

                                <p>{{ $vehicules->energie }}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Puissance DIN</label>

                                <p>{{ $vehicules->puissancedin }} ch</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Puissance fiscale</label>

                                <p>{{ $vehicules->puissancefiscale }} CV</p>
                            </div>


                            <div class="col-sm-6">
                                <label>Boîte de vitesse</label>

                                <p>{{ $vehicules->bdv }}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Nombre de places</label>

                                <p>{{ $vehicules->places }}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Nombre de portes</label>

                                <p>{{ $vehicules->portes }}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Couleur extérieure</label>

                                <p>{{ $vehicules->ce }}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Couleur intérieure</label>

                                <p>{{ $vehicules->ci }}</p>
                            </div>
                        </div>
                    </article>
                    <article id='tabs-2'>
                        <h4>Description</h4>

                        <p>- Colour coded bumpers <br> - Tinted glass <br> - Immobiliser <br> - Central locking - remote <br> - Passenger airbag <br> - Electric windows <br> - Rear head rests <br> - Radio <br> - CD player <br> - Ideal first car <br> - Warranty <br> - High level brake light <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco                         laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat                     cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </article>
                    <article id='tabs-3'>
                        <h4>Options</h4>

                        <div class="row">
                            <div class="col-sm-6">
                                <p>ABS</p>
                            </div>
                            <div class="col-sm-6">
                                <p>Leather seats</p>
                            </div>
                            <div class="col-sm-6">
                                <p>Power Assisted Steering</p>
                            </div>
                            <div class="col-sm-6">
                                <p>Electric heated seats</p>
                            </div>
                            <div class="col-sm-6">
                                <p>New HU and AU</p>
                            </div>
                            <div class="col-sm-6">
                                <p>Xenon headlights</p>
                            </div>
                        </div>
                    </article>
                    <article id='tabs-4'>
                        <h4>Contact</h4>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Name</label>

                                <p>John Smith</p>
                            </div>
                            <div class="col-sm-6">
                                <label>Phone</label>

                                <p>123-456-789 </p>
                            </div>
                            <div class="col-sm-6">
                                <label>Mobile phone</label>
                                <p>456789123 </p>
                            </div>
                            <div class="col-sm-6">
                                <label>Email</label>
                                <p><a href="#">john@carsales.com</a></p>
                            </div>
                        </div>
                    </article>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- ***** Fleet Ends ***** -->
@endsection

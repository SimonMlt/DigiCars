@extends('layouts.app')

@section('content')
    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action"
             style="background-image: url({{asset('storage/files/'.$vehicules->filename)}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2><em>{{ $vehicules->prix }} €</em></h2>
                        <p><em>{{ $vehicules->marque }} - {{ $vehicules->modele }}</em></p>
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

            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'><i class="fa fa-cog"></i> Points clés</a></li>
                        <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Description</a></li>
                        <li><a href='#tabs-3'><i class="fa fa-plus-circle"></i> Options</a></li>
                        <li><a href='#tabs-4'><i class="fa fa-phone"></i> Contact -  Réservation</a></li>
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

                            <p>{{ $vehicules->description }}</p>
                        </article>
                        <article id='tabs-3'>
                            <h4>Options</h4>

                            <div class="row">
                                <div class="col-sm-6">
                                    <p>{{ $vehicules->option1 }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <p>{{ $vehicules->option2 }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <p>{{ $vehicules->option3 }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <p>{{ $vehicules->option4 }}</p>
                                </div>
                            </div>
                        </article>
                        <article id='tabs-4'>
                            <h4>Contact</h4>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Nom</label>

                                    <p>John Smith</p>
                                </div>
                                <div class="col-sm-6">
                                    <label>Numéro de téléphone</label>

                                    <p>01 02 03 04 05</p>
                                </div>
                                <div class="col-sm-6">
                                    <label>Email</label>
                                    <p><a href="#">john@concessionnaire.com</a></p>
                                </div>
                            </div>

                            <h4>Réservation</h4>

                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{ url('reservations/dates/'.$vehicules->id) }}"><button>Réserver un créneau</button></a>
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

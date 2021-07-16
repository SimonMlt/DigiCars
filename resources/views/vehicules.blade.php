@extends('layouts.app')

@section('content')
{{--    <div class="container mt-5">--}}
{{--                <div class="row">--}}
{{--                    @foreach ($vehicules as $vehicule)--}}
{{--                        <div class="col-sm-4">--}}
{{--                            <div class="card mt-5 mb-5" style="width: 18rem;">--}}
{{--                                <div class="card-body">--}}
{{--                                    <h5 class="card-title text-center">{{ $vehicule->marque }}</h5>--}}
{{--                                    <p class="card-text">{{ $vehicule->modele }}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--    </div>--}}

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('assets/images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Nos <em>Voitures</em></h2>
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
            <div class="contact-form">
                <form action="{{ route('vehicules') }}" method="GET" id="contact">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Marque:</label>

                                <select name="marque">
                                    <option value="">-- Tous --</option>
                                    @foreach(\App\Vehicules::select('marque')->distinct()->get() as $marque){
                                        <option value="{{ $marque->marque }}">{{ $marque->marque }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Boîte de vitesse:</label>

                                <select name="bdv">
                                    <option value="">-- Tous --</option>
                                    @foreach(\App\Vehicules::select('bdv')->distinct()->get() as $bdv){
                                    <option value="{{ $bdv->bdv }}">{{ $bdv->bdv }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Nombre de portes:</label>

                                <select name="portes">
                                    <option value="">-- Tous --</option>
                                    @foreach(\App\Vehicules::select('portes')->distinct()->get() as $portes){
                                    <option value="{{ $portes->portes }}">{{ $portes->portes }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Nombre de places:</label>

                                <select name="places">
                                    <option value="">-- Tous --</option>
                                    @foreach(\App\Vehicules::select('places')->distinct()->get() as $places){
                                    <option value="{{ $places->places }}">{{ $places->places }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Prix:</label>

                                <select name="prix">
                                    <option value="">-- Tous --</option>
                                    <option value="more-expensive">Plus cher</option>
                                    <option value="less-expensive">Moins cher</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 offset-sm-4">
                        <div class="main-button text-center">
                            <button type="submit">Filtrer</button>
                        </div>
                    </div>
                    <br>
                    <br>
                </form>
            </div>

            <div class="row">
                @foreach ($vehicules as $vehicule)
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="{{ asset('storage/files/'.$vehicule->filename) }}" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                {{ $vehicule->prix }} €
                            </span>

                            <h4>{{ $vehicule->marque }} - {{ $vehicule->modele }}</h4>

                            <p>
                                <i class="fa fa-calendar"></i> {{ $vehicule->annee }} &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i> {{ $vehicule->puissancedin }} cc &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i> {{ $vehicule->bdv }} &nbsp;&nbsp;&nbsp;
                            </p>

                            <ul class="social-icons">
                                <li><a href="{{ url('vehicules/details/'.$vehicule->id) }}">En savoir +</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <br>

            <nav>
                <ul class="pagination pagination-lg justify-content-center">
                    {{ $vehicules->links() }}
                </ul>
            </nav>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
@endsection

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
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
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
                <form action="#" id="contact">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Marque:</label>

                                <select>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Modèle:</label>

                                <select>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Prix:</label>

                                <select>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Boîte de vitesse:</label>

                                <select>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Nombre de portes:</label>

                                <select>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Nombre de places:</label>

                                <select>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                    <option value="">-- Tous --</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 offset-sm-4">
                        <div class="main-button text-center">
                            <a href="#">Search</a>
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
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
@endsection

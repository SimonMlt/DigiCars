@extends('layouts.app')

@section('section')

    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/video.mp4" type="video/mp4"/>
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Meilleur concessionnaire de vente de voitures électriques</h6>
                <h2><em>DIGICARS</em> à Paris!</h2>
            </div>
        </div>
    </div>
    <!-- ***** Cars Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Les <em>coups de coeurs</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>La voiture
                            de vos rêves est ici,
                            au meilleur prix garanti.</p>
                    </div>
                </div>
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
            </div>

            <br>

            <div class="main-button text-center">
                <a href="{{ route('vehicules') }}">Voir plus</a>
            </div>
        </div>
    </section>
    <!-- ***** Cars Ends ***** -->

    <section class="section section-bg" id="schedule"
             style="background-image: url(assets/images/about-fullscreen-1-1920x700.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>En savoir plus <em>sur nous</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor,
                            ultricies fermentum massa consequat eu.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content text-center">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore deleniti voluptas enim!
                            Provident consectetur id earum ducimus facilis, aspernatur hic, alias, harum rerum velit
                            voluptas, voluptate enim! Eos, sunt, quidem.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto nulla quo cum officia
                            laboriosam. Amet tempore, aliquid quia eius commodi, doloremque omnis delectus laudantium
                            dolor reiciendis non nulla! Doloremque maxime quo eum in culpa mollitia similique eius
                            doloribus voluptatem facilis! Voluptatibus, eligendi, illum. Distinctio, non!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Testimonials Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Notre <em>équipe</em></h2>
                        <img src="assets/images/line-dec.png" alt="waves">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem incidunt alias minima
                            tenetur nemo necessitatibus?</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="First One">
                            </div>
                            <div class="right-content">
                                <h4>John Doe</h4>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime
                                        voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em>
                                </p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="second one">
                            </div>
                            <div class="right-content">
                                <h4>John Doe</h4>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime
                                        voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="fourth muscle">
                            </div>
                            <div class="right-content">
                                <h4>John Doe</h4>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime
                                        voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em>
                                </p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon.png" alt="training fifth">
                            </div>
                            <div class="right-content">
                                <h4>John Doe</h4>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime
                                        voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Testimonials Item End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action"
             style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Envoyez nous un <em>message</em></h2>
                        <p>Ou appelez-nous au 01 02 03 04 05.
                            <br>Horraires d’ouverture : du lundi au vendredi de 9h à 19h30 et le samedi de 9h à 18h.
                            <br><span style="font-size: 9px">Appel non surtaxé. Prix d’un appel local.</span></p>
                        <div class="main-button">
                            <a href="{{ route('contact') }}">Contactez nous</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
@endsection


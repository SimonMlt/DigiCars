@extends('layouts.app')

@section('content')
    <section class="section" id="trainers">
        <div class="container" style="padding-top: 100px">
            <form method="POST" action="{{ url('admin/vehicules/edit/'.$vehicules->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row" id="tabs">
                    <div class="col-lg-4">
                        <ul>
                            <li><a href='#tabs-1'><i class="fa fa-cog"></i> Points clés</a></li>
                            <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Description</a></li>
                            <li><a href='#tabs-3'><i class="fa fa-plus-circle"></i> Options</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8">
                        <section class='tabs-content' style="width: 100%;">
                            <article id='tabs-1'>
                                <h4>Points clés</h4>

                                <div class="row">
{{--                                    <div class="col-sm-6">--}}
{{--                                        <label>Aperçu du véhicule</label>--}}

{{--                                        <input type="file" name="filename" required>--}}
{{--                                    </div>--}}

                                    <div class="col-sm-6">
                                        <label>Marque</label>

                                        <input type="text" class="form-control" name="marque" value="{{ $vehicules->marque }}" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label> Modèle</label>

                                        <input type="text" class="form-control" name="modele" value="{{ $vehicules->modele }}" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Année</label>

                                        <input type="text" class="form-control" name="annee" value="{{ $vehicules->annee }}" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Energie</label>

                                        <input type="text" class="form-control" name="energie" value="{{ $vehicules->energie }}" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Puissance DIN</label>

                                        <input type="text" class="form-control" name="puissancedin" value="{{ $vehicules->puissancedin }}" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Puissance fiscale</label>

                                        <input type="text" class="form-control" name="puissancefiscale" value="{{ $vehicules->puissancefiscale }}" required>
                                    </div>


                                    <div class="col-sm-6">
                                        <label>Boîte de vitesse</label>

                                        <input type="text" class="form-control" name="bdv" value="{{ $vehicules->bdv }}" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Nombre de places</label>

                                        <input type="text" class="form-control" name="places" value="{{ $vehicules->places }}" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Nombre de portes</label>

                                        <input type="text" class="form-control" name="portes" value="{{ $vehicules->portes }}" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Couleur extérieure</label>

                                        <input type="text" class="form-control" name="ce" value="{{ $vehicules->ce }}" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Couleur intérieure</label>

                                        <input type="text" class="form-control" name="ci" value="{{ $vehicules->ci }}" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Prix</label>

                                        <input type="text" class="form-control" name="prix" value="{{ $vehicules->prix }}" required>
                                    </div>
                                </div>
                            </article>
                            <article id='tabs-2'>
                                <h4>Description</h4>

                                <textarea class="form-control" rows="10" cols="33" name="description" required>{{ $vehicules->description }}</textarea>
                            </article>
                            <article id='tabs-3'>
                                <h4>Options</h4>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Option 1</label>

                                        <input type="text" class="form-control" id="option1" name="option1" value="{{ $vehicules->option1 }}">
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Option 2</label>

                                        <input type="text" class="form-control" id="option2" name="option2" value="{{ $vehicules->option2 }}">
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Option 3</label>

                                        <input type="text" class="form-control" id="option3" name="option3" value="{{ $vehicules->option3 }}">
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Option 4</label>

                                        <input type="text" class="form-control" id="option4" name="option4" value="{{ $vehicules->option4 }}">
                                    </div>
                                </div>
                            </article>
                        </section>
                    </div>
                </div>
                <button style="margin-top: 20px" type="submit" class="btn btn-primary float-right">Mettre à jour</button>
            </form>
            <form action="{{ url('admin/vehicules/delete/'.$vehicules->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button style="margin-top: 20px" class="btn btn-danger mb-4 mr-4 float-right" type="submit">Supprimer</button>
            </form>
        </div>
    </section>
@endsection


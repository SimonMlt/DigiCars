@extends('layouts.app')

@section('content')
    <section class="section" id="trainers">
        <div class="container" style="padding-top: 100px">
            <form method="POST" action="{{ url('admin/vehicules/create') }}" enctype="multipart/form-data">
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
                                    <div class="col-sm-6">
                                        <label>Aperçu du véhicule</label>

                                        <input type="file" name="filename" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Marque</label>

                                        <input type="text" class="form-control" name="marque" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label> Modèle</label>

                                        <input type="text" class="form-control" name="modele" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Année</label>

                                        <input type="text" class="form-control" name="annee" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Energie</label>

                                        <input type="text" class="form-control" name="energie" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Puissance DIN</label>

                                        <input type="text" class="form-control" name="puissancedin" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Puissance fiscale</label>

                                        <input type="text" class="form-control" name="puissancefiscale" required>
                                    </div>


                                    <div class="col-sm-6">
                                        <label>Boîte de vitesse</label>

                                        <input type="text" class="form-control" name="bdv" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Nombre de places</label>

                                        <input type="text" class="form-control" name="places" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Nombre de portes</label>

                                        <input type="text" class="form-control" name="portes" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Couleur extérieure</label>

                                        <input type="text" class="form-control" name="ce" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Couleur intérieure</label>

                                        <input type="text" class="form-control" name="ci" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Prix</label>

                                        <input type="text" class="form-control" name="prix" required>
                                    </div>
                                </div>
                            </article>
                            <article id='tabs-2'>
                                <h4>Description</h4>

                                <textarea class="form-control" rows="10" cols="33" name="description" required></textarea>
                            </article>
                            <article id='tabs-3'>
                                <h4>Options</h4>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Option 1</label>

                                        <input type="text" class="form-control" id="option1" name="option1">
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Option 2</label>

                                        <input type="text" class="form-control" id="option2" name="option2">
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Option 3</label>

                                        <input type="text" class="form-control" id="option3" name="option3">
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Option 4</label>

                                        <input type="text" class="form-control" id="option4" name="option4">
                                    </div>
                                </div>
                            </article>
                        </section>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Ajouter</button>
            </form>
        </div>
    </section>
@endsection

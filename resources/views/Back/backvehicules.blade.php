@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 style="padding: 20px 0">Nos véhicules</h1>
        <div style="padding-top: 20px;padding-bottom: 20px;">
            <a href="{{ url('admin/vehicules/create/') }}"><button style="float: left;margin-left: 20px;" class="submit">Ajouter un véhicule</button></a><br><br>
        </div>
        <table style="z-index: -10"
               class="table"
               data-toggle="table"
               data-pagination="true"
               data-search="true"
               data-show-columns="true"
               data-toolbar="#toolbar"
        >
            <thead>
            <tr>
                <th data-field="marque" data-sortable="true">Marque</th>
                <th data-field="modele" data-sortable="true">Modèle</th>
                <th data-field="annee" data-sortable="true">Année</th>
                <th data-field="energie" data-sortable="true">Energie</th>
                <th data-field="finition" data-sortable="true">Finition</th>
                <th data-field="bdv" data-sortable="true">Boîte de vitesse</th>
                <th data-field="ce" data-sortable="true">Couleur extérieure</th>
                <th data-field="ci" data-sortable="true">Couleur intérieure</th>
                <th data-field="puissancedin" data-sortable="true">Puissance DIN</th>
                <th data-field="puissancefiscale" data-sortable="true">Puissance fiscale</th>
                <th data-field="portes" data-sortable="true">Nombres de portes</th>
                <th data-field="places" data-sortable="true">Nombre de places</th>
                <th data-field="edit">Modifier</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($vehicules as $vehicule)
                <tr>
                    <td>{{ $vehicule->marque }}</td>
                    <td>{{ $vehicule->modele }}</td>
                    <td>{{ $vehicule->annee }}</td>
                    <td>{{ $vehicule->energie }}</td>
                    <td>{{ $vehicule->finition }}</td>
                    <td>{{ $vehicule->bdv }}</td>
                    <td>{{ $vehicule->ce }}</td>
                    <td>{{ $vehicule->ci }}</td>
                    <td>{{ $vehicule->puissancedin }} ch</td>
                    <td>{{ $vehicule->puissancefiscale }} CV</td>
                    <td>{{ $vehicule->portes }}</td>
                    <td>{{ $vehicule->places }}</td>
                    <td><a class="btn btn-primary float-right mt-4" href="{{ url('admin/vehicules/edit/'.$vehicule->id) }}" >Modifier</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

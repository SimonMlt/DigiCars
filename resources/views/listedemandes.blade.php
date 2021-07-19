@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 style="padding: 20px 0">Mes demandes</h1>
        <div style="padding-top: 20px;padding-bottom: 20px;">
            <a href="{{ url('demandes/create') }}"><button style="float: left;margin-left: 20px;" class="btn btn-primary">Créer une demande</button></a><br><br>
        </div>
        <table class="table" style="text-align: center">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Objet</th>
                <th scope="col">Message</th>
                <th scope="col">Statut</th>
                <th scope="col">Réponse</th>
            </tr>
            </thead>
            <tbody>
            @foreach($demandes as $demande)
                <tr>
                    <th>{{ $demande->id }}</th>
                    <th>{{ $demande->name }}</th>
                    <th>{{ $demande->email }}</th>
                    <th>{{ $demande->object }}</th>
                    <th>{{ $demande->message }}</th>
                    <th>{{ $demande->status }}</th>
                    <th>{{ $demande->answer }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

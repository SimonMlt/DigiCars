@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 style="padding: 20px 0">Liste des demandes</h1>

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
                <th></th>
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
                    <th><a href="{{ url('admin/demandes/answer/'.$demande->id) }}">Répondre</a></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 100px">

        <table class="table" style="text-align: center">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Objet</th>
                <th scope="col">Message</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $demandes->id }}</th>
                    <th>{{ $demandes->name }}</th>
                    <th>{{ $demandes->email }}</th>
                    <th>{{ $demandes->object }}</th>
                    <th>{{ $demandes->message }}</th>
                </tr>
            </tbody>
        </table>
        <form method="POST" action="{{ url('admin/demandes/answer/'.$demandes->id) }}">
            @csrf
            <div class="col-md-6 offset-md-3">
                <div class="form-group">
                    <div class="form-group">
                        <label>Nom : *</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $demandes->name }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Répondre</button>
            </div>
        </form>
    </div>
@endsection

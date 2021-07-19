@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 100px">
        <h1 style="padding: 20px 0">Créer une demande</h1>
        <form method="POST" action="{{ url('demandes/create') }}">
            @csrf
            <div class="col-md-6 offset-md-3">
                <input type="hidden" name="id_client" value="{{ Auth::id() }}">

                <input type="hidden" name="status" value="En cours de traitement">

                <div class="form-group">
                    <label>Nom : *</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email : *</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>Objet : *</label>
                    <input type="text" name="object" id="object" class="form-control">
                </div>

                <div class="form-group">
                    <label>Message : *</label>
                    <textarea name="message" id="message" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary float-right">Envoyer ma demande</button>
            </div>
        </form>
    </div>
@endsection

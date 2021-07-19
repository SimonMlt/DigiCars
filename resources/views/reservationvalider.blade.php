@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="padding-top:100px;">
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="card-title">Rendez-vous validé</h2>
            </div>
        </div>
        <div class="row">
            @if(Auth::user()->is_admin)
                <div class="col-sm-4 text-center">
            @else
                <div class="col-sm-6 text-center">
            @endif
                    <div class="card mt-5 mb-5" style="width: 80%;margin-left:10%;">
                        <div class="card-body">
                            
                            <a href="/">Accueil</a>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->is_admin)
                <div class="col-sm-4 text-center">
                    <div class="card mt-5 mb-5" style="width: 80%;margin-left:10%;">
                        <div class="card-body">
                            <a href="/admin/backreservations/dates">Gestion des réservations</a>
                        </div>
                    </div>
                </div>
                @endif
                @if(Auth::user()->is_admin)
                    <div class="col-sm-4 text-center">
                @else
                    <div class="col-sm-6 text-center">
                @endif
                    <div class="card mt-5 mb-5" style="width: 80%;margin-left:10%;">
                        <div class="card-body">
                            <a href="/reservations/dates">Réservations</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

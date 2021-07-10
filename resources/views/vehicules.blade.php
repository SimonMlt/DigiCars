@extends('layouts.app')

@section('content')
    <div class="container mt-5">
                <div class="row">
                    @foreach ($vehicules as $vehicule)
                        <div class="col-sm-4">
                            <div class="card mt-5 mb-5" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $vehicule->marque }}</h5>
                                    <p class="card-text">{{ $vehicule->modele }}</p>
                                    <a class="btn btn-primary float-right mt-4" href="{{ url('vehicules/edit/'.$vehicule->id) }}" >Modifier</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')

<body>
    <div class="container mt-5" style="padding-top: 20px">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ url('account/edit/'.$account->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input required type="text" class="form-control" value="{{ $account->name }}" name="name">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input required type="email" class="form-control" value="{{ $account->email }}" name="email">
                    </div>
                    <div class="form-group pull-right">
                        <button style="margin-top: 20px" type="submit" class="btn btn-primary float-right">Mettre à jour</button>
                    </div>
                </form>
                <form action="{{ url('account/delete/'.$account->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="margin-top: 20px" class="btn btn-danger mb-4 mr-4 float-right" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection

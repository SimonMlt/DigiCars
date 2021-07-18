@extends('layouts.app')

@section('content')

<body>
    <div class="container mt-5" style="padding-top: 20px">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ url('reservations/edit/'.$reservations->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Date</label>
                        <input readonly type="text" value="{{ $reservations->date }}" class="form-control" id="timeslot" name="date">
                    </div>
        
                    <div class="form-group">
                        <label for="">Horaire</label>
                        <input readonly type="text" value="{{ $reservations->timeslot }}" class="form-control" id="timeslot" name="timeslot">
                    </div>
        
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input required type="text" class="form-control" value="{{ $reservations->name }}" name="name">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Email</label>
                        <input required type="email" class="form-control" value="{{ $reservations->email }}" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Motif</label>
                        <select name="motif" class="form-control" required>
                            <option value="Conseil" @if ($reservations->motif == "Conseil") selected @endif >Conseil</option>
                            <option value="Achat" @if ($reservations->motif == "Achat") selected @endif >Achat</option>
                            <option value="Location" @if ($reservations->motif == "Location") selected @endif >Location</option>
                        </select>
                    </div>
                       
                    <div class="form-group pull-right">
                        <button style="margin-top: 20px" type="submit" class="btn btn-primary float-right">Mettre à jour</button>
                    </div>
                </form>
                <form action="{{ url('reservations/liste/delete/'.$reservations->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="margin-top: 20px" class="btn btn-danger mb-4 mr-4 float-right" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection

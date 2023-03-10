@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Edit Truck</h1>
                <form action="{{ route('trucks.update', ['truck' => $truck->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="matricule">Matricule</label>
                        <input type="text" class="form-control" id="matricule" name="matricule" value="{{ $truck->matricule }}">
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" id="model" name="model" value="{{ $truck->model }}">
                    </div>
                    <div class="form-group">
                        <label for="etat">Etat</label>
                        <input type="text" class="form-control" id="etat" name="etat" value="{{ $truck->etat }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Truck</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Client Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $client->nom }} {{ $client->prenom }}</h5>
                <p class="card-text">
                    <strong>Email:</strong> {{ $client->email }}<br>
                    <strong>Matricule:</strong> {{ $client->matricule }}<br>
                    <strong>Assurance:</strong> {{ $client->num_assurance }}<br>
                    <strong>Tel:</strong> {{ $client->tel }}
                </p>
                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('clients.destroy', ['id' => $client->id]) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client?')">Delete</button>
                </form> 
            </div>
        </div>
    </div>
@endsection

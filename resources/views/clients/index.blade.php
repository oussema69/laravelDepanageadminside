@extends('layouts.app')

@section('content')
    <div class="container">
  
        <div class="row ">
            <div class="col-md-12">
                <h1 class='text-center'>Clients List</h1>
                <div class="container d-flex justify-content-center align-items-center mb-3">
                    <form action="{{ route('clients.index') }}" method="GET" class="mr-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <button type="submit" class="btn btn-primary ml-2">Search</button>
                        </div>
                    </form>
                    <a href="{{ route('clients.create') }}" class="btn btn-success">Create</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Matricule</th>
                            <th>Numéro d'assurance</th>
                            <th>Téléphone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->nom }}</td>
                            <td>{{ $client->prenom }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->matricule }}</td>
                            <td>{{ $client->num_assurance }}</td>
                            <td>{{ $client->tel }}</td>
                            <td>
                                <a href="{{ route('clients.show', ['id' => $client->id]) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('clients.edit', ['id' => $client->id]) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('clients.destroy', ['id' => $client->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(isset($searchTerm))
                <div class="text-center">
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Back</a>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row ">
            <div class="col-md-12">
                <h1 class='text-center'>Clients List</h1>
                <div class="container mb-3">
                    <div class="row">
                      <div class="col-md-6">
                        <a href="{{ route('clients.create') }}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-plus"></i>Create</a>
                      </div>
                      <div class="col-md-6">
                        <form action="{{ route('clients.index') }}" method="GET" class="d-flex justify-content-end">
                          <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <button type="submit" class="btn btn-primary ml-2"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                          </div>
                        </form>
                      </div>
                    </div>
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
                            <th>View Cars</th>
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
                                <a href="{{ route('clients.show', ['id' => $client->id]) }}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-eye"></i></a>
                                <a href="{{ route('clients.edit', ['id' => $client->id]) }}" class="btn btn-success"><i class="fa-sharp fa-solid fa-pencil"></i></a>
                                <form action="{{ route('clients.destroy', ['id' => $client->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client?')"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('clients.cars', ['id' => $client->id]) }}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-car"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                @if(isset($searchTerm))
                <div class="text-center">
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection

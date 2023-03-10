@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($trucks->isEmpty())
    <p>No trucks found.</p>
@else
    @foreach ($trucks as $truck)
        <!-- code to display truck details -->
    @endforeach
@endif
                <h1 class='text-center'>Trucks List for Car {{ $car->id }}</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>matricule</th>
                            <th>model</th>
                            <th>etat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trucks as $truck)
                            <tr>
                                <td>{{ $truck->matricule }}</td>
                                <td>{{ $truck->model }}</td>
                                <td>{{ $truck->etat }}</td>
                                <td>
                                    <a href="{{ route('trucks.show', ['truck' => $truck->id]) }}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-truck"></i></a>
    
                                    <a href="{{ route('trucks.edit', ['truck' => $truck->id]) }}" class="btn btn-success"><i class="fa-sharp fa-solid fa-pencil"></i></a>
    
                                  
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

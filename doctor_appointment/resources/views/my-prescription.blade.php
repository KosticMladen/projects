@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Prescriptions</div>
                <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Disease</th>
                            <th scope="col">Symptoms</th>
                            <th scope="col">Medicine</th>
                            <th scope="col">Procedure to use medicine</th>
                            <th scope="col">Doctor Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prescriptions as $prescription)
                            <tr>
                                <td>{{ $prescription->date }}</td>
                                <td>{{ $prescription->doctor->name }}</td>
                                <td>{{ $prescription->name_of_disease }}</td>
                                <td>{{ $prescription->symptoms }}</td>
                                <td>{{ $prescription->medicine }}</td>
                                <td>{{ $prescription->instructions }}</td>
                                <td>{{ $prescription->feedback }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    You have no prescriptions.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
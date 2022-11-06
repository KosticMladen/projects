@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Appointments ({{ $patients->count() }})</div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Patient</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Status</th>
                            <th scope="col">Prescription</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($patients as $key=>$patient)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>
                                    <img class="rounded-circle" width="80" src="/profile/{{ $patient->user->image }}" alt="patient-image">
                                </td>
                                <td>{{ $patient->user->name }}</td>
                                <td>{{ $patient->user->email }}</td>
                                <td>{{ $patient->date }}</td>
                                <td>{{ $patient->time }}</td>
                                <td>{{ $patient->doctor->name }}</td>
                                <td>
                                    {{ $patient->status }}
                                </td>
                                <td>
                                    <a
                                        href="{{ route('prescription.show', [$patient->user_id, $patient->date]) }}"
                                        class="btn btn-secondary"
                                    >
                                        View Prescription
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No Appointments.</td>
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

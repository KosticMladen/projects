@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="card-header">Appointments ({{ $bookings->count() }})</div>

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
                        @forelse($bookings as $key=>$booking)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>
                                    <img class="rounded-circle" width="80" src="/profile/{{ $booking->user->image }}" alt="patient-image">
                                </td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->user->email }}</td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->doctor->name }}</td>
                                <td>
                                    {{ $booking->status }}
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    @if(!App\Models\Prescription::where('date', date('Y-m-d'))
                                        ->where('doctor_id', auth()->user()->id)
                                        ->where('user_id', $booking->user->id)
                                        ->exists()
                                    )
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                            data-toggle="modal"
                                            data-target="#exampleModal{{ $booking->user_id }}"
                                        >
                                            Write Prescription
                                        </button>
                                        @include('prescription.form')
                                    @else
                                        <a
                                            href="{{ route('prescription.show', [$booking->user_id, $booking->date]) }}"
                                            class="btn btn-secondary"
                                        >
                                            View Prescription
                                        </a>
                                    @endif
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

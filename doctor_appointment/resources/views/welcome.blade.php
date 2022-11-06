@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div style="background-color: rgb(230, 230, 98)!important;" class="row rounded">
            <div class="col-md-6">
                <img height="500rem" id="hero" src="{{ asset('images/landing_background.png') }}" alt="doctor_stetoscope">
            </div>
            <div class="col-md-6 mt-5">
                <h2 class="mb-3 mt-5">Hospital Online Appointment</h2>
                <h4 class="mt-5">Create an accout & Book an appointment</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                    molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                    numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                    optio, eaque rerum!
                </p>
                @if(!Auth::user())
                <div class="mt-5">
                    <a href="{{ url('/register') }}" class="btn btn-primary w-50">Register as patient</a>
                    <!-- <button class="btn btn-secondary">Login</button> -->
                </div>
                @endif
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="card-header">Find Doctors</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                        <form action="{{ url('/') }}">
                            <input
                                type="date"
                                id="datepicker"
                                name="date"
                                class="form-control"
                                min="{{ date('Y-m-d') }}"
                                max="{{ date('Y-m-d', strtotime('+1 month')) }}"
                            >
                        
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit">Find Doctors</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-header">Doctors</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Name</th>
                                <th>Expertise</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($doctors as $doctor)
                                <tr>
                                    <th scope="row"></th>
                                    <td>
                                        @if($doctor->doctor->image)
                                        <img width="40" class="rounded-circle" src="{{ asset('profile') }}/{{ $doctor->doctor->image }}" alt="existing-user-photo">
                                        @else
                                        <img width="40" class="rounded-circle" src="{{ asset('images/admin.jpg') }}" alt="existing-user-photo">
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $doctor->doctor->name }}</td>
                                    <td class="align-middle">{{ $doctor->doctor->department }}</td>
                                    <td class="align-middle">
                                        <a
                                            href="{{ route('create.appointment', [$doctor->user_id, $doctor->date]) }}"
                                            class="btn btn-primary"
                                        >
                                            Make Appointment
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <td>No Doctors Available.</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

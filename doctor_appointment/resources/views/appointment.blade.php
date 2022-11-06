@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                <h4><b>Doctor</b></h4>
                    <div class="row">
                        
                        <div class="col-md-6">
                            @if($user->image)
                            <img width="80" class="rounded-circle" src="{{ asset('profile') }}/{{ $user->image }}" alt="existing-user-photo">
                            @else
                            <img width="80" class="rounded-circle" src="{{ asset('images/admin.jpg') }}" alt="existing-user-photo">
                            @endif
                        </div>
                        <div class="col-md-6 mt-2">
                            <p><b>Name:</b><br> {{ ucwords($user->name) }}</p>
                            <p><b>Expertise:</b><br> {{ $user->department }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            @if(Session::has('errmessage'))
                <div class="alert alert-danger">
                    {{ Session::get('errmessage'); }}
                </div>
            @endif
            <form action="{{ route('booking.appointment') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header"><b>{{ $date }}</b> &nbsp;Available Terms</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($times as $time)
                            <div class="col-md-3">
                                <div>

                                    <label class="rad-label">
                                        <input type="radio" class="rad-input" name="time" value="{{ $time->time }}">
                                        <div class="rad-design"></div>
                                        <div class="rad-text">{{ $time->time }}</div>
                                    </label>

                                </div>
                            </div>
                            <input type="hidden" name="doctorId" value="{{ $doctor_id }}">
                            <input type="hidden" name="appointmentId" value="{{ $time->appointment_id }}">
                            <input type="hidden" name="date" value="{{ $date }}">
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        @if(Auth::check())
                            <button class="btn btn-primary w-100" type="submit">Book Appointment</button>
                        @else
                            <p>Please <a href="/login">log in here</a> to make an appointment.</p>
                            <p>Don't have an account? Register <a href="/register">here.</a>
                            
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

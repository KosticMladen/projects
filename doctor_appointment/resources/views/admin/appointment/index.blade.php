@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Appointments</h5>
                    <span>Here you can check appointments you made for your patients.</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    @if(Session::has('errmessage'))
        <div class="alert bg-danger alert-danger text-white" role="alert">
            {{ Session::get('errmessage') }}
        </div>
    @endif
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
    <form action="{{ route('appointment.check') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                @if(!empty($date))
                    <h4>Your Appointments For: {{ $date }}</h3>
                @else
                    Choose Date To Check Appointments
                @endif
            </div>
            <div class="card-body">
            <input
                name="date"
                type="text"
                class="form-control datetimepicker-input"
                id="datepicker"
                data-toggle="datetimepicker"
                data-target="#datepicker"
            >
            <button class="btn btn-primary mt-2" type="submit">Check Appointments</button>
            </div>
        </div>
    </form>

    @if(Route::is('appointment.check'))
    <form action="{{ route('update') }}" method="post">
        @csrf

        <input type="hidden" name="appointmentId" value="{{ $appointmentId }}">

        <div class="card">
            <div class="card-header">
                Morning
                <span style="margin-left: auto"> Check/Uncheck
                    <input
                        type="checkbox"
                        onclick="for(c in document.getElementsByName('time[]'))
                            document.getElementsByName('time[]')
                            .item(c).checked=this.checked
                        "
                        class="form-control"
                    >
                </span>
            </div>
            
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th scope="col">AM</th>
                        <th scope="col">6:00 AM</th>
                        <th scope="col">6:20 AM</th>
                        <th scope="col">6:40 AM</th>
                        <th scope="col">7:00 AM</th>
                    </tr>
                    <tr class="timeLeftAlign">
                        <th scope="row"></th>
                        <td>
                            <input type="checkbox" name="time[]" class="text-center form-control" value="6am"
                                @if(isset($times))
                                    {{ $times->contains('time', '6am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="6.20am"
                                @if(isset($times))
                                    {{ $times->contains('time', '6.20am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="6.40am"
                                @if(isset($times))
                                    {{ $times->contains('time', '6.40am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="7am"
                                @if(isset($times))
                                    {{ $times->contains('time', '7am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">7:20 AM</th>
                        <th scope="col">7:40 AM</th>
                        <th scope="col">8:00 AM</th>
                        <th scope="col">8:20 AM</th>
                    </tr>
                    <tr class="timeLeftAlign">
                        <th scope="row"></th>
                        <td>
                            <input type="checkbox" name="time[]" class="text-center form-control" value="7.20am"
                                @if(isset($times))
                                    {{ $times->contains('time', '7.20am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="7.40am"
                                @if(isset($times))
                                    {{ $times->contains('time', '7.40am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="8am"
                                @if(isset($times))
                                    {{ $times->contains('time', '8am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="8.20am"
                                @if(isset($times))
                                    {{ $times->contains('time', '8.20am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">8:40 AM</th>
                        <th scope="col">9:00 AM</th>
                        <th scope="col">9:20 AM</th>
                        <th scope="col">9:40 AM</th>
                    </tr>
                    <tr class="timeLeftAlign">
                        <th scope="row"></th>
                        <td>
                            <input type="checkbox" name="time[]" class="text-center form-control" value="8.40am"
                                @if(isset($times))
                                    {{ $times->contains('time', '8.40am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="9am"
                                @if(isset($times))
                                    {{ $times->contains('time', '9am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="9.20am"
                                @if(isset($times))
                                    {{ $times->contains('time', '9.20am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="9.40am"
                                @if(isset($times))
                                    {{ $times->contains('time', '9.40am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">10:00 AM</th>
                        <th scope="col">10:20 AM</th>
                        <th scope="col">10:40 AM</th>
                        <th scope="col">11:00 AM</th>
                    </tr>
                    <tr class="timeLeftAlign">
                        <th scope="row"></th>
                        <td>
                            <input type="checkbox" name="time[]" class="text-center form-control" value="10am"
                                @if(isset($times))
                                    {{ $times->contains('time', '10am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="10.20am"
                                @if(isset($times))
                                    {{ $times->contains('time', '10.20am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="10.40am"
                                @if(isset($times))
                                    {{ $times->contains('time', '10.40am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="11am"
                                @if(isset($times))
                                    {{ $times->contains('time', '11am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">11:20 AM</th>
                        <th scope="col">11:40 AM</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    <tr class="timeLeftAlign">
                        <th scope="row"></th>
                        <td>
                            <input type="checkbox" name="time[]" class="text-center form-control" value="11.20am"
                                @if(isset($times))
                                    {{ $times->contains('time', '11.20am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="11.40am"
                                @if(isset($times))
                                    {{ $times->contains('time', '11.40am') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Afternoon
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th scope="col">PM</th>
                        <th scope="col">12:00 PM</th>
                        <th scope="col">12:20 PM</th>
                        <th scope="col">12:40 PM</th>
                        <th scope="col">1:00 PM</th>
                    </tr>
                    <tr class="timeLeftAlign">
                        <th scope="row"></th>
                        <td>
                            <input type="checkbox" name="time[]" class="text-center form-control" value="12pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '12pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="12.20pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '12.20pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="12.40pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '12.40pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="1pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '1pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">1:20 PM</th>
                        <th scope="col">1:40 PM</th>
                        <th scope="col">2:00 PM</th>
                        <th scope="col">2:20 PM</th>
                    </tr>
                    <tr class="timeLeftAlign">
                        <th scope="row"></th>
                        <td>
                            <input type="checkbox" name="time[]" class="text-center form-control" value="1.20pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '1.20pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="1.40pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '1.40pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="2pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '2pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="2.20pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '2.20pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">2:40 PM</th>
                        <th scope="col">3:00 PM</th>
                        <th scope="col">3:20 PM</th>
                        <th scope="col">3:40 PM</th>
                    </tr>
                    <tr class="timeLeftAlign">
                        <th scope="row"></th>
                        <td>
                            <input type="checkbox" name="time[]" class="text-center form-control" value="2.40pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '2.40pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="3pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '3pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="3.20pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '3.20pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="3.40pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '3.40pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">4:00 PM</th>
                        <th scope="col">4:20 PM</th>
                        <th scope="col">4:40 PM</th>
                        <th scope="col">5:00 PM</th>
                    </tr>
                    <tr class="timeLeftAlign">
                        <th scope="row"></th>
                        <td>
                            <input type="checkbox" name="time[]" class="text-center form-control" value="4pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '4pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="4.20pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '4.20pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="4.40pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '4.40pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="5pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '5pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">5:20 PM</th>
                        <th scope="col">5:40 PM</th>
                        <th scope="col">6:00 PM</th>
                        <th scope="col">6:20 PM</th>
                    </tr>
                    <tr class="timeLeftAlign">
                        <th scope="row"></th>
                        <td>
                            <input type="checkbox" name="time[]" class="text-center form-control" value="5.20pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '5.20pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="5.40pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '5.40pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="6pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '6pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="6.20pm"
                                @if(isset($times))
                                    {{ $times->contains('time', '6.20pm') ? 'checked' : ''; }}
                                @endif
                            >
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    @else

    <h3>Your appointments ({{ $myappointments->count() }})</h3>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">View/Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach($myappointments as $appointment)
                <tr>
                    <th scope="row"></th>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>
                        <form action="{{ route('appointment.check') }}" method="post">
                            @csrf
                            <input type="hidden" name="date" value="{{ $appointment->date }}">
                            <button class="btn btn-primary" type="submit">View/Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    @endif
</div>

@endsection
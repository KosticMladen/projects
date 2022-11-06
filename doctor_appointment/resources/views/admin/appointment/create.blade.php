@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Set Appointment</h5>
                    <span>Book an appointment for your patients.</span>
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
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
    <form action="{{ route('appointment.store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                Choose Date
            </div>
            <div class="card-body">
            <input name="date" type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker">
            </div>
        </div>
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
                            <input type="checkbox" name="time[]" class="text-center form-control" value="6am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="6.20am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="6.40am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="7am">
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
                            <input type="checkbox" name="time[]" class="text-center form-control" value="7.20am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="7.40am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="8am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="8.20am">
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
                            <input type="checkbox" name="time[]" class="text-center form-control" value="8.40am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="9am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="9.20am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="9.40am">
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
                            <input type="checkbox" name="time[]" class="text-center form-control" value="10am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="10.20am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="10.40am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="11am">
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
                            <input type="checkbox" name="time[]" class="text-center form-control" value="11.20am">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="11.40am">
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
                            <input type="checkbox" name="time[]" class="text-center form-control" value="12pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="12.20pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="12.40pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="1pm">
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
                            <input type="checkbox" name="time[]" class="text-center form-control" value="1.20pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="1.40pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="2pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="2.20pm">
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
                            <input type="checkbox" name="time[]" class="text-center form-control" value="2.40pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="3pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="3.20pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="3.40pm">
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
                            <input type="checkbox" name="time[]" class="text-center form-control" value="4pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="4.20pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="4.40pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control" value="5pm">
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">5:20 PM</th>
                        <th scope="col">5:40 PM</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    <tr class="timeLeftAlign">
                        <th scope="row"></th>
                        <td>
                            <input type="checkbox" name="time[]" class="text-center form-control" value="5.20pm">
                        </td>
                        <td>
                            <input type="checkbox" name="time[]" class="form-control backgroud-success" value="5.40pm">
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
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection
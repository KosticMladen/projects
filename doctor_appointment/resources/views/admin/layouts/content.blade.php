<div class="row">
    <div class="col-md-3">
        <div class="widget">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Patients</h6>
                        <h2>{{ App\Models\User::where('role_id', 3)->count() }}</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-users"></i>
                    </div>
                </div>
                <small class="text-small mt-10 d-block">Total Patients</small>
            </div>
            <div class="progress progress-sm">
                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="widget">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Doctors</h6>
                        <h2>{{ App\Models\User::where('role_id', 1)->count() }}</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-user-plus"></i>
                    </div>
                </div>
                <small class="text-small mt-10 d-block">Total Doctors</small>
            </div>
            <div class="progress progress-sm">
                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="widget">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Appointments</h6>
                        <h2>{{ App\Models\Appointment::where('user_id', auth()->user()->id)->count() }}</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-calendar"></i>
                    </div>
                </div>
                <small class="text-small mt-10 d-block">Total Appointments</small>
            </div>
            <div class="progress progress-sm">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="10" style="width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
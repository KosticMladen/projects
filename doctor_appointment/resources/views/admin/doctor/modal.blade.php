<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 m-2 text-center">
              <img class="rounded-circle" src="{{ asset('profile') }}/{{ $user->image }}" alt="user-photo" width="200">
          </div>
          <div class="col-md-7 m-2">
            <p class="badge badge-pill badge-dark">{{ ucfirst($user->role->name) }}</p>
            <p><b>ID:</b> {{ $user->id }}</p>
            <p><b>Name:</b> {{ $user->name }}</p>
            <p><b>Education:</b> {{ $user->education }}</p>
            <p><b>Department:</b> {{ $user->department }}</p>
            <p><b>Description:</b> {{ $user->description }}</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
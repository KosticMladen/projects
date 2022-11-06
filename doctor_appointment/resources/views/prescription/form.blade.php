<!-- Modal -->
@if(count($bookings))
<div class="modal fade" id="exampleModal{{ $booking->user_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prescription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('prescription') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $booking->user_id }}">
            <input type="hidden" name="doctor_id" value="{{ $booking->doctor_id }}">
            <input type="hidden" name="date" value="{{ $booking->date }}">

            <div class="form-group">
                <label for="">Disease</label>
                <input type="text" name="name_of_disease" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Symptoms</label>
                <textarea name="symptoms" class="form-control" cols="30" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Medicine</label>
                <input type="text" name="medicine" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Procedure to use medicine</label>
                <textarea name="instructions" class="form-control" cols="30" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Feedback</label>
                <textarea name="feedback" class="form-control" cols="30" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Signature</label>
                <input type="text" name="signature" class="form-control" required>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
    </div>
  </div>
</div>
@endif
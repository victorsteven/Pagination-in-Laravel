<div class="modal fade" id="update-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ URL::to('student/update') }}" method="POST" id="frm-update">
            @csrf
        <div class="modal-body">
            <input type="hidden" class="form-control" name="id" id="id">
            <div class="form-group">
              <label for="first_name" class="col-form-label">First Name</label>
              <input type="text" class="form-control" name="first_name" id="first_name">
            </div>
            <div class="form-group">
                <label for="last_name" class="col-form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name">
            </div>
            {{-- <div class="form-group">
                <label for="last_name" class="col-form-label">Full Name</label>
                <input type="text" class="form-control" name="full_name" id="full_name">
            </div> --}}

            <div class="form-group">
                <label for="sex" class="col-form-label">Sex</label>
                <select class="form-control" name="sex_id" id="sex_id">
                    <option value="">..........</option>
                    @foreach($sexes as $key => $sex)
                    <option value="{{ $key }}">{{ $sex }}</option>
                    @endforeach  
                </select>
            </div>
            
            {{-- <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div> --}}
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update Student</button>
        </div>
    </form>
      </div>
    </div>
  </div>
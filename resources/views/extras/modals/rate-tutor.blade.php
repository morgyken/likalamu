

<!-- Modal -->
<div class="modal fade" id="rateTutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <form method="POST" action="{{ route('rate-tutor', ['questionid' => $data->questionid]) }}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> <h3> {{ __('PLACE BID') }}</h3></h5>
        </div>
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col-md-3">

          </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                      <h3> Rate tutor</h3>

                            @csrf

                            <div class="form-group row">
                              <label for="input-2" class="control-label">How satisfied were you with the Tutor?</label>
                              <input id="input-2" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5">
                              <textarea name="comment"> </textarea>
                            </div>

                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">CONTINUE</button>
      </div>
    </div>
    </form>
  </div>
</div>

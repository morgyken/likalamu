

<!-- Modal -->
<div class="modal fade" id="placeBids" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> <h3> {{ __('PLACE BID') }}</h3></h5>
        </div>
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col-md-3">

          </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                      <p>
                      The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.</p>
                        <form method="POST" action="{{ route('place-bid') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="name" type="hidden" name="questionid" value="{{ $data->questionid }}">
                                    <input id="name" type="hidden" name="tutorid" value="{{Auth::user()->id }}">

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="col-lg-6">
            <button type="button" class="btn btn-warning btn-block btn-lg" data-dismiss="modal">CLOSE</button>
        </div>

        <div class="col-lg-6">
            <button type="SUBMIT" class="btn btn-primary btn-block btn-lg">PLACE BID</button>

        </div>


      </div>
      </form>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="selectTutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> <h3> {{ __('SELECT TUTOR') }}</h3></h5>
        </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('assign-questions', ['questionid' => $data->questionid]) }}">
        <div class="row justify-content-center">

          <div class="col-md-3">

          </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                            @csrf

                            @include ('extras.modals.selector')


                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="col-lg-6">
          <button type="button" class="btn btn-warning btn-block" data-dismiss="modal">CLOSE</button>
        </div>
        <div class="col-lg-6">
          <button type="submit" class="btn btn-primary btn-block">CONFIRM</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>

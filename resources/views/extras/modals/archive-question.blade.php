

<!-- Modal -->
<div class="modal fade" id="archiveQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> <h3> {{ __('SELECT TUTOR') }}</h3></h5>
        </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('archive-questions') }}">
        <div class="row justify-content-center">

          <div class="col-md-3">

          </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                      @csrf
                      <h3> Are you sure you want to archive this question? </h3>
                      <p>Please confirm to continue We are in the process of deleting content from consumer Google+ accounts and Google+ pages. This process will take a few months to complete and content may remain during this period. In the meantime, if you previously created content on Google+, you may be able to download and save your remaining Google+ content.
                        You may also be able to view and delete your remaining Google+ activity.</p>
                      <input type="hidden" name="questionid" value="{{ $data->questionid}}" />
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


<div class="col-lg-10">
  <form class="" action="{{ route('update-account')}}" method="post">
  <h4>Account Details</h4>

  <div class="form-group">
    <label for="usr">Tutor Since:</label>
    <input type="text" class="form-control" disabled id="usr" value="12/12/1566">
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <input type="hidden" class="form-control" name="tutorid" value="{{Auth::user()->id}}">

  <div class="form-group">
    <label for="usr">State:</label>
    <input type="text" class="form-control" id="usr" name="state" value="state">
  </div>

  <div class="form-group">
    <label for="usr">Level:</label>
    <input type="text" disabled="disabled" class="form-control" id="usr" value="Beginner">
  </div>

  <button type="submit" class="btn btn-primary" name="button"> Update</button>

  </form>
</div>



<div class="col-lg-10">
  <h4>TUTOR DETAILS</h4>
  <p> {{ Carbon\Carbon::now(get_local_time()) }} </p>

    <form class="" action="{{route('update-profile')}}" method="post">
  <div class="form-group">
    <label for="usr">Name: </label>
    <input type="text" class="form-control" id="usr" value="Names">
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <input type="hidden" name="tutorid" value="{{Auth::user()->id}}">

  <div class="form-group">
    <label for="body">Describe Yourself:</label>
    <textarea class="form-control" name="about"></textarea>
  </div>
<div class="form-group">
    <label for="usr">Phone: </label>
    <input type="text" class="form-control" id="usr" name="phone">
  </div>
  <div class="form-group">
    <label for="usr">Language:</label>
    <input type="text" class="form-control" id="usr" name="language">
  </div>
</div>


<div class="col-lg-10">

  <div class="form-group">
    <label for="usr">Software:</label>
    <select multiple size="5" name="software[]" class="form-control">
      <option value="American">American flamingo</option>
      <option value="Andean">Andean flamingo</option>
      <option value="Chilean">Chilean flamingo</option>
      <option value="Greater">Greater flamingo</option>
      <option value="James's">James's flamingo</option>
      <option value="Lesser">Lesser flamingo</option>
    </select>


  </div>

  <div class="form-group">
    <label for="usr">Expertise:</label>
    <select multiple size="5" name="expertise[]" class="form-control">
      <option value="American">American flamingo</option>
      <option value="Andean">Andean flamingo</option>
      <option value="Chilean">Chilean flamingo</option>
      <option value="Greater">Greater flamingo</option>
      <option value="James's">James's flamingo</option>
      <option value="Lesser">Lesser flamingo</option>
    </select>
  </div>

  <div class="form-group">
    <label for="usr">School / University:</label>
    <input type="text" class="form-control" id="usr" name="school">
  </div>

  <div class="form-group">
    <label for="usr">Country :</label>
    <input type="text" class="form-control" id="usr" name="country">
  </div>
  <button type="submit" class="btn btn-primary" name="button"> Update</button>

  </form>

</div>

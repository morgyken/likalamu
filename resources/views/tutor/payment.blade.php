



<div class="col-lg-10">

  <form class="" action="{{route('tutor-payment')}}" method="post">

  <h4>Payment Details</h4>

  <div class="form-group">
    <label for="usr">Tutor ID:</label>
    <input type="text" class="form-control" id="usr" disabled value="12333">
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <input type="hidden" class="form-control" name="tutorid" value="{{Auth::user()->id}}">

  <div class="form-group">
    <label for="usr">Account ID:</label>
    <input type="text" class="form-control" id="usr" disabled value="3">
  </div>

  <div class="form-group">
    <label for="usr">MPESA Number :</label>
    <input type="text" class="form-control" id="usr" name="mpesa">
  </div>
  <div class="form-group">
    <label for="usr">Paypal Email :</label>
    <input type="text" class="form-control" id="usr" name="paypalemail">
  </div>
  <div class="form-group">
    <label for="usr">Minimum Amount:</label>
    <input type="text" class="form-control" id="usr" name="minamount" value="4500">
  </div>

  <div class="form-group col-lg-6">
    <label for="usr">Amount Due:</label>
    <input type="text" class="form-control" id="usr" name="amountdue" value="KSh 3400">
  </div>
  <div class="form-group col-lg-6">
    <label for="usr">Total Completed :</label>
    <input type="text" class="form-control" id="usr" name="total" value="KSh 3800">
  </div>


<button type="submit" class="btn btn-primary" name="button"> Update</button>

</form>

</div>

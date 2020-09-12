<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav" style="text-align:center">
      <li class="active"><a href="{{URL::to('/tutor/view/all/questions/')}}">All Avalilable</a></li>
      <li><a href="{{route('tutor-all-questions', ['status' => 'bids'])}}">Bids</a></li>
      <li><a href="{{route('tutor-all-questions', ['status' => 'assigned'])}}">Assigned</a></li>
      <li><a href="{{route('tutor-all-questions', ['status' => 'review'])}}">Review</a></li>
      <li><a href="{{route('tutor-all-questions', ['status' => 'revision'])}}">Revision</a></li>
      <li><a href="{{route('tutor-all-questions', ['status' => 'finished'])}}">Finished</a></li>
      <li><a href="{{route('last-payment')}}">Last Payment</a></li>
    </ul>
  </div>
</nav>

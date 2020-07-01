
@extends('layouts.tutor.template')

@section('content')

@include('extras.time.time-calculator')

<style media="screen">
.q-details{
  font-size: 13px;
    font-weight:bold;
}

</style>
  <div class="col-md-2 centered">
  <h2>Student</h2>
  </div>
  <div class="col-md-8">
  <h2>Details</h2>
</div>
  <div class="col-md-2">
  <h2>Status</h2>
</div>
<div class="col-md-12">
  <br>
  <hr/>
   <br>
</div>


@foreach($data as $value)
<?php
    $array_of_deadline = getDeadlineInSeconds1($value->deadline);
  //  $deadline12 = getDeadlineInSeconds12($value->deadline);
?>
<div class="row">
<div class="col-lg-2 centered">
  <img src="{{ URL::asset('spot/img/pic.jpg' )}}"style="border-radius:50%" alt="" height="70">
    <h5>Name</h5>
</div>
<!-- col-lg-6 -->
<div class="col-lg-8">

<p>{{$value->summary}}</p>
<div class="q-details">
  <div class="col-md-2">
    <i class="fa fa-circle-o"></i> Price: <span class="q-details">{{$value->price}}</span>
  </div>
  <div class="col-md-4">
  Deadline:<span class="q-details"> {{$value->deadline}}</span>
  </div>

  <div class="col-md-4">
  Time remaining: <span class="q-details">{{$array_of_deadline}}</span>
  </div>
  <div class="col-md-2">
  <a href="{{route('tutor-question-det', ['questionid' => $value->questionid])}}" class="q-details">view </a>
  </div>
</div>



</div>
<div class="col-md-2">
<p>Completed</p>
</div>
</div>
<br>
<hr>

@endforeach
<!-- row -->
<div class="col-md-12 centered">
<h5>{{ $data->links() }}
</div>


@endsection

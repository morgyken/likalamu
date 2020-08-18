
@extends('layouts.tutor.template')

@section('content')

@include('extras.time.time-calculator')

<style media="screen">
.q-details{
  font-size: 13px;
  font-weight:bold;
  color:#3498db;
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
<div class="col-lg-10 qbody" data-href="{{route('tutor-question-det', ['questionid' => $value->questionid])}}">

<p>{{$value->summary}}</p>
<div class="q-details">
  <div class="col-md-2">
    <h5 style="color:#ff6600; font-weight: 650">ID: {{$value->questionid}} </h5>

  </div>
  <div class="col-md-2">
    <h5>Price: <span class="q-details">{{$value->tutorprice}}</span></h5>
    <!--  Deadline:<span class="q-details"> {{$value->deadline}}</span> -->
  </div>

  <div class="col-md-3">
  <h5>Time: <span class="q-details">{{$array_of_deadline}}</span></h5>
  </div>

  <div class="col-md-2">
  @inject('provider', 'App\Http\Controllers\TutorController')
    <?php
      $status =$provider::findStatusNew($value->questionid);
     ?>
    @if($status == "New")
    <h5 style="color:green;">{{ $provider::findStatusNew($value->questionid) }}</h5>
    @else
      <h5 style="color:#ff625c;">{{ $provider::findStatusNew($value->questionid) }}</h5>
    @endif
  </div>

  <div class="col-md-2">
  <h5><a href="{{route('tutor-question-det', ['questionid' => $value->questionid])}}" class="q-details">view </a></h5>
  </div>

</div>

</div>
</div>
<hr><br>

@endforeach
<!-- row -->
<div class="col-md-12 centered">
<h5>{{ $data->links() }}
</div>


<script type="text/javascript">
$(".qbody").click(function(){
    window.location = $(this).attr("data-href");
    return false;
});
</script>

@endsection

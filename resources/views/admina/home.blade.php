@extends('layouts.admin-template')

@section('content')
<div class="container w">
  <div class="row centered">
    <br><br>
    <div class="col-lg-6">
      <img class="img-circle image-main" src="{{ URL::asset('spot/img/writer.png ') }}" width="110" height="110" alt="">
      <h2> Ask Question</h2>
      <p><a href="#" data-toggle="modal" data-target="#myModal">@Click Here to ask Question</a></p>
      </div>
    <div class="col-lg-3">
      <img class="img-circle" src="{{ URL::asset('spot/img/writer.png ') }}" width="110" height="110" alt="">
      <h4>All Writers</h4>
      <p><a href="{{route('adm-view-questions')}}">@View my Writers</a></p>
    </div>
    <!-- col-lg-3 -->

    <div class="col-lg-3">
      <img class="img-circle" src="{{ URL::asset('spot/img/question-mark.png ') }}" width="110" height="110" alt="">
      <h4>All Questions</h4>
      <p><a href="{{route('adm-view-questions')}}">@view My Questions</a></p>
    </div>
    <!-- col-lg-3 -->

    <div class="col-lg-3">
      <img class="img-circle" src="{{ URL::asset('spot/img/revision.png ') }}" width="110" height="110" alt="">
      <h4>Revisions</h4>

      <p><a href="#">@View My revisions</a></p>
    </div>
    <!-- col-lg-3 -->

    <div class="col-lg-3">
      <img class="img-circle" src="{{ URL::asset('spot/img/dollars.jpg ') }}" width="110" height="110" alt="">
      <h4>Payments</h4>
      <p><a href="{{route('view-tutor-payments')}}">@All payments</a></p>
    </div>
    <!-- col-lg-3 -->

  </div>
  <!-- row -->
  <br>
  <br>
</div>
<!-- container -->


<!-- PORTFOLIO SECTION -->
<div id="dg">
  <div class="container">
    <div class="row centered">
      <h4>Reports </h4>
      <br>

      <!-- First Chart -->
      <div class="col-lg-3">
        <canvas id="canvas" height="130" width="130"></canvas>
        <br>
        <p><b>Profit and Loss</b></p>
        <p><small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</small></p>
      </div>
      <!-- /col-lg-3 -->

      <!-- Second Chart -->
      <div class="col-lg-3">
        <canvas id="canvas2" height="130" width="130"></canvas>
        <br>
        <p><b>Paid Orders </b></p>
        <p><small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</small></p>
      </div>
      <!-- /col-lg-3 -->

      <!-- Third Chart -->
      <div class="col-lg-3">
        <canvas id="canvas3" height="130" width="130"></canvas>
        <br>
        <p><b>Next Payments</b></p>
        <p><small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</small></p>
      </div>
      <!-- /col-lg-3 -->

      <!-- Fourth Chart -->
      <div class="col-lg-3">
        <canvas id="canvas4" height="130" width="130"></canvas>
        <br>
        <p><b> Refunds </b></p>
        <p><small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</small></p>
      </div>
      <!-- /col-lg-3 -->


    </div>
    <!-- row -->
  </div>
  <!-- container -->
</div>
<!-- DG -->
@include('extras.modals.post-question-modal')

@endsection

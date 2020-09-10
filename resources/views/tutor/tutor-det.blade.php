
@extends('layouts.tutor.template')

@section('content')
<div class="container desc">
  <div class="row">
    <br><br>
    <div class="col-lg-2 centered">
      <!--img src="{{ URL::asset('spot/img/p03.png')}}" alt=""-->
    </div>
    <!-- col-lg-6 -->
    <div class="col-lg-9">
        @include('tutor.profile')
    </div>
  </div>
  <!-- row -->

  <br><br>
  <hr>
  <br><br>
  <div class="row">
    <div class="col-lg-2 centered">

    </div>
    <!-- col-lg-6 -->
    <div class="col-lg-9">
      @include('tutor.account')

    </div>
  </div>
  <!-- row -->

  <br><br>
  <hr>
  <br><br>
  <div class="row">
    <div class="col-lg-2 centered">
      <img src="" alt="">
    </div>
    <!-- col-lg-6 -->
    <div class="col-lg-9">
      @include('tutor.payment')

    </div>
  </div>


  <!-- row -->
  <br><br>
</div>
<!-- container -->
@endsection

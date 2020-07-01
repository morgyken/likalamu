
@extends('layouts.tutor.template')

@section('content')
<div class="container desc">
  <div class="row">
    <br><br>
    <div class="col-lg-3 centered">
      <img src="{{ URL::asset('spot/img/p03.png')}}" alt="">
    </div>
    <!-- col-lg-6 -->
    <div class="col-lg-9">
      <h4>TUTOR DETAILS</h4>

      <div class="col-lg-6">
        <div class="form-group">
          <label for="usr">First Name:</label>
          <input type="text" class="form-control" id="usr" name="fname">
        </div>
        <div class="form-group">
          <label for="usr">Last Name:</label>
          <input type="text" class="form-control" id="usr" name="fname">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="tutorid" value="{{Auth::user()->id}}">

        <div class="form-group">
          <label for="body">Describe Yourself:</label>
          <textarea id="summernote" name="body"></textarea>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="usr">Phone:</label>
          <input type="text" class="form-control" id="usr" name="header">
        </div>

          <input type="hidden" name="country" value="country">

          <input type="hidden" name="country" value="country">
          
          <input type="hidden" name="country" value="country">

        <div class="form-group">
          <label for="body">Body:</label>
          <textarea id="summernote" name="body"></textarea>
        </div>
      </div>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
      <p>
        <i class="fa fa-circle-o"></i> Mobile Design<br/>
        <i class="fa fa-circle-o"></i> Web Design<br/>
        <i class="fa fa-circle-o"></i> Development<br/>
        <i class="fa fa-link"></i> <a href="#">Example.com</a>
      </p>
    </div>
  </div>
  <!-- row -->

  <br><br>
  <hr>
  <br><br>
  <div class="row">
    <div class="col-lg-3 centered">
      <img src="{{ URL::asset('spot/img/p01.png ')}}" alt="">
    </div>
    <!-- col-lg-6 -->
    <div class="col-lg-9">
      <form class="" action="index.html" method="post">


      <h4>CLIENT NAME</h4>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
      <p>
        <i class="fa fa-circle-o"></i> Mobile Design<br/>
        <i class="fa fa-circle-o"></i> Web Design<br/>
        <i class="fa fa-circle-o"></i> Development<br/>
        <i class="fa fa-link"></i> <a href="#">Example.com</a>
      </p>
    </div>
  </div>
  <!-- row -->

  <br><br>
  <hr>
  <br><br>
  <div class="row">
    <div class="col-lg-3 centered">
      <img src="{{ URL::asset('spot/img/p02.png ')}}" alt="">
    </div>
    <!-- col-lg-6 -->
    <div class="col-lg-9">
      <h4>CLIENT NAME</h4>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
      <p>
        <i class="fa fa-circle-o"></i> Mobile Design<br/>
        <i class="fa fa-circle-o"></i> Web Design<br/>
        <i class="fa fa-circle-o"></i> Development<br/>
        <i class="fa fa-link"></i> <a href="#">Example.com</a>
      </p>
    </div>
  </div>

  <button type="button" name="button"> Continue</button>
</form>
  <!-- row -->
  <br><br>
</div>
<!-- container -->
@endsection

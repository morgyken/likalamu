@extends('layouts.admin-template')

@section('content')
<div class="container w">
  <div class="row centered">
    <br><br>

    <h1>All Tutors payment Summary  </h1>
    <div class="col-lg-2">
    </div>

    <div class="col-lg-9">
  <table class="table table-striped centered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Pay</th>
        <th scope="col">Paid</th>
        <th scope="col">Link</th>
      </tr>
    </thead>
     <tbody>

       <?php

        $myarray =[];

        $i = 0;
        ?>

      @foreach($data as $value)
      <?php
      $myarray [$i] = $value->id;

      $i++;

       ?>

        <tr>
          <th scope="row"> {{ $value->tutorid}}</th>
          <td> {{ $value->name}}</td>
          <td>  {{ $value->email}}</td>
          <td> {{ $value->phone}}</td>
          <td style="text-align:">  {{ $value->tutorpay}}</td>
          <td>  {{ $value->paid}}</td>
          <td> <a href="{{ route('view-tutor-paymentsdet', ['tutorid'=> $value->tutorid])}}">view</a></td>
        </tr>
          @endforeach
          <tr>

      <form class="" action="{{ route('pay-tutors', ['data'=>json_encode($myarray)])}}" method="post">
              @csrf
            <hr><br>
          <td colspan="5">  <input type="submit" value="Confirm Payments" /></td>
        </tr>

    </form>
    </tbody>
   </table>
    </div>
    <!-- col-lg-3 -->
    </div>
    <!-- row -->
  </div>
  <!-- container -->
@endsection

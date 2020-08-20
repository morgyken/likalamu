@extends('layouts.admin-template')

@section('content')
<div class="container w">
  <div class="row centered">
    <br><br>

    <h1> Tutor payment Summary  </h1>
    <div class="col-lg-2">
    </div>

    <div class="col-lg-9">
  <table class="table table-striped centered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tutor Price</th>
        <th scope="col">deadline</th>
        <th scope="col">completed </th>
        <th scope="col">Paid</th>

      </tr>
    </thead>
     <tbody>

      @foreach($data as $value)

      <tr>
      <th scope="row"> {{ $value->questionid}}</th>
      <td> {{ $value->tutorprice}}</td>
      <td>  {{ $value->deadline}}</td>
      <td> {{ $value->completed}}</td>
      <td>  {{ $value->paid}}</td>

    </tr>
      @endforeach
    </tbody>
   </table>
    </div>
    <!-- col-lg-3 -->
    </div>
    <!-- row -->
  </div>
  <!-- container -->
@endsection

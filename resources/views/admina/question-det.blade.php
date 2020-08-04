
@extends('layouts.question-det-template')

@section('content')

@include('extras.time.time-calculator')
<?php
    $array_of_deadline = getDeadlineInSeconds1($data->deadline);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- Main Quill library -->

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<style media="screen">
.modal-dialog.modal-post {
width: 800px;
margin: 30px auto;
}

.btn-file {
position: relative;
overflow: hidden;
}
.btn-file input[type=file] {
position: absolute;
top: 0;
right: 0;
min-width: 100%;
min-height: 100%;
font-size: 100px;
text-align: right;
filter: alpha(opacity=0);
opacity: 0;
background: red;
cursor: inherit;
display: block;
}
input[readonly] {
background-color: white !important;
cursor: text !important;
}
</style>

<div class="row">
  <div class="col-lg-1 centered">
    <h3> </h3>
    <img src="{{ URL::asset('spot/img/pic.jpg' )}}" alt="" height="50">
      <h5>Name</h5>
  </div>
  <!-- col-lg-6 -->
  <div class="col-lg-10" style="background-color:#fff">
    <h2>{{$data->header}} </h2>
    <hr>
    <h4 style="font-size: 75%">
      <div class="col-md-2">
      </i> ID: <span class="q-details">{{$data->questionid}}</span>
      </div>
      <div class="col-md-2">
      </i> Tutor Price: <span class="q-details">${{$data->tutorprice}}</span>
      </div>
      <div class="col-md-3">
      Deadline:<span class="q-details"> {{$data->deadline}}</span>
      </div>

      <div class="col-md-3">
      Time remaining: <span class="q-details">{{$array_of_deadline}}</span>
      </div>

      Price: ${{ $data->studentprice}} </h5>
    <hr>

      <p> {!! htmlspecialchars_decode($data-> body, ENT_NOQUOTES);!!} </p>
        </h4>

        <hr>
        <div>
          <label for="comment">File Uploads</label>
        </div>

      <div style="background:#2d2d2d; border-radius: 10px; padding-left:10px;">
          <ol style="font-weight:600">
             @foreach($files as $file)

                 <span class="down-files"><a href="{{route('file-download',
                                 [
                                     'question_id' => $data->questionid,
                                     'filename'=>$file['basename']
                                  ])}}"
                     >
                    <li> <i class="fa fa-file-o"  style="font-size:16px; font-weight:600; font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;   line-height: 15px;color:#e0e0e0;" aria-hidden="true"> {{$file['basename'] }} </i> </li>
                  </a></span>
                  <br>
             @endforeach
               </ol>
             </div>

           </div>
        </div>
        <br> <hr>
       <div class="row">
         <div class="col-lg-1">

         </div>
         <div class="col-lg-10">
           <button type="button" class="btn btn-primary btn-lg col-lg-6" data-toggle="modal" data-target="#selectTutor" name="button">Assign Question</button>
           <button type="button" class="btn btn-secondary btn-lg  col-lg-6" data-toggle="modal" data-target="#archiveQuestion"  name="button">Archive QUestion</button>
           @include('extras.modals.select-tutor')
           @include('extras.modals.archive-question')
           @include('extras.modals.rate-tutor')
         </div>
       </div>

       <br> <hr>

        <div class="row">
          <div class="col-lg-1">

          </div>

          <div class="col-lg-10">
              @include('extras.comm.comment-files')
          </div>



        </div>

         <br> <hr>
      <div class="row">
        <div class="col-lg-1">
        </div>

        <div class="col-lg-10">

          <form method="post" action="{{route('post-comment')}}" enctype="multipart/form-data">
            <div class="form-group">
            <label for="comment">Post comment or Answer here</label>
                <textarea id="summernote" name="answer"></textarea>
            </div>
              <div class="form-inline">
                <br> <br>

                <label class="radio">
                    <input type="radio"  name="mark" value="1"/>
                    Mark as Answer
                </label>
                <br> <br>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="hidden" name="questionid" value="{{ $data->questionid }}">

              </div>
              <div class="form-group">
                <label for="comment">Post comment or Answer here</label>
                <div class="form-group col-md-12">
                    <hr>
                          <label for="usr">Include Files:</label>
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-primary btn-file">

                                      Browse&hellip; <input class="form-control" type="file"name="file[]" multiple>
                                  </span>
                              </span>
                              <input type="text" class="form-control" readonly>
                          </div>
                  </div>

              </div>

              <div class="form-group">
              <button type="submit"  class="btn btn-warning btn-lg"> Continue </button>
              </div>
              </form>
        </div>
      </div>

       <br> <hr>
      <div class="row">
        <div class="col-lg-1">

        </div>
        <div class="col-lg-10">
          <button type="button" class="btn btn-primary btn-lg col-lg-4" data-toggle="modal" data-target="#rateTutor" name="button">Rate</button>
          <button type="button" class="btn btn-secondary btn-lg  col-lg-4" name="button">Complete</button>
          <button type="button" class="btn btn-primary btn-lg  col-lg-4" name="button">Reassign</button>

        </div>
      </div>

<br>
<hr>
<!-- row -->

<!-- row -->
<br><br>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>
<script type="text/javascript">
$('#summernote').summernote({
       placeholder: 'Type your Question Content Here',
       tabsize: 2,
       height: 200,
       toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['view', ['fullscreen', 'codeview', 'help']]
       ]
     });
</script>

<script type="text/javascript">
$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });
});

</script>

<script type="text/javascript">

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



    $("#btn-submit").click(function(e){

        e.preventDefault();

        var answer = $("input[name=answer]").val();

        var mark = $("input[name=mark]").val();

        var questionid = $("input[name=questionid]").val();

        var file = $("input[name=file]").val();


        $.ajax({

           type:'POST',

           url:'{{route("post-comment")}}',

           data:{answer:answer, mark:mark, questionid:questionid, file:file},

           success:function(data){

              alert(data.success);

           }

        });
	});

</script>
@endsection

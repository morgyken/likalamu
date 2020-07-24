@foreach($comments as $comm)
<div class="row">

<div class="col-lg-10">
  <br/> <hr />

       <h5><a href="#"> Morgyken</a></h5>
        Time:  {{ $comm->created_at }}
       <p class="date"> </p>
       <p class="comment">
    {!! htmlspecialchars_decode($comm->answer, ENT_NOQUOTES)  !!}
       </p>


 @if($comm->mark ==1)
 <?php  $type = "answer"?>
 @else

 <?php  $type = "comments"?>
 @endif
 <?php
  $resfiles = \App\Http\Controllers\AdminQuestionController::CommentFiles($data->questionid,  $comm->commentid, $type);
  if($resfiles != null)
  {


?>


     @foreach($resfiles as $file)

         <p class="down-files"><a href="{{route('response-download',
                         [
                             'questionid' => $data->questionid,
                             'commentid' => $comm->commentid,
                             'type'  => $type,
                             'filename'=>$file['basename']
                          ])}}"
             >
         <i class="icon-download-alt">{{$file['basename'] }} </i></a>
         </p>
     @endforeach

     <?php
      }
      ?>

   </div>
 </div>

 @endforeach

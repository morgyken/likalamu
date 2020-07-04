

    <h5> Conversation History </h5>
        @foreach($comments as $comm)
                     <div class="desc">
                         <h5><a href="#"> Morgyken</a></h5>
                          Time:  {{ $comm->created_at }}
                         <p class="date"> </p>
                         <p class="comment">
                      {!! htmlspecialchars_decode($comm->answer, ENT_NOQUOTES)  !!}
                         </p>

                     </div>



         @if($comm->mark ==1)
         <?php  $type = "answer"?>
         @else

         <?php  $type = "comments"?>
         @endif
         <?php
          $resfiles = \App\Http\Controllers\AdminQuestionController::CommentFiles($data->questionid,  $comm->commentid, $type);
        ?>
         <div class="col-md-12">
             @foreach($resfiles as $file)

                 <p class="down-files"><a href="{{route('response-download',
                                 [
                                     'questionid' => $data->questionid,
                                     'commentid' => $comm->commentid,
                                     'type' => $type,
                                     'filename'=>$file['basename']
                                  ])}}"
                     >
                 <i class="icon-download-alt">{{$file['basename'] }} </i></a>
                 </p>
             @endforeach
         </div>

         @endforeach

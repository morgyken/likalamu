
<!-- Theme included stylesheets -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<body>

<div class="container">
  <h2>Large Modal</h2>
  <!-- Button to Open the Modal
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  The Modal -->
  <div class="modal fade" id="myModal" style="font-size: 80%">
    <div class="modal-dialog modal-post modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header" style="background:#3498DB">
          <h4 class="modal-title"> Post Question</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="{{route('student-post-question')}}" enctype="multipart/form-data">
            <div class="form-group">
              <label for="usr">Title:</label>
              <input type="text" class="form-control" id="usr" name="header">
            </div>

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
              <label for="body">Body:</label>
              <textarea id="summernote" name="body"></textarea>
            </div>
            <hr>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="usr">Price:</label>
                    <input type="text" class="form-control" name="price" value="">
                </div>

                <div class="form-group">
                  <label for="usr">pages:</label>
                  <input type="text" class="form-control" id="usr" name="pages">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="usr">TutorPrice:</label>
                  <input type="text" class="form-control" id="usr" name="tutorprice">
                </div>

                <div class="form-group">
                  <label for="usr">Format:</label>
                  <select id="" name="format" class="form-control">
                        <option selected="selected" value="1">APA</option>
                          <option value="MLA">MLA</option>
                          <option value="Turabian">Turabian</option>
                          <option value="Chicago">Chicago</option>
                          <option value="Harvard">Harvard</option>
                          <option value="Oxford">Oxford</option>
                          <option value="Vancouver">Vancouver</option>
                          <option value="CBE">CBE</option>
                          <option value="Other">Other</option>
                    </select>
                </div>

              </div>

              @include('extras.date.datepicker')

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

                      <div class="form-group col-md-12">
                        <hr>
                          <button type="submit" class="btn btn-primary" name="button"> Submit Question</button>
                      </div>
        </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer" style="background:#ff7878">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

</div>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>
<script type="text/javascript">
$('#summernote').summernote({
       placeholder: 'Type your Question Content Here',
       tabsize: 2,
       height: 370,
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

</body>
</html>

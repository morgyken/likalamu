
    <link rel="stylesheet" type="text/css" href="{{URL::asset('datetime/jquery.datetimepicker.css')}}"/>
    <style type="text/css">
        .custom-date-style {
            background-color: red !important;
        }
        .myinput{
            text-align:center;
            font-weight: 800;
            font-size:18px;
        }
        .input-wide{
            width: 500px;
            font-weight: 800;
            font-size:16px;
        }
    </style>

    <script>
        var today = new Date();
        var day = function () {
            return today.getUTCDate();
        }

    </script>


    <div class="form-group col-md-12">
      <label for="usr">Choose Deadline:</label>
        <input type="text" autocomplete="off" class="form-control myinput input-lg" placeholder="Select Deadline"  name="deadline" id="datetimepicker4"/>
    </div>


  
  <script src="{{URL::asset('datetime/build/jquery.datetimepicker.full.js')}}"></script>
  <script>
/*
     window.onerror = function(errorMsg) {
     $('#console').html($('#console').html()+'<br>'+errorMsg)
     }*/
    $.datetimepicker.setLocale('en');
    $('#datetimepicker_format').datetimepicker({value:'2017/04/15 05:03', format: $("#datetimepicker_format_value").val()});
    console.log($('#datetimepicker_format').datetimepicker('getValue'));
    $("#datetimepicker_format_change").on("click", function(e){
        $("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
    });
    $("#datetimepicker_format_locale").on("change", function(e){
        $.datetimepicker.setLocale($(e.currentTarget).val());
    });
    $('#datetimepicker').datetimepicker({
        dayOfWeekStart : 1,
        lang:'en',
        disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
        startDate:	'1986/01/05'
    });
    $('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});
    $('.some_class').datetimepicker();
    $('#default_datetimepicker').datetimepicker({
        formatTime:'H:i',
        formatDate:'d.m.Y',
        //defaultDate:'8.12.1986', // it's my birthday
        defaultDate:'+03.01.1970', // it's my birthday
        defaultTime:'10:00',
        timepickerScrollbar:false
    });
    $('#datetimepicker10').datetimepicker({
        step:5,
        inline:true
    });
    $('#datetimepicker_mask').datetimepicker({
        mask:'9999/19/39 29:59'
    });

    $('#datetimepicker4').datetimepicker();
    $('#open').click(function(){
        $('#datetimepicker4').datetimepicker('show');
    });
    $('#close').click(function(){
        $('#datetimepicker4').datetimepicker('hide');
    });
    $('#reset').click(function(){
        $('#datetimepicker4').datetimepicker('reset');
    });

    var logic = function( currentDateTime ){
        if (currentDateTime && currentDateTime.getDay() == 6){
            this.setOptions({
                minTime:'11:00'
            });
        }else
            this.setOptions({
                minTime:'8:00'
            });
    };
    $('#datetimepicker_dark').datetimepicker({theme:'dark'})
  </script>

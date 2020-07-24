<?php
    function ConvertTime12( $seconds){
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");
        $days = $dtF->diff($dtT)->format('%a');
        if($days> 0){
            return $dtF->diff($dtT)->format('%a d %h hrs');
        }
        else {
            return $dtF->diff($dtT)->format('%h hrs %i min');
        }
    }
    function getDeadlineInSeconds1($deadline){
        $deadline = new \Carbon\Carbon($deadline);
        $now = \Carbon\Carbon::now();
        $difference = $deadline -> diffInSeconds($now);
        $TimeStart = strtotime(\Carbon\Carbon::now());
        $TimeEnd = strtotime($deadline);
        $Difference = ($TimeEnd - $TimeStart);
        $interval = ConvertTime12($difference);

        if (time() >= strtotime($deadline->toDateTimeString())) {
        return $interval.' ago';
        }

        return $interval; // array ['h']=>h, ['m]=> m, ['s'] =>s
    }
    function getDeadlineInSeconds12($deadline){
        $deadline = new \Carbon\Carbon($deadline);
        $now = \Carbon\Carbon::now();
        $difference = $deadline -> diffInSeconds($now);
        $TimeStart = strtotime(\Carbon\Carbon::now());
        $TimeEnd = strtotime($deadline);
        $Difference = ($TimeEnd - $TimeStart);
        return $Difference;
    }
    ?>

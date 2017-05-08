<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        .thumbnail{
            width:300px;
            height:300px;
        }
        pre.joe{
            padding-left: 1.8em }
        #Question{
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px;
            float: none;
        }
        #Answer{
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px;
            float: none;
        }
        #Test123{
            display: table;
        }

        #Mainp [class*="col-"] {
            display: table-cell;
            vertical-align: top;
        }
        #test{
            position: absolute;
            right:    0;
            bottom:   0;
        }
        .jst-hours {
            float: left;
        }
        .jst-minutes {
            float: left;
        }
        .jst-seconds {
            float: left;
        }
        .jst-clearDiv {
            clear: both;
        }
        .jst-timeout {
            color: red;
        }
        #Mc{
            width: 80%;
            empty-row: show;
            table-border: 0px;
        }
        #hset{
            width: 50%;
        }

    </style>

    <style>

    .item {
    position: absolute;
    left: -9999px;
    }

    input[type=radio]:checked + label  {
    border: 1px solid #fff;
    box-shadow: 0 0 3px 3px #090;
    }

    /* Stuff after this is only to make things more pretty */
    input[type=radio] + label {
    border: 1px dashed #444;
    width: 150px;
    height: 80px;
    transition: 500ms all;
    background-color: WHITE;
    }

    input[type=radio]:checked + label {
    transform:
    rotateZ(0deg)
    rotateX(0deg);
    background-color: Gold;
    }

    /*
    | //lea.verou.me/css3patterns
    | Because white bgs are boring.
    */
    html {
    background-color: #fff;
    background-size: 100% 1.2em;
    background-image:
    linear-gradient(
    90deg,
    transparent 79px,
    #abced4 79px,
    #abced4 81px,
    transparent 81px
    ),
    linear-gradient(
    #eee .1em,
    transparent .1em
    );
    }
    </style>



    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 150px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 10px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('main.layouts.game')

@section('content')
    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <pre class="joe"><center><h4><label>Type:<span id="changeType"> {!!(($mc[$random]->question_type))!!}</span></label>    <label>Level:<u><span id="changeQuLv"> {!!($mc[$random]->question_level)!!}</span></u></label>    <label>Timer: </label><label id="my">0</label>:<label id="tensy">0</label><label id="sy">0</label>　　　<label> <button id="myBtn"><img src="./images/bag.png" width="35" height="35"></button></label></h4></center></pre>
                </div>


                <!-- Trigger/Open The Modal -->


                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h3><p align="left">Items: </p></h3>
                        <img id='changeQ' src="./images/changeQuestion.png" width="50" height="50"> x <span id="changeNum" >{{ Auth::user()->change }}</span>
                        　<img id='fivefive' src="./images/50-50-movie_61.jpg" width="100" height="50"> x <span id="halfNum" >{{ Auth::user()->half }}</span>
                        　<img id='plustime' src="./images/extraTime.png" width="50" height="50"> x <span id="extraNum">{{ Auth::user()->extra }}</span>
                    </div>

                </div>
                <script>
                    // Get the modal
                    var modal = document.getElementById('myModal');

                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    var changeQ = document.getElementById("changeQ");
                    var fivefive = document.getElementById("fivefive");
                    var plustime = document.getElementById("plustime");

                    // When the user clicks the button, open the modal
                    btn.onclick = function() {
                        modal.style.display = "block";
                    }
                    changeQ.onclick = function() {
                        modal.style.display = "none";
                    }
                    fivefive.onclick = function() {
                        modal.style.display = "none";
                    }
                    plustime.onclick = function() {
                        modal.style.display = "none";
                    }
                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>


                <div id="myimageDiv" style="display:none;">
                    <h3><p align="left">Items: </p></h3>
                    <table border="1" align="left" width="100%" >
                        <tr>
                            <td>
                                <img id='changeQ' src="./images/changeQuestion.png" width="50" height="50">
                            </td>
                            <td>
                                x<span id="changeNum" >{{ Auth::user()->change }}</span>
                            </td>

                            <td>
                                <img id='fivefive' src="./images/50-50-movie_61.jpg" width="50" height="50">
                            </td>
                            <td>
                                x<span id="halfNum" >{{ Auth::user()->half }}</span>
                            </td>

                            <td>
                                <img id="plustime" src="./images/extraTime.png" width="50" height="50">
                            </td>
                            <td>
                                x<span id="extraNum">{{ Auth::user()->extra }}</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="container">

            <div id="Mainp"class="row">

                <div id="Test123" class="col-md-12 col-sm-12 col-xs-12">
                    <div id="Question" class="col-md-4 col-sm-4 col-xs-4">
                        <h2>Question  <label>{!! $playNumber+1 !!}</label>/20</h2>
                        <p><label><sapn id="Qion">{!!($mc[$random]->question)!!}</sapn></label></p>
                        <hr>
                        <h2>Output</h2>
                        <img id='changePhoto' src={!!(($mc[$random]->photo))!!}>
                        <hr>
                        <ol id="hits">
                            {!!(($mc[$random]->hint))!!}
                        </ol>

                    </div>

                    <div id="Answer" class="col-md-8 col-sm-8 col-xs-8">
                        <h2>Answer</h2>
                        <span id ='program'>{!!(($mc[$random]->program))!!}</span>
                        <table id="Mc">
                            {!! Form::open(array('action' => 'Main\ChallengeController@challenge','method' => 'post')) !!}
                            <input type="hidden" id='question_num' name="question_num" value={!! $playNumber!!}>
                            <input type="hidden" id='time' name="time" value='0'>
                            <input type="hidden" id='qtime' name="qtime" value={!! $mc[$random]->time !!}>
                            <input type="hidden" id='trueAns' name="trueAns" value={!! $mc[$random]->question_ans !!}>
                            <input type="hidden" id='random' name="random" value={!! $random !!}>
                            <input type="hidden" id='useItem' name="useItem" value=0>
                            <tr>
                                <td id ="hset" align="center">
                                    <p ><input class="item" type="radio" id='a' name="ans" value="a"/><label for="a" class ='csabcd' id="csa"><span class="queenie"><span id="MCA">a) {!!($mc[$random]->mc_ans1)!!}</span></span></label></p>
                                </td>
                                <td id ="hset" align="center">
                                    <p><input class="item" type="radio" id='b' name="ans" value="b"/><label for="b" class ='csabcd' id="csb"><span class="queenie"><span id="MCB">b) {!!($mc[$random]->mc_ans2)!!}</span></span></label></p>
                                </td>
                            </tr>
                            <tr>
                                <td id ="hset2" align="center">
                                    <p><input class="item" type="radio" id='c' name="ans" value="c"/><label for="c" class ='csabcd' id="csc"><span class="queenie"><span id="MCC">c) {!!($mc[$random]->mc_ans3)!!}</span></span></label></p>
                                </td>
                                <td id ="hset2" align="center">
                                    <p><input class="item" type="radio" id='d' name="ans" value="d"/><label for="d" class ='csabcd' id="csd"><span class="queenie"><span id="MCD">d) {!!($mc[$random]->mc_ans4)!!}</span></span></label></p>
                                </td>
                            </tr>
                        </table>
                        <p id="test"align="right" valign="bottom"><input type="submit" id="Next" name="next" class="btn btn-primary" value="Next"></p>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <div class="container">

            {!! Form::close() !!}
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
@endsection

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<script type="text/javascript" src="../js/jquery-1.6.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        var high = $("#hset").height();
        $('#hset').css( "height", high );
        $('#hset2').css( "height", high );
        $("#hits").hide();
        $("#Next").hide();
        var qtime = $("#qtime").val();
        var s = qtime % 60;
        var m = Math.floor(qtime / 60);
        $("#time").val($("#qtime").val());
        $("#my").text(m);
        if(parseInt($("#changeNum").html()) == 0){
            $("#changeQ").attr('src','./images/changeQuestion - black.png');
        }
        if(parseInt($("#halfNum").html()) == 0){
            $("#fivefive").attr('src','./images/50-50-movie_61 -black.jpg');
        }
        if(parseInt($("#extraNum").html()) == 0){
            $("#plustime").attr('src','./images/extraTime-black.png');
        }

        var id = setInterval(frame, 1000);
        function frame(){

            if(s ==0 && m>=1) {
                m--;
                $("#my").text(m);
                s = 60;
                $("#sy").text(s);
            }else if(s==0 && m==0){
                clearInterval(myVar);
            }
            if(qtime<=30){
                $("#hits").show();
                $("#sy").text(s);
            }
            if(s >60){
                m++;
                $("#my").text(m);
                s= (qtime % 60) -2;
                s--;
                qtime--;
                $("#sy").text(s);
                $("#time").val(qtime);
            }
            else{
                s--;
                $("#sy").text(s);
                qtime--;
                $("#time").val(qtime);
            }
            if(s>9){
                $("#tensy").hide();
            }
            else{
                $("#tensy").show();
            }

            if(qtime<30 && qtime>25){
                $("#hits").fadeOut(1000).fadeIn(1000);
            }
        }
        $('input:radio[name="ans"]').change(function(){
            $("#Next").show();
            $("#skip").hide();
        });
        $('#fivefive').click(function() {
            if (($("#useItem").val() == 0) && (parseInt($("#halfNum").html()) != 0)){
                var donthint = $("#trueAns").val();
                var random = Math.floor(Math.random() * $('.csabcd').length);
                var i;
                if (donthint == 'a') {
                    random = 0;
                    while (random == 0) {
                        var random = Math.floor(Math.random() * $('.csabcd').length);
                    }
                    $('.csabcd').hide().eq(random).show();
                    $("#csa").show();

                }
                if (donthint == 'b') {
                    while (random == 1) {
                        var random = Math.floor(Math.random() * $('.csabcd').length);
                    }
                    $('.csabcd').hide().eq(random).show();
                    $("#csb").show();
                }
                if (donthint == 'c') {
                    while (random == 2) {
                        var random = Math.floor(Math.random() * $('.csabcd').length);
                    }
                    $('.csabcd').hide().eq(random).show();
                    $("#csc").show();
                }
                if (donthint == 'd') {
                    while (random == 3) {
                        var random = Math.floor(Math.random() * $('.csabcd').length);
                    }
                    $('.csabcd').hide().eq(random).show();
                    $("#csd").show();
                }
                $.ajax({
                    type: "POST",
                    url: "/challengeMCChangeHalf",
                    data: {sem: "mcextra"},
                    success: function (data) {
                        console.log(data);
                        $("#halfNum").html(data);
                        $("#halfNum").fadeOut(1000).fadeIn(1000);
                        $("#halfNum").fadeOut(1000).fadeIn(1000);
                        $("#useItem").val(1);
                        $("#changeQ").attr('src','./images/changeQuestion - black.png');
                        $("#fivefive").attr('src','./images/50-50-movie_61 -black.jpg');
                        $("#plustime").attr('src','./images/extraTime-black.png');

                    }
                })
            }
            else{

            }
        });
        $('#plustime').click(function() {
            if (($("#useItem").val() == 0) && (parseInt($("#extraNum").html()) != 0)){
                qtime = qtime + 30;
            s = s + 30;
            $.ajax({
                type: "POST",
                url: "/challengeMCChangeExtra",
                data: {sem: "mcextra"},
                success: function (data) {
                    console.log(data);
                    $("#extraNum").html(data);
                    $("#extraNum").fadeOut(1000).fadeIn(1000);
                    $("#extraNum").fadeOut(1000).fadeIn(1000);
                    $("#useItem").val(1);
                    $("#changeQ").attr('src','./images/changeQuestion - black.png');
                    $("#fivefive").attr('src','./images/50-50-movie_61 -black.jpg');
                    $("#plustime").attr('src','./images/extraTime-black.png');
                }
            })
        }
        else{

            }
        });
        $("#Next").click(function(event){

        });

        $('#changeQ').click(function() {
            var NowNumber = $("#question_num").val();
            if (($("#useItem").val() == 0) && (parseInt($("#changeNum").html()) != 0)){
                $.ajax({
                    type: "POST",
                    url: "/challengeMCChange",
                    data: {sem: NowNumber},
                    success: function (data) {
                        console.log(data);
                        var changecount = parseInt($("#changeNum").html());
                        $("#changeNum").html(changecount - 1);
                        $("#changeNum").fadeOut(1000).fadeIn(1000);
                        $("#changeNum").fadeOut(1000).fadeIn(1000);
                        $("#changeQ").attr('src','./images/the-meaning-of-D-black.jpg')
                        $("#useItem").val(1);
                        $("#changeQ").attr('src','./images/the-meaning-of-D-black.jpg');
                        $("#fivefive").attr('src','./images/50-50-movie_61 -black.jpg');
                        $("#plustime").attr('src','./images/extraTime-black.png');
                        $('#hits').html(data['hint']);
                        $('#MCA').html('a)'+data['mc_ans1']);
                        $('#MCB').html('b)'+data['mc_ans2']);
                        $('#MCC').html('c)'+data['mc_ans3']);
                        $('#MCD').html('d)'+data['mc_ans4']);
                        $('#trueAns').val(data['question_ans']);
                        $('#questionType').val(data['question_type']);
                        $('#program').html(data['program']);
                        $('#Qion').html(data['question']);
                        $('#qtime').val(data['time']);
                        $('#time').val($("#qtime").val($('#qtime').val()));
                        $('#changeQuLv').html(data['question_level']);
                        $('#changeType').html(data['question_type']);
                        $("#changePhoto").attr('src',data['photo']);
                    }
                })
        }else{

            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
</script>
<script type="text/javascript">

    function showHide(){
//create an object reference to the div containing images

        var oImageDiv=document.getElementById("myimageDiv");



//set display to inline if currently none, otherwise to none
        oImageDiv.style.display=(oImageDiv.style.display=='none')?'inline':'none';

    }
</script>



{{--<script src="../dist/js/jqueryTime.js"></script>--}}
{{--<script src="../dist/js/jquery.simple.timer.js"></script>--}}
{{--<script>--}}
{{--$(function(){--}}

{{--$('.timer-quick').startTimer();--}}
{{--$('.timer').startTimer({--}}
{{--onComplete: function(){--}}
{{--console.log('Complete');--}}
{{--}--}}
{{--});--}}

{{--$('.timer-pause').startTimer({--}}
{{--onComplete: function(){--}}
{{--console.log('Complete');--}}
{{--},--}}
{{--allowPause: true--}}
{{--});--}}
{{--})--}}
{{--</script>--}}
</body>

</html>
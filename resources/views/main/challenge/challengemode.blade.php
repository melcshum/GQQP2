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

    input[type=radio]:checked + label>button  {
    border: 1px solid #fff;
    box-shadow: 0 0 3px 3px #090;
    }

    /* Stuff after this is only to make things more pretty */
    input[type=radio] + label>button {
    border: 1px dashed #444;
    width: 150px;
    height: 80px;
    transition: 500ms all;
    background-color: WHITE;
    }

    input[type=radio]:checked + label>button {
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

</head>

<body>
<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('main.layouts.game')

@section('content')
    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <pre class="joe"><center><h4><label>Type:{!!(($mc[$random]->question_type))!!}</label>    <label>Level:<u>{!!($mc[$random]->question_level)!!}</u></label>    <label>Timer: </label><label id="my">0</label>:<label id="tensy">0</label><label id="sy">0</label></h4></center></pre>
                </div>
            </div>
        </div>
        <h3><p align="right">item</p></h3>
        <table border="1" align="right">
            <tr>
                <td>
                    <img id='changeQ' src="./images/the-meaning-of-D.jpg">
                </td>
                <td>
                    x{{ Auth::user()->change }}
                </td>
            </tr>
            <tr>
                <td>
                    <img id='fivefive' src="./images/50-50-movie_61.jpg">
                </td>
                <td>
                    x{{ Auth::user()->half }}
                </td>
            </tr>
            <tr>
                <td>
                    <img id="plustime" src="./images/hO01DAyn.png">
                </td>
                <td>
                    x{{ Auth::user()->extra }}
                </td>
            </tr>
        </table>
        <div class="container">

            <div id="Mainp"class="row">

                <div id="Test123" class="col-md-12 col-sm-12 col-xs-12">
                    <div id="Question" class="col-md-4 col-sm-4 col-xs-4">
                        <h2>Question  <label>{!! $playNumber+1 !!}</label>/20</h2>
                        <p><label>{!!($mc[$random]->question)!!}</label></p>
                        <hr>
                        <h2>Output</h2>
                        <img src={!!(($mc[$random]->photo))!!}>
                        <hr>
                        <ol id="hits">
                            {!!(($mc[$random]->hint))!!}
                        </ol>
                    </div>

                    <div id="Answer" class="col-md-8 col-sm-8 col-xs-8">
                        <h2>Answer</h2>
                        {!!(($mc[$random]->program))!!}
                        <table id="Mc">
                            {!! Form::open(array('action' => 'Main\ChallengeController@challenge','method' => 'post')) !!}
                            <input type="hidden" name="question_num" value={!! $playNumber!!}>
                            <input type="hidden" id='time' name="time" value='0'>
                            <input type="hidden" id='qtime' name="qtime" value={!! $mc[$random]->time !!}>
                            <input type="hidden" id='trueAns' name="trueAns" value={!! $mc[$random]->question_ans !!}>
                            <input type="hidden" id='random' name="random" value={!! $random !!}>
                            <tr>
                                <td id ="hset" align="right">
                                    <p ><input class="item" type="radio" id='a' name="ans" value="a"/><label for="a" ><button type="button"><span id="MCA">a) {!!($mc[$random]->mc_ans1)!!}</span></button></label></p>
                                </td>
                                <td id ="hset" align="right">
                                    <p><input class="item" type="radio" id='b' name="ans" value="b"/><label for="b" ><button type="button"><span id="MCB">b) {!!($mc[$random]->mc_ans1)!!}</span></button></label></p>
                                </td>
                            </tr>
                            <tr>
                                <td id ="hset2" align="right">
                                    <p><input class="item" type="radio" id='c' name="ans" value="c"/><label for="c" ><button type="button"><span id="MCC">c) {!!($mc[$random]->mc_ans1)!!}</span></button></label></p>
                                </td>
                                <td id ="hset2" align="right">
                                    <p><input class="item" type="radio" id='d' name="ans" value="d"/><label for="d" ><button type="button"><span id="MCD">d) {!!($mc[$random]->mc_ans1)!!}</span></button></label></p>
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
            <ul class="nav" id="side-menu">
                <li>
                    <p align="right"><input type="submit" name="skip" id="skip" class="btn btn-warning" value="Skip"></p>
                </li>
            </ul>
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
        $("#my").text(m);

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
                s--;
                $("#sy").text(s);
                qtime--;
            }
            if(s >60){
                m++;
                $("#my").text(m);
                s= (qtime % 60) -2;
                s--;
                qtime--;
                $("#sy").text(s);
            }
            else{
                s--;
                $("#sy").text(s);
                qtime--;
            }
            if(s>9){
                $("#tensy").hide();
            }
            else{
                $("#tensy").show();
            }

        }
        $('input:radio[name="ans"]').change(function(){
            $("#Next").show();
        });
        $('#fivefive').click(function(){
            var donthint = $("#trueAns").val();
            var random = Math.floor(Math.random() * $('.item').length);
            var ansfive1 = ($('.queenie').eq(0).html());
            var ansfive2 = ($('.queenie').eq(1).html());
            var ansfive3 = ($('.queenie').eq(2).html());
            var ansfive4 = ($('.queenie').eq(3).html());
            var i;
            if(donthint=='a'){
                random = 0;
                while (random == 0 ) {
                    var random = Math.floor(Math.random() * $('.item').length);
                }
                $('.item').hide().eq(random).show();
                var ansfive = ($('.queenie').eq(random).html());
                $('.item').eq(0).show();
            }if(donthint=='b')
            {
                while(random==1) {
                    var random = Math.floor(Math.random() * $('.item').length);
                }
                $('.item').hide().eq(random).show();
                var ansfive = ($('.queenie').eq(random).html());
                $('.item').eq(1).show();
            }if(donthint=='c')
            {
                while(random==2) {
                    var random = Math.floor(Math.random() * $('.item').length);
                }
                $('.item').hide().eq(random).show();
                var ansfive = ($('.queenie').eq(random).html());
                $('.item').eq(2).show();
            }if(donthint=='d')
            {
                while(random==3) {
                    var random = Math.floor(Math.random() * $('.item').length);
                }
                $('.item').hide().eq(random).show();
                var ansfive = ($('.queenie').eq(random).html());
                $('.item').eq(3).show();
            }
            $('#hset').css( "height", high );
            $('#hset2').css( "height", high );
        });
        $('#plustime').click(function() {
            qtime = qtime + 30;
            s = s + 30;
        });
        $("#Next").click(function(event){
            $("#time").val(s);
        });

        $('#changeQ').click(function() {
            $.ajax({
                type:"POST",
                url: "/challengeMCChange",
                data: {sem : "mc"},
                success:function(data){
                    console.log(data);
                    $('#hits').text(data['question_id']);
                    $('#MCA').html(data['mc_ans1']);
                    $('#MCB').html(data['mc_ans2']);
                    $('#MCC').html(data['mc_ans3']);
                    $('#MCD').html(data['mc_ans4']);
                    $('#trueAns').val(data['question_ans']);
                    $('#questionType').val(data['question_type']);
                }
            })
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
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
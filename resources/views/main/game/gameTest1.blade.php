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
        }

    </style>

</head>

<body>
@extends("main.layouts.app")

@section('content')
    <div id="wrapper">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <pre class="joe"><center><h4><label>Total Gold:<u>{!!$totalgold!!}</u></label>    <label>Type:{!!(($mc[$random]->question_type))!!}</label>    <label>Level:<u>{!!($mc[$random]->question_level)!!}</u></label>    <label>Timer: </label><label id="my">0</label>:<label id="sy">0</label>     </h4></center></pre>
            </div>
        </div>
    </div>
    <h3><p align="right">item</p></h3>
    <table border="1" align="right">
        <tr>
            <td>
                <img src="./images/the-meaning-of-D.jpg">
            </td>
            <td>
                x1
            </td>
        </tr>
        <tr>
            <td>
                <img id='fivefive' src="./images/50-50-movie_61.jpg">
            </td>
            <td>
                x1
            </td>
        </tr>
        <tr>
            <td>
                <img id="plustime" src="./images/hO01DAyn.png">
            </td>
            <td>
                x1
            </td>
        </tr>
    </table>
    <div class="container">

        <div id="Mainp"class="row">
            <h3><label>{!! Form::label('question_num', $playQuestionNum+1) !!}</label>/{!! count($mc) !!}</h3>
            <div id="Test123" class="col-md-12 col-sm-12 col-xs-12">
                <div id="Question" class="col-md-4 col-sm-4 col-xs-4">
                    <h2>Question</h2>
                    <p><label>{!!($mc[$random]->question)!!}</label></p>
                    <hr>
                    <h2>Output</h2>
                    <img src="{!! $mc[$random]->photo !!}">
                    <hr>
                    <ol id="hits">
                        {!! $mc[$random]->hint !!}
                    </ol>
                </div>

                <div id="Answer" class="col-md-8 col-sm-8 col-xs-8">
                    <h2>Answer</h2>
                    {!!($mc[$random]->program)!!}
                    <table id="Mc">
                        {!! Form::open(array('action' => 'Main\TestController@result','method' => 'post')) !!}
                        <input type="hidden" name="question_num" value={!! $playQuestionNum+1!!}>
                        <input type="hidden" id='time' name="time" value='0'>
                        <input type="hidden" id='type' name="type" value={!! $type !!}>
                        <input type="hidden"  name="totalgold" value={!! $totalgold !!}>
                        <input type="hidden" id='qtime' name="qtime" value={!! $mc[$random]->time !!}>
                        <input type="hidden" id='trueAns' name="trueAns" value={!! $mc[$random]->question_ans !!}>
                        <tr>
                            <td>
                                <p><input class="item" type="radio" id='a' name="ans" value="a"/>a.{!!($mc[$random]->mc_ans1)!!}</p>
                                <p><input class="item" type="radio" id='b' name="ans" value="b"/>b.{!!($mc[$random]->mc_ans2)!!}</p>
                            </td>
                            <td>
                                <p><input class="item" type="radio" id='c' name="ans" value="c"/>c.{!!($mc[$random]->mc_ans3)!!}</p>
                                <p><input class="item" type="radio" id='d' name="ans" value="d"/>d.{!!($mc[$random]->mc_ans4)!!}</p>
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
        <li>
            <p align="right"><input type="submit" name="skip" id="skip" class="btn btn-warning" value="Skip"></p>
        </li>
    {!! Form::close() !!}
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
        $("#hits").hide();
        $("#Next").hide();
        var s =$("#sy").val();
        var m = $("#my").val();
        var rtime=0;
        var questiontime =$("#qtime").val();
        var id = setInterval(frame, 1000);
        function frame(){
            if(s>=(questiontime/2)){
                $("#hits").show();
                s++;
                rtime++;
                $("#sy").text(s);
                $("#time").val(rtime);
                if(s>=60){
                    m++;
                    $("#my").text(m);
                    s= (rtime % 60) -2;
                    s++;
                    rtime++;
                    $("#sy").text(s);
                    $("#time").val(rtime);
                }
            }
            else{
                s++;
                rtime++;
                $("#sy").text(s);
                $("#time").val(rtime);
            }
        }
        $('input:radio[name="ans"]').change(function(){
            $("#Next").show();
        });
        $('#fivefive').click(function(){
            var donthint = $("#trueAns").val();
            var random = Math.floor(Math.random() * $('.item').length);
            if(donthint=='a'){
                while(random==0) {
                    var random = Math.floor(Math.random() * $('.item').length);
                }
                $('.item').hide().eq(random).show();
                $('.item').eq(0).show();
            }elseif(donthint=='b')
            {
                while(random==1) {
                    var random = Math.floor(Math.random() * $('.item').length);
                }
                $('.item').hide().eq(random).show();
                $('.item').eq(1).show();
            }elseif(donthint=='c')
            {
                while(random==2) {
                    var random = Math.floor(Math.random() * $('.item').length);
                }
                $('.item').hide().eq(random).show();
                $('.item').eq(2).show();
            }elseif(donthint=='d')
            {
                while(random==3) {
                    var random = Math.floor(Math.random() * $('.item').length);
                }
                $('.item').hide().eq(random).show();
                $('.item').eq(3).show();
            }
        });
        $('#plustime').click(function(){
            rtime= rtime + 30;
            s = s +30;



//            if(s>= 60 ){
//                m++;
//                s= s % 60;
//            }
        });



        //$('#plustime').click(function(){
        //
        //});
    });
</script>
<!--<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $("#hits").hide();
        $("#Next").hide();
        var s = 60;
        var id = setInterval(frame, 1000);
        function frame(){
            if(s<=30){
                $("#hits").show();
            }else{
                s--;
            }
        }
        $('input:radio[name="ans"]').change(function(){
            $("#Next").show();
        });
        $("#Next").click(function(event){
            $("#time").val(s);
        });
    });
</script>-->
<script src="../dist/js/jqueryTime.js"></script>
<script src="../dist/js/jquery.simple.timer.js"></script>
<script>
    $(function(){

        $('.timer-quick').startTimer();
        $('.timer').startTimer({
            onComplete: function(){
                console.log('Complete');
            }
        });

        $('.timer-pause').startTimer({
            onComplete: function(){
                console.log('Complete');
            },
            allowPause: true
        });
    })
</script>
</body>

</html>

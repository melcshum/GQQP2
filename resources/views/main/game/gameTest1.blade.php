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

    <style>

        .item{
            position: absolute;
            left: -9999px;
        }

        input[type=radio]:checked + label {
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
        #myProgress {
            width: 100%;
            background-color: #ddd;
            position:relative;
        }

        #myBar {

            width:{!! ($playQuestionNum+1)/count($mc)*100 !!}%;
            height: 30px;
            background-color: #4CAF50;
        }


    </style>

</head>

<body>
@extends("main.layouts.game")

@section('content')

    <div class="container">

        <div id="Mainp"class="col-md-12 col-sm-12 col-xs-12">
            <div id="Test123" class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <pre class="joe"><center><h4><label> Total Gold Earned:<u>{!!$totalgold!!}</u></label>  <label><img src="./images/gold.ico" width="25" height="25">{!!(($mc[$random]->gold))!!}</label>  <label>Type:{!!(($mc[$random]->question_type))!!}</label>    <label>Level:<u>{!!($mc[$random]->question_level)!!}</u></label>    <label>Timer: </label><label id="my">0</label>:<label id="tensy">0</label><label id="sy">0</label>     </h4></center></pre>
                    </div>
                </div>

                <div id="myProgress">

                    <div id="myBar">
                        <div align="center"> {!! Form::label('question_num', $playQuestionNum+1) !!}/{!! count($mc) !!}</div>
                    </div>


                </div>




                <div id="Question" class="col-md-4 col-sm-4 col-xs-4">
                    <h2>Question </h2>
                    <p><label>{!!($mc[$random]->question)!!}</label></p>
                    <hr>
                    <h2>Output</h2>
                    <img src="{!! $mc[$random]->photo !!}">
                    <hr>
                    <ol id="hits">
                        <font color="Red"><h3>Hints!</h3></font>
                        <font color="Red">{!! $mc[$random]->hint !!}</font>
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
                            <td align="center">
                                <p><input class="item" type="radio" id='a' name="ans" value="a"/><label for="a">a) {!!($mc[$random]->mc_ans1)!!}</label></p>
                                <p><input class="item" type="radio" id='c' name="ans" value="c"/><label for="c">c) {!!($mc[$random]->mc_ans3)!!}</label></p>
                            </td>
                            <td align="center">
                                <p><input class="item" type="radio" id='b' name="ans" value="b"/><label for="b">b) {!!($mc[$random]->mc_ans2)!!}</label></p>
                                <p><input class="item" type="radio" id='d' name="ans" value="d"/><label for="d">d) {!!($mc[$random]->mc_ans4)!!}</label></p>
                            </td>
                        </tr>
                    </table>
                    <p align="right"><input type="button" id="Reset" name="reset" class="btn btn-danger" value="Reset" onclick="reset()">
                  <input type="submit" id="Next" name="next" class="btn btn-primary" value="Next"></p>
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
        $("#Reset").hide();
        var num = 50;
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
                    s = (rtime % 60) -1;
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
            if(s>9){
                $("#tensy").hide();
            }
            else{
                $("#tensy").show();
            }
        }

        $('input:radio[name="ans"]').change(function(){
            $("#Next").show();
            $("#Reset").show();
            $("#skip").hide();
        });


        $('input:button[name="reset"]').click(function(){
            $("#Next").hide();
            $("#Reset").hide();
            $("#skip").show();

            $(':radio').each(function () {
                $(this).removeAttr('checked');
                $('input[type="radio"]').prop('checked', false);
            })
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

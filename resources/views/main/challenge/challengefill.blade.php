<!DOCTYPE html>
<html lang="en">

<head>
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

@extends('main.layouts.game')

@section('content')
    <div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <pre class="joe"><center><h4><label>Type:{!!(($fill[$random]->question_type))!!}</label>    <label>Level:<u>{!!(($fill[$random]->question_level))!!}</u></label>    <label>Timer: </label><label id="my">0</label>:<label id="sy">0</label></h4></center></pre>
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
                <img src="./images/hO01DAyn.png">
            </td>
            <td>
                x1
            </td>
        </tr>
    </table>
    <div class="container">

        <div id="Mainp" class="row">
            <div id="Test123" class="col-md-12 col-sm-12 col-xs-12">

                <div id="Question" class="col-md-4 col-sm-4 col-xs-4">
                    <h2>Question <label>{!!(($playnum))!!}</label>/20</h2>
                    <p><label>{!!(($fill[$random]->question))!!}</label></p>
                    <hr>
                    <h2>Output</h2>
                    <img src={!!(($fill[$random]->photo))!!}>
                    <hr>
                    <ol id="hits">
                        {!!(($fill[$random]->hint))!!}
                    </ol>
                </div>

                <div id="Answer"class="col-md-8 col-sm-8 col-xs-8" >
                    <h2>Answer</h2>
                    {!! Form::open(array('action' => 'Main\ChallengeFillController@challenge','method' => 'post')) !!}
                    <input type="hidden" name="playNum" id="playNum" value={!! $playnum !!}>
                    <input type="hidden" name="playNum" id="playNum" value={!! $random !!}>
                    <input type="hidden" id='qtime' name="qtime" value={!! $fill[$random]->time !!}>
                    {!!(($fill[$random]->program))!!}
                    <p id="test"align="right" valign="bottom"><input type="submit" id="Next" class="btn btn-primary" value="Next"></p>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <div class="container">
        <ul class="nav" id="side-menu">

            <li>
                <a href="" class="btn" style="float: left;">01</a>
            </li>

            <li>
                <a href="" class="btn " style="float: left;">02</a>
            </li>
            <li>
                <a href="" class="btn" style="float: left;">03</a>
            </li>
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
        $("#hits").hide();
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

        }
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

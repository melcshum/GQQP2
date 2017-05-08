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
        }
        #Answer{
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #Mainp [class*="col-"] {
            float: none;
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

    </style>

    <title>Learning Java |FYP</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body onload="setTimeout(showHide, 4150);">
@extends("main.layouts.app")

@section('content')

<div id="wrapper">
    <div id="myimageDiv" style="display:none;">

    <div class="container">




        <div id="Mainp"><div class="col-md-12 col-sm-12 col-xs-12">

                <table border="1" width="100%">
                    <tr><td colspan="3"><center><h3>{!! $message !!},　{!!$gold!!} <img src="./images/gold.ico" width="35" height="35"> is earned! 　<img src="./images/timer.png" width="35" height="35"> used is 0:{!! $time!!} ! </h3></center></td></tr></table>


                <pre><h4>Question: <label>{!! $playQuestionNum+1!!}</label>/{!! count($mc) !!}  {!!($mc[$random]->question)!!}</h4></pre>
                <table border="1" width="100%">
                    <tr>
                        <td>
                            {!!($mc[$random]->program)!!}
                        </td>
                    </tr>

                    </table>
            <div id="Question" >
               <table border="0" width="100%">
                    <tr><td><h2>Your Answer</h2></td><td></td><td><h2>Correct Answer</h2></td></tr>

                    <tr><td>  {!!$playAns!!}.{!!$ans!!} </td><td></td><td>{!!($mc[$random]->question_ans)!!}.{!!($tureAns)!!}</td></tr>
<tr><td colspan="3">  {!! Form::open(array('action' => 'Main\TestController@result','method' => 'post')) !!}
        <p align="right"><input type="submit" name='Next_question' class="btn btn-warning" value="Next question"></p>
        <input type="hidden" name="question_num" value={!! $playQuestionNum+=1!!}>
        <input type="hidden" name="totalgold" value={!!$totalgold+$gold!!}>
        <input type="hidden" name="type" value={!!$type!!}>
        {!! Form::close() !!}</td></tr>
                 </table>
            </div>
                </div>
        </div>
        <!-- /.row -->
    </div>
</div>
    <div id="myimageDiv2" style="display:inline;">
        {!! $gif !!}
        <br />
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
        var s = 60;
        var id = setInterval(frame, 1000);
        function frame(){
            if(s<=30){
                $("#hits").show();
            }else{
                s--;
            }
        }
    });
</script>
<script src="../js/jqueryTime.js"></script>
<script src="../js/jquery.simple.timer.js"></script>
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

<script type="text/javascript">

    function showHide(){
//create an object reference to the div containing images

        var oImageDiv=document.getElementById("myimageDiv");
        var pImageDiv=document.getElementById("myimageDiv2");


//set display to inline if currently none, otherwise to none
        oImageDiv.style.display=(oImageDiv.style.display=='none')?'inline':'none';
        pImageDiv.style.display=(pImageDiv.style.display=='inline')?'none':'inline';
    }
</script>

</body>

</html>

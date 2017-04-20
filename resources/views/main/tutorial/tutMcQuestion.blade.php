<!DOCTYPE html>
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
//    $(document).ready(function(){
//        $("#hits").hide();
//        $("#Next").click(function(){
//        });
//
//        $(function(){
//
//            $('.timer-quick').startTimer();
//
//            $('.timer').startTimer({
//                onComplete: function(){
//                    console.log('Complete');
//                }
//            });
//
//            $('.timer-pause').startTimer({
//                onComplete: function(){
//                    console.log('Complete');
//                },
//                allowPause: true
//            });
//        })
//    });
</script>
<script src="../dist/js/jqueryTime.js"></script>
<script src="../dist/js/jquery.simple.timer.js"></script>

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
        #Mc{
            width: 80%;
        }

    </style>

</head>

<body>
@extends('layouts.app')

@section('content')

<div id="wrapper">

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <pre class="joe"><center><h4>   <label>Type:{!!(($iftutorial[$tutquestion]->question_type))!!}</label>    <label>Level:<u>{!!(($iftutorial[$tutquestion]->tutquestion_level))!!}</u></label></h4></center></pre>
            </div>
        </div>
    </div>
    <div class="container">

        <div id="Mainp"class="row">
            <div id="Question" class="col-md-6 col-sm-6 col-xs-6">
                <h2>Question</h2>
                <p><label>{!!(($iftutorial[$tutquestion]->tutquestion))!!}</label></p>
                <hr>
            </div>

            <div id="Answer" class="col-md-6 col-sm-6 col-xs-6">
                <h2>Answer</h2>
                {!!(($iftutorial[$tutquestion]->program))!!}
                <table id="Mc">
                    {!! Form::open(array('action' => 'TutorialController@show','method' => 'post')) !!}
                    <input type="hidden" name="numQ" value={!! $tutquestion !!}>
                    <tr>
                        <td>
                            <input type="radio" name="tutans" value="a">a.<p>{!!(($iftutorial[$tutquestion]->mc_ans1))!!}</p>
                            <input type="radio" name="tutans" value="b">b.<p>{!!(($iftutorial[$tutquestion]->mc_ans2))!!}</p>
                        </td>
                        <td>
                            <input type="radio" name="tutans" value="c">c.<p>{!!(($iftutorial[$tutquestion]->mc_ans3))!!}</p>
                            <input type="radio" name="tutans" value="d">d.<p>{!!(($iftutorial[$tutquestion]->mc_ans4))!!}</p>
                        </td>
                    </tr>

                </table>
                <p id="test"align="right" valign="bottom"><input type="submit" id="Next" name="next" class="btn btn-primary" value="Next"></p>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection
</body>

</html>

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

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Logout_page.html">Result</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> joechoy123<i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a data-toggle="modal" data-target="#SignUp"><i class="fa fa-user fa-fw"></i> Leave</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <!-- /.navbar-static-side -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <pre class="joe"><center><h4><label>Gold:<u>{!!$gold!!}</u></label>   <label>Timer: 0:{!! $time!!}</label></h4></center></pre>
            </div>
        </div>
    </div>
    <div class="container">

        <div id="Mainp"class="row">
            <h3><label>{!! $playQuestionNum+1!!}</label>/20</h3>
            <pre><h4>Question: {!!(array_get($mc[$playQuestionNum], 'attributes.question'))!!}</h4></pre>
            <div id="Question" class="col-md-8 col-sm-8 col-xs-8">
                <h2>Your Answer</h2>
                {!!(array_get($mc[$playQuestionNum], 'attributes.program'))!!}
                {!!$playAns!!}.{!!$ans!!}
            </div>

            <div id="Answer" class="col-md-8 col-sm-8 col-xs-8">
                <h2>Correct Answer</h2>
                {!!(array_get($mc[$playQuestionNum], 'attributes.question_ans'))!!}.{!!($tureAns)!!}
                {!!(array_get($mc[$playQuestionNum], 'attributes.program'))!!}
            </div>
        </div>
        <!-- /.row -->
    </div>
    <div class="container">
        <ul class="nav" id="side-menu">

            <li>
                <a href="#" class="btn" style="float: left;">01</a>
            </li>

            <li>
                <a href="q2.html" class="btn active" style="float: left;">02</a>
            </li>
            <li>
                <a href="q3.html" class="btn" style="float: left;">03</a>
            </li>

            <li>
                <a href="q4.html" class="btn" style="float: left;">04</a>
            </li>
            <li>
                <a href="q5.html" class="btn" style="float: left;">05</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">06</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">07</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">08</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">09</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">10</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">11</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">12</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">13</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">14</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">15</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">16</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">17</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">18</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">19</a>
            </li>
            <li>
                <a href="#" class="btn" style="float: left;">20</a>
            </li>
            <li>
                {!! Form::open(array('action' => 'TestController@result','method' => 'post')) !!}
                <p align="right"><input type="submit" name='Next_question' class="btn btn-warning" value="Next question"></p>
                <input type="hidden" name="question_num" value={!! $playQuestionNum+=1!!}>
                <input type="hidden" name="totalgold" value={!!$totalgold+$gold!!}>
                {!! Form::close() !!}
            </li>
        </ul>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

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
</body>

</html>

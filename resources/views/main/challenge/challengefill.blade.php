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
            <a class="navbar-brand" href="Logout_page.html">Game Exam</a>
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
                <pre class="joe"><center><h4><label>Type:{!!(($fill[$playnum]->question_type))!!}</label>    <label>Level:<u>{!!(($fill[$playnum]->question_level))!!}</u></label>    <label>Timer: </label><label id="asd" class="timer" data-seconds-left=>{!!(($fill[$playnum]->time))!!} </label></h4></center></pre>
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
                <h3><label>{!!(($playnum+3))!!}</label>/3</h3>
                <div id="Question" class="col-md-4 col-sm-4 col-xs-4">
                    <h2>Question</h2>
                    <p><label>{!!(($fill[$playnum]->question))!!}</label></p>
                    <hr>
                    <h2>Output</h2>
                    <img src={!!(($fill[$playnum]->photo))!!}>
                    <hr>
                    <ol id="hits">
                        {!!(($fill[$playnum]->hint))!!}
                    </ol>
                </div>

                <div id="Answer" class="col-md-8 col-sm-8 col-xs-8">
                    <h2>Answer</h2>
                    {!! Form::open(array('action' => 'ChallengeFillController@challenge','method' => 'post')) !!}
                    <input type="hidden" name="playNum" id="playNum" value={!! $playnum !!}>
                    {!!(($fill[$playnum]->program))!!}
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
        $("#Next").click(function(event){
            $("#time").val(s);
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

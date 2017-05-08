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

</head>

<body>


@extends('main.layouts.game')

@section('content')
    <div id="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <pre class="joe"><center><h4><label>Total Result</label></h4></center></pre>
                </div>
            </div>
        </div>
        <div class="container">

            <div id="Mainp"class="row">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Question</th>
                        <th>Result</th>
                        <th>Gold</th>
                        <th>Knowledge</th>
                        <th>Finish Time</th>
                    </tr>
                    <tbody>
                    @for($i=0;$i<count($totalquestionMCresult);$i++)
                        <tr>
                            <td>{!! $totalquestionMCresult[$i][$i]['Question'] !!}</td>
                            <td>{!! $totalquestionMCresult[$i][$i]['Result'] !!}</td>
                            <td>{!! $totalquestionMCresult[$i][$i]['Gold'] !!}</td>
                            <td>{!! $totalquestionMCresult[$i][$i]['Knowledge'] !!}</td>
                            <td>{!! $totalquestionMCresult[$i][$i]['Finish Time']!!} (Sec)</td>
                        </tr>
                    @endfor
                    <tr>
                        <td>{!! $totalquestionresult[0][0]['Question'] !!}</td>
                        <td>{!! $totalquestionresult[0][0]['Result'] !!}</td>
                        <td>{!! $totalquestionresult[0][0]['Gold'] !!}</td>
                        <td>{!! $totalquestionresult[0][0]['Knowledge'] !!}</td>
                        <td>{!! $totalquestionMCresult[0][0]['Finish Time']!!} (Sec)</td>
                    </tr>
                    <tr>

                    </tr>

                    <tr>
                        <td colspan="5">
                            <center>Total Gold Earned: {!! $totalGold !!}　<img src="./images/gold.ico" width="45" height="45">
                        </center>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5">
                            <center>Total Knowledge Earned: {!! $totalKnow !!}　<i class="fa fa-book fa-3x"></i>
                            </center>
                        </td>
                    </tr>
                    </tbody>
                    </thead>
                </table>
                <center><a href="{{ url('/') }}"><button><img src="./images/backMenu.png" height="50"></button></a></center>
            </div>
            <!-- /.row -->
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
        $("#login").click(function(){
        });
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

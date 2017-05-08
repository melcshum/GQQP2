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
            <div class="">
                <pre class="joe"><center><h4><label>Total Result</label></h4></center></pre>
            </div>
        </div>
    </div>
    <div class="container">

        <div id="Mainp"class="row">
            <table class="table table-striped" border="0">
                <thead>
                <tr>
                    <th>Question</th>
                    <th>Result</th>
                    <th>Gold</th>
                    <th>Finish Time</th>
                </tr>
                <tbody>
                 @for($i=0;$i<count($totalquestionresult);$i++)
                <tr>
                    <td>{!! $totalquestionresult[$i][$i]['Question'] !!}</td>
                    <td>{!! $totalquestionresult[$i][$i]['Result'] !!}</td>
                    <td>{!! $totalquestionresult[$i][$i]['Gold'] !!}</td>
                    <td>{!! $totalquestionresult[$i][$i]['Finish Time']!!} (Sec)</td>
                </tr>

                 @endfor

                 <tr>
                     <td colspan="2" align="right">
                         Total Gold Earned:
                     </td>
                     <td colspan="2" align="left">
                         {!! $totalgold !!}　<img src="./images/gold.ico" width="25" height="25">
                     </td>
                 </tr>
                 <tr>
                     <td colspan="2" align="right">
                         Total Time Used:
                     </td>
                     <td colspan="2" align="left">
                         {!! $totaltime !!}　(Sec)
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

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
@extends('layouts.sidebar')

@section('content')
    <div id="wrapper">

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <center><h3>Now we going to fill question part</h3></center>
                </div>
            </div>

                        <center><p><a href="/challengeFill"><input type="button" name="3" id="3" class="btn btn-primary" value="Play"></a></p></center>
                    </div>
                </div>
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
        $("#hints").hide();
        var s =$("#sy").val();
        var m = $("#my").val();
        var id = setInterval(frame, 1000);
        function frame(){
            if(s>=5){
                $("#hints").show();
                s++;
                $("#sy").text(s);
                if(s>=60){
                    m++;
                    $("#my").text(m);
                    s=0;
                    s++;
                    $("#sy").text(s);
                }
            }

            else{
                s++;
                $("#sy").text(s);
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
